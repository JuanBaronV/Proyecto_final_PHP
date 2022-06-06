<ul class="nav nav-tabs">
	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	<li class="nav-item "><a href="" class="nav-link active">Edit</a></li>
	<li class="nav-item "><a href="view.php" class="nav-link">View</a></li>	
	<li class="nav-item"><a href="add.php" class="nav-link">Add</a></li>
	<li class="nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>
</ul>
<br/>

<form action="edit.php" method="post">

	<div class="mb-3">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" value="<?php echo $producto['name'];?>">
	</div>

	<div class="mb-3">
		<label for="qty">Quantity</label>
		<input type="number" class="form-control" name="qty" value="<?php echo $producto['qty'];?>">
	</div>

	<div class="mb-3">
		<label for="price">Price</label>
		<input type="number" class="form-control" name="price" value="<?php echo $producto['price'];?>">
	</div>

	<input type="hidden" name="id" value=<?php echo $producto['id'];?>>
	
	<div class="mb-3">
		<input type="submit" value="Update" class="form-control btn btn-primary">
	</div>
</form>