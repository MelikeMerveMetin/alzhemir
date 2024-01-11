<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
  <style>
            body {
                height:100%;
                width:100%;
                position:absolute;
            }
            .container-fluid,
            .row-fluid {
                height:inherit;
            }
            #lk:link, #lk:visited {
                color:#888;
                text-decoration:none;
            }
            #lk:hover {
                color:#000;
            }
            #div2 {
                min-height:100%; 
                background-color:#EEE;
            }
            #div1 {
                background-color:#fff;
                border:1px solid #F1F1F1;
                border-radius:5px;
            }
        </style>
        <script language="javascript">
            var popupWindow = null;

            function ortasayfa(url, winName, w, h, scroll) {
                LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                settings = 'height=' + h + ', width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ', resizable'
                popupWindow = window.open(url, winName, settings)
            }

            $(document).ready(function () {
                $('a[data-confirm]').click(function (ev) {
                    var href = $(this).attr('href');

                    if (!$('#dataConfirmModal').length) {
                        $('body').append('<div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">\n\
                                                <div class="modal-dialog modal-dialog-centered" role="document">\n\
                    <div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">ONAY</h5></div>\n\
                        <div class="modal-body"></div>   \n\
                            <div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">VAZGEÇ</button><a class="btn btn-primary" id="dataConfirmOK">EVET</a></div></div></div></div></div>');
            
                            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                            $('#dataConfirmOK').attr('href',href);
                            $('#dataConfirmModal').modal({show:true});                            
                            return false;
                            //window.location.reload();

                    }
                    
                });
                    
            });
            
        </script>
        <title>YÖNETİM</title>
  </head>
  <body>
  <?php
   include "baglanti.php";
   session_start();
   
       $id=$_SESSION['kullanici_id'];
        
   ?>
  <div class = "container-fluid bg-light">
        <div class = "row row-fluid">
            <div class = "col-md-2 border-right " style = "min-height:750px;">
                <div class = "row">
                    <div class = "col-md-12 p-4 mx-auto text-center text-white font-weight-bold" style="background-color:purple">
                    <?php echo strtoupper($_SESSION['kullanici_adi']." " .$_SESSION['kullanici_soyadi']); ?>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-md-12 bg-light p-2 pl-3 border-bottom border-top text-white">
                        <a href="yonetim.php?islem=test_ekle" id="lk">Test Ekle</a>
                    </div>
                    <div class = "col-md-12 bg-light p-2 pl-3 border-bottom text-white">
                        <a href="yonetim.php?islem=test_soru" id="lk">Testteki Sorular</a>
                    </div>
                    <div class = "col-md-12 bg-light p-2 pl-3 border-bottom text-white">
                        <a href="yonetim.php?islem=bilgi_guncelleme" id="lk">Bilgilerimi Güncelle</a>
                    </div>
                    <div class = "col-md-12 bg-light p-2 pl-3 border-bottom text-white">
                        <a href="yonetim.php?islem=yonetici_ekle" id="lk" >Yönetici Ekle</a>
                    </div>
                    <div class = "col-md-12 bg-light p-2 pl-3 border-bottom text-white">
                        <a href="yonetim.php?islem=yonetici_sil" id="lk" >Yönetici Sil</a>
                    </div>
                    <div class = "col-md-12 bg-light p-2 pl-3 border-bottom text-white">
                        <a href="yonetim.php?islem=cikis" id="lk" data-confirm="Çıkış yapmak istediğinize emin misiniz?">Çıkış</a>
                    </div>

                   
                </div>
            </div>
            <div class = "col-md-10">
                <div class = "row" id="div2">
                    <div class = "col-md-12 mt-4" id="div1">

                        <?php
                        @$islem = $_GET["islem"];

                        switch ($islem) :

                          
                            case "test_ekle":?>
                              <div class="container">
            <div class="row mx-auto ">
                <div class="col-md-8 mx-auto text-center log">
                    <form action="yonetim_fonk.php?secim=test_ekle" class="mt-4" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text" id="inputGroup-sizing-default">Test Numarası</span>
                            <input type="text" class="form-control" name="test_no" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Soru Resmi</span>
                            <input class="form-control" type="file" name="soru_resim" id="formFile" />
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Soru Cevabı</span>
                            <input type="text" class="form-control" name="soru_cevap" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                        </div>
                        <a href="index.php" class="btn btn-danger mb-3">Geri</a>
                        <button type="submit" class="btn btn-success mb-3">Soru Ekle</button>
                    </form>
                </div>
            </div>
        </div>
   
                           <?php     break;

                            case "test_soru": ?>
                                 <div class="container">
                                 <div class="row mx-auto ">
                <div class="col-md-8 mx-auto text-center log">
                    <form action="yonetim_fonk.php?secim=test_soru" class="mt-4" method="post" enctype="multipart/form-data">
        
                        <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Test Numarası</span>
                            <select class="form-select form-control" aria-label="Default select example" name="test_soru">
                                <option selected>Test Adı Seçiniz</option>
                                <?php 
                                    $rows = $conn->query("SELECT DISTINCT test_adi FROM genel_test_sorulari");
                                   // $count = $rows->fetchColumn(); 
                                    foreach($rows as $row) { ?>
                                       <option value="<?php echo $row["test_adi"]?>"><?php echo "Genel Test " .$row["test_adi"]?></option>
                                <?php }  ?>
                            </select>
                        </div>
                 
                        <button type="submit" class="btn btn-success">Soruları Göster</button>
                    </form>
                    <?php
                    
                    ?>
                </div>
            </div>
        </div>
                               <?php break;

                case "bilgi_guncelleme":
                  ?>
 
        <div class="container">
            <div class="row mx-auto ">
                <div class="col-md-5 mx-auto text-center log">
                    <form action="yonetim_fonk.php?secim=bilgi_guncelleme" class="mt-4" method="post" enctype="multipart/form-data">
             
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

    

