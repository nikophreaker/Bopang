<?php
include"../../koneksi.php";
	$id_produk = $_POST['id_produk'];
	$rasa = $_POST['rasa'];
	$tgl_produksi = $_POST['tgl_produksi'];
	$tgl_kadaluarsa= $_POST['tgl_kadaluarsa'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$kategori= $_POST['kategori'];
	$qryid = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kategori where kategori='$kategori'");
	$data = mysqli_fetch_array($qryid);
	$id_kategori = $data['id_ketegori'];

@$message		= '';
$valid_file		= true;
$max_size		= 1024000;


if($_FILES['gambar']['name']){
	
	if(!$_FILES['gambar']['error']){

		$new_file_name = strtolower($_FILES['gambar']['tmp_name']); 
		if($_FILES['gambar']['size'] > $max_size)
			$valid_file	= false;
			$message	= 'Maaf, file terlalu besar. Max: 1MB';
		}
	
		$image_path = pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION); 
		$extension = strtolower($image_path); 

		if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif" ) {
			$valid_file = false;
			$message	= "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #".$extension;
		}



	
		if($valid_file == true)
		{
		
			$rename_nama_file	= date('YmdHis');
			$nama_file_baru		= $rename_nama_file.'.'.$extension;


			
			mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE produk set rasa='$rasa',id_ketegori='$id_kategori',tgl_produksi='$tgl_produksi',tgl_kadaluarsa='$tgl_kadaluarsa',harga='$harga', gambar='$nama_file_baru', stok='$stok' where id_produk='$id_produk'");
		
			move_uploaded_file($_FILES['gambar']['tmp_name'], '../../gambar/'.$nama_file_baru);
			header("location:index.php?page=produk");
		}
	}
	
	else
	{

		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['gambar']['error'];
	}
?>