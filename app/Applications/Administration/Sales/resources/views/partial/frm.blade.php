<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_customer" aria-controls="tab_customer" role="tab" data-toggle="tab"><i class="fa fa-users" aria-hidden="true"></i> Cliente</a></li>
            @if(isset($products))
                <li role="presentation" class="di"><a href="#tab_itens" aria-controls="tab_itens" role="tab" data-toggle="tab"><i class="fa fa-list" aria-hidden="true"></i> Itens</a></li>
                <li role="presentation"><a href="#tab_description" aria-controls="tab_description" role="tab" data-toggle="tab"><i class="fa fa-comments" aria-hidden="true"></i> Observações</a></li>
            @endif
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="tab_customer">@include('sales::partial.tabs.customer')</div>
        @if(isset($products))
            <div role="tabpanel" class="tab-pane fade" id="tab_itens">@include('sales::partial.tabs.itens')</div>
            <div role="tabpanel" class="tab-pane fade" id="tab_description">@include('sales::partial.tabs.description')</div>
        @endif
    </div>
</div>