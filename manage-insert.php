<!-- manage-insert.php -->
<?php 
session_start();
include_once 'dbCon.php';
$con = connect();
	if (isset($_POST['regascus'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $role = 2;

        // existing email chaeck
        $checkSQL = "SELECT * FROM `hotel_info` WHERE email = '$email';";
        $checkresult = $con->query($checkSQL);
        if ($checkresult->num_rows > 0) {
        	echo '<script>alert("This Email Already Exist.")</script>';
        	echo '<script>window.location="register.php"</script>';
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

				    //register as customer
				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
				    	$iquery="INSERT INTO `restaurant_info`(`restaurent_name`, `email`, `phone`, `address`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone','$address','$file_name','$password','$role');";
			        	if ($con->query($iquery) === TRUE) {
			        		echo '<script>alert("You are Registered successfully")</script>';
			        		echo '<script>window.location="login.php"</script>';
			        	}else {
			                echo "Error: " . $iquery . "<br>" . $con->error;
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
		        		echo '<script>window.location="register.php"</script>';
				    }
				}else{
					$file_name = "";

					$iquery="INSERT INTO `hotel_info`(`hotel_name`, `email`, `phone`, `address`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone','$address','$file_name','$password','$role');";
		        	if ($con->query($iquery) === TRUE) {
		        		echo '<script>alert("New faculty added successfully")</script>';
		        		echo '<script>window.location="register.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $con->error;
		            }
				}
        }
    }

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
        	echo '<script>window.location="register.php"</script>';
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
				    	$iquery="INSERT INTO `hotel_info`(`restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `role`) 
			        		VALUES ('$fullname','$email','$phone', '$address','$area','$file_name','$password','$role');";
			        	if ($con->query($iquery) === TRUE) {


			        			echo '<script>alert("Shop added successfully")</script>';
			        				echo '<script>window.location="login.php"</script>';

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

					$iquery="INSERT INTO `restaurant_info`( `restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `role`) 
		        		VALUES ('$fullname','$email','$phone', '$address','$area', '$file_name','$password','$role');";
		        	if ($con->query($iquery) === TRUE) {
		        		echo '<script>alert("New faculty added successfully")</script>';
		        		echo '<script>window.location="login.php"</script>';
		        	}else {
		                echo "Error: " . $iquery . "<br>" . $con->error;
		            }
				}
        }
    }



    
    if (isset($_POST['book'])) {

    	$bdinsert = false;
    	$u_id = $_SESSION['id'];
    	$res_id = $_POST['res_id'];
  		$reservation_name = $_POST['reservation_name'];
		$reservation_phone = $_POST['reservation_phone'];
		$reservation_date = $_POST['reservation_date'];
		$reservation_time = $_POST['reservation_time'];
		$reservation_date2 = $_POST['reservation_date2'];
		$reservation_time2= $_POST['reservation_time2'];
		$total_price = $_POST['total_price'];
		//$transactionid = $_POST['transaction_id'];

		date_default_timezone_set("Asia/Dhaka");
         $make_time =date("h:i:sa");
         $make_date =date("Y-m-d");
		$booking_id= uniqid();

		$iquery="INSERT INTO `booking_details`(`booking_id`,`hotel_id`,`c_id`,`make_date`, `make_time`, `name`, `phone`, `booking_date`, `booking_time`,`booking_date2`, `booking_time2`, `bill`) 
		    VALUES ('$booking_id','$res_id','$u_id','$make_date','$make_time','$reservation_name','$reservation_phone','$reservation_date','$reservation_time','$reservation_date2','$reservation_time2','$total_price');";
		if ($con->query($iquery) === TRUE) {
			$bdinsert = true;
		}else {
            echo "Error: " . $iquery . "<br>" . $con->error;
        }

       
   

        $iinsert = false;
        if ($bdinsert == true) {
        	for($i = 0; $i < count($_POST["item"]); $i++){
                $i_id = $_POST['item'][$i];
                $qty = $_POST['qty'][$i];
                $itmQuery = "INSERT INTO `booking_room`(`booking_id`, `room_id`, `qty`) 
                		VALUES ('$booking_id','$i_id','$qty');";
                if ($con->query($itmQuery) === TRUE) {
					$iinsert = true;
				}else {
		            echo "Error: " . $itmQuery . "<br>" . $con->error;
		        }
            }
        }

       if ($bdinsert == true && $iinsert == true) {
    		echo '<script>alert("Your booking is done. You will get an email soon.")</script>';
    		echo '<script>window.location="index.php"</script>';
    	}else {
    		echo "Error: " . $iquery . "<br>" . $con->error;
    	
        } 
    }		
?>