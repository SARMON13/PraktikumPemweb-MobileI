<?php include "header.php"; ?>

    <!-- Begin page content -->
    <div class="container">
    <?php
    $view = isset($_GET['view']) ? $_GET['view'] : null;
    switch($view) {
        default:
        ?>
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="title">DATA JABATAN</h3>
                    </div>
                <div class="panel-body">
                    <a href="data_jabatan.php?view=tambah" style="margin-bottom: 15px" class="btn btn-primary">Tambah Data</a>
                    <table class="table table-bordered table-striped">
                    <tr>
                        <th>NO</th>
                        <th>Kode_Jabatan</th>
                        <th>Nama_Jabatan</th>
                        <th>Gaji_Pokok</th>
                        <th>Tunjangan_Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        $sql= mysqli_query($konek, "SELECT * FROM jabatan ORDER BY kode_jabatan ASC");
                        $no=1;

                        while($d=mysqli_fetch_array($sql)){
                            echo "<tr>
                                <td width='40px' align='center'>$no</td>
                                <td>$d[kode_jabatan]</td>
                                <td>$d[nama_jabatan]</td>
                                <td>$d[gaji_pokok]</td>
                                <td>$d[tunjangan]</td>
                                <td width='160px' align='center'>
                                <a class='btn btn-warning btn-sm'
                                href='data_jabatan.pdf?view=edit&id=$d[kode_jabatan]'>edit</a> 
                                
                                <a class='btn btn-warning btn-danger'
                                href='aksi_jabatan.pdf?del=edit&id=$d[kode_jabatan]'>hapus</a>
                                </td>                        
                                </tr>";
                                $no++;
                        }
                                
                            
                    ?>
                    </table>
                </div>                
                </div>
            </div>
        <?php
        break;
        case "tambah":
            $simbol="J";
            $query = mysqli_query($konek, "SELECT max(kode_jabatan) AS last FROM jabatan 
            WHERE kode_jabatan LIKE '$simbol%'");

            $data=mysqli_fetch_array($query);

            $kodeterakhir = $data['last'];
            $nomorterakhir = substr($kodeterakhir,  1,  2);
            $nextnomor = $nomorterakhir + 1;
            $nextkode = $simbol.sprintf('%02', $nextnomor);

            ?>
                <div class="row">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                    <h3 class="title">Tambah Data Jabatan</h3>
                    </div>
                    <div class="panel-body">
                    <form method="post" action="aksi_jabatan.php?act=insert">
                    <table class="table">
                    <tr>
                    <td width="160px"> kode_jabatan</td>
                    <td>
                    <input class="form-control" type="text" name="kode_jabatan" value="<?php echo $nextkode; ?>" >
                    </td>
                  
                    </tr>
                    <tr>
                    <td>Nama_Jabatan</td>
                    <td>
                     <input class="form-control" type="text" name="nama_jabatan" required>   
                    </td>
                    </tr>
                    
                    <tr>
                    <td>gaji_pokok</td>
                    <td>
                        <input class="form-control" type="text" name="gaji_pokok" required>   
                    </td>
                    </tr>
                  
                    <tr>
                    <td>tunjangan</td>
                    <td>
                    <input class="form-control" type="number" name="tunjangan" required>   
                    </td>
                    </tr>
                  
                    <tr>
                    <td></td>
                    <td>
                    <input  type="submit" class="btn btn-primary" value="simpan"> 
                    <a class="btn btn-danger" href="data_jabatan.php">kembali</a> 
                    </td>
                    </tr>
                    </table>
                    </form>
                    </div>
                    </div>
                </div>
            <?php


        break;
        case "edit":
           
        break;
        }
    ?>

    </div>
    <?php include "footer.php"; ?>