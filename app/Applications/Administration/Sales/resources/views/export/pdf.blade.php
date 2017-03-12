<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório vendas</title>

    <style type="text/css" media="screen">
        body{font-family: Arial, Helvetica, sans-serif!important;overflow: auto;font-size: 12px;}
        @page{size: auto; margin: 5mm 5mm 5mm 5mm;}
        table{width: 100%;overflow: auto;}


        #h0{width: 150px;font-size: 4mm;text-align: right;display: inline-block;font-weight: bolder;margin-right: 6px;}
        #h1{width: 4%;font-size: 4mm;}
        h1{width: 100%;text-align: left;padding-bottom:10px;margin-bottom: 10px;}
        .align-center{text-align: center;}
        .align-right{text-align: right;}
        #dispoheader{border-bottom:0.3pt solid #666666;}
        #dispoheader th{border-bottom:0.3pt solid #666666;padding-bottom:5px;margin-bottom: 5px;padding-top: 4px;text-align: center;text-transform: uppercase;}
        #dispoheader td{border-bottom:0.3pt solid #666666;padding-bottom:10px;padding-top: 5px;}
        .borderrightonly{border-right:0.3pt solid #666666;text-align: left!important;}
        .borderright{border-right:0.3pt solid #666666;text-align: center!important;}
        .borderright2{border-right:0.3pt solid #666666;text-align: right!important;}
        .ptotal{font-size: 3mm!important;font-weight: bolder;}
    </style>
</head>
<body>


<h1><img src="{{public_path('build/images/brand_header.png')}}" width="100%"/></h1>
<table>
    <tbody>
        <tr id="dispoheader">
            <td colspan="4" class="borderrightonly">NOME DO CLINETE: {{$sale->customer->name}}</td>
            <td colspan="2" class="borderrightonly">TELEFONE: {{$sale->customer->phone}}</td>
            <td colspan="2" >CELULAR: {{$sale->customer->celullar}}</td>
        </tr>
        <tr id="dispoheader">
            <td  style="margin-bottom: 20px!important;" colspan="4" class="borderrightonly">ENDEREÇO: {{$sale->customer->address}}, {{$sale->customer->number}} {{$sale->customer->complement}}</td>
            <td  style="margin-bottom: 20px!important;" colspan="2" class="borderrightonly">BAIRRO: {{$sale->customer->neighborhood}}</td>
            <td  style="margin-bottom: 20px!important;" colspan="2">CIDADE/UF: {{$sale->customer->city->name}}, {{$sale->customer->state->uf}}</td>
        </tr>
    </tbody>

    <tbody>
    <tr id="dispoheader">
        <th style="background: #cccccc;" class="borderright">Item</th>
        <th style="background: #cccccc;" class="borderright">Qtd</th>
        <th style="background: #cccccc;" class="borderright">Descrição</th>
        <th style="background: #cccccc;" class="borderright">Diam.</th>
        <th style="background: #cccccc;" class="borderright">Metragem</th>
        <th style="background: #cccccc;" class="borderright">Tipo</th>
        <th style="background: #cccccc;" class="borderright">P. Unit.</th>
        <th style="background: #cccccc;">Total</th>
    </tr>
    </tbody>
    <tbody>
    <?php $total = null; ?>
    @foreach($item as $reports)
        <tr id="dispoheader">
            <td class="borderright">{{$reports->id}}</td>
            <td class="borderright">{{$reports->amount_item}}</td>
            <td class="borderrightonly">{{$reports->product->name}}</td>
            <td class="borderright">{{$reports->radial}}</td>
            <td class="borderright">{{$reports->meters}}</td>
            <td class="borderright">{{$reports->meters_type}}</td>
            <td class="align-right borderright2">{{AppHelper::money_br($reports->price_unit)}}</td>
            <td class="align-right">{{AppHelper::money_br($reports->price_total)}}</td>
        </tr>
        <?php $total += $reports->price_total; ?>
    @endforeach
    </tbody>
    <tbody>

    <tr id="dispoheader">
        <td colspan="7" class="borderright2">SUBTOTAL</td>
        <td class="align-right" colspan="1"><strong>{{AppHelper::money_br($total)}}</strong></td>
    </tr>
    <tr id="dispoheader">
        <td colspan="7" class="borderright2">FRETE</td>
        <td class="align-right" colspan="1"><strong>{{AppHelper::money_br($sale->price_shipp)}}</strong></td>
    </tr>
    <tr id="dispoheader">
        <td colspan="7" class="borderright2">TOTAL</td>
        <td class="align-right" colspan="1"><strong>{{AppHelper::money_br($total - $sale->price_shipp)}}</strong></td>
    </tr>
    </tbody>
</table>

</body>
</html>