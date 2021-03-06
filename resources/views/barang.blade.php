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
                  <a href="/barang/tambah" class="btn btn-info btn-sm"><i class="fa fa-plus">&nbspTambah</i></a><br><br>
	<table id="brg" class="table table-striped table-bordered table-list">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center;font-weigth:bold">
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Barang</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
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
          var table_brg = $('#brg').DataTable({
              processing: true,
              serverSide: true,
              ajax: '/barang/json',
              columns: [
                  { data: 'DT_RowIndex', name:'DT_RowIndex'},
                  { data: 'kd_barang', name: 'kd_barang' },
                  { data: 'nm_barang', name: 'nm_barang' },
                  {data: 'action', name: 'upload', orderable: false, searchable: false},
                  { data: 'harga_barang', render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp ' ) },
                    
                  { data: 'upload_barang',
                  'searchable': false,
                  'orderable':false,
                  'render': function (data, type, full, meta)
                     {
                  return '<center><img src="http://laravel.local/data_file/produk/'+data+'" style="height:100px;width:100px;"/></center';
                     }
                   },
                    { data: 'id', 
                   "render": function ( data, type, row, meta ) {
                            return '<a href="/barang/edit/'+data+'" title="edit" class="btn btn-xs btn-warning" style="margin-bottom:4px;margin-right:2px;"><i class="fa fa-edit"></i></a><a data-id="'+data+'" class="btn btn-xs btn-danger" style="margin-bottom:4px;" title="hapus" id="hapusbrg"><i class="fa fa-trash"></i></a>';
                       }
                }
              ]
          });


          // $('#hapusUser').click(function(){
          //   alert('jalan')
          // })

          $(document).on('click','#hapusbrg',function(){
            // dapetin dulu ID si usernya dari tag element button data-id
            var id = $(this).data('id')

            // kirim data ke server untuk hapus user dengan id 
            $.ajax({
              type: "DELETE",
              url: "/barang/hapus/" + id,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                var json  = JSON.parse(data)

                switch (json.code) {
                  case 200:
                      alert(json.message)
                    break;
                  default:
                    break;
                }

                // refresh datatablesnya kalau sudah menghapus usernya
                table_brg.ajax.reload()
              }
            });
          })




      });


    </script>
@endsection