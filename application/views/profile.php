<div class="col-md-10 offset-md-1">
	<div class="row">
	<h2 class="text-center col-md-12">My Profile</h3>
	</div>
	<div class="row text-md-center ">
		<dl class="col-md-7 mb-50">
			
			<h4 class="row">
				<dt class="col-md-4 offset-md-1">First Name:</dt>
				<dd class="col-md-6"><small><?=  $userdata[0]['firstname'] ?></small></dd>
			</h4>
			
			<h4 class="row">
				<dt class="col-md-4 offset-md-1">Last Name:</dt>
				<dd class="col-md-6"><small><?=  $userdata[0]['lastname'] ?></small></dd>
			</h4>
			<h4 class="row">
				<dt class="col-md-4 offset-md-1">Birth Date:</dt>
				<? if($userdata[0]['birthdate'] != null){ ?>
				<dd class="col-md-6"><small><?=  $userdata[0]['birthdate'] ?></small></dd>
				<? } else { ?>
				<dd class="col-md-6 text-danger">Not Specified</dd>
				<? } ?>
			</h4>
			<h4 class="row">
				<dt class="col-md-4 offset-md-1">Gender:</dt>	
				<dd class="col-md-6"><small>				
				<? if($userdata[0]['gender_id'] == 1){ ?>
				Male
				<? } else if ($userdata[0]['gender_id'] == 2) { ?>
				Female
				<? } else { ?>
				Other
				<? } ?>
				</small></dd>
			</h4>
			<h4 class="row">
				<dt class="col-md-4 offset-md-1">Privacy:</dt>
				<dd class="col-md-6"><small>
				<? if($userdata[0]['user_type_id'] == 1){ ?>
				Private
				<? } else { ?>
				Public
				<? } ?>
				</small></dd>
			</h4>
		</dl>
		<dl class="col-md-5">
			<h4 class="row">
				<dt class="col-md-12">Security Question:</dt>
				<small><dd class="col-md-12"><?=  $userdata[0]['security_question'] ?></small>
			</h4>	
			<h4 class="row">
				<dt class="col-md-12">Security Answer:</dt><dt class="col-md-12">
				<small><dd class="col-md-12"><?=  $userdata[0]['security_answer'] ?></small>
			</h4>
		</dl>
	</div>
	<div class="row text-md-center">
		<dl class="col-md-7">
			<h4 class="row">	
				<dt class="col-md-12">Favorite Artists</dt><dt class="col-md-12">
				<small>
				<? if(!empty($userdata[0]['favorite_artists'])){ ?>
				<dd class="col-md-12"><?=  $userdata[0]['favorite_artists'] ?></dd>
				<? } else { ?>
				<dd class="col-md-6 text-danger">Not Specified !</dd>
				<? } ?>
				</small>
			</h4>
			<h4 class="row">
				<dt class="col-md-12">Favorite Bands</dt><dt class="col-md-12">
				<small>
				<? if(!empty($userdata[0]['favorite_bands'])){ ?>
				<dd class="col-md-12"><?=  $userdata[0]['favorite_bands'] ?></dd>
				<? } else { ?>
				<dd class="col-md-6 text-danger">Not Specified !</dd>
				<? } ?>
				</small>
			</h4>
		</dl>
		<dl class="col-md-5"> 
			<h4 class="row">
				<dt class="col-md-12">About Me<dt><dt class="col-md-12">
				<small>
				<? if(!empty($userdata[0]['about_me'])){ ?>
				<dd class="col-md-12"><?=  $userdata[0]['about_me'] ?></dd>
				<? } else { ?>
				<dd class="col-md-6 text-danger">Not Specified !</dd>
				<? } ?>
				</small>
			</h4>
		</dl>
	</div>
</div>
</div>