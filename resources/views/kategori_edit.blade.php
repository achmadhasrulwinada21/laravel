@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info">Edit Kategori</div>

                <div class="card-body">

	       <form method="post" action="/kategori/update/{{ $kategori->id }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Kode Kategori</label>
                            <input type="text" name="kd_kategori" class="form-control" placeholder="isi kode kategori .." value=" {{ $kategori->kd_kategori }}">

                            @if($errors->has('kd_kategori'))
                                <div class="text-danger">
                                    {{ $errors->first('kd_kategori')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="nm_kategori" class="form-control" placeholder="isi nama kategori .." value=" {{ $kategori->nm_kategori }}">

                            @if($errors->has('nm_kategori'))
                                <div class="text-danger">
                                    {{ $errors->first('nm_kategori')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="submit"  value="Simpan" class="btn btn-success btn-sm">
                      </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection