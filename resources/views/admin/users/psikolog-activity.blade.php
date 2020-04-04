@extends('admin.layouts')

@section('css')
    <style>
        /* .cust-margin{
            margin: 5% 0 5%;
        } */
    </style>
@endsection

@section('title')
	<h1>
		Riwayat Aktivitas
		<small>Menampilkan data aktivitas {{auth()->user()->name}}</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">
                Aktivitas Saya

                <span class="pull-right">
                    <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModal">
                        Klaim Poin
                    </a>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{route('psikolog.claim')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="modal-header">
                                        <span class="modal-title" id="exampleModalLabel">Klaim Poin Aktivitas</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Poin Akan Dikonversi</label>
                                                <input type="number" name="poin" id="poin" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Hasil Konversi Poin</label>
                                                <input type="text" name="converted" id="converted" class="form-control" readonly>
                                            </div>
                                            <input type="hidden" name="amount" id="amount">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Nomor Rekening</label>
                                                <input type="text" name="rek" id="rek" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Nama Bank</label>
                                                <input type="text" name="bank" id="bank" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6" style="margin-bottom: 5px;">
                                                <label for="">Nomor Telepon</label>
                                                <input type="text" name="phone" id="phone" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6" style="margin-bottom: 5px;">
                                                <label for="">Sisa Poin</label>
                                                <input type="text" value="{{auth()->user()->points}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Klaim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                
                @if($list->count() > 0)
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Aktivitas</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $l)
                                <tr>
                                    <td>{{$l->activity}}</td>
                                    <td>{{$l->notes}}</td>
                                    <td>{{date('Y-m-d H:i', strtotime($l->created_at->addHours(7)))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center text-muted" style="margin-top: 10px;">Tidak ada data.</p>
                @endif
            </div>

            <div class="text-center">
                {{$list->links()}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#poin').change(function() {
            var converted = $('#poin').val() * 1000;
            var formatted = Number(converted.toFixed(1)).toLocaleString();
            var fixed = formatted.replace(',', '.')
            $('#converted').val('Rp'+fixed+',00');
            $('#amount').val(converted);
        });
    </script>
@endsection
