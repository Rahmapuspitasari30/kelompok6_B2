<?php 
  require('config/db.php');
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Toko Online Ikan Hias</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="icon" type="image/gif/png" href="asset/img/Title.png">
</head>
<body>

<?php include('component/nav.php'); ?>
<div class="container-fluid" id="isi" >
  

  <div class="row">
    <div class="col-xs-2 col-xs-offset-5" id="produk-laris">
      <h3 style="font-family: Blacksword; font-size:2.2em;"><strong>Produk Ikan Hias</strong></h3>
    </div>
  </div>
  


  <!-- Laman Produk-->
  
  <div class="container" id="produk">
    <div class="tab-content">
      <!-- serit -->
      <div id="serit" class="tab-pane fade in active">
      <ul>
      <?php 
        require("config/db.php");
        $limit = 4;
        $sql = mysqli_query($conn, "SELECT count(idProduk) FROM tabel_produk WHERE kategori='serit'");
        $row = @mysqli_fetch_array($sql, MYSQLI_NUM);
        $rec_count = $row[0];
        if(isset($_GET['page'])){
          $page = $_GET['page'] + 1;
          $offset = $limit * $page;
        }else{
          $page = 0;
          $offset = 0;
        }
        $left_rec = $rec_count - ($page * $limit);
        $querySerit = "SELECT * FROM tabel_produk WHERE kategori='serit' LIMIT $offset,$limit";
        $query_serit = mysqli_query($conn, $querySerit);

        while($arraySerit = mysqli_fetch_array($query_serit)){
          echo '
            <li>
              <a href="#'.$arraySerit['idProduk'].'">
                <img src="admin/proses/'.$arraySerit['path'].'" alt="'.$arraySerit['nama'].'">
                <span></span>
              </a>
              <div class="overlay" id="'.$arraySerit['idProduk'].'">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img src="admin/proses/'.$arraySerit['path'].'">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>'.$arraySerit['nama'].'</strong></h4>
                    <p>'.$arraySerit['keterangan'].'</p>
                    <h5>Rp.'.$arraySerit['harga'].'</h5>
                    <h5 class="ukur">Ukuran : '.$arraySerit['ukuran'].'</h5>
                    <button type="button" class="btn btn-success">Stock : '.$arraySerit['stock'].'</button>
                    ';
              if(isset($_SESSION['idUser'])){
                if($arraySerit['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arraySerit['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
        ?>
      <div class="clear"></div>
    </ul>

    <div class="container-fluid" id="paging">
      <div class="paging">
     
    </div>
    </div>
    </div>
    <!-- end of serit -->

    <!-- halfmoon -->
      <div id="halfmoon" class="tab-pane fade">
      <ul>
      <?php 
        require("config/db.php");
        
        $queryHalfmoon = "SELECT * FROM tabel_produk WHERE kategori='halfmoon' LIMIT 0,4";
        $query_halfmoon = mysqli_query($conn,$queryHalfmoon);

        while($arrayHalfmoon = mysqli_fetch_array($query_halfmoon)){
          echo '
            <li>
        <a href="#'.$arrayHalfmoon['idProduk'].'">
          <img src="admin/proses/'.$arrayHalfmoon['path'].'" alt="'.$arrayHalfmoon['nama'].'">
          <span></span>
        </a>
        <div class="overlay" id="'.$arrayHalfmoon['idProduk'].'">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/'.$arrayHalfmoon['path'].'">
          <div class="keterangan">
            <div class="container">
              <h4><strong>'.$arrayHalfmoon['nama'].'</strong></h4>
              <p>'.$arrayHalfmoon['keterangan'].'</p>
              <h5>Rp.'.$arrayHalfmoon['harga'].'</h5>
              <h5 class="ukur">Ukuran : '.$arrayHalfmoon['ukuran'].'</h5>
              <button type="button" class="btn btn-success">Stock : '.$arrayHalfmoon['stock'].'</button>
              ';
              if(isset($_SESSION['idUser'])){
                if($arrayHalfmoon['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arrayHalfmoon['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
       ?>
      <div class="clear"></div>
    </ul>
    </div>
    <!-- end of halfmoon -->

    <!-- discus -->
      <div id="discus" class="tab-pane fade">
      <ul>
        <?php 
        require("config/db.php");
        
        $queryDiscus = "SELECT * FROM tabel_produk WHERE kategori='discus' LIMIT 0,4";
        $query_discus = mysqli_query($conn,$queryDiscus);

        while($arrayDiscus = mysqli_fetch_array($query_discus)){
          echo '
            <li>
            <a href="#'.$arrayDiscus['idProduk'].'">
              <img src="admin/proses/'.$arrayDiscus['path'].'" alt="'.$arrayDiscus['nama'].'">
              <span></span>
            </a>
            <div class="overlay" id="'.$arrayDiscus['idProduk'].'">
              <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
              <img src="admin/proses/'.$arrayDiscus['path'].'">
              <div class="keterangan">
                <div class="container">
                  <h4><strong>'.$arrayDiscus['nama'].'</strong></h4>
                  <p>'.$arrayDiscus['keterangan'].'</p>
                  <h5>Rp.'.$arrayDiscus['harga'].'</h5>
                  <h5 class="ukur">Ukuran : '.$arrayDiscus['ukuran'].'</h5>
                  <button type="button" class="btn btn-success">Stock : '.$arrayDiscus['stock'].'</button>
                  ';
                  if(isset($_SESSION['idUser'])){
                    if($arrayDiscus['stock'] > 0){
                      echo '
                      <a href="proses/beli.php?idProduk='.$arrayDiscus['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                    ';
                    }else{
                      echo '
                      <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                    ';
                    }
                  }else{
                    echo '
                      <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                    ';
                  }
                  echo '
                </div>
              </div>
            </div>
          </li>  
          ';
        }
       ?>
        <div class="clear"></div>
    </ul>
    </div>
    <!-- end of discus -->

    <!-- tetra-tetra -->
      <div id="tetra" class="tab-pane fade">
      <ul>
        <?php 
        require("config/db.php");
        
        $queryTetra = "SELECT * FROM tabel_produk WHERE kategori='tetra' LIMIT 0,4";
        $query_tetra = mysqli_query($conn,$queryTetra);

        while($arrayTetra = mysqli_fetch_array($query_tetra)){
          echo '
            <li>
        <a href="#'.$arrayTetra['idProduk'].'">
          <img src="admin/proses/'.$arrayTetra['path'].'" alt="'.$arrayTetra['nama'].'">
          <span></span>
        </a>
        <div class="overlay" id="'.$arrayTetra['idProduk'].'">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/'.$arrayTetra['path'].'">
          <div class="keterangan">
            <div class="container">
              <h4><strong>'.$arrayTetra['nama'].'</strong></h4>
              <p>'.$arrayTetra['keterangan'].'</p>
              <h5>Rp.'.$arrayTetra['harga'].'</h5>
              <h5 class="ukur">Ukuran : '.$arrayTetra['ukuran'].'</h5>
              <button type="button" class="btn btn-success">Stock : '.$arrayTetra['stock'].'</button>
              ';
              if(isset($_SESSION['idUser'])){
                if($arrayTetra['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arrayTetra['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
       ?>
      <div class="clear"></div>
    </ul>
    </div>
    <!-- end of tetra-tetra -->
    <!-- koi -->
      <div id="koi" class="tab-pane fade">
      <ul>
      <?php 
        require("config/db.php");
        
        $queryKoi = "SELECT * FROM tabel_produk WHERE kategori='koi' LIMIT 0,4";
        $query_koi = mysqli_query($conn,$queryKoi);

        while($arrayKoi = mysqli_fetch_array($query_koi)){
          echo '
            <li>
        <a href="#'.$arrayKoi['idProduk'].'">
          <img src="admin/proses/'.$arrayKoi['path'].'" alt="'.$arrayKoi['nama'].'">
          <span></span>
        </a>
        <div class="overlay" id="'.$arrayKoi['idProduk'].'">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/'.$arrayKoi['path'].'">
          <div class="keterangan">
            <div class="container">
              <h4><strong>'.$arrayKoi['nama'].'</strong></h4>
              <p>'.$arrayKoi['keterangan'].'</p>
              <h5>Rp.'.$arrayKoi['harga'].'</h5>
              <h5 class="ukur">Ukuran : '.$arrayKoi['ukuran'].'</h5>
              <button type="button" class="btn btn-success">Stock : '.$arrayKoi['stock'].'</button>
              ';
              if(isset($_SESSION['idUser'])){
                if($arrayKoi['stock'] > 0){
                  echo '
                  <a href="proses/beli.php?idProduk='.$arrayKoi['idProduk'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                }else{
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              }else{
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
        }
       ?>
      <div class="clear"></div>
    </ul>
    </div>
    <!-- end of koi -->
    </div>
    
  </div>
  <!-- kontent end of produkumum -->
</div>



<script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>