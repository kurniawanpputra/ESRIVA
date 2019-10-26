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

        <div class="box cust-margin">
            <div class="box-header with-border">
                Riwayat Klaim Poin
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
                                <th>Diklaim</th>
                                <th>Sisa Poin</th>
                                <th>No. Rekening</th>
                                <th>Jumlah Konversi</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $l)
                                <tr> 
                                    <td>{{$l->claimed}}</td>
                                    <td>{{$l->point_left}}</td>
                                    <td>{{$l->rekening}}</td>
                                    <td>{{'Rp'.str_replace(',', '.', number_format($l->claimed * 1000)).',00.'}}</td>
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
