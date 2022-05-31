
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	

	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
	<br/><br/>

	<table width='80%' border=0 class="table">
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price (euro)</td>
			<td>Update</td>
		</tr>
		<?php foreach($products as $product): ?>
        <tr>
			<td><?php echo $product['name']; ?></td>
            <td><?php echo $product['qty']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><a href="edit.php?id=<?php echo $product ['id'];?>">Edit</a> |
            <a href="delete.php?id=<?php echo $product ['id'];?>"
            onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>"
        </tr>
		<?php endforeach: ?>
	</table>	
</body>
</html>
