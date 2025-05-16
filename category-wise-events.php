<?php
session_start();
error_reporting(0);
include('includes/config.php');


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
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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

        <!--slider header area are start-->
        <div id="home" class="header-slider-area">
            <!--header start-->
            <?php include_once('includes/header.php'); ?>
            <!-- header End-->
        </div>
        <style>
        .title-event {
            width: 100%;
            position: absolute;
            top: 0;
            width: 100%;
            margin-bottom: 2000px !important;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            color: #000;
            margin-bottom: 20px !important;
            font-weight: bold;

        }
        </style>
        <!--slider header area are end-->
        <div class="col-lg-12 " style="margin-top: 100px;">
            <h1 class="section-title">Up Comming Events</h1>
        </div>
        <div class="row w-100">
            <?php include_once('includes/sidebar.php'); ?>

            <div class="card-list col-lg-8">
                <div class="title-event">
                    <?php
                    $cid = intval($_GET['catid']);
                    $sql = "SELECT id,CategoryName from tblcategory where id=:cid";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {
                    ?>
                    <h1 class="section-title"><?php echo htmlentities($row->CategoryName); ?> Category Event Details
                    </h1>
                    <?php }
                    } ?>
                </div>
                <?php
                // Fetching Upcomong events
                $isactive = 1;
                $sql = "SELECT EventName,EventLocation,EventStartDate,EventEndDate,EventImage,id from tblevents where IsActive=:isactive and CategoryId=:cid order by id desc ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':isactive', $isactive, PDO::PARAM_STR);
                $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {
                ?>
                <a href="event-details.php?evntid=<?php echo htmlentities($row->id); ?>" class="card-item">
                    <img src="admin/eventimages/<?php echo htmlentities($row->EventImage); ?>"
                        alt="<?php echo htmlentities($row->EventName); ?>" alt="Card Image">
                    <span class="developer">
                        <?php echo htmlentities($row->EventStartDate); ?>
                        To
                        <?php echo htmlentities($row->EventEndDate); ?>
                    </span>
                    <h3><?php echo htmlentities($row->EventName); ?></h3>
                    <h3>Location : <?php echo htmlentities($row->EventLocation); ?></h3>
                    <div class="arrow">
                        <i class="fas fa-arrow-right card-icon"></i>
                    </div>
                </a>
                <?php } } else { ?>
                <p>No Record Found</p>
                <?php } ?>


            </div>
        </div>

        <style>
        .card-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            max-width: 1250px;
            margin: 150px auto;
            padding: 20px;
            gap: 20px;
        }

        .card-list .card-item {
            background: #fff;
            padding: 26px;
            border-radius: 8px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.04);
            list-style: none;
            cursor: pointer;
            text-decoration: none;
            border: 2px solid transparent;
            transition: border 0.5s ease;
        }

        .card-list .card-item:hover {
            border: 2px solid #000;
        }

        .card-list .card-item img {
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 8px;
            object-fit: cover;
        }

        .card-list span {
            display: inline-block;
            background: #F7DFF5;
            margin-top: 32px;
            padding: 8px 15px;
            font-size: 0.75rem;
            border-radius: 50px;
            font-weight: 600;
        }

        .card-list .developer {
            background-color: #F7DFF5;
            color: #B22485;
        }

        .card-list .designer {
            background-color: #d1e8ff;
            color: #2968a8;
        }

        .card-list .editor {
            background-color: #d6f8d6;
            color: #205c20;
        }

        .card-item h3 {
            color: #000;
            font-size: 1.438rem;
            margin-top: 28px;
            font-weight: 600;
        }

        .card-item .arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotate(-35deg);
            height: 40px;
            width: 40px;
            color: #000;
            border: 1px solid #000;
            border-radius: 50%;
            margin-top: 40px;
            transition: 0.2s ease;
        }

        .card-list .card-item:hover .arrow {
            background: #000 !important;
            color: #fff !important;
        }

        @media (max-width: 1200px) {
            .card-list .card-item {
                padding: 15px;
            }
        }

        @media screen and (max-width: 980px) {
            .card-list {
                margin: 0 auto;
            }
        }
        </style>


        <!--up comming events area-->
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