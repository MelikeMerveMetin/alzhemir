<!DOCTYPE html>
<html lang="tr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>Aile Üyesi Ekle</title>
    </head>
    <body>

    <?php
 session_start();
        $kullanici_id=$_SESSION['kullanici_id'];
        if ($_POST) {
        include "baglanti.php";
        $uye_adi = $_POST["uye_adi"];
        //$kullanici_id = $_POST["kullanici_id"];
        

    $dosya_adi = $_FILES["uye_resim"]["name"];
    $yeni_ad = "resimler/" . $dosya_adi;
    if (move_uploaded_file($_FILES["uye_resim"]["tmp_name"], $yeni_ad)) {
      
      $sorgu = $conn->prepare("INSERT INTO aile_uyeleri SET 
    
      uye_adi=:uye_adi,
      kullanici_id=:kullanici_id,
      uye_resim=:uye_resim") ;

$sonuc=$sorgu->execute(array(
  
  "uye_adi"=>$uye_adi,
  "uye_resim"=>$yeni_ad,
  "kullanici_id"=>$kullanici_id,
  
  
));    
        

    } else {
        echo 'Dosya Yüklenemedi!';
    }

    header('Refresh:2; url=uyeler.php');
}

?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
<?php if($sonuc){?>
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Üye Ekleme İşlemi Başarılı',
  showConfirmButton: false,
  timer: 1950
})
<?php } ?>
</script>

        <?php
 include("baglanti.php");?>
        <div class="container">
            <div class="row">
                <div class="col-md-10 log">
                    <form action="uye_ekle.php" class="mt-5" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Aile Üyesi Adı</span>
                            <input type="text" class="form-control" name="uye_adi" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                       
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Aile Üyesi Resmi</span>
                            <input class="form-control" type="file" name="uye_resim" id="formFile" />
                        </div>

                        <a href="uyeler.php" class="btn btn-danger">Geri</a>
                        <button type="submit" class="btn btn-success">Üye Ekle</button>
                        <input type="hidden" name="id" value=<?php echo $_SESSION['kullanici_id'];?>>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    --></body>
</html>
