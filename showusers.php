<?php 

    $filename = 'users.txt';
    $file = fopen($filename, 'r'); 

    if ($file) 
        $lines = explode("\n", fread($file, filesize($filename)));
    
    require "dbconnect.php";
?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="showusers.css" />

    <title>Users</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>User Name</th>
                <th colspan="3">Actions</th>


            </tr>
        </thead>
        <tbody></tbody>
        <?php

        $users = $object->selectall();
        if($users){
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>".$user-> fname."</td>";
                echo "<td>".$user-> lname."</td>";
                echo "<td>".$user-> gender."</td>";
                echo "<td>".$user-> email."</td>";
                echo "<td>".$user-> username."</td>";
                echo "<td> <a class='view' href='user.php?data=".$user->id."'>View</a> </td>";
                echo "<td> <a class='edit' href='edit.php?data=".$user->id."'>Edit</a> </td>";
                echo "<td> <a class='delete' href='deleteuser.php?data=".$user->id."'>Delete</a> </td>";
                echo "</tr>";
            }
        }
            //   if (!empty($lines)) {
            //       foreach ($lines as $key => $line) {
            //           if($line !== "") {
            //               $user = explode(":", $line);
            //               echo "<tr>";
            //               echo "<td>".$user[0]."</td>";
            //               echo "<td>".$user[1]."</td>";
            //               echo "<td>".$user[2]."</td>";
            //               echo "<td>".$user[3]."</td>";
            //               echo "<td>".$user[4]."</td>";
            //               echo "<td> <a class='view' href='user.php?data=".$key."'>View</a> </td>";
            //               echo "<td> <a class='edit' href='edit.php?data=".$key."'>Edit</a> </td>";
            //               echo "<td> <a  class='delete' href='deleteuser.php?data=".$key."'>Delete</a> </td>";
            //               echo "</tr>";
            //           }
            //       }
            //   }
          ?>
        </tbody>
    </table>
    <div class="form-group col-sm-5 ms-3">
        <a href="logout.php" style="text-align:center">
            Log out
        </a>
    </div>
</body>

</html>