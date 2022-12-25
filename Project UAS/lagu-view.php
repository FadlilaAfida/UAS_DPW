<?php
require 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Lagu View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LAGU VIEW DETAIL
                            <a href="lagu.php" class="btn btn-dark">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $lagu_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM songs WHERE id='$lagu_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $songs = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Judul Lagu</label>
                                        <p class="form-control">
                                            <?=$songs['judul_lagu'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Album</label>
                                        <p class="form-control">
                                        <img src="img/<?=$songs['Gambar'];?>" alt="" height="100" width="100" srcset="">
                                            
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Deskripsi Lagu</label>
                                        <p class="form-control">
                                            <?=$songs['deskripsi'];?>
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