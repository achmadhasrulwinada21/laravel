@extends('layouts.main')
@section('content21')

<!--header-->
<header>
    <div class="jumbotron jumbotron-fluid bg-info text-light" style="margin-bottom:0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Welcome to My Web</h1>
                    <div class="lead">Aku sedang belajar Bootstrap 4</div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--navbar atas-->
    	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Ini Web</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link2</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">aksi</a>
          <a class="dropdown-item" href="#">aksi2</a>
          <a class="dropdown-item" href="#">aksi3</a>
    </div>
      </li>
    </ul>
</div>
</nav>

<!--content-->
 <div class=”container” style="margin-top:30px;margin-bottom:30px"> 
    <div class="row" style="margin-left:70px">
        <div class="col-md-4">
          <label>Kategori Barang</label><br>
                     <select name="kd_kategori" id="merks" class="form-control @error('kd_kategori') is-invalid @enderror" >
                    <option value="0" selected disabled>- Pilih Kategori Barang -</option>
                    <option value="0">semua</option>
                    @foreach ($kategori as $pemilik)
                        <option value="{{ $pemilik->kd_kategori }}">{{ ($pemilik->nm_kategori) }}</option>
                    @endforeach
                    </select>
        </div> 
    </div><hr>
     {{-- <div class="col-md-4">
        <label>cari</label><br>
        <input type="text" class="form-control"  id="auto"/><br>
        <label>hasil</label><br>
         <div id="hasil">
          <input type="text" class="form-control" name="harga"><br>
           <textarea class="form-control" id="content"></textarea>
         </div>
         </div> --}}
        
    <br><br>
       <div class="row">
@foreach($transaksijual as $tj)
    <div class="col-4">
<table class="table table-striped table-list" width="100%" id="motors">
  <thead>
  <tr><th width="20%"></th><th width="20%"></th> <th width="4%"></th> <th width="56%"><center style="margin-bottom:10px"><img src="{{ URL::to('/data_file/produk/'.$tj->upload_barang.'')}}" style="height:200px;width:200px;"></center></th></tr>
    <tr><th width="20%"></th><th width="20%">Barang</th> <th width="4%">:</th> <th width="56%">{{ $tj->nm_barang }}</th></tr>
    <tr><th width="20%"></th><th>Harga</th>  <th width="4%">:</th> <th width="56%">{{ $tj->harga_barang }}</th></tr>
    <tr><th width="20%"></th><th>Keterangan</th> <th width="4%">:</th> <th width="56%">{!! $tj->deskripsi_barang !!}</th></tr>
  </thead>
</table>
   </div>
     @endforeach
  </div>
</div>

<!--footer-->
<div class="jumbotron text-center" style="margin-bottom:0">
  <p><b>Footer</b></p>
</div>



    <script type="text/javascript">
        $(document).ready(function(){
            $('#merks').on('change', function(e){
                var id = e.target.value;
                $.get('{{ url('transaksi')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#motors').empty();
                    $.each(data, function(index, element){
                        $('#motors').append("<tr><th>"+element.nm_barang+"</th><th>"+element.harga_barang+"</th>"+
                        "<th>"+element.deskripsi_barang+"</th></tr>");
                    });
                });
            });
        });
    </script>

 {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#auto').on('input', function(e){
                var id = e.target.value;
                $.get('{{ url('transaksi')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#hasil').empty();
                    $.each(data, function(index, element){
                        $('#hasil').append("<input value="+element.harga_barang+" class='form-control' name='harga' type='text'></input><textarea>"+element.deskripsi_barang+"</textarea>");
                    });
                });
            });
        });
    </script>  --}}

    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#auto').on('input', function(e){
                var id = e.target.value;
                $.get('{{ url('transaksi')}}/'+id, function(data){
                    console.log(id);
                    console.log(data);
                    $('#hasil').empty();
                    $.each(data, function(index, element){
                        $('#hasil').val(element.harga_barang);
                         $('#hsl').val(element.deskripsi_barang);
                    });
                });
            });
        });
    </script>  --}}

  <script type="text/javascript">
  $(document).ready(function() {
    $('#content').summernote({
      height: "300px",
      styleWithSpan: false
    });
  }); 
</script>
    @endsection	
    