<html>
<head>
	<title>Tambah Pegawai</title>
	<link rel = "stylesheet" type = "text/css" href = "{!! asset('assets/css/tambah.css') !!}">
	<link rel = "shortcut icon" href="icon.ico" type="image/x-icon">
</head>
<body>
	
	<p><b>Tambah Pegawai</b></p>
	<a href = "/pegawai" class = "kembali">Kembali</a>
	<br/>
	<br/>
	<br/> 
	<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
		<section>
			{{ csrf_field() }}
			<label>Nama</label> <br>
			<input type="text" name="nama" class ="input" required="required" autofocus=""> <br><br>
			
			<label>Jabatan</label> <br>
			<input type="text" name="jabatan" class ="input" required="required"> <br><br>
			
			<label>Umur</label> <br>
			<input type="number" name="umur" class ="input" required="required"> <br><br>
			
			<label>Alamat</label> <br>
			<textarea name="alamat" class ="input" required="required"></textarea> <br> <br>

			<label>Foto</label> <br>
			<input type="file" name="foto" class="input">
			<br> <br>

			<input type="submit" value="Simpan Data" class="submit">
		</section>
	</form>
 
</body>
</html>