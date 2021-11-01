 <?php
/** @var Page $page */

if ($page->layout) {
    $this->layout = "//layouts/{$page->layout}";
}

$this->title = $page->title;
$this->breadcrumbs = [
    Yii::t('HomepageModule.homepage', 'Pages'),
    $page->title
];
$this->description = !empty($page->meta_description) ? $page->meta_description : Yii::app()->getModule('yupe')->siteDescription;
$this->keywords = !empty($page->meta_keywords) ? $page->meta_keywords : Yii::app()->getModule('yupe')->siteKeyWords
?>

<a href="#0" class="cd-top">Top</a> 
 
<div class="slider">
    <?php $this->widget('application.modules.slider.widgets.SliderWidget', [
        'category_id' => 1,
        'view' => 'slider-widget',
    ]); ?>
</div> 
 
<?php //Мобильный слайдер - раскомментировать, когда придут слайды  ?>
<!-- <div class="sliderMobile">
    <?php $this->widget('application.modules.slider.widgets.SliderWidget', [
        'category_id' => 2,
        'view' => 'slider-mobile',
    ]); ?>
</div> -->

<div class="about box-style box-style-gray pt pb">
    <div class="content-site">
        <div class="subheading subheading-black"><?= $page->getAttributeValue('code1')['name']; ?></div>
        <div class="about-body">
            <div class="text-block">
                <?= $page->getAttributeValue('code1')['value']; ?>
            </div>
            <div class="about-btn">
                <a href="/o-nas" class="btn btn-gray btn-svg btn-svg-right">
                    <span>Узнать больше</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                    <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="product box-style box-style-white pt pb">
    <div class="content-site">
        <div class="heading-block">
            <h2 class="product__heading heading heading-red">Продукция</h2>
        </div>
        <div class="product-list fl fl-w">
            <?php $this->widget('application.modules.store.widgets.ProductWidget', [
                'view' => 'product-home-modal'
            ]); ?>
        </div>
    </div>
</div>

<div class="advantages">
    <div class="content-wrapper">
        <div class="fl fl-w">
            <div class="advantages-left"></div>
            <div class="advantages-right"></div>
        </div>
        <div class="content-site">
            <div class="advantages-content fl fl-w">
                <div class="advantages-title">
                    <div class="subheading subheading-white">Основной приоритет —</div>
                    <h2 class="advantages__heading heading heading-white">Высокое <br>качество <br>продукции</h2>
                </div>
                <div class="advantages-body">
                    <div class="heading-block">
                        <div class="advantages__name heading heading-small"><?= $page->getAttributeValue('code2')['name']; ?></div>
                    </div>
                    <div class="advantages__description">
                        <?= $page->getAttributeValue('code2')['value']; ?>
                    </div>
                </div>
            </div>
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
                <a href="/o-nas" class="btn btn-link">Узнать больше</a>
            </div>
        </div>
    </div>
</div>

<div class="recipes box-style box-style-gray pt"></div>
<div class="recipes box-style-gray pb">
    <div class="content-site">
        <div class="heading-block">
            <h2 class="recipes__heading heading heading-small">
                Рецепты <br>с нашей <span>продукцией</span>
            </h2>
        </div>
        <?php $this->widget("application.modules.news.widgets.MyNewsWidget", [
            'view' => 'recipes-home',
        ]); ?>
    </div>
</div>


