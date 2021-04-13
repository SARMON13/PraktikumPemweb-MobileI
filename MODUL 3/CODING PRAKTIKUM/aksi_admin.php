<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['Login'])){
    header('location:login.php');
}

if(isset($_GET['act'])){
    if($_GET['act']=='insert'){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $Nama_Lengkap=$_POST['Nama_Lengkap'];
    
    if($username=='' || $_POST['password']=='' ||$Nama_Lengkap==''){
        echo"form anda belum lengkap";
    }else{
        $simpan=mysqli_query($konek, "INSERT INTO admin(usename,password,Nama_Lengkap) VALUES
        ('$username','$password','$Nama_Lengkap')");
    
    if($simpan){
        header('location: data_admin.php?e=sukses');
    }else{
        header('location: data_admin.php?e=gagal');
    }
}
    }elseif($_GET['act']=='UPDATE'){
        $id_admin=$_POST['id_admin'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $Nama_Lengkap=$_POST['Nama_Lengkap'];

    if($username=='' || $Nama_Lengkap==''){
        echo"form anda belum lengkap";
    }else{
        if($_POST['password']==''){
        $UPDATE=mysqli_query($konek, "UPDATE admin SET username='$username',
                                                        Nama_Lengkap='$Nama_Lengkap'
                                                        WHERE id_admin='$id_admin'");          
        }else{
            $UPDATE=mysqli_query($konek, "UPDATE admin SET username='$username',
                                                        password='$password',
                                                        Nama_Lengkap='$Nama_Lengkap'
                                                        WHERE id_admin='$id_admin'"); 
        }
        if($UPDATE){
            header('location: data_admin.php?e=sukses');
        }else{
            header('location: data_admin.php?e=gagal');
        }

    }
}elseif($_GET['act']=='delete'){
    $hapus=mysqli_query($konek, "DELETE FROM admin where id_admin='$_GET[id]' AND id_admin!='1'");

    if($hapus){
        header('location: data_admin.php?e=sukses');
    }else{
        header('location: data_admin.php?e=gagal');
    }

}else{
    header('location:data_admin.php');
}

}else{
    header('location:data_admin.php');
}
?>