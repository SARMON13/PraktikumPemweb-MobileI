<?php
$con = mysqli_connect("localhost","root","","prak_pemweb");

if ( !$con ){
    echo"gagal";
} else {
    echo"berhasil";
}
?>