<div class="counter">
    <a href="{{url('checkout')}}" class="minicart_link" >
    	<span class="item"><strong>{{Shpcart::cart()->total_items()}}</strong> items on cart</span>
    	<span class="price"><strong>{{ price(Shpcart::cart()->total() )}}</strong></span>
	</a>
</div>