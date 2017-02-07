@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/financial/report-filter', 'id'=> 'frmFinancial', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('financials::partial.menureport')
    <input type="hidden" value="reset" id="formreset" name="formreset">
    @include('financials::partial.report')
    {!! Form::close() !!}
@stop
@push('scripts')
{{HelperJS::select_drowdown('select', 'btn-default', 8)}}
{{HelperJS::mask_money('#price')}}

<script>
    //add payment
    function functionReport(id) {
        var url = $('#frmFinancial').attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'title'         : $('input[name=title]').val(),
                'date_initial'  : $('input[name=date_initial]').val(),
                'date_final'    : $('input[name=date_final]').val(),
                'date_alert'    : $('input[name=date_alert]').val(),
                'price'         : $('input[name=price]').val(),
                'type'          : $('select[name=type]').val(),
                'destination'   : $('select[name=destination]').val(),
                'status'        : $('select[name=status]').val(),
                '_token'     : $('#_token').val()},
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.status == true) {
                    reportTable(obj.data)
                }else{
                    notifyAlerts(obj.response,'fa fa-exclamation-circle', 'danger');
                }
                return false;
            },
            error: function (data) {
                //show erro message and validations
                notifyAlerts(formatErrors(data.responseJSON), 'fa fa-exclamation-circle', 'info');
                return false;
            },
        });
        return false;
    }

    function reportTable(data) {
        if(data) {
            $('#noresult').hide();
            var tr = '';
            var tbl = '#datatable';
            $('#datatable').html('');
            $.each(data, function (i, val) {
                tr += '<tr>';
                    tr += '<td>'+val.title+'</td>';
                    tr += '<td class="text-center">'+val.date_initial+'</td>';
                    tr += '<td class="text-center">'+val.date_final+'</td>';
                    tr += '<td class="text-center">'+val.date_alert+'</td>';
                    tr += '<td class="text-center">'+val.price+'</td>';
                    tr += '<td class="text-center">'+val.type+'</td>';
                    tr += '<td class="text-center">'+val.status+'</td>';
                tr += '</tr>';
            });
            $('#datatable').append(tr);
            return false;
        }else{
            return false;
        }
    }
</script>
@endpush