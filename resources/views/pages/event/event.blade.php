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
                    <!-- <a class="btn btn-primary pull-right btn-sm" href="/label/add"><i class="fa fa-plus"></i> Tambah Data</a> -->

                    <div class="box-body">
                        <div style="overflow: auto">
                        <table class="table data-table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Action</td>
                                <td>eventCreationTime</td>
                                <td>eventTypeName</td>
                                <td>AddressId</td>
                                <td>AddressTag</td>
                                <td>stateName</td>
                                <td>operatorName</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 + $datas->currentPage() * $datas->perPage() - $datas->perPage(); ?>
                            @forelse($datas as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td nowrap>
                                    <a href="/event/edit/{{ $item->ID }}" class="label label-info">Edit</a>
                                </td>
                                <td>{{ $item->eventCreationTime }}</td>
                                <td>{{ $item->eventTypeName }}</td>
                                <td>{{ $item->addressId }}</td>
                                <td>{{ $item->AddressTag }}</td>
                                <td>{{ $item->stateName }}</td>
                                <td>{{ $item->operatorName }}</td>
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