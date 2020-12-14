<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
header("content-type: application/json; charset=utf-8");

if($_FILES['file']['size'] > 0) {
    $path = "ruang_doa/".$_FILES['file']['name'];
    $tmpname1 = $_FILES['file']['tmp_name'];
    $ptname1 = $_FILES['file']['name'];
    if(move_uploaded_file($tmpname1, $path)){
        echo 'berhasil';
    } else {
        echo 'ini gagal';
    }

    echo $_FILES['file']['tmp_name'];
} else {
    echo 'gagal';
}

?>