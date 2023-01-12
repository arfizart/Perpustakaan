<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php include 'head.php'; ?>
    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php include 'header.php'; ?>

    <?php } ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div>
                        <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="Foto Admin" style="border: 3px solid white;" /></center>
                    </div>
                    <div class="info">
                        <center>
                            <p><?php echo $_SESSION['fullname']; ?></p>
                        </center>

                    </div>
                </div>
                <!-- search form -->
                <!--<form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <?php include "menu.php"; ?>
            </section>
            <!-- /.sidebar -->
        </aside>

        <aside class="right-side">

            <!-- Main content -->
            <section class="content">

                <div class="row" style="margin-bottom:5px;">


                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from data_anggota order by id desc");
                                $total = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total"; ?></span>
                                Total Anggota
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from data_buku order by id desc");
                                $total1 = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total1"; ?></span>
                                Total Buku
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from admin order by user_id desc");
                                $total2 = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total2"; ?></span>
                                Total Admin
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-group"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from pengunjung order by id desc");
                                $total3 = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total3"; ?></span>
                                Total Pengunjung
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main row -->
                <div class="row">

                    <!-- <div class="col-md-8">
                        <section class="panel">
                            <header class="panel-heading">
                                Grafik Peminjaman Buku
                            </header>
                            <div class="panel-body">
                                <canvas id="linechart" width="600" height="330"></canvas>
                            </div>
                        </section>

                    </div> -->



                    <div class="col-md-4">
                        <div class="panel">
                            <header class="panel-heading">
                                Daftar Anggota Baru
                            </header><?php
                                        $tampil = mysqli_query($conn, "select * from data_anggota order by id desc limit 3");
                                        while ($data1 = mysqli_fetch_array($tampil)) {
                                        ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                        <a href="anggota.php"><img src="<?php echo $data1['foto']; ?>" width="50" height="50" style="border: 3px solid #555555;"></a>
                                        <a href="anggota.php"><?php echo $data1['nama']; ?></a>
                                    </li>
                                </ul>
                            <?php } ?>
                            <div class="panel-footer bg-white">
                                <!-- <span class="pull-right badge badge-info">32</span> -->
                                <a href="anggota.php" class="btn btn-sm btn-info">Data Anggota <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <section class="panel tasks-widget">
                            <header class="panel-heading">
                                Daftar Bacaan PerPusWeb
                            </header>
                            <div class="panel-body">

                                <div class="task-content">

                                    <ul class="task-list">
                                        <?php
                                        $tampil = mysqli_query($conn, "select * from data_buku order by id desc limit 5");
                                        while ($data6 = mysqli_fetch_array($tampil)) {
                                        ?>
                                            <li>
                                                <div class="task-checkbox">
                                                    <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                                    <input type="checkbox" class="flat-grey list-child" />
                                                    <!-- <input type="checkbox" class="square-grey"/> -->
                                                </div>
                                                <div class="task-title">
                                                    <span class="task-title-sp"><?php echo $data6['judul']; ?></span>
                                                    <span class="label label-primary"><?php echo $data6['tgl_input']; ?></span>
                                                    <div class="pull-right hidden-phone">
                                                        <button class="btn btn-info btn-xs"><i class="fa fa-check"></i></button>
                                                        <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div class=" add-task-row">
                                    <a class="btn btn-warning btn-sm pull-left" href="buku.php">Lihat Buku Bacaan</a>
                                    <!--<a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>-->
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- row end -->
            </section><!-- /.content -->
            <div class="footer-main">
                Copyright PerpustakaanKU 2021
            </div>
        </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="../js/plugins/chart.js" type="text/javascript"></script>

    <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
    <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="../js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="../js/Director/dashboard.js" type="text/javascript"></script>

    <!-- Director for demo purposes -->
    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().addClass('highlight');
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().removeClass('highlight');
            $(this).parents('li').removeClass("task-done");
            console.log('not');
        });
    </script>
    <script>
        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            //BAR CHART
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                responsive: true,
                maintainAspectRatio: false,
            });

        });
        // Chart.defaults.global.responsive = true;
    </script>
    </body>

    </html>