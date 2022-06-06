<ul class="nav nav-tabs">
	<li class="nav-item"><a href="index.php" class="nav-link" >Home</a></li>
	<li class="nav-item "><a href="view.php" class="nav-link active">View</a></li>	
	<li class="nav-item"><a href="add.php" class="nav-link" >Add</a></li>
	<li class="nav-item"><a href="logout.php" class="nav-link" >Logout</a></li>
</ul>
<br/>

<table class="table table-striped table-bordered table-hover align-middle">
	<thead class="table-dark">
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price (euro)</th>
			<th>Update</th>
		</tr>
	</thead>
	<tbdody>
		<?php foreach ($productos as $producto) : ?>
			<tr>
				<td><?php echo $producto['name'] ?></td>
				<td><?php echo $producto['qty'] ?></td>
				<td><?php echo $producto['price'] ?></td>
				<td><a href="edit.php?id=<?php echo $producto['id'] ?>" class="btn btn-primary">Edit</a> <a href="delete.php?id=<?php echo $producto['id'] ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-primary" >Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</tbdody>
</table>