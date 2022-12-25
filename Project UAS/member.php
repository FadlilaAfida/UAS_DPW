<?php
$conn = mysqli_connect("localhost","root","","ikon_member_db");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}
$result=mysqli_query($conn,"SELECT * FROM members"); 

function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn; 
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;    
    }
    return $rows;
}
?>

<?php
    $members=query(" SELECT * FROM members");

    //tombol cari ditekan
    //cari pada line 7 adalah name dari button
    if(isset($_POST["cari"]))
    {
        // cari line 10 adalah function cari dan keyword adalah name dari inputan text 
        $members=cari($_POST["keyword"]);
    }

    function cari($keyword)
{
    $sql="SELECT * FROM members
          WHERE
          nama LIKE '%$keyword%' OR
          posisi LIKE '%$keyword%' 

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
    <title>Daftar Member</title>
</head>
<body>
<h1 class="text-center"> Daftar Member iKON</h1><br><br>

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
<th>NAMA</th>
<th>POSISI</th>
<th>PROFIL</th>
</tr>
<?php $i=1 ?>

<?php foreach ($members as $row):?>
<tr>
    <td><?=  $i; ?></td>
    <td><?= $row["Nama"]; ?></td>
    <td><?= $row["posisi"]; ?></td>
    <td>
        <a href="member-view.php?id=<?= $row['id']; ?>" class="btn btn-dark">View Profil</a>
    </td>
</tr>
<?php $i++ ?>
<?php endforeach;?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</table>
</body>
</html>
