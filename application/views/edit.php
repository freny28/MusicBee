<div class="col-md-10 offset-md-1">
	<div class="row">
	<h2 class="text-center col-md-12">Edit Profile</h2>
	</div>
	<div class="row">
	<dl class="col-md-7 mb-50">
		<form method="post" action="<?php echo base_url()?>index.php/Edit/updateGeneral">
		<div class="row"><legend class="text-center h4 text-info" style="padding-top:20px; padding-bottom:20px;"> Update Profile  </legend></div>
			<div class="row">
			<dt class="col-md-3"><label for="efirstname">First Name </label></dt>
			<dd class="col-md-6"><input name="efirstname" id="efirstname" maxlength="255" class="form-control" placeholder="" type="text" required="required" title="Can't be blank" value = "<?= $userdata[0]['firstname'] ?>" ></dd>
			</div>
			<div class="row">
			<dt class="col-md-3"><label for="elastname">Last Name </label></dt>
			<dd class="col-md-6"><input name="elastname" id="elastname" maxlength="255" class="form-control " placeholder="" type="text" required="required" title="Can't be blank" value ="<?=  $userdata[0]['lastname'] ?> " ></dd>
			</div>
			<div class="row">
			<dt class="col-md-3"><label for="ebirthdate">Birthdate</label></dt>
			
			<dd class="col-md-6"> <input type="text" pattern="^\d{4}(\-)(((0)[0-9])|((1)[0-2]))(\-)([0-2][0-9]|(3)[0-1])$" name="ebirthdate" id="ebirthdate" class="form-control" value="<? echo $userdata[0]['birthdate']; ?>" title="(YYYY/MM/DD)"/></dd>
			</div>
			<div class="row">
			<dt class="col-md-3">Gender:</dt>
			
			<dd class="col-md-6">
				<input type="radio" id="male" name="gender" value="male"
				 <? if($userdata[0]['gender_id'] == 1){ ?> checked <? } ?> >
				<label for="male">Male</label>
			
				<input type="radio" id="female" name="gender" value="female" <? if($userdata[0]['gender_id'] == 2){ ?> checked <? } ?> >
				<label for="female">Female</label>
				
				<input type="radio" id="other" name="gender" value="other" <? if($userdata[0]['gender_id'] == 3){ ?> checked <? } ?> >
				<label for="other">Other</label>
			</dd>
			</div>
			<div class="row">
			<dt class="col-md-3"><label for="private">Private </label>
			<? if($userdata[0]['user_type_id'] == 1){ ?>
			<dd class="col-md-2"><input name="private" id="private" class="form-control " placeholder="" type="checkbox" data-toggle="toggle" checked></dd>
			<? } else { ?>
			<dd class="col-md-2"><input name="private" id="private" class="form-control " placeholder="" type="checkbox" data-toggle="toggle" ></dd>
			<? } ?>
			</div>
			<div class="row" style="padding-top:10px;">
			<dt class="col-md-12">Favorite Artists</dt>
			<dd class="col-md-12"><textarea name= "fav_art" rows="5" cols="45" maxlength="255"><?=  $userdata[0]['favorite_artists'] ?></textarea></dd>
			</div>
			<div class="row">
			<dt class="col-md-12">Favorite Bands</dt>
			<dd class="col-md-12"><textarea name = "fav_band" rows="5" cols="45" maxlength="255"><?=  $userdata[0]['favorite_bands'] ?></textarea></dd>
			</div>
			<div class="row">
			<dt class="col-md-12">About Me</dt>
			<dd class="col-md-12"><textarea name = "aboutme" rows="5" cols="45" maxlength="255"><?= $userdata[0]['about_me'] ?> </textarea></dd>
			</div>
			<div class="row">
			<div class="col-md-12">
				<dt class="col-md-5 offset-md-2">
					<button type="submit" class="btn btn-primary btn-block"> Save Profile </button>
				</dt>
			</div>
			</div>
		</form>
	</dl>
	<dl class="col-md-5 mb-50">
	<form method="post" action="<?php echo base_url()?>index.php/Edit/updateSecurity">
	<div class="row"><legend class="text-center h4 text-info" style="padding-top:20px; padding-bottom:20px;"> Update Security Info  </legend></div>
		<? if($showit){ if(!$securityStatus){ ?><p class="col-md-12 text-danger">Cannot update !! Enter valid password</p>   <? } } ?>
			<div class="row">
			<dt class="col-md-12">Security Question:</dt>
			<dd class="col-md-12"><input name="securityQue" id="securityQue" class="form-control offset-md-1" placeholder="" type="text" required="required" title="Can't be blank"value= "<?=$userdata[0]['security_question']?>"></dd>
			</div>
			<div class="row">
			<dt class="col-md-12">Security Answer:</dt>
			<dd class="col-md-12"><input name="securityAns" id="securityAns" class="form-control offset-md-1" placeholder="" type="text" required="required" title="Can't be blank" value= "<?=$userdata[0]['security_answer']?>"></dd>
			</div>
			<div class="row">
			<dt class="col-md-12"><label for="currentSPass"> Current Password </label>
			
			<dd class="col-md-12"><input name="currentSPass" id="currentSPass" class="form-control offset-md-1" placeholder="********" type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}" title="Password should contains 8 or more characters with at least 1 Uppercase and Lowercase Alphabets and atleast 1 Alphanumeric value "></dd>
			</div>
			<div class="row">
				<div class="col-md-12">
						<dt class="col-md-8 offset-md-2">
							<button type="submit" class="btn btn-primary btn-block"> Update Security Question </button>
						</dt>
				</div>
			</div>
	</form>
	<form method="post" action="<?php echo base_url()?>index.php/Edit/updatePassword" > 
		<div class="row"><legend class="text-center  h4 text-info" style="padding-top:50px; padding-bottom:20px;"> Update Password  </legend></div>
		<? if($show_passStat){ if(!$passStatus){ ?><p class="col-md-12 text-danger">Cannot update !! Enter valid password</p>   <? } } ?>
		<div class="row">
			<dt class="col-md-12"><label for="currentPass"> Current Password </label>
			
			<dd class="col-md-12"><input name="currentPass" id="currentPass" class="form-control offset-md-1" placeholder="********" type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}" title="Password should contains 8 or more characters with at least 1 Uppercase and Lowercase Alphabets and atleast 1 Alphanumeric value "></dd>
		</div>
		<div class="row">		
			<dt class="col-md-12"><label for="currentPass"> New Password </label>
			
			<dd class="col-md-12"><input name="updatePass" id="updatePass" class="form-control offset-md-1" placeholder="********" type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}" title="Password should contains 8 or more characters with at least 1 Uppercase and Lowercase Alphabets and atleast 1 Alphanumeric value "></dd>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dt class="col-md-8 offset-md-2">
					<button type="submit" class="btn btn-primary btn-block"> Change Password </button>
				</dt>
			</div>
		</div>
		</form>
	
	</div>
	</dl>
</div>
</div>