<!-- 
    Sosmed
    admin_index
    /views/admin/sosmed/admin_index
-->

@extends('layouts.admin_template')

@section('page_title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List {{ $pageTitle }}</h3>
                    <a class="btn btn-primary pull-right btn-sm" href="/label/add"><i class="fa fa-plus"></i> Tambah Data</a>

                    <div class="box-body">
                        <div style="overflow: auto">
                        <table class="table data-table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Action</td>
                                <td>Label</td>
                                <td>Sub Label</td>
                                <td>Deskripsi</td>
                                <td>Banner</td>
                                <td>Thumbnail</td>
                                <td>Icon</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 + $datas->currentPage() * $datas->perPage() - $datas->perPage(); ?>
                            @forelse($datas as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td nowrap>
                                    <a href="/label/edit/{{ $item->id_label_sebumi }}" class="label label-info">Edit</a>
                                    <a href="javascript:;" onclick="hapusdata( `{{ $item->id_label_sebumi }}`, `{{ $item->label }}` )" class="label label-danger">Hapus</a>
                                </td>
                                <td nowrap>{{ $item->label }}</td>
                                <td>{{ $item->sub_label }}</td>
                                <td>{{ str_limit(($item->deskripsi),50) }}</td>
                                <td>
                                    <img src="{{ asset('images/sebumi_img/bg_label/'.$item->banner_label) }}" width="60" height="50">
                                </td>
                                <td>
                                    <img src="{{ asset('images/sebumi_img/bg_label/'.$item->gambar_label) }}" width="60" height="50">
                                </td>
                                <td>
                                    <img src="{{ asset('images/sebumi_img/icon_label/'.$item->icon_label) }}" width="60" height="50">
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @empty
                                <tr>
                                    <td colspan="10"><b>Empty data.</b></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $datas->links() }}
                        </div>
                    </div>
                    
                </div>
                
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection

@section('js-script')

<script>
function hapusdata(id, nama) {
    var r = confirm('Anda yakin akan menghapus data ini *'+nama+ ' ?');
    if (r == true) {
        window.location.href='/label/delete/'+id;
    }
}
</script>

@endsection