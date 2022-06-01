<p>
    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
</p>

<form action="add.php" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="qty">Quantity</label>
        <input type="number" class="form-control" name="qty">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price">
    </div>

    <div class="form-group">
        <input type="submit" value="Add" class="form-control" >
    </div>
</form>