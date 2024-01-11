<!DOCTYPE html>
<html lang="tr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Hello, world!</title>
    </head>
    <body>
        <?php

include "baglanti.php";

if ($_GET) {
    $gelen = $_GET['sil'];       
    $kullanici_id = $_GET['kullanici_id'];        
    $delete = $conn->prepare("DELETE FROM ozel_test WHERE id=$gelen");
    $sonuc=$delete->execute();
}
header("Refresh:2; url=ozel_soru.php?id=$kullanici_id");
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    <?php if($sonuc){ ?>
    Swal.fire({
      position: 'top-center',
      icon: 'success',
      title: 'Silme İşlemi Başarılı',
      showConfirmButton: false,
      timer: 1950
    })
    </script>
          
     <?php }  ?>    
                
   

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>
</html>
