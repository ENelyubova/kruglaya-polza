<div class="category-view" id="category-view-<?= $key; ?>">
		<?php if($products) : ?>
			<div class="product-list fl fl-w">
				<?php foreach ($products as $key2 => $product) : ?>
					<div class="product-list__item product-item">
						<a data-visi-pr="#product-view-<?= $product->id; ?>" data-cat="#product-category-<?= $key; ?>" href="#">
							<?php if($product->image): ?>
							    <div class="product-item__img fl fl-jc-c">
						    		<picture class="">
						                <source media="(min-width: 401px)" srcset="<?= $product->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
						                <source media="(min-width: 401px)" srcset="<?= $product->getImageNewUrl(0, 0, true, null,'image'); ?>">

						                <source media="(min-width: 1px)" srcset="<?= $product->getImageUrlWebp(180, 230, true, null,'image'); ?>" type="image/webp">
						                <source media="(min-width: 1px)" srcset="<?= $product->getImageNewUrl(180, 230, true, null,'image'); ?>">

						                <img src="<?= $product->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $product->title; ?>">
						            </picture>
							    </div>
							<?php else : ?>
								<div class="product-item__img">
						        	<?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.jpg','', ['class' => '']); ?>
						        </div>
							<?php endif; ?>
							<div class="product-item__name text-center"><?= $product->name; ?></div>
						</a>
						<div class="product-item__weight text-center">
							900 гр.
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if($products) : ?>
		<div id="product-category-<?= $key; ?>" class="product-category-carousel">
		<?php foreach ($products as $key2 => $product) : ?>
			<?php $images = $product->images(); ?>
			<div>
				<div class="productView product-view" id="product-view-<?= $product->id; ?>">
					<div class="productView__img product-view__img fl fl-jc-c">
		                <picture class="">
			                <source media="(min-width: 401px)" srcset="<?= $product->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
			                <source media="(min-width: 401px)" srcset="<?= $product->getImageNewUrl(0, 0, true, null,'image'); ?>">

			                <source media="(min-width: 1px)" srcset="<?= $product->getImageUrlWebp(317, 405, true, null,'image'); ?>" type="image/webp">
			                <source media="(min-width: 1px)" srcset="<?= $product->getImageNewUrl(317, 405, true, null,'image'); ?>">

			                <img src="<?= $product->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $product->title; ?>" data-lazyimg="<?= StoreImage::product($product, 317, 405, false); ?>">
			            </picture>
					</div>
					<div class="productView__info">
						<div class="productView__title">
							<?= $product->name; ?>
						</div>	
						<div class="productView__weight productView__item product-item__weight">900 гр.</div>
						<?php if($product->short_description): ?>
							<div class="productView__description productView__item">
								<?= $product->short_description; ?>
							</div>
						<?php endif; ?>

						<?php $attributes = $product->getAttributeGroups(); ?>
						<?php if (!empty($attributes)): ?>
							<div class="productView__attributes productView__item">
								<div class="product-attributes js-product-attributes">
		                            <?php $count = 0; ?>
		                            <?php foreach ($product->getAttributeGroups() as $groupName => $items) : ?>
		                                <?php foreach ($items as $attribute) : ?>
		                                    <?php
		                                    $value = AttributeRender::renderValue($attribute, $product->attribute($attribute));
		                                    if (empty($value)) {
		                                        continue;
		                                    }
		                                    ?>
		                                    <div class="product-attributes__item js-product-attributes-item fl fl-w fl-ai-fe <?= ($count > 2) ? 'hidden' : ''; ?>">
		                                        <div class="product-attributes__name"><span><?= CHtml::encode($attribute->title); ?></span></div>
		                                        <div class="product-attributes__val"><?= $value; ?></div>
		                                    </div>
		                                    <?php $count++; ?>
		                                <?php endforeach; ?>
		                            <?php endforeach; ?>
		                        </div>
							</div>
						<?php endif; ?>
						<div class="productView__more">
							<a href="<?= ProductHelper::getUrl($product); ?>" class="btn btn-red btn-hover">Полное описание</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>