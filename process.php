<?php
if(isset($_POST['btnAdd'])){
	$error = 0;
	require_once "config.php";
	$msg ="";
	$sql = "SELECT * FROM tblaccount WHERE username = ?";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "s", $_POST['addUser']);
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
		}
		else{
			echo "Error on select statement";
		}
		if($error == 0 && mysqli_num_rows($result) != 1){
     		$sql = "INSERT INTO tblaccount VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt, "ssssss", $user, $pass, $type, $status, $date, $time);
				date_default_timezone_set("HongKong");
				$user = $_POST['addUser'];
				$pass = $_POST['addPass'];
				$type = $_POST['cbType'];
				$status = "Active"; 
				$date = date("Y-m-d");
				$time = date("h:iA");
				if(mysqli_stmt_execute($stmt)){
					header('Location: account.php');
				}
				else{
					echo "Error on insert statement. Please try again later.";
				}
			}
		}
		else{
			$msg = "Username already Exist!";
		}
	}
}

if(isset($_POST['btnEdit'])){
  $error=0;
  require_once "config.php";
  $edit = trim($_POST["txtcode"]);
	if($error == 0){
		$sql = "UPDATE tblaccount SET password = ?, type = ? WHERE username = ?";
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "sss", $_POST['editPass'], $_POST['editcbType'], $edit);
				if(mysqli_stmt_execute($stmt)){
					header("Location: account.php");

					exit();
				}
				else{
					echo "Error on update statement";
				}
		}
	}
}
if(isset($_POST['btnDelete'])){
	require_once "config.php";
	$delete = trim($_POST["txt"]);
	$sql = "DELETE FROM tblaccount WHERE username = ?";
	if($stmt = mysqli_prepare($link, $sql)){
	  mysqli_stmt_bind_param($stmt,"s", $delete );
	  if(mysqli_stmt_execute($stmt)){
		$_SERVER['PHP_SELF'];
		exit();
	  }
	  else {
		echo "Error on delete statement. Please Try Again.";
	  }		
	}
  }
?>