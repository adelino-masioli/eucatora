@extends('administration::base')
@section('body')
    @include('products::partial.menu')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="products-table">
                <thead>
                <tr>
                    <th class="text-center col-lg-1 no-sort"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                    <th class="text-center col-lg-7">NOME DO PRODUTO</th>
                    <th class="text-center col-lg-1">ORDEM</th>
                    <th class="text-center col-lg-1">STATUS</th>
                    <th class="text-center col-lg-2">ALTERAÇÕES</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>


    <div id="urlaction" style="display: none;">{{url('dashboard/product/destroy')}}</div>
    <div id="msgaction" style="display: none;">Tem certeza que deseja exuir este registro?</div>
    <div id="sizection" style="display: none;">small</div>
@stop
@push('scripts')
<script>
    var table = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('dashboard/product/datatable') !!}',
            data: function (d) {
                d.name = $('input[name=name]').val();
                d.s_order = $('input[name=s_order]').val();
                d.status_id = $('select[name=status_id]').val();
                d.updated_at = $('input[name=updated_at]').val();
            }
        },
        columns: [
            { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
            { data: 'name', name: 'name' },
            { data: 'order', name: 'order' },
            { data: 'status_id', name: 'status_id' },
            { data: 'updated_at', name: 'updated_at' }
        ],
        //alinha as colunas no centro da página
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 2,  3, 4]}
        ],
        "searching": false,
        "bLengthChange": false,
        "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]],
        {{HelperJS::data_table_translation()}}
    });
    //refresh datatable
    function funcionRefreshDatatable(){resetForm('#search-form'); table.ajax.reload();}

    $('#search-form').on('submit', function(e) {
        table.draw();
        e.preventDefault();
    });
</script>
{{HelperJS::autocomplete(url('dashboard/product/autocomplete?query=%QUERY'), '#autoname', 3)}}
@endpush