<?php 
	$connection = mysqli_connect("localhost","root","","blog_management_system");	
?>
<!DOCTYPE html>
<html>
<head>
	<title>FILLING DAY-3</title>
</head>
<body>
	<center>	
	<h1>Filling Day-3 (Upload Multiple File On Server)</h1>
	<hr/>
	<?php 
		if(isset($_REQUEST['msg'])){
			echo "<p style='color:".$_REQUEST['color']."'>".$_REQUEST['msg']."</p>";
		}
	?>
	<fieldset style="width:50%">
		<legend>Upload File</legend>
		<form action="multiple_file_upload_process_database.php" method="POST" enctype="multipart/form-data">
			<table cellpadding="10">
				<tbody>
					<tr>
						<th>Select Multiple Files</th>
						<td>
							<input type="file" name="multiple_file[]" multiple />
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="upload" value="Uplaod" accept="audio/*" />
						</td>
					</tr>

				</tbody>
			</table>
		</form>
	</fieldset>
	</center>
	<hr/>
	<?php 

		$query 	= "SELECT * FROM my_files";
		$result = mysqli_query($connection,$query);
		
		if($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
	?>
			<div style="float:left;padding:10px;border:2px solid blue">
				<img src="<?php echo $row['file_path']; ?>" width="150px" height="100px" />
				<p align="center"><?php echo $row['file_name']; ?></p>
			</div>
	<?php
			}
		}else{
			echo "<h1 style='color:red' align='center'>No Images Found</h1>";
		}

	?>


</body>
</html>