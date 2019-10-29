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
        <!-- <div class="box box-body" style="margin: 5% 0 -3% 0;">
            <div class="row">
                <form action="{{route('psikolog.list')}}" method="GET" id="filter-form">
                    <div class="col-md-10">
                        <input type="text" name="query" placeholder="Cari psikolog berdasarkan nama atau email..." class="form-control" 
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
        </div> -->

        <div class="box box-body" style="margin: 5% 0 -3% 0;">
            <div class="row">
                <form action="{{route('psikolog.claimLog')}}" method="GET" id="filter-form">
                    <div class="col-md-10">
                        <select name="uid" class="form-control" id="uid">
                            <option disabled selected hidden>Filter data psikolog spesifik...</option>
                            @foreach($psikolog as $p)
                                <option value="{{$p->id}}" @if(request()->uid == $p->id) selected @endif>{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1">
                        <input type="submit" value="Filter" class="btn btn-primary btn-block">
                    </div>
                </form>
                <div class="col-md-1">
                    <button value="Hapus" class="btn btn-default btn-block" id="clear-form">Hapus</button>
                </div>
            </div>
        </div>

        <div class="box cust-margin">
            <div class="box-header with-border">
                Riwayat Klaim Poin

                <!-- <span class="pull-right">
                    <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal">
                        Top Up
                    </a>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{route('psikolog.topUp')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <span class="modal-title" id="exampleModalLabel">Tambah Poin Psikolog</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Poin Akan Ditambah</label>
                                                <input type="number" name="poin" id="poin" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Nama Psikolog</label>
                                                <select name="uid" class="form-control">
                                                    <option disabled selected hidden>Pilih...</option>
                                                    @foreach($psikolog as $p)
                                                        <option value="{{$p->id}}">{{$p->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </span> -->
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

                @if($list->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Diklaim</th>
                                <th>Sisa Poin</th>
                                <th>No. Rekening</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $l)
                                <tr>
                                    <td>{{App\User::find($l->user_id)->name}}</td>
                                    <td>{{$l->claimed}}</td>
                                    <td>{{$l->point_left}}</td>
                                    <td>{{$l->rekening}}</td>
                                    <td>{{date('Y-m-d H:i', strtotime($l->created_at->addHours(7)))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada data.</p>
                @endif
            </div>

            <div class="text-center">
                {{$list->links()}}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $('#clear-form').click(function() {
            $('#uid').val("");
            $('#filter-form').submit();
        });
    </script>

@endsection