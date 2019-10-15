@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
        hr{
            border-top: 1px solid #f4f4f4;
            margin: 10px 0 12.5px;
        }
        .fav-button{
            padding-top: 11px;
            margin-top: -10px;
            border-radius: 50%;
            padding-bottom: 8px;
        }
        .panel > .panel-heading {
            background-image: none;
            background-color: #222d32;
        }
        .panel > .panel-heading > a{
            color: #f4f4f4;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box cust-margin">
            <div class="box-header with-border">
                Artikel Favorit
            </div>
            <div class="box-body">
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
                
                <div class="row">
                    @if(count($articles) > 0)
                        @foreach($articles as $a)
                        
                            @php
                                $words = count(explode(" ", $a->body));
                                $mins = explode('.', ceil($words / 250))[0];
                            @endphp

                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{route('articles.read', $a->slug)}}">{{$a->title}}</a>
                                        <!-- <span class="pull-right btn btn-info btn-xs disabled" style="color: #111;">
                                            {{App\Category::find($a->category_id)->title}}
                                        </span> -->
                                        <form action="{{route('articles.favorite', $a->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            @php
                                                $fav = App\Favorite::where('user_id', auth()->user()->id)
                                                                   ->where('article_id', $a->id)
                                                                   ->first();
                                            @endphp
                                            @if($fav == NULL || $fav->value == 0)
                                                <button type="submit" class="pull-right btn btn-default fav-button" style="background-color: #fff;">
                                                    <i class="fa fa-star-o" style="font-size: 18px; color: #eeba30"></i>
                                                </button>
                                            @else
                                                <button type="submit" class="pull-right btn btn-default fav-button" style="background-color: #fff;">
                                                    <i class="fa fa-star" style="font-size: 18px; color: #eeba30"></i>
                                                </button>
                                            @endif
                                        </form> 
                                    </div>

                                    <div class="panel-body">
                                        <p>Penulis: {{App\User::find($a->user_id)->name}}</p>
                                        <p>Kategori: {{App\Category::find($a->category_id)->title}}</p>
                                        <p>{{date('M Y', strtotime($a->created_at))}} &#8226; {{$mins}} min read</p>
                                        <p style="margin-bottom: 0;">
                                            <i class="fa fa-eye" style="margin-right: 2.5px;"></i> {{$a->views}} kali

                                            @php
                                                $fav_count = App\Favorite::where('article_id', $a->id)->where('value', 1)->get()->count();
                                            @endphp

                                            <i class="fa fa-star" style="margin-right: 2.5px; margin-left: 5px;"></i> {{$fav_count}} orang
                                        </p>
                                        <hr>

                                        @if(auth()->user()->id == $a->user_id || auth()->user()->roles == 3)
                                            <a href="{{route('articles.edit', $a->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                                        @endif
                                        @if(auth()->user()->roles == 3)
                                            <a href="{{route('articles.remove', $a->id)}}" class="btn btn-danger btn-sm">Hapus</a>

                                            @if($a->status == "Unapproved")
                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-{{$a->id}}">Setujui</a>
                                                <div class="modal fade" id="exampleModal-{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <span class="modal-title" id="exampleModalLabel">Konfirmasi Penyetujuan</span>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Setujui artikel? Tindakan ini tidak bisa dibatalkan, tetapi artikel tetap bisa dihapus.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <a href="{{route('articles.approve', $a->id)}}" class="btn btn-primary">Konfirmasi</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        <a href="{{route('articles.read', $a->slug)}}" class="btn btn-success btn-sm pull-right">Baca</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada artikel.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
