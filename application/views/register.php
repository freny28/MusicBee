<div class="card col-md-6 offset-md-3">
<article class="card-body">
	<h4 class="card-title text-center mb-4 mt-1">Register</h4>	
	<hr>
	<? if($registered){ ?> <p class="text-success col-md-12 text-center"> Registered Successfully! </p> <? } ?>
	<? if($email_exist){ ?> <p class="text-danger col-md-12 text-center"> E-mail already exists. Use another e-mail</p> <? } ?>
	<form method="post" action="<?php echo base_url()?>index.php/Register/registerUser">
	<div class="form-group">
		<label class="col-md-2" for="rfirstname">First Name </label>
		<div class="input-group col-md-9">
			<input name="rfirstname" id="rfirstname" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group">
		<label class="col-md-2" for="rlastname">Last Name </label>
		<div class="input-group col-md-9">
			<input name="rlastname" id="rlastname" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group">
		<label class="col-md-2" for="remail">E-mail </label>
		<div class="input-group col-md-9">
			<input name="remail" id="remail" required="required" class="form-control" placeholder="Email" type="email">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group">
		<label class="col-md-2" for="rpassword">Password </label>
		<div class="input-group col-md-9">
			<input name="rpassword" id="rpassword" required="required" class="form-control" placeholder="********" type="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}" title="Password should contains 8 or more characters with at least 1 Uppercase and Lowercase Alphabets and atleast 1 Alphanumeric value ">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group">
		<label class="col-md-2" for="private">Private </label>
		<div class="input-group col-md-2">
			<input name="private" id="private" class="form-control" placeholder="" type="checkbox" data-toggle="toggle" checked>
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group">
		<label class="col-md-4" for="securityQue">Security Question</label><br>
		<div class="input-group col-md-9">
			<input name="securityQue" id="securityQue" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group">
		<label class="col-md-4"for="securityAns">Security Answer</label><br>
		<div class="input-group col-md-9">
			<input name="securityAns" id="securityAns" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group col-md-4 offset-md-4" style="padding-top:30px">
	<button type="submit" class="btn btn-primary btn-block">Register</button>
	</div> <!-- form-group// --> 
	<br>  	
	</form>
</article>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

