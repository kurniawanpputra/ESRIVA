@extends('admin.layouts')

@section('css')
    <style>
        /* .cust-margin{
            margin: 5% 0 5%;
        } */
        .cust-success{
            background-color: #1abc9c!important;
            border-color: #1abc9c;
        }
        .cust-success > h4, .cust-success > p {
            color: #333;
        }
    </style>
@endsection

@section('title')
	<h1>
		Buat Forum
		<small>Form untuk membuat forum baru</small>
	</h1>
@stop

@section('content')
    <div>
        <div class="alert alert-success text-center cust-success" role="alert" style="margin: 0 0 15px 0;">
            <h4 class="alert-heading">Hai, {{auth()->user()->name}}!</h4>
            <p>Sebelum kamu mulai membuat forum, cek dulu yuk forum yang sudah ada. Siapa tahu ada yang memiliki cerita mirip dengan kamu. &#128513;</p>
        </div>

        <div class="box cust-margin">
            <div class="box-header with-border">Buat Forum Baru</div>
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
                <form action="{{route('forum.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Judul <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe <sup style="color: red;">*</sup></label>
                        <select class="form-control" name="type" id="selectType">
                            <option disabled selected hidden>Pilih...</option>
                            <option value="Privat" @if(old('type') == "Privat") selected @endif>Privat</option>
                            <option value="Publik" @if(old('type') == "Publik") selected @endif>Publik</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Konten <sup style="color: red;">*</sup></label>
                        <textarea id="summernote" name="body">{{old('body')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title" id="exampleModalLabel">Cara Menentukan Tipe Diskusi</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>Privat:</b> Untuk tema diskusi yang berkaitan dengan masalah emosi, masalah keluarga, dan masalah perilaku seksual.
                    </p>
                    <p>
                        <b>Publik:</b> Untuk tema diskusi yang berkaitan dengan masalah penyesuaian diri, masalah lingkungan, dan masalah moral.
                    </p>
                    <p>
                        <b>Catatan:</b> Forum <b style="color: red;">Privat</b> hanya bisa dibuka oleh pembuat forum dan psikolog, sedangkan forum <b style="color: red;">Publik</b>
                        bisa diakses oleh semua pengguna.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Mengerti</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                focus: true,
                disableResizeEditor: true
            });

            $('#selectType').on('change', function() {
                $('#exampleModal').modal('show');
            });
        });
    </script>
@endsection
