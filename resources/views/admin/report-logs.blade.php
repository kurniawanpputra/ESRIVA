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
		Laporan Komentar
		<small>Menampilkan data laporan komentar</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">
                Laporan Komentar
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
                @if($logs->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Forum</th>
                                <th>Komentar</th>
                                <th>Kategori</th>
                                <th>Pelapor</th>
                                <th>Dilapor</th>
                                <th>Dibuat</th>
                                <th style="width: 15%">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $l)
                                <tr>
                                    <td class="middle">{{App\Forum::find($l->forum_id)->title}}</td>
                                    <td><p>{!! App\ForumComments::find($l->comment_id)->body !!}</p></td>
                                    <td class="middle">{{$l->kategori}}</td>
                                    <td class="middle">{{$l->pelapor}}</td>
                                    <td class="middle">{{$l->dilapor}}</td>
                                    <td class="middle">{{$l->created_at->addHours(7)}}</td>
                                    <td class="text-center middle">
                                        <a href="{{route('forum.detail', $l->forum_id)}}" class="btn btn-xs btn-primary">Lihat</a>
                                        @if(App\ForumComments::find($l->comment_id)->abuse == 0)
                                            <a href="{{route('comments.close', $l->comment_id)}}" class="btn btn-xs btn-danger">Sembunyikan</a>
                                        @else
                                            <a href="{{route('comments.open', $l->comment_id)}}" class="btn btn-xs btn-success">Tampilkan</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada laporan.</p>
                @endif
            </div>
            <div class="text-center">
                {{$logs->links()}}
            </div>
        </div>
    </div>
@endsection