
<div class="card col-md-6 offset-md-3">
<article class="card-body">
	<h4 class="card-title text-center mb-4 mt-1">Log in</h4>
	<hr>
	<h4 class="text-danger text-center col-md-12"><? echo $msg ?></h4>
	<form method="post" action="<?php echo base_url()?>index.php/Login/loginuser">
	<div class="form-group col-md-12" style="padding-top: 10px;">
	<label class="col-md-12 " for="useremail">E-mail: </label>
	<div class="input-group col-md-12 " >
		<input name="useremail" id="useremail" class="form-control" placeholder="abc@domain.com" type="email">
	</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group col-md-12" style="padding-top: 10px;">
	<label class="col-md-12 " for="password">Password: </label>
	<div class="input-group col-md-12">
	    <input name="password" id="password" class="form-control" placeholder="********" type="password">
	</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group col-md-4 offset-md-4 "  style="padding-top: 20px;">
	<button type="submit" class="btn btn-primary btn-block"> Login  </button>
	</div> <!-- form-group// -->
	<div class="text-center col-md-6 offset-md-3 " style="padding-top: 30px;">
        <a href="<?php echo base_url(); ?>index.php?/Passrecovery">Forgot password?</a>
    </div> 
	<br>
	<div class="text-center col-md-6 offset-md-3 " style="padding-top: 10px;">
         Not Register? then <a href="<?php echo base_url(); ?>index.php?/Register">Register</a>
        </div>   	
	</form>
</article>
</div> <!-- card.// -->

	</aside> <!-- col.// -->

<!--container end.//-->