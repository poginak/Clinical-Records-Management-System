<?php
    include('includes/config.php');

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $vcode = $_POST['vcode'];
        $uname = $_SESSION['uname'];
        $sql = mysqli_query($conn, "SELECT * FROM accounts WHERE UserName='$uname' AND VCode='$vcode'");
        $row = mysqli_fetch_array($sql);
        $count = mysqli_num_rows($sql);

        if($count == 1){
            
            $id = $row['ID'];
            //update the status to 1
            $sqlupdate = mysqli_query($conn, "UPDATE accounts SET Status=1 WHERE ID='$id'");

            header("location: main.php");
           
        }else{
            $error = "Invalid verification code. Please try again";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PISSA Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="img/logo.jpg" rel="icon">
    <link href="img/logo.jpg" rel="apple-touch-icon">
    <style type="text/css">
        .err{
            font-size: 15px;
            text-align: center;
            font-weight: bold;
            color: red;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Verification</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Verification Code..." name="vcode">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control">
                                            <?php if(isset($error)){ ?>
                                                <p class="err"><i class="fa fa-exclamation"></i> <?php echo $error;?></p>
                                            <?php }?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Send
                                        </button>
                                    </form>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>