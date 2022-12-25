<?php
     require 'koneksi.php';
    $songs=query(" SELECT * FROM songs");

    //tombol cari ditekan
    //cari pada line 7 adalah name dari button
    if(isset($_POST["cari"]))
    {
        // cari line 10 adalah function cari dan keyword adalah name dari inputan text 
        $songs=cari($_POST["keyword"]);
    }

    function cari($keyword)
{
    $sql="SELECT * FROM songs
          WHERE
          judul_lagu LIKE '%$keyword%' OR
          album LIKE '%$keyword%' OR
          tahun_rilis LIKE '%$keyword%'

          ";

        // kembalikan ke function query dengan parameter $sql
      return query($sql);

     // cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Lagu</title>
</head>
<body>
<h1 class="text-center"> Daftar Lagu</h1><br><br>

<form action="" method="post">
    <!-- autofocus atribut pada html 5 yang digunakan untuk memberikan tanda pertama kali ke inputan pada saat page di reload-->
    <!-- placeholder atribut yang digunakan untuk menampilkan tulisan pada textbox -->
    <!-- autocomplete digunakan agar history pencarian dari user lain tidak ada -->
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari"> cari </button>
</form>
<br>

<table class="table table-bordered table-striped">
<tr>
<th>NO</th>
<th>JUDUL LAGU</th>
<th>ALBUM</th>
<th>TAHUN RILIS</th>
<th>Action</th>
</tr>
<?php $i=1 ?>

<?php foreach ($songs as $row):?>
<tr>
    <td><?=  $i; ?></td>
    <td><?= $row["judul_lagu"]; ?></td>
    <td><?= $row["album"]; ?></td>
    <td><?= $row["tahun_rilis"]; ?></td>
    <td>
        <a href="lagu-view.php?id=<?= $row['id']; ?>" class="btn btn-dark">View</a>
    </td>
</tr>
<?php $i++ ?>
<?php endforeach;?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</table>
</body>
</html>

