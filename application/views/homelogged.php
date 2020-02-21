<div class="col-md-12 m-30 responsive">
	<div class="row">
	<h3 class="text-center text-lg-left mt-4 mb-0">MusicBee's Assembly</h3>
	</div>
  <hr class="mt-2 mb-5">
  <div class="col-md-10 offset-md-1 row">
	<? for($i = 0; $i < sizeof($public_users); $i++){ ?>
    
    <div class="col-md-5 col-sm-12 offset-md-1 row" > 
		<div class="col-md-12" style="height:200px; margin-top:30px; margin-bottom:20px; overflow-y: scroll; overflow-x: hidden; row">
			<h3 class="col-md-12 offset-md-2 font-weight-bold"><?= $public_users[$i]['firstname'] ?>  <?= $public_users[$i]['lastname'] ?></h3>
			<? if($public_users[$i]['birthdate'] != null){ ?>
			<h4 class="col-md-12 offset-md-2"><small><?=  $public_users[$i]['birthdate'] ?></small></h4>
			<? } else { ?>
			<h4 class="col-md-12 offset-md-2 text-danger "><small>Not Specified</small></h4>
			<? } ?>
			<? if($public_users[$i]['favorite_artists'] != null){ ?>
			<h4 class="col-md-11"><small><?=  $public_users[$i]['favorite_artists'] ?></small></h4>
			<? } else { ?>
			<h4 class="col-md-12 offset-md-2 text-danger"><small>Not Specified</small><h4>
			<? } ?>
			<? if($public_users[$i]['favorite_bands'] != null){ ?>
			<h4 class="col-md-11"><small><?=  $public_users[$i]['favorite_bands'] ?></small></h4>
			<? } else { ?>
			<h4 class="col-md-12 offset-md-2 text-danger"><small>Not Specified</small></h4>
			<? } ?>
		</div>
	<form method="post" action="<?php echo base_url()?>index.php?/Homelogged/viewUserSongs" class="col-md-12" >
		<input type="hidden" name="user_id" id="user_id" value="<?= $public_users[$i]['user_id'] ?>" />
		<button class="btn btn-primary offset-md-3" style="margin-bottom:30px;" type="submit" >View Song List</button>
	</form>
	</div>
	<? } ?>
	</div>
	
</div>
</div>