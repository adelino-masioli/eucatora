<div class="row">
        @include('sales::partial.tabs.customer')
        @if(isset($products))
            @include('sales::partial.tabs.itens')
        @endif
</div>