<nav class ="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
	<span class="navbar-toggler-icon"></span>
	</button>
  <div class="collapse navbar-collapse" id="navbarmain" >
	<ul class=" navbar-nav ml-auto">
		<? if($loggedin) { ?>
		<li class="nav-item" style="padding-bottom:5px;"><a class="pr-5 h4 text-dark" href="<?php echo base_url(); ?>index.php?/Homelogged">Home</a></li>
		<? } else { ?>
		<li class="nav-item" style="padding-bottom:5px;"><a class="pr-5 h4 text-dark" href="<?php echo base_url(); ?>index.php?/Home">Home</a></li>
		<? } ?>
		<li class="nav-item"style="padding-bottom:5px;"><a class="pr-5 h4 text-dark" href="<?php echo base_url(); ?>index.php?/Profile">Profile</a></li>
		<? if($loggedin) { ?>
		<li class="nav-item" style="padding-bottom:5px;"><a class="pr-5 h4 text-dark" href="<?php echo base_url(); ?>index.php?/Login/logout">Logout</a></li>
		<? } else { ?>
		<li class="nav-item"style="padding-bottom:5px;"><a class="pr-5 h4 text-dark" href="<?php echo base_url(); ?>index.php?/Login">Login</a></li>
		<? } ?>
		<li class="nav-item" style="padding-bottom:5px;"><a class="pr-5 h4 text-dark" href="<?php echo base_url(); ?>index.php?/Register">Register</a></li>
	</ul>
  </div>
 </nav>
  <div style="margin-bottom:40px;">
  </div>
