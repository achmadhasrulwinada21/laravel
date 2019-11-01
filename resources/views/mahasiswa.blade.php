@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mahasiswa</div>

                <div class="card-body">
	<h2>belajar view</h2>
	{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
	<h3>Data Mahasiswa</h3>
	<a href="/mahasiswa/tambah" class="btn btn-info btn-sm" style="margin-right:5px;"> + Tambah Mahasiswa Baru</a>
     <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#importExcel"><i class="fa fa-upload">&nbspIMPORT EXCEL</i></button>	
	<br/>
	<br/>
<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead  bgcolor="skyblue" style="text-align:center;vertical-align:middle;font-weight:bold;">
		<tr>
			<th>Nama</th>
			<th>Nim</th>
			<th>Alamat</th>
			<th>Aksi</th>
		 </tr>
		 <thead>
		@foreach($mahasiswa as $mhs)
		<tr>
			<td>{{ $mhs->nama }}</td>
			<td>{{ $mhs->nim }}</td>
			<td>{{ $mhs->alamat }}</td>
		     <td>
				<a href="/mahasiswa/edit/{{ $mhs->id }}" data-toggle="tooltip" title="update"><i class="fa fa-edit"></i></a>
				|
				<a href="/mahasiswa/hapus/{{ $mhs->id }}" onclick='return confirm("yakin hapus?");' data-toggle="tooltip" title="hapus"><i class="fa fa-trash"></i></a>
			</td> 
		</tr>
		@endforeach
	</table></div>
   </div>
            </div>
        </div>
    </div>
</div>
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/mahasiswa/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="file">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection