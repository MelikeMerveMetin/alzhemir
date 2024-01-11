<?php

include "baglanti.php";
$id = $_GET["id"];
$sorgu = $conn->prepare("SELECT * FROM aile_uyeleri WHERE id=:id");
 $sorgu->execute([ "id" => $_GET["id"], ]); 
 $satir = $sorgu->fetch(PDO::FETCH_ASSOC); ?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>GÜNCELLE</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 log">
                    <form action="edit.php" class="mt-5" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="inputGroup-sizing-default">Aile Üyesi Adı</span>
                            <input type="text" name="uye_adi" value="<?php echo $satir["uye_adi"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>

                        <div class="input-group mb-4">
                            <input class="form-control" type="file" name="uye_resim" action="img/*" id="formFile" />
                            <?php
                            if($satir["uye_resim"]){?>
                            <a class="btn btn-success" href='<?php echo $satir["uye_resim"];?>'>indir</a>

                            <?php  } ?>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $satir["id"]; ?>">

                        <a href="product.php" class="btn btn-danger">Geri</a>
                        <button class="btn btn-success" type="submit">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    --></body>
</html>
