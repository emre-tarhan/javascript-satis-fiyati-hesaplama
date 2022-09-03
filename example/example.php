<?php require_once 'header.php';
/* 

  _t = trendyol,
  _h = hepsiburada,
  _n = n11,
  _g = gittigidiyor,

  _c = kargo,
  _k = komisyon,

*/
if(isset($_POST['ekle'])){
    $sorgu = $db->prepare("INSERT INTO items SET
        item_name=:item_name,
        item_barkod=:item_barkod,
        item_marka=:item_marka,
        item_stok=:item_stok,
        item_desc=:item_desc,
        item_maliyet=:item_maliyet,
        item_gider=:item_gider,
        item_kar=:item_kar,
        item_c_t=:item_c_t,
        item_c_h=:item_c_h,
        item_c_n=:item_c_n,
        item_c_g=:item_c_g,
        item_k_t=:item_k_t,
        item_k_h=:item_k_h,
        item_k_n=:item_k_n,
        item_k_g=:item_k_g,
        item_t=:item_t,
        item_h=:item_h,
        item_n=:item_n,
        item_g=:item_g
    ");
    $sonuc = $sorgu->execute(array(
        'item_name' => $_POST['item_name'],
        'item_barkod' => $_POST['item_barkod'],
        'item_marka' => $_POST['item_marka'],
        'item_stok' => $_POST['item_stok'],
        'item_desc' => $_POST['item_desc'],
        'item_maliyet' => $_POST['item_maliyet'],
        'item_gider' => $_POST['item_gider'],
        'item_kar' => $_POST['item_kar'],
        'item_c_t' => $_POST['item_c_t'],
        'item_c_h' => $_POST['item_c_h'],
        'item_c_n' => $_POST['item_c_n'],
        'item_c_g' => $_POST['item_c_g'],
        'item_k_t' => $_POST['item_k_t'],
        'item_k_h' => $_POST['item_k_h'],
        'item_k_n' => $_POST['item_k_n'],
        'item_k_g' => $_POST['item_k_g'],
        'item_t' => $_POST['item_t'],
        'item_h' => $_POST['item_h'],
        'item_n' => $_POST['item_n'],
        'item_g' => $_POST['item_g']
    ));

    if($sonuc) {
        header("location:urunler.php?add=ok");
    }else{
        header("location:urunler.php?add=no");
    }
} ?>
<div class="main-panel">
<style>
    input[type=text]:focus{
        color: whitesmoke;
}
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Yeni Ürün Girişi</h4>
                    <form action="" method="POST">
                    <p class="card-description"> Ürün Bilgilerini Girin </p>
                        <br>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Ürün Adı</label>
                                <input type="text" autocomplete="off" class="form-control" name="item_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Barkod No</label>
                                <input type="text" autocomplete="off" class="form-control" name="item_barkod">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>Marka</label>
                                <select name="item_marka" class="form-control">
                                    <?php
                                    $sorgu = $db->prepare("SELECT * FROM markalar");
                                    $sorgu->execute();
                                    while($marka = $sorgu->fetch(PDO::FETCH_ASSOC)){ ?>
                                        <option value="<?= $marka['marka_id']?>"><?= $marka['marka_ad'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Stok Kodu</label>
                                <input type="text" autocomplete="off" class="form-control" name="item_stok">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label>Ürün Hakkında</label>
                                <textarea name="item_desc" autocomplete="off" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <p class="card-description"> Ürün Satış Bilgilerini Girin </p>
                        <br>
                        <div class="form-row cc">

                            <div class="col-md-4 form-group">
                                <label>Geliş Fiyatı</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_maliyet" id="item_maliyet">
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Gider</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_gider" id="item_gider">
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Kar</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_kar" id="item_kar">
                                </div>
                            </div>
                            
                        </div>

                        <hr>
                        <br>
                        <p class="card-description"> Ürüne Ait Kargo Fiyatlarını Satış Platformlarına Göre Girin <input class="btn btn-sm" style="background-color:#0d9455;color:whitesmoke;margin-left: 10px;" type="button" value="Otomatik Doldur (1 Ds)" onclick="ds1()"></p>
                        <br>
                        <div class="form-row cc">
                            <div class="col-md-3 form-group">
                                <label>Trendyol</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_c_t" id="item_c_t">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Hepsiburada</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_c_h" id="item_c_h">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Gittigidiyor</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_c_n" id="item_c_n">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Pazarama</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_c_g" id="item_c_g">
                                </div>
                            </div>

                        </div>

                        <hr>
                        <br>
                        <p class="card-description"> Ürüne Ait Komisyon Oranlarını Yüzde Cinsinden Girin <input class="btn btn-sm" style="background-color:#0d9455;color:whitesmoke;margin-left: 10px;" type="button" value="Otomatik Doldur" onclick="doldur()">
 </p> 
                        <br>
                        <div class="form-row cc">
                            <div class="col-md-3 form-group">
                                <label>Trendyol</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">%</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_k_t" id="item_k_t">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Hepsiburada</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">%</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_k_h" id="item_k_h">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Gittigidiyor</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">%</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_k_n" id="item_k_n">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Pazarama</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">%</span>
                                  </div>
                                <input type="text" autocomplete="off"  class="form-control" name="item_k_g" id="item_k_g">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <p class="card-description"> Satış Fiyatlarının Hesaplanması İçin "Hesapla" Butonuna Basın </p>
                        <br>
                        <div class="text-center">
                        <input class="btn btn-lg" style="background-color:#4e73df;color:whitesmoke" type="button" value="Hesapla" onclick="hesapla()">
                        </div>
                        
                        <br>
                        <p class="card-description"> Satış Fiyatlarınız Aşağıda Listeleniyor. İşlemi Tamamlamak İçin "Kaydet" Butonuna Basın </p>
                        <br>
                        <div class="form-row cc">
                            <div class="col-md-3 form-group">
                                <label>Trendyol</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off" class="form-control" name="item_t" id="item_t">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Hepsiburada</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off" class="form-control" name="item_h" id="item_h">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Gittigidiyor</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off" class="form-control" name="item_n" id="item_n">
                                </div>
                            </div>

                            <div class="col-md-3 form-group">
                                <label>Pazarama</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">₺</span>
                                  </div>
                                <input type="text" autocomplete="off" value="" class="form-control" name="item_g" id="item_g">
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                        <button class="btn btn-primary btn-lg" style="background:#8508e6;color:whitesmoke;border:1px solid #8508e6" type="submit" name="ekle">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
<script type="text/javascript">
  // Güncel komisyon ve kargo fiyatlarını otomatik doldurma
    function doldur(){
        document.getElementById('item_k_t').value = <?= $guncel['komisyonTrendyol'] ?> ;
        document.getElementById('item_k_h').value = <?= $guncel['komisyonHepsiburada'] ?>;
        document.getElementById('item_k_n').value = <?= $guncel['$komisyonN11'] ?>;
        document.getElementById('item_k_g').value = <?= $guncel['komisyonGittigidiyor'] ?>;
    }
    
    function ds1(){
        document.getElementById('item_c_t').value = <?= $guncel['kargoTrendyol'] ?>;
        document.getElementById('item_c_h').value = <?= $guncel['kargoHepsiburada'] ?>;
        document.getElementById('item_c_n').value = <?= $guncel['kargoN11'] ?>;
        document.getElementById('item_c_g').value = <?= $guncel['kargoGittigidiyor'] ?>;
    }
  
  
    // Hesaplama fonksiyonu
    function hesapla(){
        var item_maliyet = Number(document.getElementById("item_maliyet").value);
        var item_gider = Number(document.getElementById("item_gider").value);
        var item_kar = Number(document.getElementById("item_kar").value);
        var item_c_t = Number(document.getElementById("item_c_t").value);
        var item_c_h = Number(document.getElementById("item_c_h").value);
        var item_c_n = Number(document.getElementById("item_c_n").value);
        var item_c_g = Number(document.getElementById("item_c_g").value);
        var item_k_t = Number(document.getElementById("item_k_t").value);
        var item_k_h = Number(document.getElementById("item_k_h").value);
        var item_k_n = Number(document.getElementById("item_k_n").value);
        var item_k_g = Number(document.getElementById("item_k_g").value);
        var degisken = 1.18125
        var yuz = 100
        document.getElementById('item_t').value = (item_maliyet + item_c_t + item_gider + item_kar) + (((item_maliyet + item_c_t + item_gider + item_kar) * ((item_k_t) * degisken)) / yuz);
        document.getElementById('item_h').value = (item_maliyet + item_c_h + item_gider + item_kar) + (((item_maliyet + item_c_h + item_gider + item_kar) * ((item_k_h) * degisken)) / yuz);
        document.getElementById('item_n').value = (item_maliyet + item_c_n + item_gider + item_kar) + (((item_maliyet + item_c_n + item_gider + item_kar) * ((item_k_n) * degisken)) / yuz);
        document.getElementById('item_g').value = (item_maliyet + item_c_g + item_gider + item_kar) + (((item_maliyet + item_c_g + item_gider + item_kar) * ((item_k_g) * degisken)) / yuz);
    }
</script>
