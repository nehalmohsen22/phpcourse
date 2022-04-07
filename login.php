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
    <form action="loginvalidate.php" method="post">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <h3>Log In</h3>
                    <div class="card">
                        <div class="form-card ">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label name="username" class="form-control-label px-3">User Name
                                        <span class="text-danger">*
                                            <?php echo isset($errors->username)? $errors->username : '';  ?>
                                        </span>
                                    </label>

                                    <input type="text" id="username" name="username"
                                        placeholder="Enter your User Name" />
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Password <span class="text-danger">*
                                            <?php echo isset($errors->password)? $errors->password : '';  ?>
                                        </span></label>
                                    <input type="password" id="password" name="password"
                                        placeholder="Enter your password" />
                                </div>
                            </div>


                            <div class="row justify-content-center ms-3">
                                <div class="form-group col-sm-5">
                                    <button type="submit" class="btn-block btn-primary">
                                        Submit
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