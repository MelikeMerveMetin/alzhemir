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
 include "baglanti.php";
if($_GET){
    $secim=$_GET["secim"];
    switch ($secim):
        case "test_ekle":
            $test_no = $_POST["test_no"];
            $soru_cevap = $_POST["soru_cevap"];
            $dosya_adi = $_FILES["soru_resim"]["name"];
            $yeni_ad = "resimler/" . $dosya_adi;
            if (move_uploaded_file($_FILES["soru_resim"]["tmp_name"], $yeni_ad)) {
                $sorgu = $conn->query("INSERT INTO genel_test_sorulari (genel_resim,dogru,test_adi) 
            values('$yeni_ad','$soru_cevap','$test_no')");
                if (isset($sorgu)) {
                    header('Refresh:2; url=yonetim.php');
                }
            }
            break;
        case "test_soru":
           
            $test_soru=$_POST["test_soru"];
            
           ?>
            <div class="row">
                <h3 class="text-center mt-3" style="color:red;">GENEL TEST <?php echo $test_soru?></h3>
            <div class="col-md-12">
                
                <table class="table table-hover table-striped" style="text-align: center;">
                    <thead>
                         <th>Soru Numarası</th>
                         <th>Resim</th>
                         <th>Cevap</th>
                        <th>İşlemler</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                           $rows = $conn->query("SELECT * FROM genel_test_sorulari WHERE test_adi=$test_soru"); 
                           foreach ($rows as $row) { $i++;?>
                        <tr>
                        <td style=" padding: 70px 0; text-align: center;"><?php echo $i;?></td>
                           
                        <td><img src="<?php echo $row["genel_resim"]?>" alt="" width=200px height=150px></td>
                           
                            <td style=" padding: 70px 0; text-align: center;"><?php echo $row["dogru"]?></td>
                              <td style=" padding: 70px 0; text-align: center;">
                                <a href='soru_guncelle.php?id=<?php echo $row["id"]?>&test_no=<?php echo $test_soru;?>' class="btn btn-success">Güncelle</a>
                                <a onClick="sil(<?php echo $row['id']?>)" class="btn btn-danger">Soruyu Sil</a>
                               
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table><div class="col-md-12">
                <h4 class="mt-3" style="color:red;">TOPLAM SORU SAYISI: <?php echo $i?></h4>
            </div>
            </div>
        </div>
  <?php  break;



case "bilgi_guncelleme":
           
    $email=$_POST["email"];       
    $kullanici_adi=$_POST["kullanici_adi"];
    $kullanici_soyadi=$_POST["kullanici_soyadi"];
    $eski_sifre=$_POST["eski_sifre"];
    $yeni1=$_POST["yeni1"];
    $yeni2=$_POST["yeni2"];
    $id=$_POST["id"];

    if ($eski_sifre == "" || $yeni1 == "" || $yeni2 == "") {
        echo "<script type='text/javascript'>alert('BİLGİLER BOŞ OLAMAZ');
        window.location.href='yonetim.php?islem=bilgi_guncelleme';</script>";
    }
    else{
        $eskisifreson=md5($eski_sifre);
        $kontrol = $conn->prepare("SELECT * FROM kullanicilar where parola='$eskisifreson'");
        $kontrol->execute();
        $say = $kontrol->rowCount();
        
        if($say == 0) {
            echo "<script type='text/javascript'>alert('ESKİ ŞİFRE HATALI');
        window.location.href='yonetim.php?islem=bilgi_guncelleme';</script>";}
        elseif($yeni1 != $yeni2){
            echo "<script type='text/javascript'>alert('YENİ ŞİFRELER UYUŞMUYOR');
            window.location.href='yonetim.php?islem=bilgi_guncelleme';</script>";
        }
        else{
            $yenisifreson=md5($yeni1);
            $guncelle = $conn->prepare("UPDATE kullanicilar SET
           
            email=:email,
            kullanici_adi=:kullanici_adi,
            kullanici_soyadi=:kullanici_soyadi,
           
            parola=:parola
             WHERE id=:id
            ");
            
       $sonuc=$guncelle->execute([
       "email" => $email,
       
       "kullanici_adi" => $kullanici_adi,
       "kullanici_soyadi"=> $kullanici_soyadi,
       "parola"=> $yenisifreson,
       "id"=> $id,

   ]);

            
            
            header('Refresh:2; url=yonetim.php?islem=bilgi_guncelleme');}


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
     
    }
   ?>
   
<?php  break;



case "yonetici_ekle":
           
    $email=$_POST["email"];       
    $kullanici_adi=$_POST["kullanici_adi"];
    $kullanici_soyadi=$_POST["kullanici_soyadi"];
    $sifre=md5($_POST["sifre"]);
    $yonetim=1;
    
   
      $sorgu = $conn->prepare("INSERT INTO kullanicilar SET 
    
      kullanici_adi=:kullanici_adi,
      kullanici_soyadi=:kullanici_soyadi,
      email=:email,
      parola=:sifre,
      yonetim=:yonetim
      ") ;

$sonuc=$sorgu->execute(array(
  
  "kullanici_adi"=>$kullanici_adi,
  "kullanici_soyadi"=>$kullanici_soyadi,
  "email"=>$email,
  "sifre"=>$sifre,
  "yonetim"=>$yonetim,
  
  
));    

    header('Refresh:2; url=yonetim.php?islem=yonetici_ekle');


?>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
<?php if($sonuc){?>
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Yönetici Ekleme İşlemi Başarılı',
  showConfirmButton: false,
  timer: 1950
})
<?php } ?>
</script>
    
 <?php
  break;
  case "yonetici_sil":
           
    $id=$_GET["id"];       
    $delete = $conn->prepare("DELETE FROM kullanicilar WHERE id=$id");
    $sonuc=$delete->execute();

header('Refresh:2; url=yonetim.php?islem=yonetici_sil');
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
          
     <?php }

     
    
  
   
  break;
  endswitch;
}




?>
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
                window.location.href = "soru_sil.php?sil=" + id;
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









