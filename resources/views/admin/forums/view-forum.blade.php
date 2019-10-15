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
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box cust-margin">
            <div class="box-header with-border">
                <span class="text-bold">{{strtoupper($forum->title)}}</span>
                <span class="pull-right" style="color: #111;">
                    @if($forum->is_closed == 0)
                        <span class=" btn btn-success btn-xs disabled">Dibuka</span>
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
                <b>{{$forum->comments->count()}} Komentar</b>
            </div>
            
            <div class="box-body">
                @if($forum->comments->count() > 0)
                    @foreach($forum->comments as $c)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>{{App\User::find($c->user_id)->name}}</b>
                                
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
