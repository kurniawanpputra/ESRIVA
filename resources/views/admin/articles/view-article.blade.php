@extends('admin.layouts')

@section('css')
    <style>
        /* .cust-margin{
            margin: 5% 0 0;
        } */
        
        .cust-margin-alt{
            margin: 2.5% 0 0;
        }

        hr{
            border-top: 1px solid #f4f4f4;
        }

        .article-img{
            width: 100%;
            height: auto;
            max-width: 500px;
            border-radius: 1%;
            margin-bottom: 7.5px;
        }
    </style>
@endsection

@section('title')
	<h1>
		Baca Artikel
		<small>Menampilkan artikel {{$article->title}}</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">
                <span class="text-bold">{{strtoupper($article->title)}}</span>

                <span class="pull-right btn btn-primary btn-xs disabled">
                    {{App\Category::find($article->category_id)->title}}
                </span>
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

                @php
                    $name = App\User::find($article->user_id)->name;
                    $short = explode(" ", $name);
                @endphp

                <input type="hidden" id="slug" value="{{$article->slug}}">

                <span>
                    <b>Penulis:</b> {{$short[0]}}
                </span>
                <span class="pull-right">
                    <b>Dibuat:</b> {{date('d-m-Y', strtotime($article->created_at))}}
                </span>
                <hr style="margin: 5px 0 20px;">

                <div class="text-center">
                    <a href="{{url('/'.$article->image)}}" target="_blank">
                        <img src="{{asset($article->image)}}" class="article-img">
                    </a>
                </div>

                <p>{!! $article->body !!}</p>
                <div class="sharethis-inline-share-buttons"></div>

                <hr style="margin: 20px 0 5px;">
                <span>
                    <i class="fa fa-eye" style="margin-right: 2.5px;"></i> {{$article->views}} kali
                </span>

                @php
                    $fav_count = App\Favorite::where('article_id', $article->id)->where('value', 1)->get()->count();
                @endphp
                
                <span class="pull-right">
                    <i class="fa fa-star" style="margin-right: 2.5px;"></i> {{$fav_count}} orang
                </span>
            </div>
        </div>

        <div class="box cust-margin-alt">
            <div class="box-body">
                <div id="disqus_thread">
                    <h4 class="text-center"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Memuat...</h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var disqus_config = function () {
            this.page.url = window.location.href;
            this.page.identifier = $('#slug').val();
        };

        (function() {
            var d = document, s = d.createElement('script');
            s.src = 'https://esriva-1.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5dbd81e6d895600013deafce&product=inline-share-buttons" async="async"></script>

    <noscript>
        Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by DISQUS.</a>
    </noscript>
@endsection
