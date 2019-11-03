@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
        hr{
            border-top: 1px solid #f4f4f4;
            margin: 10px 0 15px;
        }
        .fav-button{
            padding-bottom: 9px;
            border-radius: 50%;
            padding-top: 9px;
            margin-top: -8px;
        }
        .panel > .panel-heading {
            background-image: none;
            background-color: #8ed1cd;
        }
        .panel > .panel-heading > a{
            color: #333;
            font-weight: bold;
        }
        .box-cust-padding{
            padding: 20px 20px 0px 20px;
        }
        .res-margin{
            transform: translateY(30%);
        }
        .thumbnail{
            margin-bottom: 0;
            display: inline-block;
            background-color: #8ed1cd;
        }
        @media only screen and (max-width: 1199px) {
            .res-margin{
                transform: translateY(12%);
            }
        }
        @media only screen and (max-width: 991px) {
            .res-margin{
                margin-top: 15px;
                text-align: center;
                transform: translateY(0%);
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box cust-margin">
            <div class="box-header with-border">
                Artikel Saya
            </div>
            <div class="box-body @if(count($articles) > 0) box-cust-padding @endif">
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

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{route('articles.read', $a->slug)}}">{{$a->title}}</a>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-7 text-center">
                                                <img src="{{asset($a->image)}}" style="border-radius: 3px; max-width: 100%; height: auto;" class="thumbnail">
                                            </div>
                                            <div class="col-md-5 res-margin">
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
                                            </div>
                                        </div>
                                        <hr>

                                        <a href="{{route('articles.edit', $a->id)}}" class="btn btn-warning btn-sm">Ubah</a>

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