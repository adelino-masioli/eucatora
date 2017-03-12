@extends('administration::base')
@section('body')
    {!! Form::open(array('url' => 'dashboard/financial/check/report-filter', 'id'=> 'frmFinancial', 'data-toggle'=>'validator', 'role'=>'form')) !!}
    @include('financials::checks.partial.menureport')
    <input type="hidden" value="reset" id="formreset" name="formreset">
    @include('financials::checks.partial.report')
    {!! Form::close() !!}
@stop
@push('scripts')
{{HelperJS::select_drowdown('select', 'btn-default', 8)}}
{{HelperJS::mask_money('#price')}}

<script>
    //report
    function functionReportCheck(id) {
        var url = $('#frmFinancial').attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'description'   : $('input[name=description]').val(),
                'date_initial'  : $('input[name=date_initial]').val(),
                'date_final'    : $('input[name=date_final]').val(),
                'value'         : $('input[name=value]').val(),
                'bank'          : $('input[name=bank]').val(),
                'check_number'  : $('input[name=check_number]').val(),
                'status'        : $('select[name=status]').val(),
                '_token'        : $('#_token').val()},
            success: function (data) {
                obj = JSON.parse(data);
                if (obj.status == true) {
                    reportTableCheck(obj.data)
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

    function reportTableCheck(data) {
        if(data) {
            $('#noresult').hide();
            var tr = '';
            var tbl = '#datatable';
            $('#datatable').html('');
            $.each(data, function (i, val) {
                tr += '<tr>';
                    tr += '<td>'+val.description+'</td>';
                    tr += '<td class="text-center">'+val.bank+'</td>';
                    tr += '<td class="text-center">'+val.agency+'</td>';
                    tr += '<td class="text-center">'+val.account+'</td>';
                    tr += '<td class="text-center">'+val.check_number+'</td>';
                    tr += '<td class="text-center">'+val.value+'</td>';
                    tr += '<td class="text-center">'+val.date_final+'</td>';
                    tr += '<td class="text-center">'+val.parcel+'</td>';
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