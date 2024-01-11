<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Aile Üyesi Ekle</title>
  </head>
  <body>
  <?php
   include "baglanti.php";
   session_start();
   $id=$_SESSION['kullanici_id'];
    //  echo $id;
    //   echo "  ";
    //   echo $_SESSION['kullanici_adi'];
        
   ?>
      <?php
    include("baglanti.php");
       ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 giris mt-4">
                    <h3 style="text-align: center; color:red">
                        AİLE ÜYELERİ <a href="uye_ekle.php" style="text-decoration:none; color:red; float:right"><i class="bi bi-plus-circle"> ÜYE EKLE</i></a>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-striped" style="text-align: center;">
                        <thead>
                            <th>Üye Numarası</th>
                            <th>Aile Üyesi Adı</th>
                            <th>Üye Resim</th>
                            <th>İşlemler</th>
                        </thead>
                        <tbody>
                            <?php
                            $i=0;
                               $rows = $conn->query("SELECT * FROM kullanicilar INNER JOIN aile_uyeleri ON 
                                                    kullanicilar.id = aile_uyeleri.kullanici_id where aile_uyeleri.kullanici_id='$id'"); 
                               foreach ($rows as $row) { 
                                $i++;?>
                            <tr>
                                <td style=" padding: 70px 0; text-align: center;"><?php echo $i?></td>
                                <td style=" padding: 70px 0; text-align: center;"><?php echo $row["uye_adi"]?></td>
                                <td><img src="<?php echo $row["uye_resim"]?>" alt="" width=200px height=150px></td>
                                <td style=" padding: 70px 0; text-align: center;">
                                    <a href='uye_guncelle.php?id=<?php echo $row["id"]?>' class="btn btn-success">Güncelle</a>
                                    <a onClick="sil(<?php echo $row['id']?>)" class="btn btn-danger">Üyeyi Sil</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-danger" href="anasayfa.php">Anasayfaya Dön</a>
                    <a class="btn btn-danger" href="cikis.php" style="text-decoration: none; float: right;">Çıkış Yap <i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">
            function sil(id) {
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
                        window.location.href = "uyeyi_sil.php?sil=" + id;
                    }
                });
            }
        </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>