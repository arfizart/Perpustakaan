<?php 
    $base = basename($_SERVER['REQUEST_URI']);
?>
<ul class="sidebar-menu">
    <li class="<?php if($base == 'index.php'){ echo 'active'; } ?>">
        <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview <?php if($base == 'anggota.php' OR $base == 'input-anggota.php'){ echo 'active'; } ?>">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Data Anggota</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="anggota.php"><i class="fa fa-angle-double-right"></i> Data Anggota</a></li>
            <li><a href="input-anggota.php"><i class="fa fa-angle-double-right"></i> Tambah Anggota</a></li>
        </ul>
    </li>
    <li class="treeview <?php if($base == 'peminjam.php' OR $base == 'input-peminjam.php' OR $base == 'buku-perpus.php' OR $base == 'input-buku-perpus.php'  ){ echo 'active'; } ?>">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Peminjaman Buku</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="peminjam.php"><i class="fa fa-angle-double-right"></i> Data Peminjaman</a></li>
            <li><a href="input-peminjam.php"><i class="fa fa-angle-double-right"></i> Tambah Peminjaman</a></li>
            <li><a href="buku-perpus.php"><i class="fa fa-angle-double-right"></i> Data Buku Perpus</a></li>
            <li><a href="input-buku-perpus.php"><i class="fa fa-angle-double-right"></i> Tambah Buku Perpus</a></li>
        </ul>
    </li>
    <li class="treeview <?php if($base == 'buku.php' OR $base == 'input-buku.php'){ echo 'active'; } ?>">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Data Buku</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="buku.php"><i class="fa fa-angle-double-right"></i> Data Buku</a></li>
            <li><a href="input-buku.php"><i class="fa fa-angle-double-right"></i> Tambah Buku</a></li>
        </ul>
    </li>
    <li class="treeview <?php if($base == 'admin.php' OR $base == 'input-admin.php'){ echo 'active'; } ?>">
        <a href="#">
            <i class="fa fa-lock"></i>
            <span>Data Admin</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-angle-double-right"></i> Data Admin</a></li>
            <li><a href="input-admin.php"><i class="fa fa-angle-double-right"></i> Tambah Admin</a></li>
        </ul>
    </li>
    <li class="treeview <?php if($base == 'laporan-anggota.php' OR $base == 'laporan-buku.php'){ echo 'active'; } ?>">
        <a href="#">
            <i class="fa fa-file"></i>
            <span>laporan</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="laporan-anggota.php" target="_blank"><i class="fa fa-angle-double-right"></i> Laporan Anggota</a></li>
            <li><a href="laporan-buku.php" target="_blank"><i class="fa fa-angle-double-right"></i> Laporan Buku</a></li>
        </ul>
    </li>
    <li class="<?php if($base == 'backup.php'){ echo 'active'; } ?>">
        <a href="backup.php">
            <i class="fa fa-check-square"></i> <span>Backup Data</span>
        </a>
    </li>
    <li class="<?php if($base == 'tentang.php'){ echo 'active'; } ?>">
        <a href="tentang.php">
            <i class="fa fa-envelope"></i> <span>Tentang Perpustakaan</span>
        </a>
    </li>
    <li>
        <a href="../index.php">
            <i class="fa fa-globe"></i> <span>Kembali Ke Web</span>
        </a>
    </li>


</ul>