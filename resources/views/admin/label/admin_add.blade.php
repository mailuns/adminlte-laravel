@extends('layouts.admin_template')

@section('page_title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-8'>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah {{ $pageTitle }}</h3>
                    
                    <div class="box-tools pull-right">
                        <a class="btn btn-sm btn-success" href="{{ $ancor_list }}"><i class="fa fa-list"></i> Data List</a>
                    </div>
                </div>
                <form method="post" action="/label/store" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Label</label>
                            <input type="text" class="form-control" id="label" placeholder="Label" name="label" value="{{ old('label') }}">
                        </div>
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" class="form-control" id="sub_label" placeholder="Sub Title" name="sub_label" value="{{ old('sub_label') }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi" rows="20" cols="50">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="banner_label">Banner</label>
                            <input type="file" class="form-control" id="banner_label" name="banner_label">
                        </div>
                        <div class="form-group">
                            <label for="gambar_label">Thumbnail</label>
                            <input type="file" class="form-control" id="gambar_label" name="gambar_label">
                        </div>
                        <div class="form-group">
                            <label for="icon_label">Icon</label>
                            <input type="file" class="form-control" id="icon_label" name="icon_label">
                        </div>
                    </div><!-- /.box-body -->
                
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right btn-block"><i class="fa fa-save"></i> Submit</button>
                    </div><!-- /.box-footer-->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('js-script')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace(deskripsi, {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 200,
            removeDialogTabs: 'image:advanced;link:advanced'
        });
        CKEDITOR.config.allowedContent = true;
        
        var str_item = document.getElementById('nama');
        var slug = document.getElementById('slug');
        str_item.oninput = function() {
            var isi = str_item.value;
            var isi_reg = isi.replace(/\s+/g, '-').toLowerCase();
            slug.value = isi_reg;
        };
    </script>
@endsection