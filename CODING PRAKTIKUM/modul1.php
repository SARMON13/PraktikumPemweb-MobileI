<?php
    $namaku= [
        "Sarmon purba",
        "siswo", 
        "dominikus", 
        "elfrida roulina",
        "mitha devi",
        "sari n simarmata"
    ];
    
    function jumlah_huruf($namaku){
        echo strlen($namaku)."<br>";
    }
    
    function jumlah_kata($namaku){
        echo str_word_count($namaku)."<br>";
    }

    function balikan_kata($namaku){
        echo strrev($namaku)."<br>";
    }

    function hitung_vokal($kalimat) {
        $a = substr_count($kalimat, 'a');
        $i = substr_count($kalimat, 'i');
        $u = substr_count($kalimat, 'u');
        $e = substr_count($kalimat, 'e');
        $o = substr_count($kalimat, 'o');

        $count = ($a+$i+$u+$e+$o);

        return $count;
    }

    function hitung_konsonan($kalimat) {
        $jumlah = strlen($kalimat);
        $a = substr_count($kalimat, 'a');
        $i = substr_count($kalimat, 'i');
        $u = substr_count($kalimat, 'u');
        $e = substr_count($kalimat, 'e');
        $o = substr_count($kalimat, 'o');

        $count = $jumlah - ($a+$i+$u+$e+$o);

        return $count;
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Keluarga</title>
  <h1>Daftar Nama Keluarga</h1>
</head>
<body>
      <table border="1" cellpadding="10" cellspacing="1">
          <thead>
            <tr>
               <th>Nama</th>
              <th>Jumlah Huruf</th>
              <th>Jumlah Kata</th>
              <th>Kebalikan Nama</th>
              <th>Jumlah Huruf Vokal</th>
              <th>Jumlah Konsonan</th>
            </tr>
          </thead>
      
           <?php foreach ($namaku as $nama) :  ?>
      
                    <tr>
                        <td><?php echo $nama."<br>"; ?></td>
                        <td><?= jumlah_huruf($nama)?></td>
                        <td><?= jumlah_kata($nama)."<br>"; ?></td>
                        <td><?= balikan_kata($nama)."<br>"; ?></td>
                        <td><?= hitung_vokal($nama);  ?></td>
                        <td><?= hitung_konsonan($nama);  ?></td>
                    </tr>            
	                  <?php endforeach; ?>        
      
      </table>
</body>
</html>