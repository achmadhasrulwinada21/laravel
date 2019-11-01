@extends('layouts.index')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<br><br>
<div class="container">
    <div class="card mt-5">
			<div class="card-body">
                <a href="/anggota/export_excel" class="btn btn-success my-3" target="_blank"><i class="fa fa-print">&nbspEXPORT To EXCEL</i></a>
				
			<table id="brg" class="table table-striped table-bordered table-list">
                  <thead>
                    <tr style="vertical-align:middle;text-align:center;font-weigth:bold">
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Hadiah</th>
                        <th>Jumlah Hadiah</th>
                    </tr> 
                  </thead>
                  
                </table>
			</div>
		</div>
    </div>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
      $(function() {
          var table_brg = $('#brg').DataTable({
              processing: true,
              serverSide: true,
              ajax: '/anggota/json',
              columns: [
                  { data: 'DT_RowIndex', name:'DT_RowIndex'},
                  { data: 'nama', name: 'nama' },
                  { data: 'hadiah', name: 'hadiah' },
                   { data: 'total', name: 'total' }
                  ]
          });
      });


    </script>
    @endsection