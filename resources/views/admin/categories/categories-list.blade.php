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
                Kategori Artikel
                <span class="pull-right">
                    <a href="{{route('categories.create')}}" class="btn btn-primary btn-xs">Tambah Baru</a>
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

                @if($categories->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Terakhir Diubah</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                                <tr>
                                    <td>{{$c->title}}</td>
                                    <td>{{$c->updated_at->addHours(7)}}</td>
                                    <td class="text-center">
                                        <a href="{{route('categories.edit', $c->id)}}" class="btn btn-warning btn-xs">Ubah</a>
                                        <a href="{{route('categories.delete', $c->id)}}" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada kategori.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
