<?php
$conn = mysqli_connect("localhost","root","","ikon_member_db");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}
$result=mysqli_query($conn,"SELECT * FROM members"); 

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Profil View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PROFIL
                            <a href="member.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $member_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM members WHERE id='$member_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $members = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nama</label>
                                        <p class="form-control">
                                            <?=$members['Nama'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Foto Member</label>
                                        <p class="form-control">
                                        <img src="img/<?=$members['Gambar'];?>" alt="" height="100" width="100" srcset="">
                                            
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Deskripsi</label>
                                        <p class="form-control">
                                            <?=$members['profil'];?>
                                        </p>
                                    </div>


                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>