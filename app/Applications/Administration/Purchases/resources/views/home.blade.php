@extends('administration::base')
@section('body')
    @include('purchases::partial.menu')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped table-responsive table-condensed table-hover datatable" id="purchases-table">
                <thead>
                <tr>
                    <th class="text-center col-lg-1 no-sort"><i class="fa fa-wrench" aria-hidden="true"></i></th>
                    <th class="text-center col-lg-1">CÓDIGO</th>
                    <th class="text-center col-lg-4">DENOMINAÇÃO</th>
                    <th class="text-center col-lg-3">PROPRIETÁRIO</th>
                    <th class="text-center col-lg-1">ÁREA</th>
                    <th class="text-center col-lg-1">DATA</th>
                    <th class="text-center col-lg-1">STATUS</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>


    <div id="urlaction" style="display: none;">{{url('dashboard/purchase/destroy')}}</div>
    <div id="msgaction" style="display: none;">Tem certeza que deseja exuir este registro?</div>
    <div id="sizection" style="display: none;">small</div>
@stop
@push('scripts')
<script>
    var table = $('#purchases-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url('dashboard/purchase/datatable') !!}',
            data: function (d) {
                d.id           = $('input[name=id]').val();
                d.denomination = $('input[name=denomination]').val();
                d.owner_name   = $('input[name=owner_name]').val();
                d.date_initial = $('input[name=date_initial]').val();
                d.date_end     = $('input[name=date_end]').val();
                d.status_id    = $('select[name=status_id]').val();
            }
        },
        columns: [
            { data: 'buttons', name: 'buttons', orderable: false, searchable: false},
            { data: 'id', name: 'id' },
            { data: 'denomination', name: 'denomination' },
            { data: 'owner_name', name: 'owner_name' },
            { data: 'total_area', name: 'total_area' },
            { data: 'date', name: 'date' },
            { data: 'status_id', name: 'status_id' }
        ],
        //alinha as colunas no centro da página
        "columnDefs": [
            { className: "text-center", "targets": [ 0, 1, 4, 5, 6]}
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
{{HelperJS::autocomplete(url('dashboard/purchase/autocomplete?query=%QUERY'), '#autoname', 3)}}
@endpush