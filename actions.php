<?php

if(isset($_POST['LOGIN']))
{
    include('db/db.php');
    $EMAIL=$_POST['EMAIL'];
    $PASSWORD=$_POST['PASSWORD'];

	$g="select * from users where EMAIL='$EMAIL'";
	$sqli=mysqli_query($con,$g);
	$auserID;
	if (mysqli_num_rows($sqli)== 1 ) 
	{ 
		while ($row=mysqli_fetch_array($sqli)) 
		{
            if(password_verify($PASSWORD, $row['PASSWORD']))
            {
                    session_start();
                    $auserID=$row['USER_ID'];

                  
                           
                            $_SESSION['USER_ID'] = $auserID;
                            $_SESSION['NAME'] = $row['FIRST_NAME']." ".$row['LAST_NAME'];
                            if($auserID=="1"){
                                $status="admin";
                                echo "ADMIN";
                            }else{
                                echo "LOGIN_SUCCESS";
                            }
                           
                       
			}else{
					echo "Wrong Password,  Please try again";
			}
					
		}
       	
		
	}
	else
	{
		echo "Wrong email, please try again";
	}
}


if(isset($_POST['REGISTER']))
{

    include('db/db.php');
    
	$FIRST_NAME=$_POST['FIRST_NAME'];
	$LAST_NAME=$_POST['LAST_NAME'];
	$BIRTHDAY=$_POST['BIRTHDAY'];
    $CITY=$_POST['CITY'];
    $GENDER=$_POST['GENDER'];
    $PHONE_NUMBER=$_POST['PHONE_NUMBER'];
    $EMAIL=strtolower($_POST['EMAIL']);
    

    
    $SIFRE = password_hash($_POST['PASSWORD'], PASSWORD_DEFAULT);
    $REGISTRATION_DATE=date('Y-m-d H:i:s');

    $querry= mysqli_query($con,"select * from users where EMAIL='$EMAIL' ");
	if (mysqli_num_rows($querry)> 0) 
	{ 
	    echo "This email was used before";
	}
	else{
        $x="INSERT INTO `users` (`USER_ID`,
        `FIRST_NAME`, `LAST_NAME`, `BIRTHDAY`,
        `CITY`, `CATEGORY`, `EMAIL`, `PHONE_NUMBER`,
        `PASSWORD`, `REGISTRATION_DATE`, `GENDER`) 
        VALUES (NULL, '$FIRST_NAME', '$LAST_NAME', 
        '$BIRTHDAY', '$CITY', '1', 
        '$EMAIL', '$PHONE_NUMBER',
         '$SIFRE', '$REGISTRATION_DATE', '$GENDER');";

        $j=mysqli_query($con,$x);
        $status="";
        if ($j== 1) 
        { 
            echo "ok";
        }
        else{
            echo "error";
        }
    }
    			
}



if(isset($_POST['ADD_TO_CART']))
{

    include('db/db.php');

    session_start();
    $PRODUCT_ID=$_POST['PRODUCT_ID_TOP'];
    $SIZE=$_POST['SIZE'];
    $QUANTITY=$_POST['QUANTITY'];
    $USER_ID=$_SESSION['USER_ID'];
    $DATE=date('Y-m-d H:i:s');
    if($USER_ID!=0){
        
        $x="INSERT INTO `cart` (`CART_ID`, `USER_ID`, `PRODUCT_ID`, `DATE`, `SIZE`,`QUANTITY_BOUGHT`) VALUES (NULL, '$USER_ID', '$PRODUCT_ID', '$DATE','$SIZE','$QUANTITY');";
        $j=mysqli_query($con,$x);
        if ($j== 1) 
        { 
            header("location:product.php?purchase=1&product_id=$PRODUCT_ID");
        }
        else{
            echo "error";
        } 	
    }else{
        header("location:product.php?purchase=0&product_id=$PRODUCT_ID");
    }
    		
}

if(isset($_POST['PURCHASE'])){
    include('db/db.php');
    session_start();
    $USER_ID=$_SESSION['USER_ID'];
    $PAYMENT_METHOD=$_POST['PAYMENT_METHOD'];
    $ADDRESS=$_POST['ADDRESS'];
    $PHONE_NO=$_POST['PHONE_NO'];
    $ACC_NAME=$_POST['ACC_NAME'];
    $PAYMENT_CODE=rand(100,10000);

    $x="UPDATE `cart` SET `BOUGHTORNOT` = '1',`PAYMENT_CODE`='$PAYMENT_CODE'  WHERE `cart`.`USER_ID` = '".$USER_ID."'; ";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        $x="INSERT INTO `cart_payment` (`PAYMENT_CODE`, `USER_ID`, `PAYMENT_METHOD`, `ADDRESS`, `PHONE_NO`, `ACC_NAME`) VALUES ('$PAYMENT_CODE', '$USER_ID', '$PAYMENT_METHOD', '$ADDRESS', '$PHONE_NO', '$ACC_NAME');";
        $j=mysqli_query($con,$x);
        if ($j== 1) 
        { 
            header("location:cart.php");
        }else{
           echo "Operation Failed2";
        }
    }else{
       echo "Operation Failed1";
    }



}


if(isset($_POST['CANCEL'])){
    include('db/db.php');
    session_start();

    $USER_ID=$_SESSION['USER_ID'];

    $x="DELETE FROM `cart` WHERE `cart`.`USER_ID` = '".$USER_ID."'; ";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:cart.php");
    }else{
       echo "Operation Failed";
    }
}

if(isset($_GET['destroy_session'])){
    session_start(); 
    session_destroy();  
    header("location:index.php");
}

if(isset($_GET['remove_cartitem'])){
    include('db/db.php');
    session_start();
  
    $CART_ID=$_GET['remove_cartitem'];

    $x="DELETE FROM `cart` WHERE `cart`.`CART_ID` = '".$CART_ID."'; ";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:cart.php");
    }else{
       echo "Operation Failed";
    }
}


if(isset($_POST['POST_REVIEW']))
{

    include('db/db.php');

    session_start();
	$PRODUCT_ID=$_POST['PRODUCT_ID'];
    $USER_ID=$_SESSION['USER_ID'];
    $REVIEW=$_POST['REVIEW'];
    $DATE=date('Y-m-d H:i:s');
    if($USER_ID!=0){
        
        $x="INSERT INTO `product_reviews` (`REVIEW_ID`, `USER_ID`, `PRODUCT_ID`, `REVIEW`, `REVIEW_DATE`) VALUES (NULL, '$USER_ID', '$PRODUCT_ID', '$REVIEW', '$DATE');";
        $j=mysqli_query($con,$x);
        if ($j== 1) 
        { 
            header("location:product.php?product_id=$PRODUCT_ID");
        }
        else{
            echo "error";
        } 	
    }else{
        header("location:product.php?product_id=$PRODUCT_ID");
    }
    		
}
?>