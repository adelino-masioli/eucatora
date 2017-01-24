<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_provider" aria-controls="tab_provider" role="tab" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i> Fornecedor</a></li>
            @if(isset($products))
                <li role="presentation" class="di"><a href="#tab_itens" aria-controls="tab_itens" role="tab" data-toggle="tab"><i class="fa fa-list" aria-hidden="true"></i> Itens</a></li>
                <li role="presentation"><a href="#tab_taxes" aria-controls="tab_taxes" role="tab" data-toggle="tab"><i class="fa fa-dollar" aria-hidden="true"></i> Taxas e Impostos</a></li>
            @endif
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="tab_provider">@include('purchases::partial.tabs.provider')</div>
        @if(isset($products))
            <div role="tabpanel" class="tab-pane fade" id="tab_itens">@include('purchases::partial.tabs.itens')</div>
            <div role="tabpanel" class="tab-pane fade" id="tab_taxes">@include('purchases::partial.tabs.taxes')</div>
        @endif
    </div>
</div>