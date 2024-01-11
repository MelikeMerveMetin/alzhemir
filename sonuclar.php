<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sonuçlarım</title>
  </head>
  <body>
    <?php
     include "baglanti.php";
    $id=$_GET["id"];
     ?>
      <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h3 style="text-align: center; color:red;">
                        SONUÇLARIM </h3></div>
                        
                        <div class="col-md-4 mt-3">
                          
                            <div class="row">
                              <div class="col-md-12">
                                <?php
                                $genel="Genel";
                                $aile="Aile";
                                $ozel="Özel";
                                
                                ?>
                              <a class="btn btn-danger" href="sonuclar.php?tur=<?php echo $genel;?>&id=<?php echo $id;?>&secim=test" style="text-decoration: none;  font-size: 15px;">GENEL TEST SONUÇLARINI GETİR</a>
                  </div> </div>
                  <div class="row">
                              <div class="col-md-12 mt-3">
                              <a class="btn btn-danger" href="sonuclar.php?tur=<?php echo $aile;?>&id=<?php echo $id;?>&secim=test" style="text-decoration: none;  font-size: 15px;">AİLE TESTİ SONUÇLARINI GETİR </a>
                  </div> </div>
                  <div class="row">
                              <div class="col-md-12 mt-3">
                              <a class="btn btn-danger" href="sonuclar.php?tur=<?php echo $ozel;?>&id=<?php echo $id;?>&secim=test" style="text-decoration: none;  font-size: 15px;">ÖZEL SONUÇLARINI GETİR </a>
                  </div> </div>
                        
                        </div>
<div class="col-md-4"></div>
                        <div class="col-md-4 mt-3">
                          <form action="sonuclar.php?id=<?php echo $id;?>&secim=tarih" method="post">
                            <div class="row">
                              <div class="col-md-6">
                                <input type="date" name = "tarih1" class="form-control"></div>
                               <div class="col-md-6"><input type="date" name = "tarih2" class="form-control">
                            </div></div> 
                            <div class="row">
                            <input name="buton" type="submit" class="btn btn-danger mt-2" value="Seçili Tarihleri Getir">
                          </div></form>
                        </div></div>
                        
                          <?php
                          if(isset($_GET["secim"])){
                          $secim = $_GET["secim"];
                          switch ($secim) {
                            case "tarih":
                                $tarih1=$_POST["tarih1"];
                                $tarih2=$_POST["tarih2"];?>
                                <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead>
                                            <th>Test Türü</th>
                                            <th>Tarih</th>
                                            <th>Doğru Sayısı</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $rows = $conn->query("SELECT * FROM sonuclar  WHERE kullanici_id=$id && tarih between '$tarih1' and '$tarih2'"); 
                                               foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?php echo $row["test_turu"]?></td>
                                                <td><?php echo $row["tarih"]?></td>
                                                <td><?php echo $row["dogru_sayisi"]?></td>
                                               
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><?php
                              break;
                            case "test":
                                $id=$_GET["id"];
                                $tur=$_GET["tur"];
                                ?>
                                <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-striped" style="text-align: center;">
                                        <thead>
                                            <th>Test Türü</th>
                                            <th>Tarih</th>
                                            <th>Doğru Sayısı</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                               $rows = $conn->query("SELECT * FROM sonuclar WHERE kullanici_id='$id' AND test_turu LIKE '$tur%'"); 
                                               foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?php echo $row["test_turu"]?></td>
                                                <td><?php echo $row["tarih"]?></td>
                                                <td><?php echo $row["dogru_sayisi"]?></td>
                                               
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><?php
                              break;
                            
                            default:
                             
                          }
                        }
                  
else{ ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-striped" style="text-align: center;">
                        <thead>
                            <th>Test Türü</th>
                            <th>Tarih</th>
                            <th>Doğru Sayısı</th>
                        </thead>
                        <tbody>
                            <?php
                               $rows = $conn->query("SELECT * FROM sonuclar  WHERE kullanici_id=$id"); 
                               foreach ($rows as $row) { ?>
                            <tr>
                                <td><?php echo $row["test_turu"]?></td>
                                <td><?php echo $row["tarih"]?></td>
                                <td><?php echo $row["dogru_sayisi"]?></td>
                               
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
  
                               </div><?php } ?>
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