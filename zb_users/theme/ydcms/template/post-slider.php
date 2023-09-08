<div class="swiper-container">
	<div class="swiper-wrapper">
		{php} if(json_decode($homeSliderArray,true)){ $homeSliderArray = json_decode($homeSliderArray,true);}  {/php} {foreach $homeSliderArray as $slider}
		<div class="swiper-slide"><a href="{$slider['url']}" target="_blank"><img src="{$slider['img']}" alt="{$slider['title']}"></a>
		</div>
		{/foreach} 
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
</div>