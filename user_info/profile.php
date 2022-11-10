<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Page</title>
	<link rel="stylesheet" type="text/css" href="pages.css">
</head>
<body>
     <?php include '../view/header.php'; ?>
     <br>
	
	<br>
	<div class="info-container">
	<h3>User Info</h3>
        <p><?php print_r($info); ?> test</p>
	<table border="1" bgcolor="lightcyan" id="message" class="message">
		<tr>
                        <th>Username</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Nick Name</th>
		</tr>
		<tr>
                    
			<td><?php echo $info->getUser(); ?></td>
			<td><?php echo $info->getFname()." ". $info->getLname(); ?></td>
			<td><?php echo $info->getEmail(); ?></td>
			<td><?php echo $info->getPhone(); ?></td>
                        <td><?php echo $info->getNick(); ?></td>
		</tr>
	</table>
</div>
	<br>

	

  <?php include '../view/footer.php'; ?>


