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
  if($_GET){
$id=$_GET["id"];
?>

<div class="container">
            <div class="row mx-auto ">
                <div class="col-md-5 mx-auto text-center log">
                    <form action="kullanici_guncelle.php" class="mt-4" method="post" enctype="multipart/form-data">
                  
                  
              
                <div class="col-md-12 table-light border-bottom"><h4>Bilgi Güncelleme</h4></div>
                <?php
                    $rows = $conn->query("SELECT * FROM kullanicilar WHERE id=$id"); 
                    foreach ($rows as $satir){ ?>
            
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Email Adresiniz</span>
                                <input type="email" name="email" value="<?php echo $satir["email"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Adınız</span>
                                <input type="text" name="kullanici_adi" value="<?php echo $satir["kullanici_adi"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Soyadınız</span>
                                <input type="text" name="kullanici_soyadi" value="<?php echo $satir["kullanici_soyadi"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Eski Şifreniz</span>
                                <input type="password" name="eski_sifre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Yeni Şifreniz</span>
                                <input type="password" name="yeni1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Yeni Şifreniz Tekrar</span>
                                <input type="password" name="yeni2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <input type="hidden" name="id" value="<?php echo $satir["id"]; ?>">
                   
                    <button type="submit" class="btn btn-success mt-3">Bilgilerimi Güncelle</button>
<?php }?>
                </form>
            </div>
        <?php }

if ($_POST) {
    $email = $_POST["email"];
    $kullanici_adi = $_POST["kullanici_adi"];
    $kullanici_soyadi = $_POST["kullanici_soyadi"];
    $eski_sifre = $_POST["eski_sifre"];
    $yeni1 = $_POST["yeni1"];
    $yeni2 = $_POST["yeni2"];
    $id = $_POST["id"];

    if ($eski_sifre == "" || $yeni1 == "" || $yeni2 == "") {
        echo "<script type='text/javascript'>alert('BİLGİLER BOŞ OLAMAZ');
        window.location.href='kullanici_guncelle.php?id=$id';</script>";
    } else {
        $eskisifreson = md5($eski_sifre);

        $kontrol = $conn->prepare("SELECT * FROM kullanicilar where parola='$eskisifreson'");
        $kontrol->execute();
        $say = $kontrol->rowCount();

        if ($say == 0) {
            echo "<script type='text/javascript'>alert('ESKİ ŞİFRE HATALI');
        window.location.href='kullanici_guncelle.php?id=$id';</script>";
        } elseif ($yeni1 != $yeni2) {
            echo "<script type='text/javascript'>alert('YENİ ŞİFRELER UYUŞMUYOR');
            window.location.href='kullanici_guncelle.php?id=$id';</script>";
        } else {
            $yenisifreson = md5($yeni1);

            $guncelle = $conn->prepare("UPDATE kullanicilar SET
            
            email=:email,
            kullanici_adi=:kullanici_adi,
            kullanici_soyadi=:kullanici_soyadi,
            parola=:parola
             WHERE id=:id
            ");

            $sonuc = $guncelle->execute([
                "email" => $email,

                "kullanici_adi" => $kullanici_adi,
                "kullanici_soyadi" => $kullanici_soyadi,
                "parola" => $yenisifreson,
                "id" => $id,
            ]);

            header('Refresh:2; url=anasayfa.php');
        }

            ?>
            
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
            <?php if($sonuc){ ?>
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Güncelleme İşlemi Başarılı',
              showConfirmButton: false,
              timer: 1950
            })
            </script>
       <?php } 
     
    }}
   ?>
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