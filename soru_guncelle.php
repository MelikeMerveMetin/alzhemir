
    
    <!DOCTYPE html>
    <html lang="tr">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
    
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
            <title>SORU_GÜNCELLE</title>
        </head>
        <body>
                              
    <?php
     include "baglanti.php";
     if($_GET){
    $test_soru=$_GET["test_no"];
    $id=$_GET["id"];
     
    $rows = $conn->query("SELECT * FROM genel_test_sorulari WHERE id=$id"); 
    foreach ($rows as $satir){ ?>
            <div class="container">
               
                <div class="row">
                    <div class="col-md-10">
                    <h3 class="mt-3" style="color:red; text-align:center;">SORU GÜNCELLEME</h3>
  
                        <form action="soru_guncelle.php" class="mt-4" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Soru Doğru Cevap</span>
                                <input type="text" name="dogru" value="<?php echo $satir["dogru"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                     
              
                            <div class="input-group mb-3">
                                <input class="form-control" type="file" name="genel_resim" action="img/*" id="formFile" />
                                <?php
                                if($satir["genel_resim"]){?>
                                    <a class="btn btn-success"href='<?php echo $satir["genel_resim"];?>'>indir</a>
                                
                                
                               <?php  } ?>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Soru Test Adı</span>
                                <select class="form-select form-control" aria-label="Default select example" name="test_adi">
                                    <?php
                                    $ro = $conn ->query ("SELECT DISTINCT test_adi FROM genel_test_sorulari"); 
                                    foreach($ro as $row){ ?>
    
                                    <option value='<?php  echo $row["test_adi"]?>' <?php echo ($row["test_adi"]==$satir["test_adi"]) ? 
                                                      "selected" : ""; ?>>Genel Test <?php  echo $row["test_adi"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
    
                            <input type="hidden" name="id" value="<?php echo $satir["id"]; ?>">
    
                             <button class="btn btn-success" type="submit">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
          
<?php
     }}
if ($_POST) {
    $dogru = $_POST["dogru"];
    $test_adi = $_POST["test_adi"];
    $id = $_POST["id"];
  
    $genel_resim=$_FILES["genel_resim"]["name"];
    $yeni="resimler/genel_resim/" . $genel_resim;

    if(move_uploaded_file($_FILES["genel_resim"]["tmp_name"], $yeni)){
    $guncelle = $conn->prepare("UPDATE genel_test_sorulari SET
             dogru=:dogru,
             test_adi =:test_adi,
             genel_resim=:genel_resim
              WHERE id=:id
             ");
             
   $sonuc=$guncelle->execute([
        "id"=> $id,
        "dogru" => $dogru,
        "test_adi" => $test_adi,
        "genel_resim"=> $yeni,
    ]);

   
    
}  header('Refresh:2; url=yonetim.php?islem=test_soru');}


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
<?php } ?>
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