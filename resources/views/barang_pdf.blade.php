<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang</title>
</head>
<body>
    <center><h4>Laporan Barang</h4></center>
    <hr>
    <br>
	<table class='table table-bordered' border='1' cellpadding="2" cellspacing="0" width="100%">
		<thead>
			<tr style="vertical-align:middle;text-align:center;" bgcolor="skyblue">
				<th>No</th>
                <th>Kode Barang</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($v_tbbarang as $p)
			<tr>
				<td style="vertical-align:middle;text-align:center;">{{ $i++ }}</td>
				<td style="vertical-align:middle;text-align:center;">{{$p->kd_barang}}</td>
				<td style="vertical-align:middle;text-align:center;">{{$p->nm_barang}}</td>
				<td style="vertical-align:middle;text-align:center;">{{$p->nm_kategori}}</td>
				<td style="vertical-align:middle;text-align:center;">{{$p->deskripsi_barang}}</td>
                <td style="vertical-align:middle;text-align:right;">Rp. {{ number_format($p->harga_barang)}},-</td>
            </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>