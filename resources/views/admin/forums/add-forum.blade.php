@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
        .cust-success{
            background-color: #8ed1cd!important;
            border-color: #8ed1cd;
        }
        .cust-success > h4, .cust-success > p {
            color: #333;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-success text-center cust-success" role="alert" style="margin: 5% 0 -3% 0;">
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
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                focus: true,
                disableResizeEditor: true
            });
        });
    </script>
@endsection