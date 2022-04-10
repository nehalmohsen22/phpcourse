<?php 
    $data=-1;
    if(isset($_GET["data"])){
        $data=$_GET["data"];
    }

    $filename = 'users.txt';
    $file = fopen($filename, 'r'); 

    // if ($file) 
    //     $lines = explode("\n", fread($file, filesize($filename)));

    require "dbconnect.php";

    $fields = array();
    if($data !== -1 && $data * -1 <= 0){
        $fields = $object->selectuser($data);
        if($fields) {
          $fields = $fields[0];
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>

<body>
    <?php 

        // if (!empty($lines)) {
        //     foreach ($lines as $key => $line) {
        //         if($data != -1 && $line != "" && $key == $data) {
            if(isset($fields) && isset($fields->id)){ 
                    // $user = explode(":", $line);
                    echo "<p>First Name: ".$fields->fname."</p>";
                    echo "<p>Last Name: ".$fields->lname."</p>";
                    echo "<p>Gender: ".$fields->gender."</p>";
                    echo "<p>Email: ".$fields->email."</p>";
                    echo "<p>UserName: ".$fields->phone."</p>";                   
                    echo "</tr>";
                }
            }
        


    ?>
</body>

</html>