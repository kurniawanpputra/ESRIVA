@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 0;
        }
        .cust-margin-alt{
            margin: 2.5% 0 0;
        }
        hr{
            border-top: 1px solid #f4f4f4;
            margin: 10px 0 10px;
        }
        .thumbnail, .btn-profile{
            background-color: #8ed1cd;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box cust-margin">
            <div class="box-header with-border">
                <span class="text-bold">{{strtoupper($forum->title)}}</span>
                <span class="pull-right" style="color: #111;">
                    @if($forum->is_closed == 0)
                        <span class=" btn btn-primary btn-xs disabled">Dibuka</span>
                    @else
                        <span class=" btn btn-danger btn-xs disabled">Ditutup</span>
                    @endif
                </span>
            </div>

            <div class="box-body">

                @php
                    $name = App\User::find($forum->user_id)->name;
                    $short = explode(" ", $name);
                @endphp

                <span>
                    <b>Penulis:</b> {{$short[0]}}
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

        <div class="box cust-margin-alt" style="margin-bottom: 5%;">
            <div class="box-header with-border">
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
                                       style="cursor: pointer; color: #333; text-decoration: underline;">{{$user->name}}</a>
                                </b>
                                <div class="modal fade" id="profileModal-{{$c->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="text-center" style="margin-bottom: 0;">Profil <b>{{$user->name}}</b></p>
                                            </div>

                                            <div class="modal-body">
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
                                                                <th>Terdaftar Pada</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$user->forums->count()}}</td>
                                                                <td>{{$user->comments->count()}}</td>
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
                                <p>{{$c->created_at->addHours(7)}}</p>
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