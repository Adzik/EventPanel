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
                        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Zarządzanie kontem </a>
                            <ul id="togglePages" class="collapse unstyled">
                                <li><a href="changePassword.php"><i class="icon-inbox"></i>Zmień hasło </a></li>
                            </ul>
                        </li>
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
                           Funkcja obecenie niedostępna
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