<?php
    break;

    case "cikis":
       
session_destroy();

echo "<script type='text/javascript'>alert('ÇIKIŞ İŞLEMİ BAŞARILI');
window.location.href='giris.php';</script>";

            
          
          break;
      
 
          case "yonetici_ekle":
            ?>
           
           <div class="container">
                      <div class="row mx-auto ">
                          <div class="col-md-5 mx-auto text-center log">
                              <form action="yonetim_fonk.php?secim=yonetici_ekle" class="mt-4" method="post" enctype="multipart/form-data">
                            
                            
                        
                          <div class="col-md-12 table-light border-bottom"><h4>Yönetici Ekle</h4></div>
                          
                      
                          <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Email Adresi</span>
                                          <input type="email" name="email"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                      </div>
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Adı</span>
                                          <input type="text" name="kullanici_adi"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                      </div>
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Kullanıcı Soyadı</span>
                                          <input type="text" name="kullanici_soyadi"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                      </div>
                                     
                                      <div class="input-group mb-3">
                                          <span class="input-group-text" id="inputGroup-sizing-default">Şifre</span>
                                          <input type="password" name="sifre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                                      </div>
                                     
                             
                              <button type="submit" class="btn btn-success mt-3">Yönetici Ekle</button>
  
                          </form>
                      </div>
          
              
          
          <?php
              break;
              case "yonetici_sil":?>
              <div class="row">
              <h3 class="text-center mt-3" style="color:red;">YÖNETİCİLER</h3>
              <div class="col-md-12">
                         
              <table class="table table-hover table-striped" style="text-align: center;">
                  <thead>
                       <th>Yönetici Adı</th>
                       <th>Yönetici Soyadı</th>
                       <th>Yönetici Mail</th>
                      <th>İşlemler</th>
                  </thead>
                  <tbody>
                      <?php
                         $rows = $conn->query("SELECT * FROM kullanicilar WHERE yonetim=1"); 
                         foreach ($rows as $row) { ?>
                      <tr>
                          <td><?php echo $row["kullanici_adi"]?></td>
                          <td><?php echo $row["kullanici_soyadi"]?></td>
                          <td><?php echo $row["email"]?></td>
                            <td>
                            <a href='yonetim_fonk.php?id=<?php echo $row["id"]?>&secim=yonetici_sil' class="btn btn-danger">Yöneticiyi Sil</a>
                          </td>
                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
            
          </div>
      </div>
            <?php  break;
                        endswitch;
                        ?>                           
                    </div>
                </div>
            </div>
        </div>
    </div>

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