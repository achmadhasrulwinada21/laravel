@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
	<h2>belajar view</h2>
	<h3>Data Mahasiswa</h3>

	<a href="/mahasiswa/tambah"> + Tambah Mahasiswa Baru</a>
	
	<br/>
	<br/>

	<table border="1" cellpadding="2" cellspacing="2">
		<tr bgcolor="grey" style="color:white;">
			<th>Nama</th>
			<th>Nim</th>
			<th>Alamat</th>
			<th>Aksi</th>
		 </tr>
		@foreach($mahasiswa as $mhs)
		<tr>
			<td>{{ $mhs->nama }}</td>
			<td>{{ $mhs->nim }}</td>
			<td>{{ $mhs->alamat }}</td>
		     <td>
				<a href="/mahasiswa/edit/{{ $mhs->id }}">Edit</a>
				|
				<a href="/mahasiswa/hapus/{{ $mhs->id }}" onclick='return confirm("yakin hapus?");'>Hapus</a>
			</td> 
		</tr>
		@endforeach
	</table>
   </div>
            </div>
        </div>
    </div>
</div>
@endsection