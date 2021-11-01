<?php
$mainAssets = Yii::app()->getTheme()->getAssetsUrl();
// Yii::app()->getClientScript()->registerCssFile( $mainAssets . '/css/store-frontend.css' );
// Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/store.js' );
Yii::app()->getClientScript()->registerScriptFile( $mainAssets . '/js/index.js', CClientScript::POS_END);
/* @var $category StoreCategory */

$this->title = $category->getMetaTitle();
$this->description = $category->getMetaDescription();
$this->keywords = $category->getMetaKeywords();
$this->canonical = $category->getMetaCanonical();

$this->breadcrumbs = [ Yii::t( "StoreModule.store", "Каталог" ) => [ '/store/product/index' ] ];

$this->breadcrumbs = array_merge(
    $this->breadcrumbs,
    $category->getBreadcrumbs( false )
);

?>

<a href="#0" class="cd-top">Top</a> 
<!-- Конкретная категория -->
<div class="store-container catalog-view">
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

    <h1 class="title heading heading-block">Продукция</h1>
    <div class="product-list fl fl-w">
        <?php $this->widget('application.modules.store.widgets.ProductWidget', [
            'view' => 'product'
        ]); ?>
    </div>
  </div>
</div>

<div class="cooperation pt pb">
    <div class="content-site">
        <div class="subheading subheading-black">Сотрудничество</div>
        <div class="cooperation-body">
            <div class="text-block">
                <?php if (Yii::app()->hasModule('contentblock')): ?>
                    <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'cooperation']); ?>
                <?php endif; ?>
            </div>
            <div class="cooperation-btn fl fl-w fl-ai-c">
                <a href="#writeUsModal" data-toggle="modal" class="btn btn-gray btn-svg btn-svg-right">
                    <span>Написать нам</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                    <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </a>
                <a href="#" class="btn btn-link">Узнать больше</a>
            </div>
        </div>
    </div>
</div>


