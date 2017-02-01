@extends('administration::base')
@section('body')
    @include('financials::partial.menu')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="financial-table">
                <thead>
                <tr>
                    <th class="text-center col-lg-1 no-sort"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                    <th class="text-center col-lg-4">LANÇAMENTO</th>
                    <th class="text-center col-lg-1">INICIO</th>
                    <th class="text-center col-lg-1">FIM</th>
                    <th class="text-center col-lg-2">VENCIMENTO</th>
                    <th class="text-center col-lg-1">VALOR</th>
                    <th class="text-center col-lg-1">TIPO</th>
                    <th class="text-center col-lg-1">STATUS</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>


    <div id="urlaction" style="display: none;">{{url('dashboard/financial/destroy')}}</div>
    <div id="msgaction" style="display: none;">Tem certeza que deseja exuir este registro?</div>
    <div id="sizection" style="display: none;">small</div>
@stop
@push('scripts')
<script>
    var table = $('#financial-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('dashboard/financial/datatable') !!}',
            data: function (d) {
                d.title = $('input[name=title]').val();
                d.date_initial = $('input[name=date_initial]').val();
                d.date_final = $('input[name=date_final]').val();
                d.date_alert = $('input[name=date_alert]').val();
                d.price = $('input[name=price]').val();
                d.type = $('select[name=type]').val();
                d.destination = $('select[name=destination]').val();
                d.status = $('select[name=status]').val();
            }
        },
        columns: [
            { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
            { data: 'title', name: 'title' },
            { data: 'date_initial', name: 'date_initial' },
            { data: 'date_final', name: 'date_final' },
            { data: 'date_alert', name: 'date_alert' },
            { data: 'price', name: 'price' },
            { data: 'type', name: 'type' },
            { data: 'status', name: 'status' }
        ],
        //alinha as colunas no centro da página
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 2,  3, 4,5,6,7]}
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
{{HelperJS::autocomplete(url('dashboard/financial/autocomplete?query=%QUERY'), '#autoname', 3)}}
{{HelperJS::mask_money('#price')}}
@endpush