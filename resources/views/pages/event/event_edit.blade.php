@extends('layouts.admin_template')

@section('page_title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
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
                        <a class="btn btn-sm btn-success" href="/event/list"><i class="fa fa-list"></i> Data List</a>
                    </div>
                </div>
                <form method="post" action="/event/update/{{ $data_edit->ID }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Address ID</label>
                            <input type="text" class="form-control" id="addressId" placeholder="addressId" name="addressId" value="{{ $data_edit->addressId }}">
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

