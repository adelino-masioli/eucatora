@extends('administration::base')
@section('body')
    @include('sales::partial.menu')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="sales-table">
                <thead>
                <tr>
                    <th class="text-center col-lg-1 no-sort"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                    <th class="text-center col-lg-1">CÓDIGO</th>
                    <th class="text-center col-lg-4">FORNECEDOR</th>
                    <th class="text-center col-lg-1">ÁREA</th>
                    <th class="text-center col-lg-1">QUADRADO</th>
                    <th class="text-center col-lg-1">ESTÉREO</th>
                    <th class="text-center col-lg-1">TOTAL</th>
                    <th class="text-center col-lg-1">DATA</th>
                    <th class="text-center col-lg-1">STATUS</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>


    <div id="urlaction" style="display: none;">{{url('dashboard/sale/destroy')}}</div>
    <div id="msgaction" style="display: none;">Tem certeza que deseja exuir este registro?</div>
    <div id="sizection" style="display: none;">small</div>
@stop
@push('scripts')
<script>
    var table = $('#sales-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('dashboard/sale/datatable') !!}',
            data: function (d) {
                d.id           = $('input[name=id]').val();
                d.name         = $('input[name=name]').val();
                d.date_initial = $('input[name=date_initial]').val();
                d.date_end     = $('input[name=date_end]').val();
                d.status_id    = $('select[name=status_id]').val();
            }
        },
        columns: [
            { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'amount', name: 'amount' },
            { data: 'square', name: 'square' },
            { data: 'stereo', name: 'stereo' },
            { data: 'total', name: 'total' },
            { data: 'date', name: 'date' },
            { data: 'status_id', name: 'status_id' }
        ],
        //alinha as colunas no centro da página
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 1, 3, 4, 5, 6, 7, 8]}
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
{{HelperJS::autocomplete(url('dashboard/customer/autocomplete?query=%QUERY'), '#autoname', 3)}}
@endpush