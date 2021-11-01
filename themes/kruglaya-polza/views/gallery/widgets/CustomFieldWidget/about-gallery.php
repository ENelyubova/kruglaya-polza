<?php $photos = $model->getAttributeValue($code)['gallery']; ?>
<?php if($photos) : ?>
	<div class="about-slider ">
		<?php foreach ($photos as $key => $photo): ?>
			<div class="about-slider__item">
	        	<div class="img-fill">
	        		<picture class="absolute-img-pictur">
	        			<source media="(min-width: 401px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
			            <source media="(min-width: 401px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">
	
			            <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(270, 530, true,  $photo['image']); ?>" type="image/webp">
			            <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(270, 530, true,  $photo['image']); ?>">
	
			            <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
			        </picture>
	        	</div>
	    	</div>
	    <?php endforeach ?>
    </div>
<?php endif; ?>