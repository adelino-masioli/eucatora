<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório financeiro</title>

    <style type="text/css" media="screen">
        body{font-family: Arial, Helvetica, sans-serif!important;overflow: auto;font-size: 10pt;}
        @page{size: auto; margin: 5mm 5mm 5mm 5mm;}
        table{width: 100%;overflow: auto;}
        h1{width: 100%;text-align: left;padding-bottom:10px;margin-bottom: 10px;}
        .align-center{text-align: center;}
        .align-right{text-align: right;}
        .align-left{text-align: left;}
        #dispoheader{border-bottom:0.3pt solid #666666;}
        #dispoheader th{border-bottom:0.3pt solid #666666;padding-bottom:10px;margin-bottom: 10px;padding-top: 8px;text-align: center;}
        #dispoheader td{border-bottom:0.3pt solid #666666;padding-bottom:5px;padding-top: 5px;}
        .borderrightonly{border-right:0.3pt solid #666666;}
        stront{text-transform: uppercase;}
        .divide{border-bottom:0.3pt solid #666666;margin-bottom: 10px;padding-bottom: 5px;}
        h2{text-transform: uppercase; background: #DFF0D8;padding: 5px;font-size: 10pt;}
    </style>
</head>
<body>


<h1><img src="{{public_path('build/images/brand_header.png')}}" width="100%"/></h1>
@if($data->count() > 0)
<table>
    <tbody>
    @foreach($data as $reports)
        <tr id="dispoheader"><td colspan="5"><h2>Imóvel</h2></td></tr>
        <tr id="dispoheader">
            <td colspan="3" class="align-left borderrightonly"><strong>Denominação:</strong> {{$reports->denomination}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Área total:</strong> {{$reports->total_area}}</td>
            <td colspan="1" class="align-left"><strong>INCRA:</strong> {{$reports->incra}}</td>
        </tr>

        <tr id="dispoheader">
            <td colspan="2" class="align-left borderrightonly"><strong>Número de registro:</strong> {{$reports->register_number}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Comarca:</strong> {{$reports->county}}</td>
            <td colspan="1" class="align-left"><strong>Livro:</strong> {{$reports->book}}</td>
            <td colspan="1" class="align-left"><strong>Folha:</strong> {{$reports->sheet}}</td>
        </tr>

        <tr id="dispoheader">
            <td colspan="4" class="align-left borderrightonly"><strong>Município/Distrito:</strong> {{$reports->city}}</td>
            <td colspan="1" class="align-left"><strong>CEP:</strong> {{$reports->zipcode}}</td>
        </tr>

        <tr id="dispoheader" style="display: none;">
            <td colspan="3" class="align-left borderrightonly"><strong>Cood. Geog. Lat.:</strong> {{$reports->cood_geo_lat}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Cood. Geog. Long.:</strong> {{$reports->cood_geo_long}}</td>
            <td colspan="1" class="align-left"><strong>Ident. Carta(MI):</strong> {{$reports->mi}}</td>
        </tr>

        <tr id="dispoheader" style="display: none;">
            <td colspan="3" class="align-left borderrightonly"><strong>Planas(UTM) Lat.:</strong> {{$reports->plan_utm_lat}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Planas(UTM) Long.:</strong> {{$reports->plan_utm_long}}</td>
            <td colspan="1" class="align-left"><strong>Datum Horizontal:</strong> {{$reports->datum}}</td>
        </tr>

        <tr id="dispoheader"><td colspan="5"><h2>Proprietário</h2></td></tr>
        <tr id="dispoheader">
            <td colspan="4" class="align-left borderrightonly"><strong>Nome:</strong> {{$reports->owner_name}}</td>
            <td colspan="1" class="align-left"><strong>CPF/CNPJ:</strong> {{$reports->owner_cpf_cnpj}}</td>
        </tr>

        <tr id="dispoheader">
            <td colspan="2" class="align-left borderrightonly"><strong>Endereço:</strong> {{$reports->owner_address}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Bairro:</strong> {{$reports->owner_neig}}</td>
            <td colspan="1" class="align-left"><strong>Município:</strong> {{$reports->owner_city}}</td>
            <td colspan="1" class="align-left"><strong>CEP:</strong> {{$reports->owner_zipcode}}</td>
        </tr>

        <tr id="dispoheader"><td colspan="5"><h2>Explorador</h2></td></tr>


        <tr id="dispoheader">
            <td colspan="2" class="align-left borderrightonly"><strong>Nome do explorador:</strong> {{$reports->explorer_name}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>CPF/CNPJ:</strong> {{$reports->explorer_cpf_cnpj}}</td>
            <td colspan="1" class="align-left"><strong>Registro IEF:</strong> {{$reports->explorer_ief}}</td>
            <td colspan="1" class="align-left"><strong>Categoria:</strong> {{$reports->explorer_category}}</td>
        </tr>

        <tr id="dispoheader">
            <td colspan="1" class="align-left borderrightonly"><strong>Endereço:</strong> {{$reports->explorer_address}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Bairro:</strong> {{$reports->explorer_neig}}</td>
            <td colspan="1" class="align-left"><strong>Município:</strong> {{$reports->explorer_city}}</td>
            <td colspan="1" class="align-left"><strong>CEP:</strong> {{$reports->explorer_zipcode}}</td>
            <td colspan="1" class="align-left"><strong>Telefone:</strong> {{$reports->explorer_phone}}</td>
        </tr>

        <tr id="dispoheader"><td colspan="5"><h2>Exploração</h2></td></tr>


        <tr id="dispoheader">
            <td colspan="2" class="align-left borderrightonly"><strong>Idade plantio:</strong> {{$reports->exploration_age}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>Rotação(Corte):</strong> {{$reports->exploration_rotation}}</td>
            <td colspan="1" class="align-left"><strong>Espaçamento:</strong> {{$reports->exploration_spacing}}</td>
            <td colspan="1" class="align-left"><strong>Espécie:</strong> {{$reports->exploration_species}}</td>
        </tr>

        <tr id="dispoheader">
            <td colspan="3" class="align-left borderrightonly"><strong>Período de colheita:</strong> {{$reports->exploration_period}}</td>
            <td colspan="1" class="align-left borderrightonly"><strong>QTDE Fornos:</strong> {{$reports->exploration_qtd_oven}}</td>
            <td colspan="1" class="align-left"><strong>CAPAC. Instalada:</strong> {{$reports->exploration_capacity}}</td>
        </tr>

        <tr id="dispoheader">
            <td colspan="2" class="align-left borderrightonly">
                <div class="divide"><strong>Madeira para escoramento(Dz)</strong> {{$reports->exploration_wood_shoring}}</div>
                <div class="divide"><strong>Madeira para andaime(Dz)</strong> {{$reports->exploration_wood_scaffolding}}</div>
                <div class="divide"><strong>Moirões(Dz)</strong> {{$reports->exploration_wood_moiroes}}</div>
                <div class="divide"><strong>Lenha(Dz)</strong> {{$reports->exploration_wood_firewood}}</div>
                <div class="divide"><strong>Madeira para serraria</strong><br/> Toras: {{$reports->exploration_wood_sawmill_logs}} | Toretes:  {{$reports->exploration_wood_sawmill_tulls}}</div>
                <div class="divide"><strong>Madeira para celulose(³)</strong> {{$reports->exploration_wood_cellulose}}</div>
                <div> <strong>Outros</strong> {{$reports->exploration_wood_other}}</div>
            </td>

            <td colspan="1" class="align-left borderrightonly" valign="top"><strong>Eucalipto:</strong><br/> {{$reports->exploration_valume_eucalipto}}</td>
            <td colspan="1" class="align-left borderrightonly" valign="top"><strong>Pinus:</strong><br/> {{$reports->exploration_valume_pinus}}</td>
            <td colspan="1" class="align-left borderrightonly" valign="top"><strong>Outros(Especificar):</strong><br/> {{$reports->exploration_valume_other}}</td>
        </tr>

        <tr id="dispoheader"><td colspan="5"><h2>Proprietário</h2></td></tr>
        <tr id="dispoheader">
            <td colspan="5" class="align-left borderrightonly"><strong>Roteiro de acesso à propriedade:</strong> <br/>{{$reports->access}}</td>
        </tr>
        <tr id="dispoheader">
            <td colspan="5" class="align-left borderrightonly"><strong>Observação:</strong> <br/>{{$reports->observation}}</td>
        </tr>

    @endforeach
    </tbody>
</table>

@endif
</body>
</html>