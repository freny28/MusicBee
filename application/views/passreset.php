<script src="<?= assetUrl(); ?>assets/js/main.js" type="text/javascript" ></script> 
<div class="card col-md-6 offset-md-3">
<article class="card-body">
	<h4 class="card-title text-center mb-4 mt-1"> Reset Password</h4>
	<hr>
	<?php if($showStats){if($status){ ?>
		<p class="text-success"> Update Successfully! </p>
	<? }else{ ?>
		<p class="text-danger"> Security Answer is Incorrect! Password was not update! </p>
	<? } }else{?>
	<form method="post" action="<?php echo base_url()?>index.php?/Passreset/changePassword">
		<label class="text-muted col-md-12 h4 text-center" for="secureQue">Security Question </label>
		<div class="col-md-12 text-center">
			<p class="text-muted h5"><? echo $result[0]['security_question'] ?> </p>
		</div> <!-- input-group.// -->
	<div class="form-group" style="padding-top:10px;">
		<label class="col-md-3" for="secureAns">Security Answer </label>
		<div class="input-group col-md-7">
			<input name="secureAns" id="secureAns" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
		<div class="form-group" style="padding-top:10px;">
		<label class="col-md-3" for="updatePass">Password </label>
		<div class="input-group col-md-7">
			<input name="updatePass" id="updatePass" class="form-control" placeholder="********" type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}" title="Password should contains 8 or more characters with at least 1 Uppercase and Lowercase Alphabets and atleast 1 Alphanumeric value ">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group col-md-4 offset-md-4" style="padding-top:20px;">
	<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
	</div> <!-- form-group// --> 
	<br> 
<input type="hidden" name="user_id" id="user_id" value=<? echo $result[0]['user_id'] ?>> 	
	</form>
	<? } ?>
</article>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

