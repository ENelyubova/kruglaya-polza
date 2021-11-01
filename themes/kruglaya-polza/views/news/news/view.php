<?php
/**
 * Отображение для ./themes/default/views/news/news/news.php:
 *
 * @category YupeView
 * @package  YupeCMS
 * @author   Yupe Team <team@yupe.ru>
 * @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 * @link     http://yupe.ru
 *
 * @var $this NewsController
 * @var $model News
 **/
?>
<?php
$this->title = ($model->meta_title) ? $model->meta_title : $model->title;
$this->description = $model->meta_description;
$this->keywords = $model->meta_keywords;
?>

<?php
$this->breadcrumbs = [
    Yii::t('NewsModule.news', 'Рецепты') => ['/news/news/index'],
    $model->title
];
?>

<div class="page-recipes pb">
    <div class="content-site">
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
                'links' => $this->breadcrumbs,
        ]); ?>
        <h1 class="title heading heading-block"><?= CHtml::encode($model->title); ?></h1>
        
        <div class="page-recipes__content">
            <div class="recipes-item__params fl fl-ai-c">
                <div class="recipes-time"><?= $model->cooking; ?></div>
            </div>
            <?php if($model->video): ?>
                <div class="recipes-item__video">
                    <?= $model->video; ?>
                </div>
            <?php else: ?>
                <div class="recipes-item__preview">
                    <picture class="">
                        <source media="(min-width: 401px)" srcset="<?= $model->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                        <source media="(min-width: 401px)" srcset="<?= $model->getImageNewUrl(0, 0, true, null,'image'); ?>">
            
                        <source media="(min-width: 1px)" srcset="<?= $model->getImageUrlWebp(360, 250, true, null,'image'); ?>" type="image/webp">
                        <source media="(min-width: 1px)" srcset="<?= $model->getImageNewUrl(360, 250, true, null,'image'); ?>">
            
                        <img src="<?= $model->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $model->title; ?>">
                    </picture>
                </div>
            <?php endif; ?>
            
            <div class="recipes-item__info"><?= $model->full_text; ?></div>
            
            <?php $photos = $model->getAttributeValue('box1')['gallery']; ?>
            <?php if($model->getAttributeValue('box1')['name']): ?>
                <div class="recipes-item__info">
                    <div class="recipes-slider slick-slider">
                        <?php foreach ($photos as $key => $photo): ?>
                            <div class="thumb-carousel__item">
                                <?php if($photo['desc']) : ?>
                                    <a class="videoPress-box__play fl fl-al-it-c fl-ju-co-c" data-fancybox="iframe" href="<?= $photo['desc']; ?>">
                                <?php else: ?>
                                    <a data-fancybox="image" href="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>">
                                <?php endif; ?>
                                    <picture class="absolute-img-picture">
                                        <source media="(min-width: 401px)" srcset="<?= $model->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
                                        <source media="(min-width: 401px)" srcset="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">
            
                                        <source media="(min-width: 1px)" srcset="<?= $model->geFieldGalImageWebp(370, 240, true,  $photo['image']); ?>" type="image/webp">
                                        <source media="(min-width: 1px)" srcset="<?= $model->getFieldGalImageUrl(370, 240, true,  $photo['image']); ?>">
            
                                        <img src="<?= $model->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $model->title; ?>">
                                    </picture>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if($model->short_text): ?>
                <div class="recipes-item__info">
                    <?= $model->short_text; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


