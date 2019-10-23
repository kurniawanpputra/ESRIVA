@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box box-body" style="margin: 5% 0 -3% 0;">
            <div class="row">
                <form action="{{route('user.list')}}" method="GET" id="filter-form">
                    <div class="col-md-10">
                        <input type="text" name="query" placeholder="Cari pengguna berdasarkan nama atau email..." class="form-control" 
                               value="{{count(request()->query) > 0 ? request()->get('query') : ''}}" id="query">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" value="Cari" class="btn btn-primary btn-block">
                    </div>
                </form>
                <div class="col-md-1">
                    <button value="Hapus" class="btn btn-default btn-block" id="clear-form">Hapus</button>
                </div>
            </div>
        </div>

        <div class="box cust-margin">
            <div class="box-header with-border">
                Daftar Pengguna

                <span class="pull-right">
                    <a data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-xs">Reset Jumlah Baca</a>

                    <!-- MODAL RESET -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="modal-title" id="exampleModalLabel">Konfirmasi Reset Jumlah Baca</span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin mereset semua data jumlah baca pengguna? 
                                    Tindakan ini tidak bisa dibatalkan, dengan arti semua data yang diubah tidak bisa dikembalikan.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="{{route('user.read-reset')}}" class="btn btn-primary">Konfirmasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <th>Login Terakhir</th>
                                <th>Status Akun</th>
                                <th>Forum Dibuat</th>
                                <th>Artikel Dibaca</th>
                                <th style="width: 20%">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{isset($u->last_login->last()->created_at) ? $u->last_login->last()->created_at->diffForHumans() : "-"}}</td>
                                    <td>
                                        @if(count($u->memberships) > 0 && $u->memberships->last()->expired > \Carbon\Carbon::now())
                                            PREMIUM
                                        @else
                                            REGULER
                                        @endif
                                    </td>
                                    <td>{{$u->forums->count()}}</td>
                                    <td>{{$u->article_read}}</td>
                                    <td class="text-center">
                                        @if($u->is_banned == 0)
                                            @if($u->id != auth()->user()->id)
                                                <a href="{{route('user.ban', $u->id)}}" class="btn btn-danger btn-xs">Cabut Akses</a>
                                            @endif
                                        @else
                                            <a href="{{route('user.unban', $u->id)}}" class="btn btn-success btn-xs">Beri Akses</a>
                                        @endif

                                        @if(count($u->memberships) > 0 && $u->memberships->last()->expired < \Carbon\Carbon::now() || count($u->memberships) == 0)
                                            <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#premiumModal-{{$u->id}}">Premium</a>
                                        @else
                                            <a class="btn btn-warning btn-xs disabled">Premium</a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- MODAL PREMIUM -->
                                <div class="modal fade" id="premiumModal-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <span class="modal-title" id="exampleModalLabel">Konfirmasi Akses Premium</span>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin memberikan pengguna <b>{{$u->name}}</b> akses premium? 
                                                Tindakan ini tidak bisa dibatalkan, dengan arti data yang diubah tidak bisa dikembalikan.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <a href="{{route('user.premium', $u->id)}}" class="btn btn-primary">Konfirmasi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada user.</p>
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