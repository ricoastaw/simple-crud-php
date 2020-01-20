<?php
    include ('koneksi.php');

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

        if(@count($record) == 1){
            $n = mysqli_fetch_array($record);
            $name = $n['name'];
            $address = $n['address'];

        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="style.css">
    <title>SIMPLE CRUD!</title>
</head>
<body>


<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
                unset($_SESSION['message']);
                
			?>
		</div>
	<?php endif ?>

    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
    <h2 class="head2">SIMPLE CRUD</h2>
<table>
	<thead>
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			<th colspan="2" style="text-align: center;">Tindakan</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="koneksi.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form method="post" action="koneksi.php" >
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
		<div class="input-group">
			<label>Nama</label>
			<input type="text" name="name" value="<?php echo $name; ?>" required >
		</div>
		<div class="input-group">
			<label>Alamat</label>
			<input type="text" name="address" value="<?php echo $address; ?>" required>
		</div>
		<div class="input-group">
            <? if ($update==true): ?>
                <button class="btn" type="submit" name="update" style="background-color: green;">Update</button>
            <? if ($update==true): ?>
                <button class="btn" type="submit" name="save" >Save</button>
            <? endif ?>
        </div>

	</form>
</body>
</html>