@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info">Edit Barang</div>

                <div class="card-body">

	       <form method="post" action="/barang/update/{{ $barang->id }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="kd_barang" class="form-control" placeholder="kode barang .." value=" {{ $barang->kd_barang }}" readonly>

                            @if($errors->has('kd_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('kd_barang')}}
                                </div>
                            @endif

                        </div>
                   <div class="form-group">
                            <label>Barang</label>
                            <input type="text" name="nm_barang" class="form-control" placeholder="nama barang .." value=" {{ $barang->nm_barang }}">

                            @if($errors->has('nm_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('nm_barang')}}
                                </div>
                            @endif

                        </div>
                   <div class="form-group">
                            <label>Deskripsi</label> 
                         <textarea id="content" class="form-control" name="deskripsi_barang">{{ $barang->deskripsi_barang }}</textarea>
                     </div>
                     <div class="form-group">
                            <label>Upload</label> 
                            <div class="row">
                             <div class="col s6">
            <img src="{{ URL::to("/data_file/produk/$barang->upload_barang")}}" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div></div><br>
        <div class="row">
        <div class="input-field col s6">
          <input type="file" id="inputgambar" name="upload_barang" class="validate"/ >
        </div>
      </div>
                      </div>
                    <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga_barang" class="form-control"  value=" {{ $barang->harga_barang }}">

                            @if($errors->has('harga_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('harga_barang')}}
                                </div>
                            @endif

                        </div>
                 
            <div class="form-group">
                <label>Kategori Barang</label>
                <select class="form-control" name="kd_kategori">
                            @foreach($kategori as $role)
                 <option value="{{ $role->kd_kategori }}" {{ $barang->kd_kategori == $role->kd_kategori ? 'selected="selected"' : '' }}>{{ $role->nm_kategori }}</option>
                  @endforeach    
                </select>

            </div>

                        <div class="form-group">
                            <input type="submit"  value="Simpan" class="btn btn-success btn-sm">
                        </div>

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