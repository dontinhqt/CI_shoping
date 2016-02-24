<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
</head>
<body>
	<?php
		$user = $this->db->get("user")->row_array();
		$this->db->insert('user', array('user'=>'Triệu Quyết Tâm')); 
	?>
	<table border="1px">
		<tr>
			<td>STT</td>
			<td>Tên</td>
		</tr>
		<tr>
			<td>1</td>
			<td><?php echo $user['address']; ?></td>
		</tr>
	</table>
</body>
</html>