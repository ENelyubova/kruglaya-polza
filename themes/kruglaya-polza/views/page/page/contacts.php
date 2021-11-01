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
<div class="page-txt page-contacts pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <h1 class="title heading heading-pb heading-block"><?= $model->title; ?></h1>

        <div class="contacts-collapse">
            <div class="contacts-collapse__item fl fl-w fl-ai-c">
                <div class="contacts-collapse__label">Единый многоканальный номер телефона для связи с нами. <br>Мы работаем с 9:00 до 18:00. Оперативно отвечаем на все вопросы</div>
                <div class="contacts-collapse__info fl fl-w fl-ai-c">
                    <div class="phone-item">
                        <?php if (Yii::app()->hasModule('contentblock')) : ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="phone-item">
                        <a href="#callbackModal" data-toggle="modal" class="btn btn-gray btn-svg btn-svg-right">
                            <span>Перезвоните мне</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                            <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w fl-ai-c">
                <div class="contacts-collapse__label">Все вопросы, пожелания, предложения вы можете направить на почту</div>
                <div class="contacts-collapse__info contacts-collapse__mode">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w fl-ai-c">
                <div class="contacts-collapse__label">Следите за обновлениями и новостями в социальных сетях</div>
                <div class="contacts-collapse__info social">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contacts-collapse__item fl fl-w fl-ai-c">
                <div class="contacts-collapse__label">Адрес офиса</div>
                <div class="contacts-collapse__info">
                    <?php if (Yii::app()->hasModule('contentblock')) : ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="contacts-map" id="map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A0d60dedbd5c8861f794043a302fa4bde49a8b81482028a55b5b23b578deb04d2&amp;source=constructor" width="100%" height="480" frameborder="0"></iframe>
        </div>
    </div>
</div>
