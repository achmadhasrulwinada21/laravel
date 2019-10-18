@extends('layouts.index')
@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info">Edit User</div>

                <div class="card-body">

	       <form method="post" action="/manajemenuser/update/{{ $manajemenuser->id }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama .." value=" {{ $manajemenuser->name }}">

                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email .." value=" {{ $manajemenuser->email }}">

                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Role</label>

                 <select class="form-control" name="jabatan">
                <option value="admin" {{ 'admin' == $manajemenuser->jabatan ? 'selected="selected"' : '' }}>Admin</option>
                <option value="member" {{ 'member' == $manajemenuser->jabatan ? 'selected="selected"' : '' }}>Member</option>
                </select>

                        {{-- <select class="form-control" name="jabatan">
                            @foreach($userall as $role)
                 <option value="{{ $manajemenuser->jabatan }}" {{ $selectedRole == $manajemenuser->jabatan ? 'selected="selected"' : '' }}>{{ $role->jabatan }}</option>
                  @endforeach    
                         </select> --}}

                        </div>

                        <div class="form-group">
                            <input type="submit"  value="Simpan" class="btn btn-success btn-sm">
                            <a  href="/manajemenuser" class="btn btn-info btn-sm"> Kembali</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection