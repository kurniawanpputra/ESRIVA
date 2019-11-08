@extends('admin.layouts')

@section('title')
	<h1>
		Pesan Beranda
		<small>Menampilkan pesan yang dibuat dari beranda</small>
	</h1>
@stop

@section('content')
    <div class="box cust-margin">
        <div class="box-header with-border">
            Daftar Pesan Beranda
        </div>
        <div class="box-body table-responsive">
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
            @if($messages->count() > 0)
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>Telepon</th></th>
                            <th>Konten</th>
                            <th>IP Address</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($messages as $m)
                            <tr>
                                <td class="middle">{{$m->name}}</td>
                                <td class="middle">{{$m->email}}</td>
                                <td class="middle">{{$m->phone}}</td>
                                <td class="middle">{{$m->msg}}</td>
                                <td class="middle">{{$m->ip}}</td>
                                <td class="middle">{{$m->created_at->addHours(7)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada pesan.</p>
            @endif
        </div>
    </div>
@stop
