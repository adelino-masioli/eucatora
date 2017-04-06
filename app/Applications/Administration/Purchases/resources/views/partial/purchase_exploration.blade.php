<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading text-uppercase panel-heading-sm"><strong>Exploração</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                    {!! Form::label('exploration_area', 'Área de exploração') !!}
                    {!! Form::text('exploration_area',  null, array('id'=>'exploration_area', 'class'=>'form-control input-sm', 'placeholder'=>'Área de exploração(Ha)')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('exploration_n_tree', 'N&#176; Árvores') !!}
                    {!! Form::text('exploration_n_tree',  null, array('id'=>'exploration_n_tree', 'class'=>'form-control input-sm', 'placeholder'=>'Número de Árvores')) !!}
                </div>

                <div class="form-group form-group-xs margin-bottom-0 col-lg-3">
                    {!! Form::label('exploration_dap', 'DAP(Médio)') !!}
                    {!! Form::text('exploration_dap',  null, array('id'=>'exploration_dap', 'class'=>'form-control input-sm', 'placeholder'=>'DAP(Médio)')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('exploration_alt', 'Altura(Média)') !!}
                    {!! Form::text('exploration_alt',  null, array('id'=>'exploration_alt', 'class'=>'form-control input-sm', 'placeholder'=>'Altura(Média)')) !!}
                </div>
            </div>{{--end exploration area--}}

            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                    {!! Form::label('exploration_age', 'Idade plantio') !!}
                    {!! Form::text('exploration_age',  null, array('id'=>'exploration_age', 'class'=>'form-control input-sm', 'placeholder'=>'Idade plantio')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('exploration_rotation', 'Rotação(Corte)') !!}
                    {!! Form::text('exploration_rotation',  null, array('id'=>'exploration_rotation', 'class'=>'form-control input-sm', 'placeholder'=>'Rotação(Corte)')) !!}
                </div>

                <div class="form-group form-group-xs margin-bottom-0 col-lg-3">
                    {!! Form::label('exploration_spacing', 'Espaçamento') !!}
                    {!! Form::text('exploration_spacing',  null, array('id'=>'exploration_spacing', 'class'=>'form-control input-sm', 'placeholder'=>'Espaçamento')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('exploration_species', 'Espécie') !!}
                    {!! Form::text('exploration_species',  null, array('id'=>'exploration_species', 'class'=>'form-control input-sm', 'placeholder'=>'Espécie')) !!}
                </div>
            </div>{{--end exploration age--}}

            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-6">
                    {!! Form::label('exploration_period', 'Período de colheita') !!}
                    {!! Form::text('exploration_period',  null, array('id'=>'exploration_period', 'class'=>'form-control input-sm', 'placeholder'=>'Período de colheita')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('exploration_qtd_oven', 'QTDE Fornos') !!}
                    {!! Form::text('exploration_qtd_oven',  null, array('id'=>'exploration_qtd_oven', 'class'=>'form-control input-sm', 'placeholder'=>'QTDE Fornos')) !!}
                </div>

                <div class="form-group form-group-xs margin-bottom-0 col-lg-3">
                    {!! Form::label('exploration_capacity', 'CAPAC. Instalada') !!}
                    {!! Form::text('exploration_capacity',  null, array('id'=>'exploration_capacity', 'class'=>'form-control input-sm', 'placeholder'=>'CAPAC. Instalada')) !!}
                </div>
            </div>{{--end exploration period--}}


            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-6">
                    {!! Form::label('exploration_destination', 'Destinação da produção') !!}
                    {!! Form::text('exploration_destination',  null, array('id'=>'exploration_destination', 'class'=>'form-control input-sm', 'placeholder'=>'Destinação da produção')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-6">
                    {!! Form::label('exploration_type', 'Tipo de exploração') !!}
                    {!! Form::text('exploration_type',  null, array('id'=>'exploration_type', 'class'=>'form-control input-sm', 'placeholder'=>'Tipo de exploração')) !!}
                </div>
            </div>{{--end exploration destination--}}


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-uppercase panel-heading-sm text-center"><strong>Produto</strong></div>
                        <div class="panel-body panel-body-sm">
                            <div class="row">
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_wood_shoring', 'Madeira(Mt)') !!}
                                    {!! Form::text('exploration_wood_shoring',  null, array('id'=>'exploration_wood_shoring', 'class'=>'form-control input-sm', 'placeholder'=>'Madeira')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_wood_scaffolding', 'Madeira para escoramento(Mt)') !!}
                                    {!! Form::text('exploration_wood_scaffolding',  null, array('id'=>'exploration_wood_scaffolding', 'class'=>'form-control input-sm', 'placeholder'=>'Madeira para escoramento')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_wood_moiroes', 'Moirões(Mt)') !!}
                                    {!! Form::text('exploration_wood_moiroes',  null, array('id'=>'exploration_wood_moiroes', 'class'=>'form-control input-sm', 'placeholder'=>'Moirões')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_wood_firewood', 'Lenha(Mt)') !!}
                                    {!! Form::text('exploration_wood_firewood',  null, array('id'=>'exploration_wood_firewood', 'class'=>'form-control input-sm', 'placeholder'=>'Lenha')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_wood_sawmill', 'Madeira para serraria') !!}<br/>

                                    <div class="row">
                                        <div class="col-lg-6">{!! Form::text('exploration_wood_sawmill_logs',  null, array('id'=>'exploration_wood_sawmill_logs', 'class'=>'form-control input-sm', 'placeholder'=>'Toras')) !!}</div>
                                        <div class="col-lg-6">{!! Form::text('exploration_wood_sawmill_tulls',  null, array('id'=>'exploration_wood_sawmill_tulls', 'class'=>'form-control input-sm', 'placeholder'=>'Toretes')) !!}</div>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4 hidden">
                                    {!! Form::label('exploration_wood_cellulose', 'Madeira para celulose(&#179;)') !!}
                                    {!! Form::text('exploration_wood_cellulose',  null, array('id'=>'exploration_wood_cellulose', 'class'=>'form-control input-sm', 'placeholder'=>'Madeira para celulose')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_wood_other', 'Carvão(Mt)') !!}
                                    {!! Form::text('exploration_wood_other',  null, array('id'=>'exploration_wood_other', 'class'=>'form-control input-sm', 'placeholder'=>'Carvão(Mt)')) !!}
                                </div>

                            </div>{{--end exploration products--}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 hidden">
                    <div class="panel panel-default">
                        <div class="panel-heading text-uppercase panel-heading-sm text-center"><strong>Volume por essência</strong></div>
                        <div class="panel-body panel-body-sm">
                            <div class="row">
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_valume_eucalipto', 'Eucalipto') !!}
                                    {!! Form::textarea('exploration_valume_eucalipto',  null, array('id'=>'exploration_valume_eucalipto', 'class'=>'form-control input-sm', 'placeholder'=>'Eucalipto', 'style'=>'max-height:396px;min-height:396px;min-width:100%;max-width:100%;')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_valume_pinus', 'Pinus') !!}
                                    {!! Form::textarea('exploration_valume_pinus',  null, array('id'=>'exploration_valume_pinus', 'class'=>'form-control input-sm', 'placeholder'=>'Pinus', 'style'=>'max-height:396px;min-height:396px;min-width:100%;max-width:100%;')) !!}
                                </div>
                                <div class="form-group form-group-xs margin-bottom-0 col-lg-4">
                                    {!! Form::label('exploration_valume_other', 'Outros(Especificar)') !!}
                                    {!! Form::textarea('exploration_valume_other',  null, array('id'=>'exploration_valume_other', 'class'=>'form-control input-sm', 'placeholder'=>'Outros(Especificar)', 'style'=>'max-height:396px;min-height:396px;min-width:100%;max-width:100%;')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</div>{{--end exploration--}}




