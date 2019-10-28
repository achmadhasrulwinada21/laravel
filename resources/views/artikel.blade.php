@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
		<div class="card mt-5">
			<div class="card-body">
				<div class="card-header bg-dark text-white"><h5 class="text-center my-4">Relasi One To many</h5></div>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Judul Article</th>
                            <th>Tag</th>
                            <th>Jumlah Tag</th>
						</tr>
					</thead>
					<tbody>
						@foreach($artikel as $a)
						<tr>
							<td>{{ $a->judul  }}</td>
							<td>@foreach($a->tags as $t)
									{{$t->tag}},
                                @endforeach</td>
                          <td class="text-center">{{ $a->tags->count() }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
    </div>
    @endsection