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
                                <b>Peminjaman Buku Perpustakaan</b>

                            </header>
                            <!-- <div class="box-header"> -->
                            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                            <!-- </div> -->
        <?php
        $query = mysqli_query($conn, "SELECT * FROM data_peminjam WHERE id='$_GET[kd]'");
        $data  = mysqli_fetch_array($query);
        ?>
        <div class="panel-body">
            <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-peminjam.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Pinjam</label>
                    <div class="col-sm-8">
                        <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" value="<?=$data['id'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-8">
                        <input name="kdBuku" type="text" id="kdBuku" class="form-control" autocomplete="off" placeholder="Kode Buku" required="" value="<?=$data['id_buku_perpus'];?>" readonly="readonly"  />
                        <table class="table">
                            <?php
                            $idBook = $data['id_buku_perpus'];
                            $queryBuku = mysqli_query($conn, "SELECT * FROM data_buku_perpus WHERE id='$idBook'");
                            $dataBuku  = mysqli_fetch_array($queryBuku);
                            ?>
                            <th>Judul Buku</th><th>Pengarang</th><th>Tahun Terbit</th><th>Penerbit</th><th>Keterangan</th>
                            <tr>
                                <td><?=$dataBuku['judul'];?></td><td><?=$dataBuku['pengarang'];?></td><td><?=$dataBuku['tahun_terbit'];?></td><td><?=$dataBuku['penerbit'];?></td><td><?=$dataBuku['keterangan'];?></td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Kode Anggota</label>
                    <div class="col-sm-8">
                        <input name="kdAnggota" type="text" id="kdAnggota" class="form-control" autocomplete="off" placeholder="Kode Anggota" required="" value="<?=$data['id_anggota'];?>" readonly="readonly"  />
                        <table class="table">
                            <?php
                            $idAnngota = $data['id_anggota'];
                            $queryAnggota = mysqli_query($conn, "SELECT * FROM data_anggota WHERE id='$idAnngota'");
                            $dataAnggota  = mysqli_fetch_array($queryAnggota);
                            ?>
                            <th>Foto</th><th>Nama</th><th>Email</th><th>Kelas</th><th>Alamat</th>
                            <tr>
                                <td><img src="<?=$dataAnggota['foto'];?>" height='100px'></td><td><?=$dataAnggota['nama'];?></td><td><?=$dataAnggota['no_induk'];?></td><td><?=$dataAnggota['kelas'];?></td><td><?=$dataAnggota['alamat'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                    <div class="col-sm-3">
                        <input name="tgl_pinjam" type="date" id="tgl_pinjam" class="form-control" autocomplete="off" value="<?=$data['tgl_pinjam'];?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Batas Pengembalian</label>
                    <div class="col-sm-3">

                        <input name="tgl_pengembalian" type="date" id="tgl_pengembalian" class="form-control" autocomplete="off" value="<?=$data['tgl_pengembalian'];?>" readonly="readonly" />
                    </div>
                </div>
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
                    $denda = '0';
                 }else{
                    $denda = $hari * 500;
                 }

                }else{
                    $denda = $data['denda'];
                }
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Denda</label>
                    <div class="col-sm-3">
                        <input name="denda" type="text" class="form-control" autocomplete="off" value="<?=format_rupiah($denda);?>" readonly="readonly" />
                        <input type="hidden" name="denda" id="denda" value="<?=$denda;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Status Pengembalian</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="status" id="status" required>
                            <option value="1" <?php if ($data['status']=='1') {echo 'selected';} ?>> Sudah Dikembalikan</option>
                            <option value="0" <?php if ($data['status']=='0') {echo 'selected';} ?>> Masih Dipinjam</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali</label>
                    <div class="col-sm-3">
                        <input name="tgl_kembali" type="date" id="tgl_kembali" class="form-control" autocomplete="off" value="<?=$data['tgl_kembali'];?>" />
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" value="Update" class="btn btn-sm btn-primary" />&nbsp;
                        <a href="peminjam.php" class="btn btn-sm btn-danger"> Batal</a>
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