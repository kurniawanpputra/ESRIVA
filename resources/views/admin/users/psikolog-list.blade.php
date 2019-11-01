@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
        .filter-margin{
            margin-top: 0;
        }
        .filter-margin-2{
            margin-top: 0;
        }
        @media only screen and (max-width: 991px) {
            .filter-margin{
                margin-top: 5px;
            }
            .filter-margin-2{
                margin-top: 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box box-body" style="margin: 5% 0 -3% 0;">
            <div class="row">
                <form action="{{route('psikolog.list')}}" method="GET" id="filter-form">
                    <div class="col-md-10">
                        <input type="text" name="query" placeholder="Cari psikolog berdasarkan nama atau email..." class="form-control" 
                               value="{{count(request()->query) > 0 ? request()->get('query') : ''}}" id="query">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" value="Cari" class="btn btn-primary btn-block filter-margin-2">
                    </div>
                </form>
                <div class="col-md-1">
                    <button value="Hapus" class="btn btn-default btn-block filter-margin" id="clear-form">Hapus</button>
                </div>
            </div>
        </div>

        <div class="box cust-margin">
            <div class="box-header with-border">
                Daftar Psikolog

                <span class="pull-right">
                    <a href="{{route('user.create')}}" class="btn btn-primary btn-xs">
                        Tambah Psikolog
                    </a>
                </span>
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
                
                @if($users->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>E-Mail</th>
                                <th>Poin</th>
                                <th>Artikel Dibuat</th>
                                <th>Komentar Dibuat</th>
                                <th>Login Terakhir</th>
                                <th style="width: 20%">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->points}}</td>
                                    <td>{{$u->articles->count()}}</td>
                                    <td>{{$u->comments->count()}}</td>
                                    <td>{{isset($u->last_login->last()->created_at) ? $u->last_login->last()->created_at->diffForHumans() : "-"}}</td>
                                    <td class="text-center">
                                        @if($u->is_banned == 0)
                                            @if($u->id != auth()->user()->id)
                                                <a href="{{route('user.ban', $u->id)}}" class="btn btn-danger btn-xs">Cabut Akses</a>
                                            @endif
                                        @else
                                            <a href="{{route('user.unban', $u->id)}}" class="btn btn-success btn-xs">Beri Akses</a>
                                        @endif

                                        <a href="{{route('user.edit', $u->id)}}" class="btn btn-info btn-xs">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada psikolog.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#clear-form').click(function() {
            $('#query').val("");
            $('#filter-form').submit();
        });
    </script>
@endsection
