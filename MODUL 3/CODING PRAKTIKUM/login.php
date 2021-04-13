<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DBC118099 _ LOGIN APLIKASI PEGAWAI</title>

    <!-- Bootstrap -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body{
        background: url(asset/image/bacground.jpg) no-repeat center fixed;
        background-size: cover;
    }
    .container{
        margin-top: 100px ;
    }
    </style>
  </head>
  <body>
    <div class="container">
    <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> LOGIN APLIKASI PEGAWAI</h3>
    </div>
    <div class="panel-body">
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $p    =md5($pass);

        if($user =="" || $pass==""){
            ?>
            <div class="alert alert-warning"><b>Warning</b> Form anda belum lengkap</div>
            <?php
        } else {
            include"koneksi.php";
            $sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$p'");
            $jml = mysqli_num_rows($sqlLogin);
            $d = mysqli_fetch_array($sqlLogin);

            if($jml > 0){
                session_start();
                $_SESSION['Login']         = TRUE;
                $_SESSION['id']            = $d['id_admin'];
                $_SESSION['username']      = $d['username'];
                $_SESSION['Nama_Lengkap']  = $d['Nama_Lengkap'];

                header('location: ./index.php');

            } else {
                ?>
                <div class="alert alert-danger"><b>ERROR</b> Username dan Password salah</div>
                <?php
            }
        }
        }
    ?>
        <form action="" method="post" role="form">
        <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="username">
        </div>
        <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
        </div>
        </form>
        </div>
    </div>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="asset/js/bootstrap.min.js"></script>
  </body>
</html>