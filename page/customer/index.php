<?php
include"../../koneksi.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
@$pesan = $_GET['pesan'];
if($pesan=="blok")
{
  echo"<script type='text/javascript'>alert('anda tidak dapat membeli dikarenakan anda belum membayar / belum di konfirmasi oleh admin');</script>";
}
else if($pesan=="suwon")
{
  echo"<script type='text/javascript'>alert('terima kasih telah melakukan konfirmasi :-) , anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda di konfirmasi oleh admin');</script>";
}
else if($pesan=="sudah konfirmasi")
{
  echo"<script type='text/javascript'>alert('anda sudah konfirmasi , anda dapat melakukan pembelian lagi setelah permintaan konfirmasi anda di konfirmasi oleh admin');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>BOPANG Milenial</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#d74b35;">
      <div class="container-fluid">
        <div class="navbar-header">
          
        <a class="navbar-brand" href="#"><img src="../../img/logo_bopang.png" style="width:55px; margin-left: 40px; margin-top: -17px;"></a>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>
          <li class="a"><a href="detail.php?page=keranjang" style="color:#fff;"><span class="glyphicon glyphicon-shopping-cart"> Keranjang[<?php 
          $qcek=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from keranjang where id_pembeli='$_SESSION[id_pembeli]'");$cek=mysqli_num_rows($qcek); 
          $q_cekout= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cekout = mysqli_num_rows($q_cekout);
          if($cekout>=1)
          {
          echo "0";
          }
          else{
          echo $cek;
          }  ?>]</span></a></li>
          <li><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li><?php include("../../kat.php");?></li>

</ul>
</li>
          <li class="a"><a href="cara_pesan.php" style="color:#fff;"><span class="glyphicon glyphicon-question-sign"> Cara Belanja | </span></a></li>
         


          <?php
          $q_cek_cekout = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cek_cekout = mysqli_num_rows($q_cek_cekout);
          if($cek_cekout>=1){
          $queri_cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
          $cek = mysqli_num_rows($queri_cek);
          if($cek>=1)
          {?>
          <li><a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Konfirmasi | </span></a></li><?php
          }else{
          ?>
          <li><a href="cara_pesan.php?page=konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Konfirmasi | </span></a></li>
          <?php } }?>




          <li><a href="#"><span class="glyphicon glyphicon-user" style="color:#fff;"> <?php echo $nama; ?></span></a>
<ul>
<li><a href="../admin/outpage.php"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
</ul>
          </li>
          
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../img/1.jpg" width="450px" height="235px">   
    </div>
      <div class="col-md-6" style="margin-left:90px; margin-top: 20px;">
        <h2><b>Selamat datang di BOPANG MILENIAL<h1 style="color:#cd3333;">KERIPIK BONGGOL PISANG</b></h1></h2>
        <p>Kami menyediakan berbagai macam varian rasa keripik bonggol pisang yang bisa dinikmati oleh semua kalangan</p>
      </div>
    </div>
    </div>
<div style="margin-top: -30px; width:100%,height: 40px;text-align:center;background:#cd3333;color:#fff;line-height:60px;font-size:20px;">
<b>Produk Kami</b>
</div>
    <div class="container">
      <div class="row">
     <?php
      @$idkat = $_GET['id'] ;
      $qryprodukkat = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk where id_ketegori='$idkat'");
      $qryproduk= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk");
      if($idkat==0){
      while($produk = mysqli_fetch_array($qryproduk)) {
      ?>
      
        <div class="col-md-3" style="margin-top:20px;">
        <div class="produk">
          <center><img src="../../gambar/<?php echo $produk['gambar'] ?>" style="width:180px;height:190px; margin-top:20px;"></center>
          <h3 style="text-align:center; color:#f97b61;"><?php echo $produk['rasa'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $produk['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $produk['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $produk['id_produk'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>
        <?php } }
        else{ while($produk1 = mysqli_fetch_array($qryprodukkat)){?>
            <div class="col-md-3" style="margin-top:20px;">
        <div class="produk">
          <center><img src="../../gambar/<?php echo $produk1['gambar'] ?>" style="margin-top:20px;width:210px;height:190px;"></center>
        <h3 style="text-align:center; color:#f97b61; "><?php echo $produk1['rasa'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $produk1['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $produk1['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $produk1['id_produk'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>
          <?php }} ?>
      </div>

      <hr>

      
    </div> 
  <div class="footer" style="width:100%;height:270px;color:#fff;background:#d74b35;">
      <div class="row" style="background:#7e7c78;">
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#ffffff"><h3><b>Tentang Kami</b></h3></li>
        </ul></center>
          <hr>
        <ul>
          <li><b>BOPANG MILENIAL</b> adalah</li>
          <li>Sebuah toko kripik online</li>
          <li>yang menyediakan semua</li>
          <li>macam-macam rasa .</li>
        </ul>
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <li style="color:#ffffff"><h3><b>Alamat Kami</b></h3></li>
        </ul></center>
          <hr>
    
          <ul>
          <li>Jl.Pucung 1</li>
          <li>Balekambang, Condet </li>
          <li>Jakarta Timur, Indonesia</li>
          <li></li>
        </ul>
      
      </div>
      </div>
      <div class="col-md-4">
      <div style="margin:50px;height:120px;">
        <center>
        <ul>
          <ul>
          <li style="color:#ffffff"><h3><b>Contact Us</b></h3></li>
          <hr>
         <div class="row">
          <div class="col-md-4">
          <a href="www.fecebook.com"><img src="../../images/fb.png" style="width:70px;height:75px;  "></a>
          </div>
          <div class="col-md-4">
          <a href="www.googleplus.com"><img src="../../images/gp.png" style="width:70px;height:75px;"></a>
          </div>
          <div class="col-md-4">
          <a href="www.twitter.com"><img src="../../images/Twitter.png" style="width:70px;height:75px;"></a>
          </div>
         </div>
        </ul>
        </center>
      </div>
      </div>
      </div>
        <div class="copyright" style="line-height:50px;">
        <center>&copy; BOPANG MILENIAL 2019.</center>
        </div>
      </div>
  </body>
</html>