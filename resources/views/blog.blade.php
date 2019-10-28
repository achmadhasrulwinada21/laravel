@extends('layouts.index')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Belajar Laravel Ajax Crud</h1>
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
    <!-- /.content-header -->
<section class="content">
      <div class="container">
         <div class="card">
     <div class="card-header bg-dark text-white">Laravel  Ajax CRUD</div>
  <div class="card-body">
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"><i class="fa fa-plus">&nbsp Tambah Data</i></a><a class="btn btn-info" href="/trash" style="margin-left:4px;"><i class="fa fa-trash">&nbspTong Sampah</i></a><br><br>
    <table class="table table-bordered data-table">
        <thead>
           <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Nim</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table></div><div class="card-footer"></div></div>
 
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Name" value="" maxlength="50" required>
                     </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                              <textarea id="description" name="description" required placeholder="Enter description" class="form-control"></textarea> 
                        </div>
                    </div>
                <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nim</label>
                        <div class="col-sm-12">
                    <select name="nim" id="nim" class="form-control" >
                    <option value="0" selected disabled>- Pilih NiM -</option>
                    @foreach ($mahasiswa as $pemilik)
                        <option value="{{ $pemilik->nim }}">{{ ($pemilik->nim) }} | {{ ($pemilik->nama) }}</option>
                    @endforeach
                    </select>
                     </div><br>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
  </section>
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  
  

  <script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "/blog/json",
        ajax: "{{ route('blog.index') }}",
        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'nim', name: 'nim'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Tambah Data");
        $('#ajaxModel').modal('show');
    });

        $('body').on('click', '.editProduct', function () {
      var id = $(this).data('id');
       $.get("{{ route('blog.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit Data");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#id').val(data.id);
          $('#title').val(data.title);
          $('#description').val(data.description);
          $('#nim').val(data.nim);
      })
   });


  $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
          data: $('#productForm').serialize(),
          url: "/blog/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#productForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
               Swal.fire({
                                type: 'success',
                                title: 'success...',
                                text: 'Data Telah Tersimpan',
                            })
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

        $('body').on('click', '.deleteProduct', function () {
        var id = $(this).data("id");
        $.ajax({
            type: "DELETE",
            url: "{{ route('blog.store') }}"+'/'+id,
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
                table.ajax.reload()
              }
           
        });
    });

   

});
    </script>

 @endsection