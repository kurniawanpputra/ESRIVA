@extends('admin.layouts')

@section('css')
    <style>
        /* .cust-margin{
            margin: 5% 0 0;
        } */
        .best{
            background-image: none;
            /* background-color: #8ed1cd; */
            background-color: #1abc9c;
        }
        .best > a{
            color: #333;
            font-weight: bold;
        }
        .cust-margin-alt{
            margin: 2.5% 0 0;
        }
        hr{
            border-top: 1px solid #f4f4f4;
            margin: 10px 0 10px;
        }
        .thumbnail, .btn-profile{
            background-color: #1abc9c;
        }
    </style>
@endsection

@section('title')
	<h1>
        Baca Forum
		<small>Menampilkan forum <i>"{{$forum->title}}"</i></small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">
                <span class="text-bold" style="font-size: 2rem;">{{strtoupper($forum->title)}}</span>
                <span class="pull-right" style="color: #111;">
                    @if($forum->is_closed == 0)
                        <span class=" btn btn-primary btn-sm disabled">Dibuka</span>
                    @else
                        <span class=" btn btn-danger btn-sm disabled">Ditutup</span>
                    @endif
                </span>
            </div>

            <div class="box-body">

                @php
                    $name = App\User::find($forum->user_id)->name;
                    $short = explode(" ", $name);
                @endphp

                <span>
                    <b>Pembuat:</b> {{$short[0]}}
                </span>
                <span class="pull-right">
                    <b>Dibuat:</b> {{date('d-m-Y', strtotime($forum->created_at))}}
                </span>
                <hr style="margin: 5px 0 20px;">

                <p>{!! $forum->body !!}</p>

                <hr style="margin: 20px 0 5px;">
                <span>
                    <i class="fa fa-eye" style="margin-right: 2.5px;"></i> {{$forum->views}} kali
                </span>
                
                <span class="pull-right">
                    <i class="fa fa-comments" style="margin-right: 2.5px;"></i> {{$forum->comments->count()}} kometar
                </span>
            </div>
        </div>

        @if($forum->is_closed == 0)
            <div class="box cust-margin-alt">
                <div class="box-header with-border">
                    <b>Tambahkan Komentar</b>
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
                    <form action="{{route('comments.store', $forum->id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="comment" class="form-control" style="resize: none;" id="summernote"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Kirim" class="btn btn-success pull-right">
                        </div>
                    </form>
                </div>
            </div>
        @endif
        
        @php
            $best = App\ForumComments::find($forum->best);
        @endphp

        <div class="box cust-margin-alt">
            <div class="box-header with-border ">
                <b>Komentar Terbaik</b>
            </div>
            
            <div class="box-body">
                @if($forum->best != null)
                    <div class="panel panel-default" style="margin: 10px 0;">
                        <div class="panel-heading" style="background-color: #1abc9c;">
                            <b>
                                <p style="margin-bottom: 0;">{{App\User::find($best->user_id)->name}}</p>
                            </b>
                        </div>
                        <div class="panel-body">
                            <p>
                                @if($best->abuse == 1)
                                    <i>Komentar ini telah dihapus oleh moderator.</i>
                                @else
                                    {!! $best->body !!}
                                @endif
                            </p>
                            <hr>
                            <p>{{$best->created_at->addHours(7)}}</p>
                        </div>
                    </div>
                @else
                    <p class="text-center" style="margin-top: 10px;"><i>Belum ada komentar terbaik.</i></p>
                @endif
            </div>
        </div>

        <div class="box cust-margin-alt">
            <div class="box-header with-border ">
                <b>{{$comments->count()}} Komentar</b>
            </div>
            
            <div class="box-body">
                @if($comments->count() > 0)
                    @foreach($comments as $c)
                        @php
                            $user = App\User::find($c->user_id);
                        @endphp
                        <div class="panel panel-default" style="margin: 10px 0;">
                            <div class="panel-heading">
                                <b>
                                    <a data-toggle="modal" data-target="#profileModal-{{$c->user_id}}" 
                                       style="cursor: pointer; text-decoration: underline; color: #333;">{{$user->name}}</a>
                                </b>
                                <div class="modal fade" id="profileModal-{{$c->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="text-center" style="margin-bottom: 0;">Profil <b>{{$user->name}}</b></p>
                                            </div>

                                            <div class="modal-body table-responsive">
                                                <div class="text-center">
                                                    <img src="{{isset($user->avatar) ? asset($user->avatar) : asset('lte/dist/img/default.png')}}"
                                                         style="border-radius: 50%; width: 100%; height: auto; max-width: 200px;
                                                         margin-top: 8px; margin-bottom: 16px; display: inline-block" class="thumbnail">
                                                    <br>
                                                    <table class="table text-center" style="margin-bottom: 0px;">
                                                        <thead>
                                                            <tr>
                                                                <th>Forum Dibuat</th>
                                                                <th>Komentar Dibuat</th>
                                                                <th>Status Login</th>
                                                                <th>Terdaftar Pada</th>                                 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$user->forums->count()}}</td>
                                                                <td>{{$user->comments->count()}}</td>
                                                                @php
                                                                    $last_login = App\LoginLog::where('user_id', $user->id)->OrderBy('created_at', 'desc')->first();
                                                                @endphp
                                                                <td>
                                                                    @if($user->online == 0)
                                                                        <a style="color: #333;"><i class="fa fa-circle text-muted" style="margin-right: 2.5px;"></i> Offline</a>
                                                                    @else
                                                                        <a style="color: #333;"><i class="fa fa-circle text-success" style="margin-right: 2.5px;"></i> Online</a>
                                                                    @endif
                                                                </td>
                                                                <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-profile" data-dismiss="modal">
                                                    <i class="fa fa-remove" style="color: #fff;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- LAPORKAN -->
                                @if($c->abuse != 1)
                                    @if(auth()->user()->id != $c->user_id && auth()->user()->roles != 3)
                                        <span class="pull-right">
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal-{{$c->id}}">Laporkan</button>
                                        </span>
                                    @endif

                                    <div class="modal fade" id="exampleModal-{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Laporkan Komentar
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="{{route('report.store', ['fid' => $forum->id, 'cid' => $c->id])}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Dilaporkan</label>
                                                            <input type="text" name="dilapor" value="{{App\User::find($c->user_id)->name}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Pelapor</label>
                                                            <input type="text" name="pelapor" value="{{auth()->user()->name}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Jenis Pelanggaran</label>
                                                            <select class="form-control" name="kategori">
                                                                <option value="Spam">Spam</option>
                                                                <option value="Bahasa Kasar">Bahasa Kasar</option>
                                                                <option value="Iklan">Iklan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Kirim</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="panel-body">
                                <p>
                                    @if($c->abuse == 1)
                                        <i>Komentar ini telah dihapus oleh moderator.</i>
                                    @else
                                        {!! $c->body !!}
                                    @endif
                                </p>
                                <hr>
                                <p>{{$c->created_at->addHours(7)}} @if(auth()->user()->id == $forum->user_id) ~ <a href="{{route('comments.best', ['fid' => $forum->id, 'cid' => $c->id])}}">Tandai Jawaban Terbaik</a> @endif</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center" style="margin-top: 10px;">
                        Tidak ada Komentar.
                    </p>
                @endif
            </div>
            
            <div class="text-center">
                {{$comments->links()}}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
                focus: true,
                disableResizeEditor: true
            });
        });
    </script>

@endsection
