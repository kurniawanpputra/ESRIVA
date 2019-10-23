@extends('admin.layouts')

@section('css')
    <style>
        .cust-margin{
            margin: 5% 0 5%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="box cust-margin">
            <div class="box-header with-border">Buat Artikel Baru</div>

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

                <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group text-center" style="display: none;" id="img-prev">
                        <label for="" style="margin-bottom: 0;">Partinjau Gambar</label>
                        <br/>
                        <img src="#" id="preview" style="max-width: 300px; width: 100%; height: auto; margin-top: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar <sup style="color: red;">*</sup></label>
                        <input type="file" class="form-control" name="image" id="imgfile">
                    </div>
                    <div class="form-group">
                        <label for="">Judul <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori <sup style="color: red;">*</sup></label>
                        <select name="category" class="form-control">
                            <option disabled selected hidden>Pilih Kategori...</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}" @if(old('category') == $c->id) selected @endif>{{$c->title}}</option>
                            @endforeach
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
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgfile").change(function() {
            readURL(this);
            $("#img-prev").show();
        });
    </script>

@endsection
