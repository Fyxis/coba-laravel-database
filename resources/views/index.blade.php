<html>
<head>
	<title>Data Pegawai</title>
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/index.css') !!}">
	<link rel="shortcut icon" href="icon.ico" type="image/x-icon">
</head>
<body>
	<a href = "/pegawai" class = "judul">Data Pegawai</a>
<br/>
<br/>
	<a href="/pegawai/tambah" class = "tambah"> +&nbsp; Tambah Pegawai Baru</a>
	
	<br/>
	<br/>
 
	<table border="1">
		<tr>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Umur</th>
			<th>Alamat</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
		@foreach($pegawai as $p)
		<tr>
			<td>{{ $p->pegawai_nama }}</td>
			<td>{{ $p->pegawai_jabatan }}</td>
			<td>{{ $p->pegawai_umur }}</td>
			<td>{{ $p->pegawai_alamat }}</td>
			<td><img src="{{ asset('storage/foto/'. $p->pegawai_foto) }}" alt="Person Picture" class = "c_foto"></td>
			{{-- <img src="{{ asset('storage/foto/' . $p->pegawai_foto) }}" alt="Person Picture" --}}
			<td>
				<a href="/pegawai/edit/{{ $p->pegawai_id }}" class = "edit">Edit</a>
				|
				{{-- <a href="/pegawai/hapus/{{ $p->pegawai_id }}" class = "hapus" onclick="myFunction()">Hapus</a> --}}
				<a class = "hapus" onclick="if (confirm('Tenan ki delete? delete lho iki? SERIUS?')) window.location.href = '/pegawai/hapus/{{ $p->pegawai_id }}';">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>

</body>
</html>