@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info">Tambah Kategori</div>

                <div class="card-body">
	
	<form action="/kategori/insert" method="post">
		{{ csrf_field() }}
		<label>Kode Kategori</label><br>
		<input type="text" name="kd_kategori" class="form-control" placeholder="isi kode kategori...">
		 @if($errors->has('kd_kategori'))
            <div class="text-danger">
             {{ $errors->first('kd_kategori')}}
           </div>
        @endif
		<br/>
		<label>Kategori</label><br>
		<input type="text" name="nm_kategori" class="form-control" placeholder="isi nama kategori...">
		 @if($errors->has('nm_kategori'))
            <div class="text-danger">
             {{ $errors->first('nm_kategori')}}
           </div>
        @endif
		<br/>
		<input type="submit" value="Simpan Data" class="btn btn-info btn-sm">
	</form>

</div>
            </div>
        </div>
    </div>
</div>
@endsection