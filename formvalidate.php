<?php
    if(isset($_GET["errors"])){
        $errors = json_decode($_GET["errors"]);

    }
    if(isset($_GET["data"])){
        $data = json_decode($_GET["data"]);
        
    }


?>



<!DOCTYPE html>
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
    <form action="form.php" method="post" enctype="multipart/form-data">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <h3>Sign Up</h3>
                    <div class="card">
                        <div class="form-card">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label name="first_name" class="form-control-label px-3">First name
                                        <span class="text-danger">*
                                            <?php echo isset($errors->fname)? $errors->fname : '';  ?>
                                        </span>
                                    </label>

                                    <input type="text" id="fname" name="fname" placeholder="Enter your first name"
                                        value="<?php echo isset($data->fname)? $data->fname : '';  ?>"
                                        onblur="validate(1)" />
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Last name <span class="text-danger">*
                                            <?php echo isset($errors->lname)? $errors->lname : '';  ?>
                                        </span></label>
                                    <input type="text" id="lname" name="lname" placeholder="Enter your last name"
                                        value="<?php echo isset($data->lname)? $data->lname : '';  ?>"
                                        onblur="validate(2)" />
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">E-mail<span class="text-danger">
                                            * <?php echo isset($errors->email)? $errors->email : '';  ?>
                                        </span></label>
                                    <input type="text" id="email" name="email" placeholder="" onblur="validate(3)"
                                        value="<?php echo isset($data->email)? $data->email : '';  ?>" />
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Phone number<span class="text-danger">
                                            * <?php echo isset($errors->phone)? $errors->phone : '';  ?>
                                        </span></label>
                                    <input type="text" id="phone" name="phone" placeholder="" onblur="validate(4)"
                                        value="<?php echo isset($data->phone)? $data->phone : '';  ?>" />

                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label for="address" class="form-control-label px-3">Address</label>
                                </div>

                                <textarea id="address" cols="31" name="address" class="col-sm-10 mx-4"></textarea>
                            </div>
                            </br>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label style="text-align: left;">Upload profile picture</label>
                                <input class="form-style" type="file" name="image" id="image" />
                                <?php echo isset($errors->image)?  $errors->image : ''; ?>
                            </div>
                            </br>

                            <div class="row form-group">
                                <label class="control-label col-sm-2" for="gender">Gender :
                                </label>

                                <div class="col-sm-10">
                                    <input required type="radio" name="gender" value="male" id="male">
                                    <label for="male">Male</label>

                                    <input required type="radio" name="gender" value="female" id="female"
                                        style="margin-left: 30px" />
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">User Name<span class="text-danger">
                                            * <?php echo isset($errors->uname)? $errors->uname : '';  ?>
                                        </span></label>
                                    <input type="text" id="job" name="uname" placeholder="" onblur="validate(5)"
                                        value="<?php echo isset($data->uname)? $data->uname : '';  ?>" />
                                </div>

                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Password <span class="text-danger">
                                            * <?php echo isset($errors->pass)? $errors->pass : '';  ?>
                                        </span></label>
                                    <input type="password" id="ans" name="pass" placeholder="" onblur="validate(6)"
                                        value="<?php echo isset($data->pass)? $data->pass : '';  ?>" />
                                </div>
                            </div>


                            <div class="row justify-content-center ms-3">
                                <div class="form-group col-sm-5">
                                    <button type="submit" class="btn-block btn-primary">
                                        Submit
                                    </button>
                                </div>
                                <div class="form-group col-sm-5 ms-3">
                                    <button type="reset" class="btn-block btn-warning">
                                        reset
                                    </button>
                                </div>
                                <div class="form-group col-sm-5 ms-3">
                                    <a href="login.php">
                                        Already have an account
                                    </a>
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