<div class="row">
	<div id="slider">
		<ul class="bxslider">
			@foreach (slideshow() as $val)
			<li>
				@if(!empty($val->url))
				<a href="{{filter_link_url($val->url)}}" target="_blank">
				@else
				<a href="#">
				@endif
					{{HTML::image(slide_image_url($val->gambar), $val->title, array('class'=>'slide_gbr'))}} 
				</a>
				@if(!empty($val->text))
				<div class="caption-info">
					<h1>{{$val->text}}</h1>
				</div>
				@endif
			</li>
			@endforeach
		</ul>
	</div>
</div>