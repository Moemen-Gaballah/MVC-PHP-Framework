<?php $this->start('head'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<?php $this->end();
$this->start('body'); ?>
<div class="col-md-6 offset-md-3 well">
	<form class="form" action="<?=PROOT?>register/login" method="post">
		<div class="bg-danger"><?=$this->displayErrors ?></div>
		<h3 class="text-center">Login</h3>
		<div class="form-group">
			<label for="username" class="form-label">Username</label>
			<input type="text" name="username" class="form-control" id="username">
		</div>

		<div class="form-group">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" class="form-control" id="password">
		</div>

		<div class="form-group">
			<label for="remember_me" class="form-check-input">Remember Me</label>
			<input type="checkbox" value="on" name="remember_me" class="form-label" id="remember_me">
		</div>

		<div class="form-group">
			<input type="submit" value="login" class="btn btn-large btn-primary">
		</div>
		<div class="text-right">
			<a href="<?=PROOT?>register/register" class="text-primary">Register</a>
		</div>
	</form>
</div>	

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<?php $this->end(); ?>