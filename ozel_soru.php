<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    include("baglanti.php");
    $id=$_GET["id"];?>
  <div class="row">
                <h3 class="text-center mt-3" style="color:red;">ÖZEL TEST</h3>
            <div class="col-md-12">
                
                <table class="table table-hover table-striped" style="text-align: center;">
                    <thead>
                         <th>Soru Numarası</th>
                         <th>Soru</th>
                         <th>A Seçeneği</th>
                         <th>B Seçeneği</th>
                         <th>C Seçeneği</th>
                         <th>D Seçeneği</th>
                         <th>Doğru</th>
                        <th>İşlemler</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                           $rows = $conn->query("SELECT * FROM ozel_test WHERE kullanici_id=$id"); 
                           foreach ($rows as $row) { $i++;?>
                        <tr>
                        <td style=" padding: 70px 0; text-align: center;"><?php echo $i;?></td>
                           
                        
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["soru"]?></td>
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["a"]?></td>
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["b"]?></td>
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["c"]?></td>
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["d"]?></td>
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["dogru"]?></td>
                              <td style=" padding: 70px 0; text-align: center;">
                                <a href='ozel_test_guncelle.php?id=<?php echo $row["id"]?>' class="btn btn-success">Güncelle</a>
                                <a onClick="sil(<?php echo $row['id']?>,<?php echo $id;?>)" class="btn btn-danger">Soruyu Sil</a>
                               
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table><div class="col-md-12">
                <h4 class="mt-3" style="color:red;">TOPLAM SORU SAYISI: <?php echo $i?></h4>
            </div>
            </div>
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function sil(id,kullanici_id) {
        Swal.fire({
            title: "Silmek İstediğinize Emin Misiniz?",
            text: "Bu İşlem Geri Alınamaz!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "SİL",
            cancelButtonText: "İPTAL",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'ozel_soru_sil.php?sil=' +id+ '&kullanici_id=' +kullanici_id;
            }
        });
    }
</script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>