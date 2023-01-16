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
                        <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" style="border: 3px solid white;" /></center>
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

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <header class="panel-heading">
                                <b>Data Pinjaman Buku</b>

                            </header>
                            <!-- <div class="box-header"> -->
                            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                            <!-- </div> -->
                            <div class="panel-body table-responsive">
                                <div class="box-tools m-b-15">
                                    
                                </div>
                                <?php
                                

                                $query1 = "select * from data_peminjam order by id DESC";

                                
                                $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                ?>
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>ID </center>
                                            </th>
                                            <th>
                                                <center>ID Anggota </center>
                                            </th>
                                            <th>
                                                <center>ID Buku </center>
                                            </th>
                                            <th>
                                                <center>Tgl Pinjam </center>
                                            </th>
                                            <th>
                                                <center>Batas Pengembalian </center>
                                            </th>
                                            <th>
                                                <center>Tgl Kembali </center>
                                            </th>
                                            <th>
                                                <center>Denda </center>
                                            </th>
                                            <th>
                                                <center>Status </center>
                                            </th>
                                            <th>
                                                <center>Tools</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <?php 
                                            while ($data = mysqli_fetch_array($tampil)) {

                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $data['id']; ?></td>
                                                <td><?php echo $data['id_anggota']; ?></td>
                                                <td><?php echo $data['id_buku_perpus']; ?></td>
                                                <td><?php echo $data['tgl_pinjam']; ?></td>
                                                <td><?php echo $data['tgl_pengembalian']; ?></td>
                                                <td><?php echo $data['tgl_kembali']; ?></td>
                                                <td>
                                                    <?php
                                                    $batas = $data['tgl_pengembalian'];
                                                    $kembali = $data['tgl_kembali'];
                                                    $datenow = date("Y-m-d");

                                                    if(empty($kembali)){
                                                        $kembali = $datenow;
                                                    }
                                                    $status = $data['status'];
                                                             
                                                    if($status == '0'){
                                                     $t = date_create($batas);
                                                     $n = date_create($kembali);
                                                     $terlambat = date_diff($t, $n);
                                                     $hari = $terlambat->format("%a");


                                                     if($batas >= $datenow){
                                                        echo 'Sisa '.$hari.' Hari Lagi';
                                                     }else{
                                                        $denda = $hari * 500;
                                                        echo 'Terlambat '.$hari .' Hari<br><button class=btn-danger>Denda '.format_rupiah($denda).'</button>';
                                                     }

                                                    }else{
                                                        echo format_rupiah($data['denda']);
                                                    }
                                                    ?>
                                                    

                                                </td>
                                                <td>
                                                    <?php if($data['status'] == '0'){ 
                                                        echo '<button class="btn btn-primary btn-sm">Dipinjam</button>'; 
                                                    }else if($data['status'] == '1'){
                                                        echo '<button class="btn btn-success btn-sm">Sudah Kembali</button>'; 
                                                    }else{
                                                        echo '<button class="btn btn-danger btn-sm">Denda</button>'; 
                                                    }; ?>
                                                </td>
                                                <td>
                                                    <center>
                                                        <div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Buku" href="edit-peminjam.php?hal=edit&kd=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                            <a onclick="return confirm ('Yakin hapus <?php echo $data['judul']; ?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Buku" href="hapus-peminjam.php?hal=hapus&kd=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-trash"></a>
                                                    </center>
                                                </td>
                                            </tr>
                            </div>

                        <?php
                                    }
                        ?>
                        </tbody>
                        </table>

                        <?php $tampil = mysqli_query($conn, "select * from data_peminjam order by id");
                        $buku = mysqli_num_rows($tampil);
                        ?>
                        <center>
                            <h4>Jumlah Pinjaman : <?php echo "$buku"; ?> Pcs </h4>
                        </center>

                        <div class="text-right" style="margin-top: 10px;">
                            <a href="peminjam.php" class="btn btn-sm btn-info">Refresh Pinjaman <i class="fa fa-refresh"></i></a> <a href="input-peminjam.php" class="btn btn-sm btn-warning">Tambah Peminjam <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
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