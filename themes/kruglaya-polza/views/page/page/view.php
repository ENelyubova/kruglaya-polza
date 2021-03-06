<?php
/* @var $model Page */
/* @var $this PageController */

if ($model->layout) {
    $this->layout = "//layouts/{$model->layout}";
}

$this->title = $model->meta_title ?: $model->title;
$this->breadcrumbs = $this->getBreadCrumbs();
$this->description = $model->meta_description ?: Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = $model->meta_keywords ?: Yii::app()->getModule('yupe')->siteKeyWords;
?>

<a href="#0" class="cd-top">Top</a> 
<div class="page-txt pb">
	<div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
    
        <h1 class="title heading heading-pb heading-block"><?= $model->title; ?></h1>
        <?= $model->body; ?>


        <!-- 1)вызов произв полей по группам -->
        <?php /*foreach ($model->getAttributeGroup(1) as $key => $data) : ?>
            <img src="<?= $model->getFieldImageUrl(0, 0, false,  $data['image']); ?>" alt="">
            <div>
                <div class="helpSearch-box__name"><?= $data['name']?></div>
                <div class="helpSearch-box__desc"><?= $data['value']?></div>
            </div>

            <!-- галерея -->
            <?php $this->widget('application.modules.gallery.widgets.CustomFieldWidget', [
                'id' => $model->id,
                'code' => $data['code'],
                'view' => 'about-gallery',
                //module указывается (с болш буквы), если используется в другом модуле-news или store
                // 'module' => 'Page', 
            ]); ?>
        <?php endforeach;*/ ?>

        <!-- 2)Обычный вывод произв поля без группы -->
        <?= $model->getAttributeValue('box1')['name']; ?>
    
    </div>
</div>

