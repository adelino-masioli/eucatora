<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading text-uppercase panel-heading-sm"><strong>Imóvel</strong></div>
        <div class="panel-body panel-body-sm">
            <div class="row">
                <div class="form-group form-group-xs margin-bottom-0 col-lg-8">
                    {!! Form::label('denomination', 'Denominação') !!}
                    {!! Form::text('denomination',  null, array('id'=>'id', 'class'=>'form-control input-sm', 'placeholder'=>'Denominação')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('total_area', 'Área total') !!}
                    {!! Form::text('total_area',  null, array('id'=>'total_area', 'class'=>'form-control input-sm', 'placeholder'=>'Área total')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('incra', 'INCRA') !!}
                    {!! Form::text('incra',  null, array('id'=>'incra', 'class'=>'form-control input-sm', 'placeholder'=>'INCRA')) !!}
                </div>
            </div>{{--end denomination--}}


            <div class="row">
                <div class="form-group margin-bottom-0 col-lg-5">
                    {!! Form::label('register_number', 'Número de registro') !!}
                    {!! Form::text('register_number',  null, array('id'=>'register_number', 'class'=>'form-control input-sm', 'placeholder'=>'Número de registro')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-3">
                    {!! Form::label('county', 'Comarca') !!}
                    {!! Form::text('county',  null, array('id'=>'county', 'class'=>'form-control input-sm', 'placeholder'=>'Comarca')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('book', 'Livro') !!}
                    {!! Form::text('book',  null, array('id'=>'book', 'class'=>'form-control input-sm', 'placeholder'=>'Livro')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('sheet', 'Folha') !!}
                    {!! Form::text('sheet',  null, array('id'=>'sheet', 'class'=>'form-control input-sm', 'placeholder'=>'Folha')) !!}
                </div>
            </div>{{--end number register--}}


            <div class="row">
                <div class="form-group margin-bottom-0 col-lg-10">
                    {!! Form::label('city', 'Município/Distrito') !!}
                    {!! Form::text('city',  null, array('id'=>'city', 'class'=>'form-control input-sm', 'placeholder'=>'Município/Distrito')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-2">
                    {!! Form::label('zipcode', 'CEP') !!}
                    {!! Form::text('zipcode',  null, array('id'=>'zipcode', 'class'=>'form-control input-sm', 'placeholder'=>'CEP', 'onclick'=>'onlyNumber(\'#zipcode\')')) !!}
                </div>
            </div>{{--end number register--}}


            <div class="row hidden">
                <div class="form-group margin-bottom-0 col-lg-4">
                    {!! Form::label('cood_geo_lat', 'Cood. Geog. Lat.') !!}
                    {!! Form::text('cood_geo_lat',  null, array('id'=>'cood_geo_lat', 'class'=>'form-control input-sm', 'placeholder'=>'Cood. Geog. Lat.')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-4">
                    {!! Form::label('cood_geo_long', 'Cood. Geog. Long.') !!}
                    {!! Form::text('cood_geo_long',  null, array('id'=>'cood_geo_long', 'class'=>'form-control input-sm', 'placeholder'=>'Cood. Geog. Long.')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-4">
                    {!! Form::label('mi', 'Ident. Carta(MI)') !!}
                    {!! Form::text('mi',  null, array('id'=>'mi', 'class'=>'form-control input-sm', 'placeholder'=>'Ident. Carta(MI)')) !!}
                </div>
            </div>{{--end geographic--}}


            <div class="row hidden">
                <div class="form-group margin-bottom-0 col-lg-4">
                    {!! Form::label('plan_utm_lat', 'Planas(UTM) Lat.') !!}
                    {!! Form::text('plan_utm_lat',  null, array('id'=>'plan_utm_lat', 'class'=>'form-control input-sm', 'placeholder'=>'Planas(UTM) Lat.')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-4">
                    {!! Form::label('plan_utm_long', 'Planas(UTM) Long.') !!}
                    {!! Form::text('plan_utm_long',  null, array('id'=>'plan_utm_long', 'class'=>'form-control input-sm', 'placeholder'=>'Planas(UTM) Long.')) !!}
                </div>
                <div class="form-group margin-bottom-0 col-lg-4">
                    {!! Form::label('datum', 'Datum Horizontal') !!}
                    {!! Form::text('datum',  null, array('id'=>'datum', 'class'=>'form-control input-sm', 'placeholder'=>'Datum Horizontal')) !!}
                </div>
            </div>{{--end planas--}}


        </div>
    </div>
</div>{{--end immobile--}}




