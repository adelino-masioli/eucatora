@extends('administration::base')
@section('body')
    @include('customers::partial.menu')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="customers-table">
                <thead>
                <tr>
                    <th class="text-center col-lg-1 no-sort"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                    <th class="text-center col-lg-4">NOME DO CLIENTE</th>
                    <th class="text-center col-lg-2">DOCUMENTO CPF/CNPJ</th>
                    <th class="text-center col-lg-2">TELEFONE</th>
                    <th class="text-center col-lg-2">CELULAR</th>
                    <th class="text-center col-lg-1">STATUS</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>


    <div id="urlaction" style="display: none;">{{url('dashboard/customer/destroy')}}</div>
    <div id="msgaction" style="display: none;">Tem certeza que deseja exuir este registro?</div>
    <div id="sizection" style="display: none;">small</div>
@stop
@push('scripts')
<script>
    var table = $('#customers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('dashboard/customer/datatable') !!}',
            data: function (d) {
                d.name      = $('input[name=name]').val();
                d.document  = $('input[name=document]').val();
                d.phone     = $('input[name=phone]').val();
                d.celullar  = $('input[name=celullar]').val();
                d.status_id = $('select[name=status_id]').val();
            }
        },
        columns: [
            { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
            { data: 'name', name: 'name' },
            { data: 'document', name: 'document' },
            { data: 'phone', name: 'phone' },
            { data: 'celullar', name: 'celullar' },
            { data: 'status_id', name: 'status_id' }
        ],
        //alinha as colunas no centro da página
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 3, 4, 5]}
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