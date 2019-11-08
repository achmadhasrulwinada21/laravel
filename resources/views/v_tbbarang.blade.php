@extends('layouts.index')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">Data Barang</div>

                <div class="card-body">
                  <a href="/report/cetak_pdf" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print">&nbspPrint to Pdf</i></a><br><br>
	<table id="vbrg" class="table table-striped table-bordered table-list">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center;font-weigth:bold">
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                    </tr> 
                  </thead>
                  
                </table>
   </div>
    </div>
        </div>
    </div>
</div>

 <!--modal -->
            <!--endmodal -->

    </section>
   <!-- /.content -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
      $(function() {
           $('#vbrg').DataTable({
              processing: true,
              serverSide: true,
              ajax: '/report/json',
              columns: [
                  { data: 'DT_RowIndex', name:'DT_RowIndex'},
                  { data: 'kd_barang', name: 'kd_barang' },
                  { data: 'nm_barang', name: 'nm_barang' },
                  { data: 'nm_kategori', name: 'nm_kategori' },
                   {data: 'action', name: 'upload', orderable: false, searchable: false},
                  { data: 'harga_barang', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp ' ) },
                    
                  { data: 'upload_barang',
                  'searchable': false,
                  'orderable':false,
                  'render': function (data, type, full, meta)
                     {
                  return '<center><img src="http://laravel.local/data_file/produk/'+data+'" style="height:100px;width:100px;"/></center';
                     }
                   }
                ]
          });

      });


    </script>
@endsection