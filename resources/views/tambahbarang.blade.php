@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info">Tambah Barang</div>

                <div class="card-body">
	
	<form action="/barang/insert" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label>Kode Barang</label><br>
		<input type="text" name="kd_barang" class="form-control" placeholder="isi kode barang...">
		 @if($errors->has('kd_barang'))
            <div class="text-danger">
             {{ $errors->first('kd_barang')}}
           </div>
        @endif
		<br/>
		<label>Barang</label><br>
		<input type="text" name="nm_barang" class="form-control" placeholder="isi nama barang...">
		 @if($errors->has('nm_barang'))
            <div class="text-danger">
             {{ $errors->first('nm_barang')}}
           </div>
        @endif
        <br/>
        <label>Dekripsi</label> <br>
		<textarea name="deskripsi_barang" class="form-control" id="content"></textarea>
		 @if($errors->has('deskripsi_barang'))
            <div class="text-danger">
             {{ $errors->first('deskripsi_barang')}}
           </div>
        @endif
		<br/>
        <label>Upload</label><br>
		<input type="file" name="upload_barang" class="form-control" accept="image/*">
        <br/>
        <label>Harga</label><br>
		<input type="text" name="harga_barang" class="form-control" placeholder="isi harga barang...">
		 @if($errors->has('harga_barang'))
            <div class="text-danger">
             {{ $errors->first('harga_barang')}}
           </div>
        @endif
        <br/>
         <label>Kategori Barang</label><br>
                     <select name="kd_kategori" class="form-control @error('kd_kategori') is-invalid @enderror" >
                    <option value="0" selected disabled>- Pilih Kategori Barang -</option>
                    @foreach ($kategori as $pemilik)
                        <option value="{{ $pemilik->kd_kategori }}">{{ ($pemilik->nm_kategori) }}</option>
                    @endforeach
                    </select>

                            @error('kd_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
		<input type="submit" value="Simpan Data" class="btn btn-info btn-sm">
	</form>

</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#content').summernote({
      height: "300px",
      styleWithSpan: false
    });
  }); 
</script>
@endsection