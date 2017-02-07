@extends('administration::basereport')
@section('body')
    <style>
        .table{border: 1px solid #000000;}
        .table th, .table td, tfoot td{border: 1px solid #000000;height: 20px;}
        .table th{font-weight: bolder;}
        .table.bgcolor th{text-align: center;background: #28BA00;color: #FFFFFF;font-weight: bolder;}
        .table .bgfooter th{background: #cccccc;color: #000000;text-align: right;}
        .size-lg{width: 50%;}
        .size-sm{width: 15%;}
        .align-right{text-align: right;}
        .align-center{text-align: center;}
    </style>

        <tr>
            <td  colspan="3"><img src="{{public_path('build/images/brand_color.png')}}"/></td>
        </tr>
        <table class="table">
            <thead>
                <tr><td class="align-right" colspan="1"><strong>EMPRESA:</strong></td> <td colspan="7">{{AppHelper::site_title()}}</td></tr>
                <tr><td class="align-right" colspan="1"><strong>ENDEREÇO:</strong></td> <td colspan="7">{{AppHelper::site_address()}}</td></tr>
                <tr><td class="align-right" colspan="1"><strong>CIDADE:</strong></td> <td colspan="7">{{AppHelper::site_city()}}</td></tr>
            </thead>
        </table>
        <table class="table bgcolor">
            <thead>
                <tr>
                    <th class="size-sm">CÓDIGO</th>
                    <th class="size-lg">LANÇAMENTO</th>
                    <th class="size-sm">INICIO</th>
                    <th class="size-sm">VENC.</th>
                    <th class="size-sm">PARC.</th>
                    <th class="size-sm">ENTRADA</th>
                    <th class="size-sm">SAÍDA</th>
                    <th class="size-sm">STATUS</th>
                </tr>
            </thead>
            <tbody>
            <?php $total1 = null; $total2 = null;?>
                @foreach($data as $reports)
                    <tr>
                        <td class="align-center">{{$reports->id}}</td>
                        <td>{{$reports->title}}</td>
                        <td class="align-center">{{AppHelper::date_only_br($reports->date_initial)}}</td>
                        <td class="align-center">{{AppHelper::date_only_br($reports->date_final)}}</td>
                        <td class="align-center">{{$reports->amount}}</td>
                        <td class="align-right">{{AppHelper::money_br(AppHelper::financial_export_type_1($reports->type, $reports->price))}}</td>
                        <td class="align-right">{{AppHelper::money_br(AppHelper::financial_export_type_2($reports->type, $reports->price))}}</td>
                        <td class="align-center">{{AppHelper::financial_status($reports->status)}}</td>
                    </tr>
                    <?php $total1 += AppHelper::financial_export_type_1($reports->type, $reports->price); ?>
                    <?php $total2 += AppHelper::financial_export_type_2($reports->type, $reports->price); ?>
                @endforeach
            </tbody>
            <tfoot class="bgfooter">
                <tr>
                    <th colspan="5" class="align-right">TOTAL</th>
                    <th class="size-sm align-center">ENTRADAS</th>
                    <th class="size-sm align-center">SAÍDAS</th>
                    <th class="size-sm align-center" colspan="1">SALDO</th>
                </tr>
                <tr>
                    <th colspan="5"></th>
                    <th class="size-sm align-right">{{AppHelper::money_br($total1)}}</th>
                    <th class="size-sm align-right">{{AppHelper::money_br($total2)}}</th>
                    <th class="size-sm align-right" colspan="1">{{AppHelper::money_br($total1 - $total2)}}</th>
                </tr>
            </tfoot>
        </table>

@stop