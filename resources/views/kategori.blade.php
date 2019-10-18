@extends('layouts.index')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kategori Barang</h1>
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
                <div class="card-header bg-info">Kategori Barang</div>

                <div class="card-body">
                  <a href="/kategori/tambah" class="btn btn-info btn-sm"><i class="fa fa-plus">&nbspTambah</i></a><br><br>
	<table id="kat" class="table table-striped table-bordered table-list">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center;font-weigth:bold">
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Kategori</th>
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
          var table_kat = $('#kat').DataTable({
              processing: true,
              serverSide: true,
              ajax: '/kategori/json',
              columns: [
                  { data: 'DT_RowIndex', name:'DT_RowIndex'},
                  { data: 'kd_kategori', name: 'kd_kategori' },
                  { data: 'nm_kategori', name: 'nm_kategori' },
                 {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
          });


          // $('#hapusUser').click(function(){
          //   alert('jalan')
          // })

          $(document).on('click','#hapuskat',function(){
            // dapetin dulu ID si usernya dari tag element button data-id
            var id = $(this).data('id')

            // kirim data ke server untuk hapus user dengan id 
            $.ajax({
              type: "DELETE",
              url: "/kategori/hapus/" + id,
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
                table_kat.ajax.reload()
              }
            });
          })




      });


    </script>
@endsection