@extends('admin.layouts')

@section('css')
    <style>
        /* .cust-margin{
            margin: 5% 0 5%;
        } */
    </style>
@endsection

@section('title')
	<h1>
		Tambah Psikolog
		<small>Form untuk menambahkan psikolog baru</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">Tambah Psikolog</div>
            <div class="box-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{route('user.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="">E-Mail <sup style="color: red;">*</sup></label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Peran </label>
                        <input type="text" class="form-control" name="roles" value="Psikolog" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Password <sup style="color: red;">*</sup></label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password <sup style="color: red;">*</sup></label>
                        <input type="password" class="form-control" name="pass_confirm">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection