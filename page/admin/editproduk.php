<link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
include"../../koneksi.php";
$e=$_GET['id'];
$edit=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM produk WHERE id_produk='$e'");
$produk = mysqli_fetch_array($edit);
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Produk
</div>
<form action="e_produk.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_produk" class="form-control" value =" <?php  echo $produk['id_produk'];?>">
 		<b>Kategori Produk :</b><select name="kategori" class="form-control">
 			<?php
 			$d = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kategori");
 			while($data = mysqli_fetch_array($d)){ ?>;
 			<option> <?php echo $data['kategori']; ?> </option>
 			<?php } ?>
 		</select><br>
 		<b>Rasa Produk :</b> <input type="text" name="rasa" class="form-control" value =" <?php  echo $produk['rasa'];?>" ><br>
 		<b>Tanggal Produksi :</b><input type="text" name="tgl_produksi" class="form-control" value =" <?php  echo $produk['tgl_produksi'];?>"><br>
 		<b>Tanggal Kadaluarsa : </b><input type="text" name="tgl_kadaluarasa" class="form-control" value =" <?php  echo $produk['tgl_kadaluarsa'];?>"><br>
 		<b>Gambar Produk : </b><input type="file" name="gambar" class="form-control" value =" <?php  echo $produk['gambar'];?>" ><br>
 		<b>Harga Produk : </b><input type="text" name="harga" class="form-control" value =" <?php  echo $produk['harga'];?>" ><br>
 		<b>Stok Produk : </b><input type="text" name="stok" class="form-control" value =" <?php  echo $produk['stok'];?>" ><br>
 		<td><input type="submit" class="btn btn-success" value="simpan">
</form>
