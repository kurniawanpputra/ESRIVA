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
		Tambah Kategori
		<small>Menampilkan form untuk menambah kategori</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">Tambah Kategori</div>

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
                <form action="{{route('categories.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection