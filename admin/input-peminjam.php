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



                <!-- Modal Cari Buku-->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Data Buku</h5>
                      </div>
                      <div class="modal-body">
                        <table width="100%" class="table">
                            <th>Kode Buku</th><th>Judul Buku</th><th>Pilih</th>
                            <?php 
                            $query1 = "select * from data_buku_perpus";
                            $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?=$data['id'];?></td>
                                <td><?=$data['judul'];?></td>
                                <td><button class="btn btn-sm btn-primary" onclick="pickBook('<?=$data['id'];?>');" data-dismiss="modal">Pilih</button></td>
                            </tr>

                        <?php } ?>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal Cari Anggota-->
                <div class="modal fade" id="anggotaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Data Anggota</h5>
                      </div>
                      <div class="modal-body">
                        <table width="100%" class="table">
                            <th>Kode Anggota</th><th>Nama</th><th>Pilih</th>
                            <?php 
                            $query1 = "select * from data_anggota";
                            $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                            <tr>
                                <td><?=$data['id'];?></td>
                                <td><?=$data['nama'];?></td>
                                <td><button class="btn btn-sm btn-primary" onclick="pickAnggota('<?=$data['id'];?>');" data-dismiss="modal">Pilih</button></td>
                            </tr>

                        <?php } ?>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <header class="panel-heading">
                                <b>Input Peminjaman Buku Perpustakaan</b>

                            </header>
                            <!-- <div class="box-header"> -->
                            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                            <!-- </div> -->
        <?php
            $q = mysqli_query($conn,"SELECT max(id) as kode FROM data_peminjam");
            $last_id = mysqli_fetch_array($q);
            $last_id = $last_id['kode'];
            $urutan = (int) substr($last_id, 2, 3);
            $urutan++;
            $huruf = "PJ";
            $kdBuku = $huruf . sprintf("%03s", $urutan);
        ?>
        <div class="panel-body">
            <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-peminjam.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Pinjam</label>
                    <div class="col-sm-8">
                        <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" value="<?php echo $kdBuku; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-4">
                        <input name="kdBuku" type="text" id="kdBuku" class="form-control" autocomplete="off" placeholder="Kode Buku" required="" />
                    </div>
                    <div class="col-sm-4">
                         <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                         Cari Buku
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Anggota</label>
                    <div class="col-sm-4">
                        <input name="kdAnggota" type="text" id="kdAnggota" class="form-control" autocomplete="off" placeholder="Kode Anggota" required="" />
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anggotaModal">
                         Cari Anggota
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                    <div class="col-sm-3">
                        <input name="tgl_pinjam" type="date" id="tgl_pinjam" class="form-control" autocomplete="off" value="<?=date("Y-m-d"); ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Pengembalian</label>
                    <div class="col-sm-3">

                        <?php 
                            $date = date("Y-m-d");
                            $date1 = str_replace('-', '/', $date);
                            $tomorrow = date('Y-m-d',strtotime($date1 . "+2 days"));
                        ?>
                        <input name="tgl_pengembalian" type="date" id="tgl_pengembalian" class="form-control" autocomplete="off" value="<?=$tomorrow; ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                        <input type="reset" value="Cancel" class="btn btn-sm btn-danger"/>
                    </div>
                </div>
                <div style="margin-top: 20px;"></div>
            </form>
        </div>
    </div><!-- /.box -->
                    </div>
                </div>
                <!-- row end -->
            </section><!-- /.content -->
            <div class="footer-main">
                Copyright © <?=date("Y");?>
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
    <script type="text/javascript">
        
        function pickBook(id){
            $('#kdBuku').val(id);
        }
        function pickAnggota(id){
            $('#kdAnggota').val(id);
        }

    </script>
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
    </body>

    </html>