<div class="tabs-chart">
	<div class="joystick">
		<img src="{{url(dirTemaToko().'goldenbowl/assets/img/bowl-cart.png')}}" class="icon-joystick" alt="Shoping Cart">
	</div>
	<div id="shopping-cart" class="chart">
		<a href="{{url('checkout')}}">
			<h3><strong>{{Shpcart::cart()->total_items()}} items </strong>on cart</h3>
		</a>
		<span>Total : {{ price(Shpcart::cart()->total() )}}</span>
	</div>
</div>