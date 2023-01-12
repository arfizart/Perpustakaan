<?php
session_start();

$id = $_GET['id'];
$ses_user = $_SESSION['username'];



if (empty($_SESSION['username'])) {

    $login_redirect_url = "index.php?menu=login&next=$id"; 

    echo "<script>alert('Anda harus login terlebih dahulu'); window.location = '$login_redirect_url'</script>";

}else if(empty($id)) {

    echo "<script>alert('Buku tidak tersedia!'); window.location = 'index.php'</script>";

}else {
    include "conn.php";

    $pbook = "SELECT * FROM data_buku WHERE id='$id'";
    $pbookdata = mysqli_query($conn, $pbook) or die(mysqli_error($conn));
    while ($pbook_data = mysqli_fetch_array($pbookdata)) {
        // $filebook = $pbook_data['link_buku'].'#toolbar=0&navpanes=0';

        $filebook = $pbook_data['link_buku'];
        $namebook = $pbook_data['judul'];
    }

    $timeout = 60; // Set timeout minutes
    $logout_redirect_url = "index.php?menu=login&next=$id"; // Set logout URL

    $timeout = $timeout * 60; // Converts minutes to seconds
    if (isset($_SESSION['start_time'])) {
        $elapsed_time = time() - $_SESSION['start_time'];
        if ($elapsed_time >= $timeout) {
            session_destroy();
            echo "<script>alert('Sesi Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
        }
    }
    $_SESSION['start_time'] = time();

    

    // Header content type
    // header('Content-type: application/pdf');
      
    // header('Content-Disposition: inline; filename="' . $namebook . '"');
      
    // header('Content-Transfer-Encoding: binary');
      
    // header('Accept-Ranges: bytes');
      
    // // Read the file
    // @readfile($filebook);
    echo "<head><title>$namebook</title>
         <link rel='icon' type='icon/ico' href='favicon.ico'>


         </head>";
    echo "<body style='padding:0; margin:0;' oncontextmenu='return false;'>";
    // echo "<embed src='$filebook' height='100%' width='100%'>";

?>
<div id="pdf">
    <object id='file' width="100%" height="100%" type="application/pdf" data="<?=$filebook?>#toolbar=0&navpanes=0" id="pdf_content" style="pointer-events: auto;">
        <p>Book cannot be displayed.</p>
    </object>
</div>

<?php
    echo "</body>";

}
?>
