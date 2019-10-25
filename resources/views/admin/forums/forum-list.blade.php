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
            padding-top: 12px;
            margin-top: -10px;
            border-radius: 50%;
            padding-bottom: 8px;
        }
        .panel > .panel-heading {
            background-image: none;
            background-color: #3C8DBC;
        }
        .panel > .panel-heading > a{
            color: #f4f4f4;
            font-weight: 600;
        }
        .box-cust-padding{
            padding: 20px 20px 0px 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box box-body" style="margin: 5% 0 -3% 0;">
            <div class="row">
                <form action="{{route('forum.list')}}" method="GET" id="filter-form">
                    <div class="col-md-5">
                        <select name="status" class="form-control" id="status">
                            @php
                                if(isset(request()->status)) {
                                    if(request()->status == 0) {
                                        $status = "Dibuka";
                                    }else{
                                        $status = "Ditutup";
                                    }
                                }
                            @endphp
                            
                            <option disabled selected hidden>{{isset(request()->status) ? $status : "Filter status..." }}</option>
                            <option value="0">Dibuka</option>
                            <option value="1">Ditutup</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="judul" placeholder="Cari judul forum..." class="form-control" 
                               value="{{isset(request()->judul) ? request()->judul : ''}}" id="judul">
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
                Daftar Forum
            </div>
            
            <div class="box-body box-cust-padding">
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
                    @if($forums->count() > 0)
                        @foreach($forums as $f)
                            @php
                                $words = count(explode(" ", $f->body));
                                $mins = explode('.', ceil($words / 250))[0];
                            @endphp
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{route('forum.detail', $f->id)}}">{{$f->title}}</a>

                                        @if(auth()->user()->roles == 3)
                                            <span class="pull-right">
                                                @if($f->is_show == 1)
                                                    <a href="{{route('forum.hide', $f->id)}}" class="btn btn-warning btn-xs" title="Sembunyikan"><i class="fa fa-eye-slash"></i></a>
                                                @else
                                                    <a href="{{route('forum.show', $f->id)}}" class="btn btn-default btn-xs" title="Tampilkan"><i class="fa fa-eye"></i></a>
                                                @endif
                                            </span>
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                            @if(count(App\User::find($f->user_id)->memberships) > 0 && App\User::find($f->user_id)->memberships->last()->expired > \Carbon\Carbon::now())
                                                @if(auth()->user()->roles != 1)
                                                    Penulis: <span style="color: gold; font-weight: 600;">{{App\User::find($f->user_id)->name}}</span>
                                                @else
                                                    Penulis: {{App\User::find($f->user_id)->name}}
                                                @endif
                                            @else
                                                Penulis: {{App\User::find($f->user_id)->name}}
                                            @endif
                                        </p>
                                        <p>{{date('M Y', strtotime($f->created_at))}} &#8226; {{$mins}} min read</p>
                                        @if($f->is_closed == 0)
                                            <p>Status: <span class="text-success text-bold">Dibuka</span></p>
                                        @else
                                            <p>Status: <span class="text-danger text-bold">Ditutup</span></p>
                                        @endif
                                        <p style="margin-bottom: 0;">
                                            <i class="fa fa-eye" style="margin-right: 2.5px;"></i> {{$f->views}} kali
                                            <i class="fa fa-comments" style="margin-right: 2.5px; margin-left: 5px;"></i> {{$f->comments->count()}} komentar
                                        </p>
                                        <hr>

                                        @if(auth()->user()->roles == 3 || auth()->user()->id == $f->user_id)
                                            <a href="{{route('forum.edit', $f->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                                        @endif
                                        
                                        @if(auth()->user()->roles == 3)
                                            @if($f->is_closed == 0)
                                                <a href="{{route('forum.close', $f->id)}}" class="btn btn-danger btn-sm">Tutup</a>
                                            @else
                                                <a href="{{route('forum.open', $f->id)}}" class="btn btn-primary btn-sm">Buka</a>
                                            @endif
                                        @endif

                                        <a href="{{route('forum.detail', $f->id)}}" class="btn btn-success btn-sm pull-right">Baca</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada forum.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#clear-form').click(function() {
            $('#judul').val("");
            $('#status').val("");
            $('#filter-form').submit();
        });
    </script>
@endsection