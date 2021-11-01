<div class="carouselSlider slick-slider">
	<?php foreach ($models as $key => $data): ?>
	    <div class="slider__item slider-item">
			<div class="slider-item__img fl fl-jc-c">
				<picture class="">
	            	<source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
	                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

	                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(406, 160, true, null,'image'); ?>" type="image/webp">
	                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(406, 160, true, null,'image'); ?>">
	
		            <img src="<?= $data->getImageNewUrl(0, 0, true, null, 'image'); ?>" alt="">
		        </picture>
			</div>
	    </div>
	<?php endforeach ?>
</div>



