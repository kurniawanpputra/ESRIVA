@extends('admin.layouts')

@section('css')
    <style>
        /* .cust-margin{
            margin: 5% 0 5%;
        } */
        .table > tbody > tr > td.middle{
            vertical-align: middle;
            display: table-cell;
        }
    </style>
@endsection

@section('title')
	<h1>
		Umpan Balik
		<small>Menampilkan data umpan balik dari pengguna</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">
                Daftar Umpan Balik
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
                @if($feedbacks->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Peran</th>
                                <th>Jenis</th>
                                <th>Judul</th>
                                <th style="width: 40%">Konten</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th style="width: 10%">Tindakan</th>
                            </tr>
                        </thead>     

                        <tbody>
                            @foreach($feedbacks as $f)
                                @php
                                    if($f->is_finished == 1) {
                                        $status = "Selesai";
                                    }else{
                                        $status = "Belum Selesai";
                                    }

                                    if($f->user->roles == 1) {
                                        $role = "User";
                                    }elseif($f->user->roles == 2) {
                                        $role = "Psikolog";
                                    }else{
                                        $role = "Admin";
                                    }
                                @endphp

                                <tr>
                                    <td class="middle">{{App\User::find($f->user_id)->name}}</td>
                                    <td class="middle">{{$role}}</td>
                                    <td class="middle text-bold @if($f->type != 'Keluhan') text-success @else text-danger @endif">{{$f->type}}</td>
                                    <td class="middle">{{$f->title}}</td>
                                    <td><p>{!! $f->body !!}</p></td>
                                    <td class="middle">{{$status}}</td>
                                    <td class="middle">{{$f->created_at->addHours(7)}}</td>
                                    <td class="text-center middle">
                                        @if($f->type == "Keluhan")
                                            @if($status == "Belum Selesai")
                                                <a href="{{route('feedback.finished', $f->id)}}" class="btn btn-xs btn-success">Tandai Selesai</a>
                                            @else
                                                <a href="{{route('feedback.unfinished', $f->id)}}" class="btn btn-xs btn-warning">Batal Selesai</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada umpan balik.</p>
                @endif
            </div>
            <div class="text-center">
                {{$feedbacks->links()}}
            </div>
        </div>
    </div>
@endsection
