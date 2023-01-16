<section id="client-holder" data-aos="fade-up">
	<div class="container" style="padding: 20px;">
        <div class="row">
        <div class="col-6" style="padding-right: 25px;">
            <div class="table-responsive">
                            <header class="panel-heading">
                                <b>Daftar Pengunjung</b>
                            </header>
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
        </div>
        <div class="col-6">
		<section class="panel">
                            <header class="panel-heading">
                                <b>Buku Pengunjung</b>
                            </header>
                            <div class="panel-body">
                                <div class="twt-area">
                                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-pengunjung.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <!-- <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">No </label>
                                            <div class="col-sm-10">
                                                <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Anda" required value="<?php if(isset($_SESSION['fullname'])){ echo $_SESSION['fullname']; }?>" />
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
                                            <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                                            <div class="col-sm-6">
                                                <input name="kelas" type="text" id="kelas" class="form-control" placeholder="Kelas" required />
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
    </div>
</section>