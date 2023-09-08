<div class="swiper-container">
	<div class="swiper-wrapper">
		<?php  if(json_decode($homeSliderArray,true)){ $homeSliderArray = json_decode($homeSliderArray,true);}   ?> <?php  foreach ( $homeSliderArray as $slider) { ?>
		<div class="swiper-slide"><a href="<?php  echo $slider['url'];  ?>" target="_blank"><img src="<?php  echo $slider['img'];  ?>" alt="<?php  echo $slider['title'];  ?>"></a>
		</div>
		<?php }   ?> 
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
	<!-- Add Arrows -->
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
</div>