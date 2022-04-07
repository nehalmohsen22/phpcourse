<?php 

$customErr = [
    "fname" => "Enter First Name!",
    "lname" => "Enter Last Name!",
    "gender" => "Enter Gender!",
    "email" => "Enter Email !",
    "uname" => "Enter User Name !",
    "pass" => "Enter password!",
    "phone" => "Enter Phone Number!",
    "image" => "Select an image!"


];

$fields=array("fname", "lname", "gender", "email", "uname", "pass", "phone","image");
$data=array();
$errors=array();

foreach($fields as $field ){
    if(isset($_POST[$field])){
        $data[$field] = $_POST[$field];
        if($data[$field] == ""){
            $errors[$field] = $customErr[$field];
        }
    }
}
$filename= $_FILES['image']['name'];
$tmp_name= $_FILES['image']['tmp_name'];
if($filename){
    move_uploaded_file($tmp_name, "images/".$filename);
    $imagepath = "images/".$filename;
}


if(count($errors) > 0){
    var_dump($data);

    $data = json_encode($data);
    $errors = json_encode($errors);
    header("Location:formvalidate.php?errors={$errors}&data={$data}");
}

try {
    
   if(!empty($data)){
       require "dbconnect.php";
       $user = adduser($data, $imagepath);
       if(!$user){
        header("Location:formvalidate.php");
        exit();

           
       }


   }
    $usersFile = fopen("users.txt", "a");
    $data = isset($imagepath)? implode(':', $data).":".$imagepath : implode(':', $data);
    fwrite($usersFile, $data.PHP_EOL);
    fclose($usersFile);
    
    header("Location:showusers.php");

} catch (Exception $th) {
    var_dump($th);
}


?>