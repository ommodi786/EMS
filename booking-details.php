<?php
session_start();
// Database connection file
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['usrid']) == 0) {
    header('location:logout.php');
} else {
    // Code for updation
    if (isset($_POST['cancellbooking'])) {
        $uid = $_SESSION['usrid'];
        $bkngid = intval($_GET['bkid']);
        $cancelremark = $_POST['cancelltionremark'];
        $status = "Cancelled";  // We can allow cancellation even if the status is confirmed

        // Check the current booking status to ensure that the user is allowed to cancel
        $sql_check = "SELECT BookingStatus FROM tblbookings WHERE UserId=:uid AND id=:bkngid";
        $query_check = $dbh->prepare($sql_check);
        $query_check->bindParam(':uid', $uid, PDO::PARAM_STR);
        $query_check->bindParam(':bkngid', $bkngid, PDO::PARAM_STR);
        $query_check->execute();
        $result = $query_check->fetch(PDO::FETCH_ASSOC);
        $bstatus = $result['BookingStatus'];

        // Proceed with booking cancellation regardless of booking status (even if it's confirmed)
        $sql = "UPDATE tblbookings SET UserCancelRemark=:cancelremark, BookingStatus=:status WHERE UserId=:uid AND id=:bkngid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
        $query->bindParam(':bkngid', $bkngid, PDO::PARAM_STR);
        $query->bindParam(':cancelremark', $cancelremark, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Success: Booking Cancelled.');</script>";
        echo "<script>window.location.href='my-bookings.php'</script>";
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Event Management System | Booking Details</title>
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- other styles -->
    <!-- ... -->
</head>
<body>
<!--body-wrapper-start-->
    <div class="wrapper single-blog">
        <!--header-->
        <?php include_once('includes/header.php'); ?>

        <div class="breadcumb-area bg-overlay">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">My Bookings</li>
                </ol>
            </div>
        </div>

        <!-- Main Content -->
        <div class="single-blog-area ptb100 fix">
            <div class="container">
                <div class="row">
                    <?php include_once('includes/myaccountbar.php'); ?>

                    <div class="col-md-8 col-sm-7">
                        <div class="single-blog-body">
                            <?php
                            // Fetching Booking Details
                            $uid = $_SESSION['usrid'];
                            $bkngid = intval($_GET['bkid']);
                            $sql = "SELECT tblbookings.BookingId, tblbookings.BookingDate, tblbookings.BookingStatus, tblevents.EventName, tblevents.id as evtid, tblbookings.UserRemark, tblbookings.NumberOfMembers, tblbookings.AdminRemark, tblbookings.LastUpdationDate, tblbookings.UserCancelRemark, tblevents.EventStartDate, tblevents.EventEndDate, tblevents.EventLocation FROM tblbookings LEFT JOIN tblevents ON tblevents.id=tblbookings.EventId WHERE tblbookings.UserId=:uid AND tblbookings.id=:bkngid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                            $query->bindParam(':bkngid', $bkngid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                            ?>
                                    <div class="Leave-your-thought mt50" id="exampl">
                                        <h3 class="aside-title uppercase"><a href="event-details.php?evntid=<?php echo htmlentities($row->evtid); ?>"><?php echo htmlentities($row->EventName); ?></a> Booking Details</h3>
                                        <div class="table-responsive">
                                            <table border="2" class="table">
                                                <tr>
                                                    <th>Booking Number</th>
                                                    <td><?php echo htmlentities($row->BookingId); ?></td>
                                                    <th>Booking Date</th>
                                                    <td><?php echo htmlentities($row->BookingDate); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Number of Members</th>
                                                    <td><?php echo htmlentities($row->NumberOfMembers); ?></td>
                                                    <th>User Remark</th>
                                                    <td><?php echo htmlentities($row->UserRemark); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Event Name</th>
                                                    <td><a href="event-details.php?evntid=<?php echo htmlentities($row->evtid); ?>"><?php echo htmlentities($row->EventName); ?></a></td>
                                                    <th>Event Date</th>
                                                    <td><?php echo htmlentities($row->EventStartDate); ?> To <?php echo htmlentities($row->EventEndDate); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Event Location</th>
                                                    <td><?php echo htmlentities($row->EventLocation); ?></td>
                                                    <th>Booking Status</th>
                                                    <td><?php echo htmlentities($row->BookingStatus ? $row->BookingStatus : "Not confirmed Yet"); ?></td>
                                                </tr>
                                                <?php if ($row->AdminRemark != "") { ?>
                                                    <tr>
                                                        <th>Admin Remark</th>
                                                        <td colspan="3"><?php echo htmlentities($row->AdminRemark); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if ($row->UserCancelRemark != "") { ?>
                                                    <tr>
                                                        <th>User Cancellation Remark</th>
                                                        <td colspan="3"><?php echo htmlentities($row->UserCancelRemark); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="2" align="center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Cancel this Booking</button></td>
                                                    <td colspan="2" align="center"><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)"></i></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                            <?php } } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog" style="margin-top:10%">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Book Event Cancellation</h4>
                    </div>
                    <?php
                    $cadte = date('Y-m-d');
                    $bstatus = $row->BookingStatus; // This comes from the database record.

                    // Allow cancellation even for confirmed bookings
                    if ($cadte < $row->EventStartDate) {
                    ?>
                        <div class="modal-body">
                            <form name="cancelbooking" method="post">
                                <p><textarea placeholder="Cancellation Reason" class="info" name="cancelltionremark" required="true"></textarea></p>
                                <p><button type="submit" class="btn btn-info btn-lg" name="cancellbooking">Submit</button></p>
                            </form>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="modal-body">
                            <p>Booking can still be cancelled, even if it is confirmed or in progress.</p>
                        </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
    </div>

    <script>
        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>

    <!-- JS Files -->
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    <script src="js/nivo-slider/nivo-active.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/animate-text.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
<?php } ?>
