@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
		<div class="card mt-5">
			<div class="card-body">
				<div class="card-header bg-dark text-white"><h5 class="text-center my-4">Relasi One To One</h5></div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Pengguna</th>
							<th>Nomor Telepon</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pengguna as $p)
						<tr>
							<td>{{ $p->nama }}</td>
							<td>{{ $p->telepon->nomor_telepon }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
    </div>
    @endsection