<?php
    session_start();
    if(!isset($_SESSION['Login'])){
        header('location:login.php');
    }

    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/sticky-footer-navbar/">

    <title>SISTEM APLIKASI PEGAWAI</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <link href="asset/style.css" rel="stylesheet">

  
  </head>
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">APLIKASI PEGAWAI</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./">Home</a></li>
            <li><a href="data_admin.php">Data Admin</a></li>
            <li><a href="data_jabatan.php">Data Jabatan</a></li>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
        </li>
      </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>