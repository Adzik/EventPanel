<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventPanel</title>
    <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../css/theme.css" rel="stylesheet">
    <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="../index.php">
                EventPanel
            </a>

            <ul class="nav pull-right">
                <br />
                <?php include ('accountInfo.php'); ?>
            </ul>
            </li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div>
</div><!-- /navbar-inner -->
</div><!-- /navbar -->



<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">

                    <ul class="widget widget-menu unstyled">
                        <li class="active">
                            <a href="../index.php">
                                <i class="menu-icon icon-dashboard"></i>
                                Lista eventów
                            </a>
                        </li>

                        <li>
                            <a href="../addevent.php">
                                <i class="menu-icon icon-tasks"></i>
                                Dodaj event
                            </a>
                        </li>
                        <li>
                            <a href="users.php">
                                <i class="menu-icon icon-table"></i>
                                Lista użytkowników
                            </a>
                        </li>
                    </ul>

                    <ul class="widget widget-menu unstyled">

                        <li>
                            <a href="../logout.php">
                                <i class="menu-icon icon-signout"></i>
                                Logout
                            </a>
                        </li>
                    </ul>

                </div><!--/.sidebar-->
            </div><!--/.span3-->
            <div class="span9">
                <div class="content">

                    <div class="module">
                        <div class="module-head">
                            <h3>Dodawanie eventu</h3>
                        </div>
                        <div class="module-body">
                            <?php
                            if(!isset($_SESSION['success']))
                            {
                                $_SESSION['success'] = 2;
                            }
                            if($_SESSION['success'] == 0){
                                echo '<div id="div3" class="alert alert-success" role="alert">
                                  Dodano użytkownika
                            </div>';
                            }
                            if($_SESSION['success'] == 3)
                            {
                                echo ' <div id="div3" class="alert alert-danger" role="alert">
                                        Brak podanej nazwy użytkownika lub podane hasła nie są takie same!
                            </div>';
                            }
                            if($_SESSION['success'] == 1)
                            {
                                echo ' <div id="div3" class="alert alert-danger" role="alert">
                                        Wybrany nick jest już zajęty!
                            </div>';
                            }
                            unset($_SESSION['success']);

                            if($_SESSION['active'] == 1)
                            {
                                include('addUserForm.html');
                            }
                            else
                            {
                                include('noAccess.html');
                            }
                            ?>


                        </div>
                    </div>

                    <br />

                </div><!--/.content-->
            </div><!--/.span9-->
        </div>
    </div><!--/.container-->
</div><!--/.wrapper-->

<div class="footer">
    <div class="container">


        <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>
    </div>
</div>

<script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="scripts/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
        $('#div3').fadeIn(3000);
    } );
</script>
</body>