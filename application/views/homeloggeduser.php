<div class="col-md-10 offset-md-2">
	<h3 class=" col-md-6 offset-md-3 text-lg-left" style="margin-bottom: 50px;"><?= $selected_user_info[0]['firstname']. ' '. $selected_user_info[0]['lastname']; ?> 's Song List</h3>
	<form method="post" action="<?php echo base_url()?>index.php?/Homelogged/searchIt" class="col-md-6 offset-md-2 row">
			<div class="form-group col-md-12 row">
				<label class="col-md-3 text-center" for="search"><h5>Search</h5></label>
				<input type="text" name="search" id="search" class=" form-control col-md-6 " required="required" />
				<button type="submit" class="btn btn-info btn-block col-md-3">Search</button>
				<input type="hidden" name="user_id" id="user_id" value="<?= $selected_user_info[0]['user_id'] ?>">
			</div>
	</form>
	<div class="col-md-12" style="margin-bottom: 30px;">
	<form method="post" action="<?php echo base_url()?>index.php?/Homelogged/filter">
	<div class="row">
			<div class="col-md-2 offset-md-3" >
			
				<input type="radio" id="all" name="filter" value="all" style="padding-right:10px;" <? if(!$fav_check){ ?> checked <? } ?> >
				<label for="all" style="padding-right:10px;">All</label>
			
				<input type="radio" id="favorites" name="filter" value="favorites" style="padding-right:10px;" <? if($fav_check){ ?> checked <? } ?> >
				<label for="favorites"style="padding-right:10px;">Favorites</label>
			</div>
			<div class="col-md-1">
			<button type="submit" class="btn btn-dark btn-block">Filter</button>
			<input type="hidden" name="user_id" id="user_id" value="<?= $selected_user_info[0]['user_id'] ?>">
			</div>
	</div>
	</form>
	</div>
	<div class="row col-md-12 col-sm-6" style="margin-bottom: 10px;">
	<form method="post" action="<?php echo base_url()?>index.php?/Homelogged/viewUserSongs" class="row col-md-6 col-sm-6" >
		<input type="hidden" name="user_id" id="user_id" value="<?= $selected_user_info[0]['user_id'] ?>">
	
		<button type="submit" class="btn btn-success btn-block col-md-4 offset-md-4 col-sm-4"><p>View All Songs </p> </button>
	</form>
	<form method="post" action="<?php echo base_url()?>index.php?/Homelogged" class="row col-md-6 col-sm-6" >
		<input type="hidden" name="user_id" id="user_id" value="<?= $selected_user_info[0]['user_id'] ?>">
		<button type="submit" class="btn btn-primary btn-block col-md-4 col-sm-4"><p>Back to All Profiles </p> </button>
	</form>
	</div>
	<div class="col-md-9">
	<? if($added){ ?> <p>Song name: <strong> <?= $added_song ?></strong> added to your list </p> <? } ?>
	<? if($sameSong){ ?> <p class="text-danger">Song name: <strong> <?= $added_song ?></strong> already in your list </p> <? } ?>
		<table class="table table-striped">
			<thead class="thead-dark">
				<th scope="col">No.</th>
				<th scope="col">Song</th>
				<th scope="col">Artist/Singer</th>
				<th scope="col">Music Director/Band</th>
				<th scope="col">Genre</th>
				<th scope="col"></th>
			</thead>
			<tbody>
			<? for($i = 0; $i < count($user_songs); $i++) { ?>
				<tr>
					<th scope="row"><?= $i + 1 ?></th>
					<td><?= $user_songs[$i]['name'] ?></td>
					<td><?= $user_songs[$i]['artist_singer'] ?></td>
					<td><?= $user_songs[$i]['director_band'] ?></td>
					<td><?= $user_songs[$i]['genere'] ?></td>
					<td>
						<form action="<?= base_url();?>index.php?/Homelogged/addToUserList/<?= $user_songs[$i]['song_id']?>" method="post">
						<input type="hidden" name="list_user_id" id="list_user_id" value="<?= $user_songs[$i]['user_id'] ?>" />
						<button type="submit" class="btn btn-primary btn-block">Add</button>
						</form>
					</td>
				<tr>
			<? } ?>
			</tbody>
		</table>
	</div>
</div>