<?php 
	$connection = mysqli_connect("localhost","root","","blog_management_system");	


	if(isset($_REQUEST['upload'])){
		$count = 0;
		$folder = "Images";
		if(!is_dir($folder)){
			if(!mkdir($folder)){
				$message = "Folder Not Created";
				header("location:multi_form.php?msg=$message&color=red");
				die;
			}
		}

		foreach ($_FILES['multiple_file']['name'] as $key => $value) {
			$originalname  = $_FILES['multiple_file']['name'][$key];		
			$filename  	   = rand()."_".$_FILES['multiple_file']['name'][$key];		
			$temp_name 	   = $_FILES['multiple_file']['tmp_name'][$key];		
			$file_path     = $folder."/".$filename;


			if(move_uploaded_file($temp_name, $file_path)){
				
				$query = "INSERT INTO my_files (file_name,file_path) VALUES ('".$originalname."','".$file_path."')";
				$return = mysqli_query($connection,$query);
				if($return){
					$count++;
				}
			}
		}		

		if($count > 0){
			$message = $count." Files Uploaded";
			header("location:multi_form.php?msg=$message&color=green");
			die;
		}else{
			$message = "Files Not Uploaded";
			header("location:multi_form.php?msg=$message&color=red");
			die;
		}
		// echo $count." Files uploaded";
	}	





















?>