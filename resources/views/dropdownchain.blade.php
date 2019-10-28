@extends('layouts.index')
  @section('content')

   <style>
   #loader{
   visibility:hidden;
   }
   </style>
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Belajar Dropdown Chained</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<section class="content">
      <div class="container">

    <div class="card">
        <div class="card-header bg-dark text-white">Laravel Dropdown Chained</div>
           <div class="card-body">
     <form action="#" method="post">
		{{ csrf_field() }}
      <table  class="table table-striped table-hover table-list">
          <tr>
              <td></td>
              <td></td> 
              <td></td>
          </tr>
          <tr>
              <td><label>Provinsi</label></td>
              <td> : </td> 
              <td><select name="provinsi" class="form-control" id="sProvinsi" style="width:600px;">
                 <option value="0">- Pilih Provinsi -</option>
                  @foreach ($provinsi as $p)
                        <option value="{{ $p->id }}">{{ ($p->nama) }}</option>
                    @endforeach      
            </select></td>
          </tr>
            <tr>
              <td><label>Kabupaten</label></td>
              <td> : </td> 
              <td><select name="kabupaten" class="form-control" id="sKabupaten" style="width:600px;">
                <option value="">- Pilih Kabupaten -</option>
                   </select><div class="col-md-2"></td>
          </tr>
          <tr>
              <td><label>Kecamatan</label></td>
              <td> : </td> 
              <td><select name="kecamatan" class="form-control" id="skecamatan" style="width:600px;">
                <option value="">- Pilih Kecamatan -</option>
                   </select><div class="col-md-2"></td>
          </tr>
          <tr>
              <td><label>Kelurahan</label></td>
              <td> : </td> 
              <td><select name="kelurahan" class="form-control" id="skelurahan" style="width:600px;">
                <option value="">- Pilih Kelurahan -</option>
                   </select><div class="col-md-2"></td>
          </tr>
      </table>
</form></div>
<div class="card-footer"><b>Laravel</b></div></div>
<span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
</div>
</section>
<script type="text/javascript">

$(document).ready(function() {

    $('select[name="provinsi"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/dropdownchain/getkabupaten/'+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="kabupaten"]').empty();
                    $('#sKabupaten').append('<option>--pilih kabupaten--</option>');
                    $.each(data, function(key, value){

                        $('select[name="kabupaten"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kabupaten"]').empty();
        }

    });

    $('select[name="kabupaten"]').on('change', function(){
        var kabupatenId = $(this).val();
        if(kabupatenId) {
            $.ajax({
                url: '/dropdownchain/getkecamatan/'+kabupatenId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="kecamatan"]').empty();
                      $('#skecamatan').append('<option>--pilih kecamatan--</option>');
                    $.each(data, function(key, value){

                        $('select[name="kecamatan"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kecamatan"]').empty();
        }

    });

     $('select[name="kecamatan"]').on('change', function(){
        var kecamatanId = $(this).val();
        if(kecamatanId) {
            $.ajax({
                url: '/dropdownchain/getkelurahan/'+kecamatanId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="kelurahan"]').empty();
                      $('#skelurahan').append('<option>--pilih kelurahan--</option>');
                    $.each(data, function(key, value){

                        $('select[name="kelurahan"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kecamatan"]').empty();
        }

    });

});
     </script>
  @endsection
