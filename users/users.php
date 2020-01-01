<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSDOBOT</title>
    <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../css/theme.css" rel="stylesheet">
    <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <style>
        input[type=button], input[type=submit], input[type=reset]  {
            background-color: #56baed;
            border: none;
            color: white;
            padding: 15px 80px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            font-size: 13px;
            -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
            -webkit-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            margin: 15px auto;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .dlabuttona {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="../index.php">
                DSDOBOT
            </a>

            <ul class="nav pull-right">
                <br />
                <?php
                session_start();
                if(isset($_SESSION['logged'])){
                    print_r('Jesteś zalogowany jako: '.$_SESSION['user_id']);
                }
                else{
                    echo "Nie jesteś zalogowany";
                }
                ?>
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
                            <a href="../panel.php">
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
                            <h3>Lista eventów</h3>
                        </div>
                        <div class="module-body">
                            <?php include('userslist.php');?>
                                <form action="adduser.php">
                                <center><input type="submit" value="Dodaj nowego użytkownika" /></center>
                                </form>
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


        <b class="copyright">&copy; 2019 Adzik </b>
    </div>
</div>

<script src="../scripts/jquery-1.9.1.min.js"></script>
<script src="../scripts/jquery-ui-1.10.1.custom.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../scripts/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
</script>
</body>