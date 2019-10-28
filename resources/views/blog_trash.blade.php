@extends('layouts.index')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Halaman Trash</h1>
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
            @if ($message = Session::get('hapus'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ $message }}</strong>
				</div>
                @endif
            @if ($message = Session::get('restore'))
				<div class="alert alert-info alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ $message }}</strong>
				</div>
                @endif
              @if ($message = Session::get('restoreall'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button> 
					<strong>{{ $message }}</strong>
				</div>
				@endif
<div class="card">
  <div class="card-header bg-dark text-white">Laravel Soft Delete Restore</div>
  <div class="card-body">
      <a class="btn btn-success" href="/trash/kembalikansemua" id=""><i class="fa fa-undo">&nbspRestore All</i></a><a class="btn btn-danger"  href="/trash/hapus_permanen_semua" style="margin-left:4px;" onclick="return confirm('yakin hapus permanen');"><i class="fa fa-trash">&nbspDelete All</i></a>
    <br><br>
    <table class="table table-hover table-striped data-table2">
        <thead>
           <tr bgcolor="skyblue" style="color:black;font-weight:bold;">
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
    var table = $('.data-table2').DataTable({
        processing: true,
        serverSide: true,
        // ajax: "/blog/json",
        ajax: "/trash",
        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'nim', name: 'nim'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

         $('body').on('click', '.deleteProduct2', function () {
        var id = $(this).data("id");
        $.ajax({
            type: "DELETE",
            url: "/trash/hapus_permanen"+'/'+id,
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