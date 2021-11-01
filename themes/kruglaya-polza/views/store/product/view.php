<?php

/* @var $product Product */

$this->title = $product->getMetaTitle();
$this->description = $product->getMetaDescription();
$this->keywords = $product->getMetaKeywords();
$this->canonical = $product->getMetaCanonical();

$mainAssets = Yii::app()->getModule( 'store' )->getAssetsUrl();
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/jquery.simpleGal.js' );

Yii::app()->getClientScript()->registerCssFile( Yii::app()->getTheme()->getAssetsUrl() . '/css/store-frontend.css' );
Yii::app()->getClientScript()->registerScriptFile( Yii::app()->getTheme()->getAssetsUrl() . '/js/store.js' );

$this->breadcrumbs = array_merge(
    [ Yii::t( "StoreModule.store", 'Продукция' ) => [ '/store/product/index' ] ],
    $product->category ? $product->category->getBreadcrumbs( true ) : [], [ CHtml::encode( $product->name ) ]
);

?>

<a href="#0" class="cd-top">Top</a> 
<div class="store-container product-page js-scroll-product">
    <div class="content-site">
        <div class="breadcrumbs">
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->widget(
                        'bootstrap.widgets.TbBreadcrumbs',
                        [
                            'links' => $this->breadcrumbs,
                        ]
                    );?>
                </div>
            </div>
        </div>
        
        <div class="productView js-scroll-productView">
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
                <div class="productView__title title heading heading-pb">
                    <?= $product->name; ?>
                </div>  
                <div class="productView__weight productView__item product-item__weight">900 гр.</div>
                <?php if($product->description): ?>
                    <div class="productView__description productView__item">
                        <div class="productView__label">Описание</div>
                        <?= $product->description; ?>
                    </div>
                <?php endif; ?>

                <?php $attributes = $product->getAttributeGroups(); ?>
                <?php if (!empty($attributes)): ?>
                    <div class="productView__attributes productView__item">
                        <div class="productView__label">Характеристики</div>
                        <div class="product-attributes js-product-attributes">
                            <?php foreach ($product->getAttributeGroups() as $groupName => $items) : ?>
                                <?php foreach ($items as $attribute) : ?>
                                    <?php
                                    $value = AttributeRender::renderValue($attribute, $product->attribute($attribute));
                                    if (empty($value)) {
                                        continue;
                                    }
                                    ?>
                                    <div class="product-attributes__item js-product-attributes-item fl fl-w fl-ai-fe">
                                        <div class="product-attributes__name"><span><?= CHtml::encode($attribute->title); ?></span></div>
                                        <div class="product-attributes__val"><?= $value; ?></div>
                                    </div>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="productView__cooperation productView__description  productView__item">
                    <div class="productView__label">Сотрудничество</div>
                    <p>Мы будем рады сотрудничать с вами. Для того, чтобы начать диалог оставьте <br>сообщение через форму обратной связи.</p>
                    <a href="#writeUsModal" data-toggle="modal" class="btn btn-gray btn-svg btn-svg-right">
                        <span>Написать нам</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                        <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </a>
                </div>
                <div class="share-box">
                    <p>Поделиться с друзьями</p>
                    <div class="share-wrap fl fl-ai-c">
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,facebook,odnoklassniki,twitter"></div>
                        <a class="social-share-more js-sharemore fl fl-ai-bl fl-jc-c" href="#">
                            ...
                        </a> 
                        <div class="social-share-tooltip">
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-curtain data-shape="round" data-services="telegram,viber,whatsapp"></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="scrollstop pb"></div>
    </div>
</div>

<div class="more-products pt pb">
    <div class="content-site">
        <h2 class="heading heading-small heading-block">Попробуйте также</h2>
        <div class="product-list product-slider fl fl-w">
            <?php $this->widget('application.modules.store.widgets.ProductWidget', [
                'view' => 'product',
                'notIds' => "{$product->id}",
            ]); ?>
        </div>
    </div>
</div>
