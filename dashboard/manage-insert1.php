<!-- manage-insert.php -->
<?php 
session_start();
include_once 'dbCon.php';
$con = connect();	
	//register as restaurant
	if (isset($_POST['regasres'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // $bkashnumber = $_POST['bkashnumber'];
        $address = $_POST['address'];
        $area = $_POST['area'];
        $password = $_POST['password'];
        $role = 1;
        

        $checkSQL = "SELECT * FROM `hotel_info` WHERE email = '$email';";
        $checkresult = $con->query($checkSQL);
        if ($checkresult->num_rows > 0) {
        	echo '<script>alert("Shop With This Email Already Exist.")</script>';
        	echo '<script>window.location="reg.php"</script>';
        }else{

	        	if (isset($_FILES['image'])) {
				 // files handle
				    $targetDirectory = "dashboard/user-image/";
				    // get the file name
				    $file_name = $_FILES['image']['name'];
				    // get the mime type
				    $file_mime_type = $_FILES['image']['type'];
				    // get the file size
				    $file_size = $_FILES['image']['size'];
				    // get the file in temporary
				    $file_tmp = $_FILES['image']['tmp_name'];
				    // get the file extension, pathinfo($variable_name,FLAG)
				    $extension = pathinfo($file_name,PATHINFO_EXTENSION);

				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
				    	$iquery="INSERT INTO `hotel_info`(`hotel_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone', '$address','$area','$file_name','$password','$role');";
			        	if ($con->query($iquery) === TRUE) {


			        			echo '<script>alert("Shop added successfully")</script>';
			        				echo '<script>window.location="index.php"</script>';

			        		// $id = $con->insert_id;



			    //     		include 'dashboard/mailSender.php'; 
							// $mail->Body = '<html><body>
					  //                Verify your account.. click the link below.
					  //                http://localhost/tablereservation/verifyaccount.php?email='.$email.'&id='.$id.'&auth='.$password.'
					  //               </body></html>'; 
					  //           $mail->addAddress($email, "Booking Approve");
					  //           if($mail->send()) {
					  //           	 echo '<script>alert("Restaurant added successfully")</script>';
			    //     				echo '<script>window.location="verifyaccount.php?view=verifyaccount&email='.$email.'&id='.$id.'&auth='.$password.'"</script>';
					  //         //   	echo '<script>alert("Restaurant added successfully")</script>';
			    //     				// echo '<script>window.location="login.php"</script>';
					  //           }else{
					  //             	echo '<script>alert("Restaurant added successfully")</script>';
			    //     				echo '<script>window.location="login.php"</script>';
					  //           } 




			        	
			        	}else {
			                echo "Error: " . $iquery . "<br>" . $con->error;
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
		        		echo '<script>window.location="register.php"</script>';
				    }
				}else{
					$file_name = "";

					$iquery="INSERT INTO `hotel_info`( `hotel_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `role`) 
		        		VALUES ('$fullname','$email','$phone', '$address','$area', '$file_name','$password','$role');";
		        	if ($con->query($iquery) === TRUE) {
		        		echo '<script>alert("New shop added successfully")</script>';
		        		echo '<script>window.location="login.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $con->error;
		            }
				}
        }
    }
?>