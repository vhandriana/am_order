<?php
ob_start();
include './konfig.php';
session_start();
if ($_SESSION['hak_akses'] == 'Admin') {
    ?>
    <html>
        <head>
            <title>Halaman Admin</title>
            <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
            <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="font-awesome-4.1.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
            <link rel="stylesheet" type="text/css" media="all" href="jsdatepick-calendar/jsDatePick_ltr.min.css" />
            <script type="text/javascript" src="jsdatepick-calendar/jsDatePick.jquery.min.1.3.js"></script>
            <style type="text/css">
                /*	#searchid
                        {
                                width:500px;
                                border:solid 1px #000;
                                padding:10px;
                                font-size:14px;
                        }*/
                #result
                {
                    position:absolute;
                    width:300px;
                    padding:5px;
                    display:none;
                    margin-top:40px;
                    border-top:0px;
                    overflow:hidden;
                    border:1px #CCC solid;
                    background-color: white;
                    z-index: 10;
                    font-size: 14px;
                    border-radius: 2px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
                    -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
                }
                .show
                {
                    padding:10px; 
                    border-bottom:1px #999 dashed;
                    /*		font-size:12px; */
                    height:50px;
                }
                .show:hover
                {
                    background:#428bca;
                    color: #fff;
                    cursor:pointer;
                }
            </style>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#datatable').dataTable();
                });

                //verry
                
            </script>
        </head>

        <body>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="-webkit-box-shadow: 0px 0px 10px #888888;">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Aplikasi Monitoring Order Maklun</a>
                </div>
               
                <div>
                    
                    <p class="navbar-text navbar-right">
                        <?php echo $_SESSION['username']; ?> Login sebagai <?php echo $_SESSION['hak_akses']; ?> | 
                        <a class="btn btn-default btn-xs" href="logout.php"><i class="glyphicon glyphicon-off"></i> 
                            Logout
                        </a>  &nbsp;
                    </p>
                </div>
            </nav>

            <br>
            <br>
            <!--<div class="container">-->
            <div style="overflow-x:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="overflow: auto;"> 
                        <div class="panel-body">
                            <?php
                                if (isset($_GET['view'])) {
                                    $view = $_GET['view'];
                                    include 'admin/' . $view . '.php';
                                } else {
                                    header("location:admin.php?view=tampil_user");
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <footer align="center">
                
            </footer>
        </body>

    </html>
<?php
} else {
        echo "<script>
        alert('Forbidden access');
        .href='index.php';
        script>";
        exit();
    }

ob_flush();
?>