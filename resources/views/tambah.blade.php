@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

	<h3>Data Mahasiswa</h3>

	<a href="/mahasiswa"> Kembali</a>
	
	<br/>
	<br/>

	<form action="/mahasiswa/insert" method="post">
		{{ csrf_field() }}
		<label>Nama</label><br>
		<input type="text" name="nama">
		 @if($errors->has('nama'))
            <div class="text-danger">
             {{ $errors->first('nama')}}
           </div>
        @endif
		<br/>
		<label>NIM</label><br>
		<input type="text" name="nim">
		 @if($errors->has('nim'))
            <div class="text-danger">
             {{ $errors->first('nim')}}
           </div>
        @endif
		<br/>
		<label>Alamat</label> <br>
		<textarea name="alamat"></textarea>
		 @if($errors->has('alamat'))
            <div class="text-danger">
             {{ $errors->first('alamat')}}
           </div>
        @endif
		<br/>
		<input type="submit" value="Simpan Data">
	</form>

</div>
            </div>
        </div>
    </div>
</div>
@endsection