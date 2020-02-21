<script src="<?= assetUrl(); ?>assets/js/main.js" type="text/javascript" ></script> 
<div class="card col-md-6 offset-md-3">
<article class="card-body">
	<h4 class="card-title text-center mb-4 mt-1">Password Recovery</h4>
	<hr>
	<?php if($nodata){ ?>
		<p class="text-danger"> The entered data is not valid. Try Again! </p>
	<? } ?>
	<form method="post" action="<?php echo base_url()?>index.php?/Passrecovery/validateEntry">
	<div class="form-group" style="padding-top:10px;">
		<label class="col-md-2" for="prfirstname">First Name </label>
		<div class="input-group col-md-8">
			<input name="prfirstname" id="prfirstname" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
			<span id="fnamecheck"></span>
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group" style="padding-top:10px;">
		<label class="col-md-2" for="prlastname">Last Name </label>
		<div class="input-group col-md-8">
			<input name="prlastname" id="prlastname" class="form-control" placeholder="" type="text" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group" style="padding-top:10px;">
		<label class="col-md-2" for="premail">E-mail </label>
		<div class="input-group col-md-8">
			<input name="premail" id="premail" class="form-control" placeholder="abc@domain.com" type="email" required="required" title="Can't be blank">
		</div> <!-- input-group.// -->
	</div> <!-- form-group// -->
	<div class="form-group col-md-4 offset-md-4" style="padding-top:20px;">
	<button type="submit" class="btn btn-primary btn-block">Next</button>
	</div> <!-- form-group// --> 
	<br>  	
	</form>
</article>
</div> <!-- card.// -->

	</aside> <!-- col.// -->
</div> <!-- row.// -->

</div> 
<!--container end.//-->

