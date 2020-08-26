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
                    <h3 class="box-title">Edit {{ $pageTitle }}</h3>
                    <div class="box-tools pull-right">
                        <a class="btn btn-sm btn-success" href="/label/list"><i class="fa fa-list"></i> Data List</a>
                    </div>
                </div>
                <form method="post" action="/label/update/{{ $data_edit->id_label_sebumi }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Label</label>
                            <input type="text" class="form-control" id="label" placeholder="Label" name="label" value="{{ $data_edit->label }}">
                        </div>
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" class="form-control" id="sub_label" placeholder="Sub Title" name="sub_label" value="{{ $data_edit->sub_label }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi" rows="20" cols="50">{{ $data_edit->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Banner</label>
                            <br>
                            <img src="{{ asset('images/sebumi_img/bg_label/'.$data_edit->banner_label) }}" width="150" height="150" alt="banner_label">
                            <input type="file" class="form-control" id="banner_label" name="banner_label">
                        </div>
                        <div class="form-group">
                            <label for="icon">Thumbnail</label>
                            <br>
                            <img src="{{ asset('images/sebumi_img/bg_label/'.$data_edit->gambar_label) }}" width="150" height="150" alt="gambar">
                            <input type="file" class="form-control" id="gambar_label" name="gambar_label">
                        </div>
                        <div class="form-group">
                            <label for="mini_icon">Icon</label>
                            <br>
                            <img src="{{ asset('images/sebumi_img/icon_label/'.$data_edit->icon_label) }}" width="150" height="150" alt="gambar">
                            <input type="file" class="form-control" id="icon_label" name="icon_label">
                        </div>

                    </div><!-- /.box-body -->
                
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right btn-block"><i class="fa fa-save"></i> Update</button>
                    </div><!-- /.box-footer-->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
       
    </div><!-- /.row -->


@endsection

@section('js-script')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(deskripsi, {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 200,
            removeDialogTabs: 'image:advanced;link:advanced'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection