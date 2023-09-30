<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SJCB - CRMS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="img/logo.jpg" rel="icon">
    <link href="img/logo.jpg" rel="apple-touch-icon">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5"><br><br><center><img src="img/logo.png" width="350" height="350"></center></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                            <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>

                            <form id="fupForm" name="form1" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="fname" placeholder="First Name" name="fname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lname" placeholder="Last Name" name="lname">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" placeholder="Email Address" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="uname" placeholder="User Name" name="uname">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="pword" placeholder="Password" name="pword">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="rpword" placeholder="Repeat Password" name="rpword">
                                    </div>
                                </div>
                                <input type="button" name="save" class="btn btn-primary btn-user btn-block" id="butsave" value="Register Account">
                                    
                        
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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

   <script>
$(document).ready(function() {
    $('#butsave').on('click', function() {
        $("#butsave").attr("disabled", "disabled");
        var email = $('#email').val();
        var uname = $('#uname').val();
        var pword = $('#pword').val();
        var lname = $('#lname').val();
        var fname = $('#fname').val();
        var rpword = $('#rpword').val();
       
        

        if(rpword == pword){
            re = /[A-Z]/;
            re1 = /[a-z]/;
            re2 = /[0-9]/;
            if(!re.test(form1.pword.value)){
                $("#butsave").removeAttr("disabled");
                $("#error").show();
                $("#success").hide();
                $('#error').html('Password must contain atleast one upper case letter.');
            }else if(!re1.test(form1.pword.value)){
                $("#butsave").removeAttr("disabled");
                $("#error").show();
                $("#success").hide();
                $('#error').html('Password must contain atleast one lower case letter');
            }else if(!re2.test(form1.pword.value)){
                $("#butsave").removeAttr("disabled");
                $("#error").show();
                $("#success").hide();
                $('#error').html('Password must contain atleast one digit or number.');
            }else{
                $.ajax({
                url: "functions/register_account.php",
                type: "POST",
                data: {
                    email: email, 
                    uname: uname,
                    pword: pword,  
                    lname: lname,
                    fname: fname,       
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#butsave").removeAttr("disabled");
                        $('#fupForm').find('input:text').val('');
                        $("#error").hide();
                        $("#success").show();
                        $('#success').html('Account has been registered. Please check your email for the verification code!');                        
                    }
                    else if(dataResult.statusCode==201){
                        $("#butsave").removeAttr("disabled");
                        $("#error").show();
                        $("#success").hide();
                        $('#error').html('Email Address already exists!');
                    }
                    else if(dataResult.statusCode==202){
                        $("#error").show();
                        $('#error').html('Cannot add record !');
                    }
                }
            });
        }   
        }
        else{
            $("#butsave").removeAttr("disabled");
            $("#error").show();
            $("#success").hide();
            $('#error').html('Password did not matched');
        }


    });
});
</script>
</body>

</html>