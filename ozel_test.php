<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <title>Özel Test</title>
        
    </head>

    <body>
    
<?php if($_GET){
 include "baglanti.php";
 session_start();
    $id=$_GET["id"];
?>
        <div class="container">
            <div class="row mx-auto ">
                <div class="col-md-4 mx-auto text-center log">
                    <form action="ozel_test.php" class="mt-4" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text" id="inputGroup-sizing-default">Test Sorusu</span>
                            <input type="text" class="form-control" name="soru" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">A Seçeneği</span>
                            <input type="text" class="form-control" name="a" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">B Seçeneği</span>
                            <input type="text" class="form-control" name="b" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">C Seçeneği</span>
                            <input type="text" class="form-control" name="c" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">D Seçeneği</span>
                            <input type="text" class="form-control" name="d" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Doğru Cevap</span>
                            <input type="text" class="form-control" name="dogru" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <a href="ozel_soru.php?id=<?php echo $id?>" class="btn btn-danger mb-3">Soruları Gör</a>
                        <button type="submit" class="btn btn-success mb-3">Test Ekle</button>
                    </form>
                </div>
            </div>
        </div>
<?php }
        if ($_POST) {
include "baglanti.php";
$soru = $_POST["soru"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];
$dogru = $_POST["dogru"];
$id = $_POST["id"];





        if($soru == "" ){
            $message = "<script>
            alert('Soru Alanı Boş Bırakılamaz!!!')
            setTimeout(function(){
                window.location.href='ozel_test.php?id=$id';
            },100);
            
            </script>";
        
            echo $message;
          }
          elseif($a == "" || $b == "" || $c == "" || $d == ""){
            $message = "<script>
            alert('Soru Seçenekleri Boş Bırakılamaz!!!')
            setTimeout(function(){
                window.location.href='ozel_test.php?id=$id';
            },100);
            
            </script>";
        
            echo $message;
          }
          elseif($dogru==""){
            $message = "<script>
            alert('Doğru Cevap Alanı Boş Bırakılamaz!!!')
            setTimeout(function(){
                window.location.href='ozel_test.php?id=$id';
            },100);
            
            </script>";
        
            echo $message;
          }
          
         
          

else{
$sorgu = $conn->query("INSERT INTO ozel_test (soru,a,b,c,d,dogru,kullanici_id) 
values('$soru','$a','$b','$c','$d','$dogru','$id')");


header('Refresh:2; url=anasayfa.php');
}}

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
<?php if($sorgu){?>
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Soru Ekleme İşlemi Başarılı',
  showConfirmButton: false,
  timer: 1950
})
<?php } ?>
</script>
  



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
