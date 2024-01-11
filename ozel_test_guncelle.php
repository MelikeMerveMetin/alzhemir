
    
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
  
    $id=$_GET["id"];
     
    $rows = $conn->query("SELECT * FROM ozel_test WHERE id=$id"); 
    foreach ($rows as $satir){ ?>
            <div class="container">
               
                <div class="row">
                    <div class="col-md-10">
                    <h3 class="mt-3" style="color:red; text-align:center;">SORU GÜNCELLEME</h3>
  
                        <form action="ozel_test_guncelle.php" class="mt-4" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Soru</span>
                                <input type="text" name="soru" value="<?php echo $satir["soru"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">A Seçeneği</span>
                                <input type="text" name="a" value="<?php echo $satir["a"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">B Seçeneği</span>
                                <input type="text" name="b" value="<?php echo $satir["b"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">C Seçeneği</span>
                                <input type="text" name="c" value="<?php echo $satir["c"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">D Seçeneği</span>
                                <input type="text" name="d" value="<?php echo $satir["d"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Soru Doğru Cevap</span>
                                <input type="text" name="dogru" value="<?php echo $satir["dogru"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                            </div>
                         
                            <input type="hidden" name="id" value="<?php echo $satir["id"]; ?>">
                            <input type="hidden" name="kullanici_id" value="<?php echo $satir["kullanici_id"]; ?>">
    
                             <button class="btn btn-success" type="submit">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
          
<?php
     }}
if ($_POST) {
    $dogru = $_POST["dogru"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $soru = $_POST["soru"];
    $id = $_POST["id"];
    $kullanici_id = $_POST["kullanici_id"];
  
    $guncelle = $conn->prepare("UPDATE ozel_test SET
             dogru=:dogru,
             a =:a,
             b =:b,
             c =:c,
             d =:d,
             soru=:soru
              WHERE id=:id
             ");
             
   $sonuc=$guncelle->execute([
        "id"=> $id,
        "dogru" => $dogru,
        "a" => $a,
        "b" => $b,
        "c" => $c,
        "d" => $d,
        "soru" => $soru,
        
    ]);

   
    
 header("Refresh:2; url=ozel_soru.php?id=$kullanici_id");}


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