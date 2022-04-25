<?php include('../koneksi.php'); ?>

		<center><font size="6">Tambah Buku</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$nama_buku			= $_POST['nama_buku'];
			$nama_pembuat	= $_POST['nama_pembuat'];
			$genre	= $_POST['genre'];
			$sinopsis		= $_POST['sinopsis'];

			$cek = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'") or die(mysqli_error($conn));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($conn, "INSERT INTO buku(id, nama_buku, nama_pembuat, genre, sinopsis) VALUES('$id', '$nama_buku', '$nama_pembuat','$genre', '$sinopsis')") or die(mysqli_error($conn));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tampil.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambah.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Buku</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_buku" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pembuat</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
                    <input type="text" name="nama_pembuat" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Genre</label>
				<div class="col-md-6 col-sm-6">
					<select name="genre" class="form-control" required>
						<option value="">Pilih Genre</option>
						<option value="komedi">Komedi</option>
						<option value="percintaan">Percintaan</option>
						<option value="action">Action</option>
						<option value="drama">Drama</option>
						<option value="isekai">Isekai</option>
						<option value="teknologi">Teknologi</option>
					</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Sinopsis</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
                    <input type="text" name="sinopsis" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
