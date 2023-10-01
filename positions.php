<?php 
    include('includes/config.php');
    include('includes/lock.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SJCB - CRMS</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="img/logo.jpg" rel="icon">
    <link href="img/logo.jpg" rel="apple-touch-icon">
</head>
<style type="text/css">
    .pull-right{
        float: right;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <?php include('includes/topbar.php');?>
                    <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Positions <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> Add Position</button></h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Position</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM positions");
                                            while($rows = mysqli_fetch_array($sql)){
                                                $posid = $rows['ID'];
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['Position'];?></td>

                                            <td align="center"><a data-toggle="modal" onclick="editxid(<?php echo $rows[0];?>)" data-target="#update" href="#"><i class="fas fa-edit"></i></a></td>
                                            <?php
                                                $sqlcheck = mysqli_query($conn, "SELECT * FROM employees WHERE PositionID='$posid'");
                                                $count = mysqli_num_rows($sqlcheck);

                                                if($count == 0){
                                            ?>
                                            <td align="center"><a data-toggle="modal" onclick="deletexid(<?php echo $rows[0];?>)" data-target="#delete" href="#"><i class="fas fa-trash"></i></a></td>
                                            <?php } else { ?>
                                            <td style="color: red; font-size: 12px;" align="center"><i class="fa fa-exclamation"></i> Unable to delete</td>
                                            <?php }?>
                                           
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                 <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 align="left">Add Position</h4>
                            </div>
                            <div class="modal-body">
                                <form action="functions/add_position.php" method="POST">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Position:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" placeholder="Position" name="pos">
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                 <!-- Modal -->
                <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 align="left">Edit Position</h4>
                            </div>
                            <form action="functions/edit_position.php" method="POST">
                            <div class="modal-body">
                                <div id="result">
                                    <input type="text" name="id" id="editid">
                                </div>
                                   
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


                <!-- delete record -->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
                 data-backdrop="static">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Delete record?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p align="justify">
                                    Do you really want to delete this record?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="functions/delete_position.php">
                                    <input type="hidden" id="delid" name="idx">
                                    <button type="submit" class="btn btn-success btn-rounded"><i class="fa fa-check"></i> Yes</button>
                                </form>
                                 <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end delete record -->
                
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SJCB Clinical Record Management System 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
    <script type="text/javascript">
        function deletexid(x){
            //alert(x);
            document.getElementById('delid').value  = x;

        }
        function editxid(y){
            var id = y;
            $.post('functions/get_position.php', {postid: id},
                function(data)
                {
                    $('#result').html(data);
                });

        }


    </script>

</body>

</html>