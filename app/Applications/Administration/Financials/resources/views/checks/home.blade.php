@extends('administration::base')
@section('body')
    @include('financials::checks.partial.menu')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="financial-table">
                <thead>
                <tr>
                    <th class="text-center col-lg-1 no-sort"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                    <th class="text-center col-lg-3">DESCRIÇÃO</th>
                    <th class="text-center col-lg-2">DESTINO</th>
                    <th class="text-center col-lg-1">CHEQUE</th>
                    <th class="text-center col-lg-1">BANCO</th>
                    <th class="text-center col-lg-1">VENCIMENTO</th>
                    <th class="text-center col-lg-1">VALOR</th>
                    <th class="text-center col-lg-1">PARCELA</th>
                    <th class="text-center col-lg-1">SITUAÇÃO</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>


    <div id="urlaction" style="display: none;">{{url('dashboard/financial/check/destroy')}}</div>
    <div id="msgaction" style="display: none;">Tem certeza que deseja exuir este registro?</div>
    <div id="sizection" style="display: none;">small</div>
@stop
@push('scripts')
<script>
    var table = $('#financial-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('dashboard/financial/check/datatable') !!}',
            data: function (d) {
                d.description = $('input[name=description]').val();
                d.accountant = $('input[name=accountant]').val();
                d.date_final = $('input[name=date_final]').val();
                d.value = $('input[name=value]').val();
                d.status = $('select[name=status]').val();
            }
        },
        columns: [
            { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
            { data: 'description', name: 'description' },
            { data: 'accountant', name: 'accountant' },
            { data: 'check_number', name: 'check_number' },
            { data: 'bank', name: 'bank' },
            { data: 'date_final', name: 'date_final' },
            { data: 'value', name: 'value' },
            { data: 'parcel', name: 'parcel' },
            { data: 'status', name: 'status' }
        ],
        //alinha as colunas no centro da página
        "columnDefs": [
            { className: "text-center", "targets": [ 0,  3, 4,5, 7, 8]},
            { className: "text-right", "targets": [ 6]}
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
{{HelperJS::autocomplete(url('dashboard/financial/check/autocomplete?query=%QUERY'), '#autoname', 3)}}
{{HelperJS::mask_money('#price')}}

<script>
    function showExport(url, type) {
        alertExplode('IMPORTANTE', 'Relatório gerado com sucesso', 'success', 'btn-success', 'Fechar', 'Download');
    }


    //alerts
    function alertExplode(title, msg, type, btntype, btntextcancel, btntext) {
        swal({
            title: title,
            text: msg,
            type: type,
            confirmButtonClass: btntype,
            confirmButtonText: btntext,
            showCancelButton: true,
            cancelButtonText: btntextcancel,
            closeOnConfirm: false
        },
        function(){
            alert('ops');
        });
    }
</script>
@endpush