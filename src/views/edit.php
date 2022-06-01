<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form action="edit.php" method="post">

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" value="<?php echo $product['name'];?>">
		</div>

		<div class="form-group">
			<label for="qty">Quantity</label>
			<input type="number" class="form-control" name="qty" value="<?php echo $product['qty'];?>">
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" value="<?php echo $product['price'];?>">
		</div>


		<input type="hidden" name="id" value=<?php echo 'id';?>>
		
		<div class="form-group">
			<input type="submit" value="Update" class="form-control" >
		</div>
	</form>