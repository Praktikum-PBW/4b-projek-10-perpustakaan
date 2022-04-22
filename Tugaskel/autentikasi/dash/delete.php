<?php

include('../koneksi.php');


if(isset($_GET['id'])){
	$id= $_GET['id'];


	$cek = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'") or die(mysqli_error($conn));


	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM buku WHERE id='$id'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="tampil.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="tampil.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="tampil.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="tampil.php";</script>';
}

?>
