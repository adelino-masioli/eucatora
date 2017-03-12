<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório financeiro</title>

    <style type="text/css" media="screen">
        body{font-family: Arial, Helvetica, sans-serif!important;overflow: auto;}
        @page{size: auto; margin: 5mm 5mm 5mm 5mm;}
        table{width: 100%;overflow: auto;}


        #h0{width: 150px;font-size: 4mm;text-align: right;display: inline-block;font-weight: bolder;margin-right: 6px;}
        #h1{width: 4%;font-size: 4mm;}
        h1{width: 100%;text-align: left;padding-bottom:10px;margin-bottom: 10px;}
        .align-center{text-align: center;}
        .align-right{text-align: right;}
        #dispoheader{border-bottom:1px solid #000000;}
        #dispoheader th{border-bottom:1px solid #000000;padding-bottom:10px;margin-bottom: 10px;padding-top: 8px;text-align: center;}
        #dispoheader td{border-bottom:1px solid #000000;padding-bottom:10px;padding-top: 5px;}
        .borderrightonly{border-right:1px solid #000000;text-align: center;}
        .borderright{border-right:1px solid #000000;padding-right: 10px;}
        .ptotal{font-size: 3mm!important;font-weight: bolder;}
    </style>
</head>
<body>


        <h1><img src="{{public_path('build/images/brand_header.png')}}" width="100%"/></h1>
        <table>
            <tbody>
                <tr id="dispoheader">
                    <th class="borderrightonly">CÓDIGO</th>
                    <th colspan="2"  class="borderrightonly">LANÇAMENTO</th>
                    <th class="borderrightonly">VENC.</th>
                    <th class="borderrightonly">PARC.</th>
                    <th class="borderrightonly">ENTRADA</th>
                    <th class="borderrightonly">SAÍDA</th>
                    <th>STATUS</th>
                </tr>
            </tbody>
            <tbody>
            <?php $total1 = null; $total2 = null;  ?>
                @foreach($data as $reports)
                    <tr id="dispoheader">
                        <td class="borderrightonly align-center">{{$reports->id}}</td>
                        <td colspan="2" class="borderrightonly">{{$reports->title}}</td>
                        <td class="align-center borderrightonly">{{AppHelper::date_only_br($reports->date_final)}}</td>
                        <td class="align-center borderrightonly">{{$reports->amount}}</td>
                        <td class="align-right borderrightonly" style="padding-right: 10px;">{{AppHelper::money_br(AppHelper::financial_export_type_1($reports->type, $reports->price))}}</td>
                        <td class="align-right borderrightonly" style="padding-right: 10px;">{{AppHelper::money_br(AppHelper::financial_export_type_2($reports->type, $reports->price))}}</td>
                        <td class="align-center">{{AppHelper::financial_status($reports->status)}}</td>
                    </tr>
                    <?php $total1 += AppHelper::financial_export_type_1($reports->type, $reports->price); ?>
                    <?php $total2 += AppHelper::financial_export_type_2($reports->type, $reports->price); ?>
                @endforeach
            </tbody>
            <tbody>
                <tr id="dispoheader">
                    <td colspan="5" class="borderright"></td>
                    <td class="align-center borderright ptotal">TOTAL ENTRADAS</td>
                    <td class="align-center borderright ptotal">TOTAL SAÍDAS</td>
                    <td class="align-center ptotal" colspan="1">SALDO ATUAL</td>
                </tr>
                <tr id="dispoheader">
                    <td colspan="5" class="borderright"></td>
                    <td class="align-right borderright"><strong>{{AppHelper::money_br($total1)}}</strong></td>
                    <td class="align-right borderright"><strong>{{AppHelper::money_br($total2)}}</strong></td>
                    <td class="align-right" colspan="1"><strong>{{AppHelper::money_br($total1 - $total2)}}</strong></td>
                </tr>
            </tbody>
        </table>

</body>
</html>