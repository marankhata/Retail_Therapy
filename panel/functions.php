<?php 

function result($message,$type){

    if($type==1){
        $toPrint= "<label class='text-success'> Result: $message</label>";
    }else{
        $toPrint= "<label class='text-danger'>Result: $message</label>";
    }

    echo '<div class="card">
   
    <div class="card-body">
        <form action="categorybrandmanager.php">
            <div class="input-group ">
                '.$toPrint.'
            </div>
        </form>
    </div>
    
</div>';
    
}

function uploader($filename){

    if((isset($_FILES[$filename]) && $_FILES[$filename]['size'] > 0))
    {
    
        $target_dir = "uploads/";
        $fotoname=basename($_FILES[$filename]["name"]);
        $target_file = $target_dir . basename($_FILES[$filename]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
           // echobad("Başarsız: Üzgünüz, fotografiniz dosya zaten var..");
            echo "exist";
            $uploadOk = 0;
        }
        if ($_FILES[$filename]["size"] > 5000000) {
            echo "bigfile";
           // echobad("Başarsız: Üzgünüz, fotografiniz dosyanız çok büyük..");
            $uploadOk = 0;
        }
        if($imageFileType != "JPEG" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "jpg" 
         && $imageFileType != "avi" && $imageFileType != "mp4" && $imageFileType != "pdf"
         && $imageFileType != "png" && $imageFileType != "PNG" 
         && $imageFileType != "BMP" && $imageFileType != "bmp") {
            echo "jpgonly";
              $uploadOk = 0;
        }
        
        if ($uploadOk== 0) {
          //  echobad("Sonuç: Maalesef, fotografiniz dosyanız yüklenmedi..");
           echo "not uploaded" ;
        } 
    
        
        if($uploadOk != 0 ) {
            if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) 
            {
               return $target_file;
            }
            
        }
    
        ////////////////////////////////////////////////////////////
    }
    
    /////////////////////////////////////////////
    }


if(isset($_POST['ADD_PRODUCT']))
{
    include('../db/db.php');
    $BRAND_ID=$_POST['BRAND_ID'];
    $CATEGORY_ID=$_POST['CATEGORY_ID'];
    $LOCATION=$_POST['LOCATION'];
    $AGE_RANGE=$_POST['AGE_RANGE'];
    $NAME=$_POST['NAME'];
    $PRICE=$_POST['PRICE'];
    $DISCOUNT=$_POST['DISCOUNT'];
    $DESCRIPTION=$_POST['DESCRIPTION'];
    $QUANTITY=$_POST['QUANTITY'];
    $SIZES_AVAILABLE=$_POST['SIZES_AVAILABLE'];
    
    $PHOTO=uploader('PHOTO');
    $ENTRY_DATE=date('Y-m-d H:i:s');;

    $x="INSERT INTO `products` (`PRODUCT_ID`, `BRAND_ID`, `CATEGORY_ID`,
     `LOCATION`, `AGE_RANGE`, `NAME`, `PRICE`, `DESCRIPTION`, 
     `QUANTITY`, `PHOTO`, `ENTRY_DATE`, `SIZES_AVAILABLE`,`DISCOUNT`) 
     VALUES (NULL, '$BRAND_ID', '$CATEGORY_ID', '$LOCATION', 
     '$AGE_RANGE', '$NAME', '$PRICE', '$DESCRIPTION', 
     '$QUANTITY', '$PHOTO','$ENTRY_DATE','$SIZES_AVAILABLE', '$DISCOUNT');";

    $j=mysqli_query($con,$x);
    $status="";
    if ($j== 1) 
    { 
        result("Product uploaded successfully",1);
    }
    else{
        result("Product not uploaded",0);
    }
}

if(isset($_POST['ADD_CATEGORY']))
{
    include('../db/db.php');
    $CATEGORY=$_POST['CATEGORY'];
    $x="INSERT INTO `categories` (`CATEGORY_ID`, `CATEGORY`) VALUES (NULL, '$CATEGORY');";

    $j=mysqli_query($con,$x);
    $status="";
    if ($j== 1) 
    { 
        result("Category added successfully",1);
    }
    else{
        result("Category Not added",0);
    }
}
if(isset($_POST['ADD_LABEL']))
{
    include('../db/db.php');
    $LABEL=$_POST['LABEL'];
    $x="INSERT INTO `label` (`LABEL_ID`, `LABEL`) VALUES (NULL, '$LABEL');";

    $j=mysqli_query($con,$x);
    $status="";
    if ($j== 1) 
    { 
        result("Brand Name added successfully",1);
    }
    else{
        result("Brand Name Not added",0);
    }
}



if(isset($_GET['delete_cart'])){
    include('../db/db.php');
    $CART_ID=$_GET['delete_cart'];
  
    $x="DELETE FROM cart where CART_ID='".$CART_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:orders.php");
    }else{
        result("Deleting error",0);
    }
}

if(isset($_GET['cancel_cart'])){
    include('../db/db.php');
    $CART_ID=$_GET['cancel_cart'];
  
    $x="UPDATE `cart` SET `STATUS` = '2' WHERE `cart`.`CART_ID`='".$CART_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:orders.php");
    }else{
        result("Deleting error",0);
    }
}

if(isset($_GET['approve_cart'])){
    include('../db/db.php');
    $CART_ID=$_GET['approve_cart'];
  
    $x="UPDATE `cart` SET `STATUS` = '1' WHERE `cart`.`CART_ID`='".$CART_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:orders.php");
    }else{
        result("Deleting error",0);
    }
}

if(isset($_GET['deleteproduct'])){
    include('../db/db.php');
    $PRODUCT_ID=$_GET['deleteproduct'];
  
    $x="DELETE FROM products where PRODUCT_ID='".$PRODUCT_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:productsmanager.php");
    }else{
        result("product Not Deleted",0);
    }
}

if(isset($_GET['deletcategory'])){
    include('../db/db.php');
    $CATEGORY_ID=$_GET['deletcategory'];
  
    $x="DELETE FROM categories where CATEGORY_ID='".$CATEGORY_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:categorybrandmanager.php");
    }else{
        result("Brand Name Not Deleted",0);
    }
}
if(isset($_GET['deletlabel'])){
    include('../db/db.php');
    $LABEL_ID=$_GET['deletlabel'];
  
    $x="DELETE FROM label where LABEL_ID='".$LABEL_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1) 
    { 
        header("location:categorybrandmanager.php");
    }else{
        result("Label Name Not Deleted",0);
    }
}

if(isset($_GET['deletuser'])){
    include('../db/db.php');
    $USER_ID=$_GET['deletuser'];
    
    $x="DELETE FROM users where USER_ID='".$USER_ID."'";
    $j=mysqli_query($con,$x);
    if ($j== 1)
    {
       header("location:users.php");
    }else{
      result("Label Name Not Deleted",0);
    }
}

?>
