<ul class="nav nav-tabs">
	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	<li class="nav-item "><a href="login.php" class="nav-link active">Login</a></li>	
	<li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
</ul>
<br/>

<form action="login.php" method="post">
	<div class="mb-3">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="mb-3">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password">
	</div>

	<div class="mb-3">
		<input type="submit" value="Submit" class="form-control btn btn-primary">
	</div>
</form>

<?php if ($status == "error") : ?>
<div class="alert alert-danger" role="alert">
    <?php echo $message; ?>
</div>
<?php endif; ?>