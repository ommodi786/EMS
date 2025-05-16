<?php
session_start();
error_reporting(0);
include('includes/config.php');
//Process for Sign
if (isset($_POST['signin'])) {
    //Getting Post Values
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    // Quer for signing matching username and password with db details
    $sql = "SELECT Userid,IsActive FROM tblusers WHERE UserName=:uname and UserPassword=:password";
    //preparing the query
    $query = $dbh->prepare($sql);
    //Binding the values
    $query->bindParam(':uname', $uname, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    //Execute the query
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $status = $result->IsActive;
            $_SESSION['usrid'] = $result->Userid;
        }
        if ($status == 0) {
            echo "<script>alert('Your account is Inactive. Please contact admin');</script>";
        } else {
            echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>Event Management System | user signin </title>
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- icofont css -->
    <link rel="stylesheet" href="css/icofont.css">
    <!-- Nivo css -->
    <link rel="stylesheet" href="css/nivo-slider.css">
    <!-- animaton text css -->
    <link rel="stylesheet" href="css/animate-text.css">
    <!-- Metrial iconic fonts css -->
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- color css -->
    <link href="css/color/skin-default.css" rel="stylesheet">

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--body-wraper-are-start-->
    <div class="wrapper single-blog">

        <!--slider header area are start-->
        <div id="home" class="header-slider-area">
            <!--header start-->
            <?php include_once('includes/header.php'); ?>
            <!-- header End-->
        </div>
        <!--slider header area are end-->


        <!-- main blog area start-->
        <div class="single-blog-area ptb100 fix">
            <h1 class="section-title">Latest News</h1>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-7">
                        <div class="single-blog-body">

                            <style>
                            .section-title {
                                font-family: 'Poppins', sans-serif !important;
                                color: #000;
                                font-weight: bolder !important;
                                margin: 0 170px;
                            }

                            /* Table container for responsiveness */
                            .table {
                                width: 100%;
                                overflow-x: auto;
                                /* Enables horizontal scrolling */
                                border-radius: 10px;
                            }

                            /* Table styling */
                            table {
                                border-collapse: collapse;
                                min-width: 600px;
                                /* Ensures table maintains structure */
                            }

                            /* Table headers */
                            th,
                            td {
                                border: 1px solid #ddd;
                                padding: 15px;
                                text-align: left;
                            }

                            th {
                                padding: 15px;
                                background-color: #000;
                                color: white;
                                text-transform: uppercase;
                            }

                            /* Zebra striping for better readability */
                            tr:nth-child(even) {
                                background-color: #f9f9f9;
                            }

                            /* Hover effect */
                            tr:hover {
                                background-color: #f1f1f1;
                            }

                            /* Responsive styles for small screens */
                            @media screen and (max-width: 600px) {
                                table {
                                    min-width: 100%;
                                    /* Full width */
                                }

                                th,
                                td {
                                    font-size: 14px;
                                    padding: 8px;
                                }
                            }
                            </style>

                            <div class="Leave-your-thought mt50">
                                <div class="row">
                                    <?php
                                    // Include database connection
                                    include('db_connection.php');

                                    // Fetch news from the database
                                    $sql = "SELECT NewsTitle, NewsDetails, PostingDate FROM tblnews ORDER BY id DESC";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    ?>

                                    <table border="1" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Details</th>
                                                <th>Posting Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $row) { ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo htmlentities($row->NewsTitle); ?></td>
                                                <td><?php echo htmlentities($row->NewsDetails); ?></td>
                                                <td><?php echo htmlentities($row->PostingDate); ?></td>
                                            </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            } else { ?>
                                            <tr>
                                                <td colspan="4">No news found.</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--main blog area start-->

        <!--information area are start-->
        <?php include_once('includes/footer.php'); ?>
        <!--footer area are start-->
    </div>
    <!--body-wraper-are-end-->

    <!--==== all js here====-->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- Nivo js -->
    <script src="js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    <script src="js/nivo-slider/nivo-active.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- Youtube Background JS -->
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <!-- datepicker js -->
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- waypoint js -->
    <script src="js/waypoints.min.js"></script>
    <!-- onepage nav js -->
    <script src="js/jquery.nav.js"></script>
    <!-- animate text JS -->
    <script src="js/animate-text.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>

</html>