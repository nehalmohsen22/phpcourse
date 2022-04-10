<?php

$userid = $_GET["data"];
// $users = file("users.txt");
// $selecteduser =$users[$userid];
// $selecteduser =explode(':' , $selecteduser);


try {
    require "dbconnect.php";
    $db= $object->connect();
    // $select_user= selectuser($userid) ;
    $select_user = "select * from `user` where `ID` = $userid";
    $update_stmt = $db->prepare($select_user);
    $res = $update_stmt->execute();
    $selecteduser = $update_stmt->fetchAll(PDO::FETCH_OBJ);


} catch (Exception $e) {

    echo $e->getMessage();
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <form action=<?php echo"update.php?data=" .$selecteduser[0]->id; ?> method="post">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <h3>Edit</h3>
                    <div class="card">
                        <div class="form-card">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label name="first_name" class="form-control-label px-3">First name
                                        <span class="text-danger">*
                                        </span>
                                    </label>

                                    <input type="text" id="fname" name="fname" placeholder="Enter your first name"
                                        value="<?php echo $selecteduser[0]->fname;  ?>" />

                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Last name <span class="text-danger">*
                                        </span></label>
                                    <input type="text" id="lname" name="lname" placeholder="Enter your last name"
                                        value="<?php echo $selecteduser[0]->lname;  ?>" />
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">E-mail<span class="text-danger">
                                            *
                                        </span></label>
                                    <input type="text" id="email" name="email" placeholder=""
                                        value="<?php echo $selecteduser[0]->email;  ?>" />
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Phone number<span class="text-danger">
                                            *
                                        </span></label>
                                    <input type="text" id="phone" name="phone" placeholder=""
                                        value="<?php echo $selecteduser[0]->phone;  ?>" />

                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="address" class="form-control-label px-3">Address</label>
                                </div>

                                <textarea id="address" cols="31" name="address" class="col-sm-10 mx-4"></textarea>
                            </div>
                            <!-- <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Upload your image<span class="text-danger">
                                    </span></label>
                                <input type="file" id="image" name="image" placeholder="">

                            </div> -->
                            </br>

                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="gender">Gender :
                                </label>

                                <div class="col-sm-10">
                                    <input required type="radio" name="gender" value="male" id="male"
                                        value="<?php echo $selecteduser[0]->gender;  ?>">
                                    <label for="male">Male</label>

                                    <input required type="radio" name="gender" value="female" id="female"
                                        value="<?php echo $selecteduser[0]->gender;  ?>" style="margin-left: 30px" />
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">User Name<span class="text-danger">
                                            *
                                        </span></label>
                                    <input type="text" id="job" name="uname" placeholder="" onblur="validate(5)"
                                        value="<?php echo $selecteduser[0]->username;  ?>" />
                                </div>

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Password <span class="text-danger">
                                            *
                                        </span></label>
                                    <input type="password" id="ans" name="pass" placeholder="" onblur="validate(6)"
                                        value="<?php echo $selecteduser[0]->password;  ?>" />
                                </div>
                            </div>


                            <div class="row justify-content-center ms-3">
                                <div class="form-group col-sm-5">
                                    <button type="submit" class="btn-block btn-primary">
                                        Submit Update
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>