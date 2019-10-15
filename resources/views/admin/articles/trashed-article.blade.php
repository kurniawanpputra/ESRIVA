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
        <div class="box cust-margin">
            <div class="box-header with-border">
                Artikel Dihapus
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

                @if($articles->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Dibuat</th>
                                <th>Dihapus</th>
                                <th style="width: 10%">Tindakan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($articles as $a)
                                <tr>
                                    <td>{{$a->title}}</td>
                                    <td>{{App\User::find($a->user_id)->name}}</td>
                                    <td>{{App\Category::find($a->category_id)->title}}</td>
                                    <td>{{$a->created_at->addHours(7)}}</td>
                                    <td>{{$a->created_at->addHours(7)}}</td>

                                    <td class="text-center">
                                        <a href="{{route('articles.restore', $a->id)}}" class="btn btn-success btn-xs">Kembalikan</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada sampah.</p>
                @endif
            </div>
        </div>
    </div>
@endsection