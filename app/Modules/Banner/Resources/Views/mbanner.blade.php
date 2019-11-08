@extends('layouts.index')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manajemen Banner</h1>
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
            @if ($message = Session::get('sukses'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ $message }}</strong>
				</div>
                @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">Manajemen Banner</div>

                <div class="card-body">
<a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" style="color:white;"><i class="fa fa-plus">&nbsp Tambah Data</i></a><br><br>
	<table class="table table-striped table-bordered table-list kat">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center;font-weigth:bold">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Upload</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr> 
                  </thead>
                  
                </table>
   </div>
    </div>
        </div>
    </div>
</div>
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Tambah File</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
      <div class="modal-body">
        <form action="/banner/insert" method="post" enctype="multipart/form-data" id="productForm">
            {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  name="nama" placeholder="Enter nama" value="" maxlength="50" required>
                     </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">File</label>
                        <div class="col-sm-12">
                            <div class="custom-file">
                         <input type="file" class="custom-file-input" id="customFile" name="upload">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                         </div>
                     </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  name="ket" placeholder="Enter keterangan" value="" maxlength="50" required>
                     </div>
                    </div>
                     <br>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary"  value="create" id="saveBtn">Save changes
                     </button>
                    </div>
                </form>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
      foreach($db as $i){
      $id= $i['id'];
      $ket= $i['ket'];
      $upload= $i['upload'];
      $nama = $i['nama'];
         ?>
<div id="modal_edit{{ $id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
      <div class="modal-body">
        <form action="/banner/update/{{ $id }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
                  <input type="hidden" value="{{ $id }}">
                 <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  name="nama" value="{{ $nama }}" placeholder="Enter nama" value="" maxlength="50" required>
                     </div>
                    </div>
                 <div class="form-group">
                        <label>Upload File</label> 
                          <div class="row">
                             <div class="col s6">
                             <img src="{{ URL::to("$upload")}}" id="showgambar2" style="max-width:100px;max-height:100px;float:left;"/></a>
                            </div>
                        </div>
                        <br>
                    <div class="row">
                       <div class="input-field col s6">
                            <div class="custom-file">
                           <input type="file" id="inputgambar2" name="upload" class="custom-file-input">
                         <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                       </div>
                   </div>
                </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  name="ket" value="{{ $ket }}" placeholder="Enter keterangan" value="" maxlength="50" required>
                     </div>
                    </div>
                   <br>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary"  value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <?php } ?>
 </section>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    

      $(function() {

           $.ajaxSetup({
          headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

          var table_kat = $('.kat').DataTable({
              processing: true,
              serverSide: true,
              ajax: '/banner/json',
              columns: [
                  { data: 'DT_RowIndex', name:'DT_RowIndex'},
                  { data: 'nama', name: 'nama' },
                   { data: 'upload',
                  'searchable': false,
                  'orderable':false,
                  'render': function (data, type, full, meta)
                     {
                      return '<center><img src="http://laravel.local/'+data+'" style="height:100px;width:100px;"/></center>';
                      }
                   },
                  { data: 'ket', name: 'ket' },
                   {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
          });
           $('body').on('click', '.deleteProduct', function () {
        var id = $(this).data("id");
        $.ajax({
            type: "DELETE",
            url: "/banner/destroy"+'/'+id,
             success: function(data){
                var json  = JSON.parse(data)

                switch (json.code) {
                  case 200:
                     Swal.fire({
                                type: 'success',
                                title: 'Oops...',
                                text: 'Data has been Deleted!',
                            })
                    break;
                  default:
                    break;
                }

                // refresh datatablesnya kalau sudah menghapus usernya
                table_kat.ajax.reload()
              }
           
        });
 });
    
           });
          </script>
          <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
 @endsection