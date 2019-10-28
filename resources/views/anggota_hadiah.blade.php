@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="card mt-5">
			<div class="card-body">
                <a href="/anggota/export_excel" class="btn btn-success my-3" target="_blank"><i class="fa fa-print">&nbspEXPORT To EXCEL</i></a>
				<div class="card-header bg-dark text-white"><h5 class="text-center my-4">Relasi Many To Many</h5></div>
			<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama Pengguna</th>
							<th>Hadiah</th>
							<th width="1%">Jumlah</th>
						</tr>
					</thead>
					<tbody>
						@foreach($anggota as $a)
						<tr>
							<td>{{ $a->nama }}</td>
							<td>
								<ul>
									@foreach($a->hadiah as $h)
									<li> {{ $h->nama_hadiah }} </li>
									@endforeach
								</ul>
							</td>
							<td class="text-center">{{ $a->hadiah->count() }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
    </div>
    @endsection