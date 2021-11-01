<div class="product-list__item product-item">
	<a href="<?= ProductHelper::getUrl($data); ?>">
		<?php if($data->image): ?>
		    <div class="product-item__img fl fl-jc-c">
	    		<picture class="">
	                <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
	                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

	                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(180, 230, true, null,'image'); ?>" type="image/webp">
	                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(180, 230, true, null,'image'); ?>">

	                <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->title; ?>">
	            </picture>
		    </div>
		<?php else : ?>
			<div class="product-item__img">
	        	<?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.jpg','', ['class' => '']); ?>
	        </div>
		<?php endif; ?>
		<div class="product-item__name text-center"><?= $data->name; ?></div>
	</a>
	<div class="product-item__weight text-center">
		900 гр.
	</div>
</div>
