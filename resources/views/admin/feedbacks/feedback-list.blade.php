@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
        .table > tbody > tr > td.middle{
            vertical-align: middle;
            display: table-cell;
        }
    </style>
@endsection

@section('content')
    <div class="container">
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
                                    <td class="middle">{{$f->title}}</td>
                                    <td><p>{!! $f->body !!}</p></td>
                                    <td class="middle">{{$status}}</td>
                                    <td class="middle">{{$f->created_at->addHours(7)}}</td>
                                    <td class="text-center middle">
                                        @if($status == "Belum Selesai")
                                            <a href="{{route('feedback.finished', $f->id)}}" class="btn btn-xs btn-success">Tandai Selesai</a>
                                        @else
                                            <a href="{{route('feedback.unfinished', $f->id)}}" class="btn btn-xs btn-warning">Batal Selesai</a>
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
        </div>
    </div>
@endsection
