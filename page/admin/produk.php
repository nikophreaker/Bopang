<?php
include"../../koneksi.php";
$no = 1;
$qry_produk = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from produk");
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;">
<b>Data Produk</b>
</div>
<a href="index.php?page=input_produk" class="btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-plus"> TAMBAH PRODUK</span></a>


<?php

@$aksi = $_GET['aksi'];
if($aksi=="input")
{
	include("input_produk.php");
}
?>
<div class="th">
<table class="table table-bordered" style="margin-top:20px;">
 
	<th style=" background: #E6E6FA;"><center>No</center></th>
	<th style=" background: #E6E6FA;"><center>Rasa</center></th>
	<th style=" background: #E6E6FA;"><center>Tanggal Produksi</center></th>
	<th style=" background: #E6E6FA;"><center>Tanggal Kadaluarsa</center></th>
	<th style=" background: #E6E6FA;"><center>Gambar</center></th>
	<th style=" background: #E6E6FA;"><center>harga</center></th>
	<th style=" background: #E6E6FA;"><center>stok</center></th>
	<th style=" background: #E6E6FA;"><center>aksi</center></th>
	<?php while($data = mysqli_fetch_array($qry_produk)) { ?>
	<tr>
	 <td><?php echo $no++ ?></td>
	 <td><?php echo $data['rasa'] ?></td>
	 <td><?php echo $data['tgl_produksi'] ?></td>
	 <td><?php echo $data['tgl_kadaluarsa'] ?></td>
	 <td><center><img src="../../gambar/<?php echo $data['gambar'] ?>" style="width:100px;"></center></td>
	 <td>Rp.<?php echo number_format($data['harga']); ?>,-</td>
	 <td><?php echo $data['stok'] ?></td>
	 <td><a href="index.php?page=editproduk&id=<?php echo $data['id_produk']; ?>"><center><span class="glyphicon glyphicon-pencil"></span></a> || <a href="hapus_produk.php?id=<?php echo $data['id_produk']; ?>"><span class="glyphicon glyphicon-trash"></span></center></a></td>
	</tr>
	<?php } ?>
</table>
<a href="print_produk.php" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-print"></span> Print 
			</a>
</div>