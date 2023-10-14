<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan | min16jakarta.sch.id</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Perpustakaan Berbasis Web">
    <meta name="keywords" content="Perpustakaan, perpus, online, website">
    <meta name="perpustakaanku" content="PerpustakaanKU" />
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var isoDateString = new Date();
            var gmt = isoDateString.toLocaleString('id-ID', { timeZone: 'asia/jakarta' })

            var tanggal = gmt.split(" ");
            var tgl = tanggal[0].split('/');
            var d = tgl[0];
            var m = tgl[1];
            var y = tgl[2];
            var jam = tanggal[1].split('.');


            tgl_now = d+"/"+m+"/"+y;
            jam_now = jam[0] + ":" + jam[1] + ":" + jam[2];

            setTimeout("waktu()", 1000);
            document.getElementById("output").innerHTML = jam_now;
            document.getElementById("jam_kunjung").value = jam_now;

            document.getElementById("tgl_kunjung").value = tgl_now;
            
            // console.log(tanggal[1]);
        }
    </script>
    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;

        var popupWindow = null;

        function centeredPopup(url, winName, w, h, scroll) {
            LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
            TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
            settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
            popupWindow = window.open(url, winName, settings)
        }
    </script>

    <style type="text/css">

    </style>
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.html" class="logo">
            Perpustakaan
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="messages-menu">
                        <table width="1000">
                            <tr>
                                <td width="200">
                                    <div class="Tanggal">
                                        <h4>
                                            <script language="JavaScript">
                                                document.write(tanggallengkap);
                                            </script>
                                    </div>
                                    </h4>
                                </td>
                                <td align="left" width="30"> - </td>
                                <td align="left" width="620">
                                    <h4>
                                        <div id="output" class="jam"></div>
                                    </h4>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li class="dropdown messages-menu">
                        <a href="#" data-toggle="modal" data-target="#contact">
                            <i class="fa fa-envelope"></i>
                            <!--<span class="label label-success">4</span>-->
                        </a>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="login.html" data-placement="bottom" data-toggle="tooltip" title="Login">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->

        <aside>

            <!-- Main content -->
            <section class="content">

                <!-- Main row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <!--<marquee behavior="alternate" direction="left" onmouseover="this.stop();" onmouseout="this.start();">-->
                            <b>Selamat Datang di PerpustakaanKU, Untuk Login silahkan klik Icon User atau klik <a href="login.html">disini</a></b>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <section class="panel">
                            <header class="panel-heading">
                                <b>Data Pengunjung Hari Ini</b>
                            </header>
                            <div class="panel-body table-responsive">
                                <?php
                                $tanggal = date("Y/m/d");
                                $query1 = "select * from pengunjung where tgl_kunjung='$tanggal' order by jam_kunjung DESC";
                                $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Jam Berkunjung </th>
                                            <th>Keperluan</th>
                                        </tr>
                                    </thead>

                                    <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['tgl_kunjung']; ?></td>
                                                <td><?php echo $data['jam_kunjung']; ?></td>
                                                <td><?php echo $data['perlu1']; ?></td>
                                            <?php
                                        }
                                            ?>
                                        </tr></tbody>

                                </table>
                                <hr />
                                <?php $tampil = mysqli_query($conn, "select * from pengunjung where tgl_kunjung='$tanggal'");
                                $user = mysqli_num_rows($tampil);
                                ?>
                                <center>
                                    <h4>Jumlah Pengunjung Hari Ini : <?php echo "$user"; ?> Orang </h4>
                                </center>
                            </div>
                        </section>


                    </div>
                    <!--end col-6 -->
                    <div class="col-md-4">
                        <section class="panel">
                            <header class="panel-heading">
                                <b>Buku Pengunjung</b>
                            </header>
                            <div class="panel-body">
                                <div class="twt-area">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-pengunjung.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">No </label>
                                            <div class="col-sm-10">
                                                <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Anda" required />
                                                <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Jenis kelamin</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="jk" id="jk">
                                                    <option> -- Pilih Salah Satu --</option>
                                                    <option value="L"> Laki - Laki</option>
                                                    <option value="P"> Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Usia</label>
                                            <div class="col-sm-6">
                                                <input name="kelas" type="text" id="kelas" class="form-control" placeholder="Usia Anda" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Perlu</label>
                                            <div class="col-sm-10">
                                                <input name="perlu1" type="text" id="perlu1" class="form-control" placeholder="Keperluan" required />
                                                <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Cari?</label>
                                            <div class="col-sm-10">
                                                <input name="cari" type="text" id="cari" class="form-control" placeholder="Apa yang anda cari.?" required />
                                                <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Saran</label>
                                            <div class="col-sm-10">
                                                <textarea rows="4" name="saran" id="saran" class="form-control" placeholder="Saran Anda untuk PerpustakaanKU" cols="25"></textarea>
                                                <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input name="tgl_kunjung" type="text" class="form-control" id="" value="<?php echo "" . date("Y/m/d") . ""; ?>" readonly="readonly" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                                            <div class="col-sm-10">
                                                <input name="jam_kunjung" type="text" class="form-control" id="jam_kunjung" value="<?php echo "" . date("H:i:s") . "" ?>" readonly="readonly" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-8">
                                                <input type="submit" value="Simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
                                                <a href="#" class="btn btn-sm btn-danger">Batal </a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </section>

            <!-- Data Total Pengunjung -->
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        <b> Data Akumulasi Pengunjung</b>
                    </header>
                    <div class="panel-body table-responsive">
                        <?php
                        $query = "select * from pengunjung order by id desc limit 10";
                        $tampil = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Tanggal</th>
                                    <th>Jam Berkunjung </th>
                                    <th>Keperluan</th>
                                    <th>Buku Yang di Cari</th>
                                </tr>
                            </thead>

                            <?php while ($data1 = mysqli_fetch_array($tampil)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $data1['nama']; ?></td>
                                        <td><?php echo $data1['jk']; ?></td>
                                        <td><?php echo $data1['kelas']; ?></td>
                                        <td><?php 
                                        echo $data1['tgl_kunjung'];
                                        // $tgl_ = date_create($data1['tgl_kunjung']);
                                        // echo $tgl_kunjung = date_format($tgl_,"d-M-Y");
                                        ?></td>
                                        <td><?php echo $data1['jam_kunjung']; ?></td>
                                        <td><?php echo $data1['perlu1']; ?></td>
                                        <td><?php echo $data1['cari']; ?></td>
                                    <?php
                                }
                                    ?>

                        </table>
                        <hr />
                        <?php $tampil1 = mysqli_query($conn, "select * from pengunjung order by id");
                        $user1 = mysqli_num_rows($tampil1);
                        ?>
                        <center>
                            <h4>Jumlah Total Pengunjung : <?php echo "$user1"; ?> Orang </h4>
                        </center>
                    </div>
                </section>


            </div>
    </div>
    <!-- row end -->
    <!-- /.content -->
    <div class="footer-main">
        Copyright PerpustakaanKU 2021
    </div>
    </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->

    <!-- Modal Dialog Contact -->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">PerpustakaanKU</h4>
                </div>
                <div class="modal-body">
                    <p> PerpustakaanKu adalah salah satu layanan bagi pengguna untuk dapat mengakses berbagai buku bacaan yang dan dilakukan kapan saja dan dari mana saja, dengan menggunakan jaringan internet.</p>
                    <p> PerpustakaanKu memiliki koleksi buku dalam bentuk format digital dan bisa diakses dengan komputer. koleksi bacaan dari PerpustakaanKu dapat diakses dengan cepat dan mudah lewat jaringan komputer.</p>
                    <p> PerpustakaanKU bebasis website yang responsif, untuk info, saran, maupun kritik bisa menghubungi kami :</p>
                    <table>
                        <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td><a href="sisteminformasi494@gmail.com">PerpustakaanKU@gmail.com</a></td>
                        </tr>
                        <br />
                        <tr>
                            <td>Blog</td>
                            <td>:</td>
                            <td><a href="#" target="_blank">www.PerpustakaanKU.com</a></td>
                        </tr>
                        <br />
                        <tr>
                            <td>Website</td>
                            <td>:</td>
                            <td><a href="#" target="_blank">www.PerpustakaanKU.com</a></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end dialog modal -->


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="js/plugins/chart.js" type="text/javascript"></script>

    <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
    <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="js/Director/dashboard.js" type="text/javascript"></script>

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