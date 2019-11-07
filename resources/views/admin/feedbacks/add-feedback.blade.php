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
		Buat Umpan Balik
		<small>Silahkan tulis pesan, keluhan, atau masukan</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="box cust-margin">
            <div class="box-header with-border">Buat Umpan Balik</div>

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
                <form action="{{route('feedback.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Judul <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis <sup style="color: red;">*</sup></label>
                        <select class="form-control" name="type">
                            <option disabled selected hidden>Pilih...</option>
                            <option value="Pesan" @if(old('type') == "Pesan") selected @endif>Pesan</option>
                            <option value="Masukan" @if(old('type') == "Masukan") selected @endif>Masukan</option>
                            <option value="Keluhan" @if(old('type') == "Keluhan") selected @endif>Keluhan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Konten <sup style="color: red;">*</sup></label>
                        <textarea name="body" class="form-control"
                                  style="resize: none;" id="summernote">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim" class="btn btn-success pull-right">
                    </div>
                </form>
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