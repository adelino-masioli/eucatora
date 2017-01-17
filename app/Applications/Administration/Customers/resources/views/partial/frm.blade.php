<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_data" aria-controls="tab_data" role="tab" data-toggle="tab"><i class="fa fa-database" aria-hidden="true"></i> Dados</a></li>
            <li role="presentation"><a href="#tab_address" aria-controls="tab_address" role="tab" data-toggle="tab"><i class="fa fa-location-arrow" aria-hidden="true"></i> Endereço</a></li>
            <li role="presentation"><a href="#tab_user" aria-controls="tab_user" role="tab" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> Usuário</a></li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="tab_data">@include('customers::partial.tabs.data')</div>
        <div role="tabpanel" class="tab-pane fade" id="tab_address">@include('customers::partial.tabs.address')</div>
        <div role="tabpanel" class="tab-pane fade" id="tab_user">@include('customers::partial.tabs.user')</div>
    </div>
</div>