<div class="col-md-10 offset-md-1">
	<div class="row">
		<h3 class="col-md-4 offset-md-4 text-lg-left text-center ">My Song List</h3>
	</div>
	<div class="row" style="margin-bottom: 30px; margin-top:30px;">
	<form method="post" action="<?php echo base_url()?>index.php?/Songs/searchIt" class="col-md-6 row">
			<div class="form-group col-md-12 row">
				<label class="col-md-3 text-center" for="search"><h5>Search</h5></label>
				<input type="text" name="search" id="search" class=" form-control col-md-6 " required="required" />
				<button type="submit" class="btn btn-info btn-block col-md-3">Search</button>
			</div>
	</form>
	<form method="post" action="<?php echo base_url()?>index.php?/Songs/groupBy"  class="col-md-6 row">
		<div class="form-group col-md-12 row">
			<label for="groupbyselect" class="col-md-3"><h5>Order By:</h5></label>
			<select name="groupbyselect" class="form-control col-md-6" id="groupbyselect">
			  <option value="select">---Select--</option>
			  <option value="art_singer" <? if($art_select){ ?> selected <? } ?> >Artist/Singer</option>
			  <option value="md_band" <? if($md_select){ ?> selected <? } ?>>Music Director/Band</option>
			  <option value="genere" <? if($genere_select){ ?> selected <? } ?>>Genere</option>
			</select>
		<button type="submit" class="btn btn-info btn-block col-md-3">Filter</button>
		</div>
	</form>
	</div>
	<form method="post" action="<?php echo base_url()?>index.php?/Songs" class="row" style="margin-bottom: 30px;">
		<button type="submit" class="btn btn-success btn-block col-md-2 offset-md-5"><h5>View All Songs </h5> </button>
	</form>
	<div class="row">
	<div class="col-md-9">
		<table class="table table-striped">
			<thead class="thead-dark">
				<th scope="col-md-1">No.</th>
				<th scope="col-md-1">Add to favorites</th>
				<th scope="col-md-2">Song</th>
				<th scope="col-md-1">Artist/Singer</th>
				<th scope="col-md-1">Music Director/Band</th>
				<th scope="col-md-1">Genere</th>
				<th scope="col-md-1">Edit Song</th>
				<th scope="col-md-1">Delete Song</th>
			</thead>
			<tbody>
			<? if(empty($allSongs)){ ?> <h3 class="text-danger col-md-12 offset-md-5"> No Songs Found </h3> <? } ?>
			
			
			<? for($i = 0; $i < count($allSongs); $i++) { ?>
				<tr>
					<th scope="col-md-1"><?= $i + 1 ?></th>
					<? if($allSongs[$i]['favorite'] == 0){ ?>
					<td scope="col-md-1"><a href="<?= base_url(); ?>index.php?/Songs/addFavorite/<?= $allSongs[$i]['song_id']?>" style='color:white;' class="btn btn-primary btn-block">+</a></td>
					<? } else{ ?>
					<td></td>
					<? } ?>
					<td scope="col-md-2"><?= $allSongs[$i]['name'] ?></td>
					<td scope="col-md-1"><?= $allSongs[$i]['artist_singer'] ?></td>
					<td scope="col-md-1" ><?= $allSongs[$i]['director_band'] ?></td>
					<td scope="col-md-1"><?= $allSongs[$i]['genere'] ?></td>
					<td scope="col-md-1"><a href="<?= base_url(); ?>index.php?/Songs/editSong/<?= $allSongs[$i]['song_id']?>" class="btn btn-info btn-block">Edit</a></td>
					<td scope="col-md-1"><a href="<?= base_url(); ?>index.php?/Songs/deleteSong/<?= $allSongs[$i]['song_id']?>" style='color:white;' class="btn btn-danger btn-block">X</a></td>
				</tr>
			<? } ?>
			</tbody>
		</table>
	</div>
	<div class="col-md-3">
		<?if($sameSong){ ?><p class="text-danger">Song is already on your list</p> <? } ?>
		<form method="post" action="<?php echo base_url()?>index.php?/Songs/updateSong">
			<div class="form-group">
				<label class="col-md-12 text-center pb-10" for="song">Song Name</label>
				<div class="input-group col-md-12 ">
					<input type="text" name="song" id="song" class="form-control col-md-10 offset-md-1"  required="required" value="<?= $editSong[0]['name'] ?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12 text-center pb-10" for="artist">Artist/Singer Name</label>
				<div class="input-group col-md-12 ">
					<input type="text" name="artist" id="artist" class="form-control col-md-10 offset-md-1"  value="<?= $editSong[0]['artist_singer'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12 text-center pb-10" for="band">Music Director/Band Name</label>
				<div class="input-group col-md-12 ">
					<input type="text" name="band" id="band" class="form-control col-md-10 offset-md-1" value="<?= $editSong[0]['director_band'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12 text-center pb-10" for="genere">Genere</label>
				<div class="input-group col-md-12 ">
					<input type="text" name="genere" id="genere" class="form-control col-md-10 offset-md-1" value="<?= $editSong[0]['genere'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12 text-center pb-10" for="favorite">Favorite</label>
				<div class="input-group col-md-12 offset-md-5 ">
					<input type="checkbox" data-toggle="toggle" name="favorite" id="favorite" class="form-control col-md-2 " <?if($editSong[0]['favorite']){ ?> checked <? } ?> >
				</div>
			</div>
			<input type="hidden" name="song_id" id="song_id" value = "<?= $editSong[0]['song_id'] ?>">
			<div class="form-group col-md-6 offset-md-3">
				<button type="submit" class="btn btn-primary btn-block">Update Song</button>
			</div> 
		</form>
	</div>
	</div>
</div>
</div>