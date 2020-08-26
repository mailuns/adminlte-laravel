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
                        <table class="table data-table" id="table-event">
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

<script src="{{url('AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script> 
    var table = $('#table-event').DataTable({
        pageLength: 25,
        processing: true,
        serverSide: true,
        ajax: "{{ route ('api.product') }}",
        columns: [
            {"data":"name"},
            {"data":"satuan"},
            {"data":"buy_price"},
            {"data":"sell_price"},
        ],
    });
</script>

@endsection