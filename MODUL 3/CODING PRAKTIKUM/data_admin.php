<?php include "header.php"; ?>

    <!-- Begin page content -->
    <div class="container">
    <?php
    $view = isset($_GET['view']) ? $_GET['view'] : null;
    switch($view) {
        default:
?>
   <div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title"> DATA_ADMINISTRATOR</h3>
    </div>
    <div class="panel-body">
    <a href="data_admin.php?view=tambah" class="btn btn-primary" style="margin-bottom: 10px">Tambah Data</a>
  <table class="table table-bordered table-striped"> 
  <thead>
  <tr>
  <th>NO</th>
  <th>Username</th>
  <th>Nama_Lengkap</th>
  <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $no= 1;
  $sqladmin= mysqli_query($konek, "SELECT * FROM admin ORDER BY username ASC");
  while($data = mysqli_fetch_array($sqladmin)){
      echo" <tr>
        <td class ='text-center'>$no</td>
        <td>$data[username]</td>
        <td>$data[Nama_Lengkap]</td>
        <td class ='text-center'>
        <a href='data_admin.php?view=edit&id=$data[id_admin]' class='btn btn-warning btn-sm'>Edit</a>
        <a href='aksi_admin.php?act=delete&id=$data[id_admin]' class ='btn btn-danger btn-sm'>Hapus</a>
        </td>
      </tr>";
      $no++;
  }
  ?>
  </tbody>
  </table>
    </div>
    </div>
<?php
        break;
        case "tambah":
?>
   <div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title"> TAMBAH DATA ADMINISTRATOR</h3>
    </div>
    <div class="panel-body">
    <form  class="form-horizontal" method="POST" action="aksi_admin.php?act=insert">
    <div class="form-group">
    <label class="col-md-2">Username</label>
    <div class="col-md-5">
    <input type="text" name="username" class="form-control" placeholder="username" required>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2">password</label>
    <div class="col-md-5">
    <input type="text" name="password" class="form-control" placeholder="password" required>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2">Nama_Lengkap</label>
    <div class="col-md-5">
    <input type="text" name="Nama_Lengkap" class="form-control" placeholder="Nama_Lengkap" required>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2"></label>
    <div class="col-md-5">
    <input type="submit" name="submit" class="btn btn-primary" value="simpan">
    <a href="data_admin.php" class="btn btn-danger">Batal</a>
    </div>
    </div>
    
    </form>
    </div>
    </div>

<?php
        break;
        case "edit":
         $sqlEdit = mysqli_query($konek, "SELECT * FROM admin WHERE id_admin='$_GET[id]'");
         $e = mysqli_fetch_array($sqlEdit);   
?>
   <div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title"> EDIT DATA ADMINISTRATOR</h3>
    </div>
    <div class="panel-body">

    <form  class="form-horizontal" method="POST" action="aksi_admin.php?act=update">
    <input type="hidden" name="id_admin" value="<?php echo $e['id_admin']; ?>">
    <div class="form-group">
    <label class="col-md-2">Username</label>
    <div class="col-md-5">
    <input type="text" name="username" class="form-control" value="<?php echo $e['username']; ?>" required>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2">password</label>
    <div class="col-md-5">
    <input type="text" name="password" class="form-control" placeholder="kosongkan jika tidak diganti" required>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2">Nama_Lengkap</label>
    <div class="col-md-5">
    <input type="text" name="Nama_Lengkap" class="form-control" value="<?php echo $e['Nama_Lengkap']; ?>" required>
    </div>
    </div>

    <div class="form-group">
    <label class="col-md-2"></label>
    <div class="col-md-5">
    <input type="submit" name="submit" class="btn btn-primary" value="Update Data">
    <a href="data_admin.php" class="btn btn-danger">Batal</a>
    </div>
    </div>
    
    </form>
   
    </div>
    </div>
<?php
        break;
    }
    ?>
 
    </div>

<?php include "footer.php"; ?>
