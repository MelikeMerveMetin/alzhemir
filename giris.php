<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>Giriş Yap</title>
        
    </head>

    <body>
    <?php if ($_POST) {
     include "baglanti.php";
     $email = $_POST["email"];
     $parola = md5($_POST["parola"]);

     if ($email == "" ) {
         $message = "<script>
            alert('Email Boş Bırakılamaz!!!')
            setTimeout(function(){
                window.location.href='giris.php';
            },100);
            
            </script>";

         echo $message;
     }  else {
         $kontrol = $conn->prepare("SELECT * FROM kullanicilar where email='$email' and parola='$parola'");
         $kontrol->execute();
         $say = $kontrol->rowCount();
         $kulanici_bilgileri = $kontrol->fetch(PDO::FETCH_ASSOC);

         $kullanici_adi = $kulanici_bilgileri["kullanici_adi"];
         $kullanici_soyadi = $kulanici_bilgileri["kullanici_soyadi"];
         $email = $kulanici_bilgileri["email"];
         $id = $kulanici_bilgileri["id"];
         $yonetim = $kulanici_bilgileri["yonetim"];

         if ($say > 0) {
             session_start();
             $_SESSION['kullanici_mail'] = $email;
             $_SESSION['kullanici_adi'] = $kullanici_adi;
             $_SESSION['kullanici_soyadi'] = $kullanici_soyadi;
             $_SESSION['kullanici_id'] = $id;
             $_SESSION['yonetim'] = $yonetim;
             if($yonetim==1){
               header('Refresh:2; url=yonetim.php');  
             }
             else{
             header('Refresh:2; url=anasayfa.php');}
         } else {
             $message = "<script>
    alert('Kullanıcı Adı veya Parola Hatalı!!!')
    setTimeout(function(){
        window.location.href='giris.php';
    },100);
    </script>";
             echo $message;
         }

     }
 } ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
<?php if ($say > 0) { ?>
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Giriş İşlemi Başarılı',
  showConfirmButton: false,
  timer: 1950
})
<?php } ?>

</script>
  

        <div class="container">
            <div class="row mx-auto">
                <div class="col-md-4 mx-auto text-center log">
                    <form action="giris.php" class="mt-4" method="post" enctype="multipart/form-data">
                    
                        <div class="input-group mb-3 mt-5">
                            <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Email</span>
                            <input type="text" class="form-control" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Parola</span>
                            <input type="password" class="form-control" name="parola" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                      

                        <a href="index.php" class="btn btn-danger">Geri</a>
                        <button type="submit" class="btn btn-success">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>

        



        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    --></body>
</html>
