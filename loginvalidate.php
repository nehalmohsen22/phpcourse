<?php
$users = file("users.txt");
$users = implode(":", $users);
$users = explode(":", $users);

    $errors = [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        $errors["username"] = "username is required";
    }
    if (empty($password)) {
        $errors["password"] = "Password is required";
    } else {

    if (isset($_POST['username'])) {
        $dir = "users.txt";
        $datafile = fopen($dir, 'r');
        while (($line = fgets($datafile)) !== false) {
            $userArray = explode(":", $line);
            $usernameltemp = trim($_POST["username"]);
           
            if ($usernameltemp === $userArray[4]) {
                $passwordtemp = $userArray[5];
                var_dump($passwordtemp);
                if ($passwordtemp === trim($_POST["password"])) {
        
                    echo "Started session";
                    session_start();
                    $_SESSION["username"] = $usernameltemp;
                    header("Location:showusers.php");
                    return;
                }
            } else {
                continue;
            };
        }
    }
    if(count($errors) > 0){
        var_dump($data);
    
        $data = json_encode($data);
        $errors = json_encode($errors);
        header("Location:login.php?errors={$errors}&data={$data}");
    }
}

    
  