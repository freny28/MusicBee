<div class="col-md-10 offset-md-1">
	<div class="row col-md-12" style="margin-bottom: 30px;">
	<h3 class=" col-md-4 offset-md-4 text-lg-left">My Favorite Song List</h3>
	</div>
	<div class="row" style="margin-bottom: 30px; margin-top:30px;">
	<form method="post" action="<?php echo base_url()?>index.php?/Favorites/searchIt" class="col-md-6 row">
			<div class="form-group col-md-12 row">
				<label class="col-md-3 text-center" for="search"><h5>Search</h5></label>
				<input type="text" name="search" id="search" class=" form-control col-md-6 " required="required" />
				<button type="submit" class="btn btn-info btn-block col-md-3">Search</button>
			</div>
	</form>
	<form method="post" action="<?php echo base_url()?>index.php?/Favorites/groupBy"  class="col-md-6 row">
		<div class="form-group col-md-12 row">
			<label for="groupbyselect" class="col-md-3"><h5>Order By:</h5></label>
			<select name="groupbyselect" class="form-control col-md-6" id="groupbyselect">
			  <option value="select">---Select--</option>
			  <option value="art_singer" <? if($art_select){ ?> selected <? } ?> >Artist/Singer</option>
			  <option value="md_band" <? if($md_select){ ?> selected <? } ?>>Music Director/Band</option>
			  <option value="genere" <? if($genere_select){ ?> selected <? } ?>>Genre</option>
			</select>
		<button type="submit" class="btn btn-info btn-block col-md-3">Filter</button>
		</div>
	</form>
	<form method="post" action="<?php echo base_url()?>index.php?/Favorites" class="row col-md-12" style="margin-bottom: 20px; margin-top:20px;">
		<button type="submit" class="btn btn-success btn-block col-md-2 offset-md-5"><h4>View All Favorites </h4> </button>
	</form>
	</div>
	<div class="row">
	<div class="col-md-8 offset-md-2">
		<table class="table table-striped">
			<thead class="thead-dark">
				<th scope="col-md-1">No.</th>
				<th scope="col-md-3">Song</th>
				<th scope="col-md-2">Artist/Singer</th>
				<th scope="col-md-2">Music Director/Band</th>
				<th scope="col-md-2">Genre</th>
				<th scope="col-md-1">Remove</th>
			</thead>
			<tbody>
			<? for($i = 0; $i < count($favSongs); $i++) { ?>
				<tr>
					<th scope="col-md-1"><?= $i + 1 ?></th>
					<td scope="col-md-3"><?= $favSongs[$i]['name'] ?></td>
					<td scope="col-md-2"><?= $favSongs[$i]['artist_singer'] ?></td>
					<td scope="col-md-2"><?= $favSongs[$i]['director_band'] ?></td>
					<td scope="col-md-2"><?= $favSongs[$i]['genere'] ?></td>
					<td scope="col-md-1"><a href="<?= base_url(); ?>index.php?/Favorites/removeSong/<?= $favSongs[$i]['song_id']?>" style='color:white;' class="btn btn-danger btn-block">X</a></td>
				</tr>
			<? } ?>
			</tbody>
		</table>
	</div>
	</div>
</div>
</div>