<!DOCTYPE html>
<html lang="<?= Yii::app()->language; ?>">
<head>
    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_START);?>

    <link rel="preconnect" href="https://mc.yandex.ru">
    <link rel="preconnect" href="https://connect.facebook.net">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.googleadservices.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://www.gstatic.com">
    <link rel="preconnect" href="https://www.google.com">

    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->mainAssets; ?>/images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->mainAssets; ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $this->mainAssets; ?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $this->mainAssets; ?>/images/favicon/favicon-192x192.png">

    <link rel="apple-touch-icon" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->mainAssets; ?>/images/favicon/apple-touch-icon-180x180.png" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="ru-RU" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?= $this->title;?></title>
    <meta name="description" content="<?= $this->description;?>" />
    <meta name="keywords" content="<?= $this->keywords;?>" />

    <?php if ($this->canonical) : ?>
        <link rel="canonical" href="<?= $this->canonical ?>" />
    <?php endif; ?>


    <!-- Шрифты -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Montserrat+Alternates:wght@700;800&display=swap" rel="stylesheet">
    <?php
        Yii::app()->clientScript->registerMetaTag('telephone=no', 'format-detection');

        /*Стили*/
        $indexCss = $this->mainAssets . "/css/style.css";
        $indexCss = $indexCss . "?v-" . filectime(Yii::getPathOfAlias('public') . $indexCss);
        Yii::app()->getClientScript()->registerCssFile($indexCss);

        /*JS*/
        $mainJs = $this->mainAssets . "/js/main.min.js";
        $mainJs = $mainJs . "?v-" . filectime(Yii::getPathOfAlias('public') . $mainJs);
        Yii::app()->getClientScript()->registerScriptFile($mainJs, CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/focus-visible.min.js', CClientScript::POS_END);
        // Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/modernizr.js', CClientScript::POS_END);
    ?>
    
    <script type="text/javascript">
        var yupeTokenName = '<?= Yii::app()->getRequest()->csrfTokenName;?>';
        var yupeToken = '<?= Yii::app()->getRequest()->getCsrfToken();?>';
    </script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::HEAD_END);?>
</head>

<body class="page_fix">

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_START);?>

<div class="wrapper">
    <div class="wrap1">
        <?php $this->renderPartial('//layouts/_header'); ?>
        <?= $this->decodeWidgets($content); ?>
    </div>
    
    <div class="wrap2">
        <?php $this->renderPartial('//layouts/_footer'); ?>
    </div>
</div>

<!-- Перезвоните мне -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'callbackModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Оставьте заявку',
    'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => true,
    'showAttributeBody' => true,
    'eventCode' => 'perezvonite-mne',
    'successKey' => 'perezvonite-mne',
    'modalHtmlOptions' => [
        'class' => 'modal-my modal-my-xs',
    ],
    'formOptions' => [
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => 'Перезвоните мне',
    ],
]) ?>
<!-- Написать нам -->
<?php $this->widget('application.modules.mail.widgets.GeneralFeedbackWidget', [
    'id' => 'writeUsModal',
    'formClassName' => 'StandartForm',
    'buttonModal' => false,
    'titleModal' => 'Написать нам',
    // 'subTitleModal' => 'и мы Вам перезвоним!',
    'showCloseButton' => false,
    'isRefresh' => true,
    'showAttributeEmail' => true,
    'showAttributeBody' => true,
    'eventCode' => 'napisat-nam',
    'successKey' => 'napisat-nam',
    'modalHtmlOptions' => [
        'class' => 'modal-my modal-my-xs',
    ],
    'formOptions' => [
        'htmlOptions' => [
            'class' => 'form-my',
        ]
    ],
    'modelAttributes' => [
        'theme' => 'Написать нам',
    ],
]) ?>

<div id="messageModal" class="modal modal-my modal-my-xs fade" role="dialog">
    <div class="modal-dialog modal-dialog-msg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div data-dismiss="modal" class="modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 22 22" fill="none">
                        <path d="M20 2L11 11M2 20L11 11M11 11L2 2M11 11L20 20" stroke="#C71F24" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="modal-my-heading text-center">
                    <h3>Уведомление</h3>
                </div>
            </div>
            <div class="modal-body text-center">
                Ваша заявка успешно отправлена.
            </div>
        </div>
    </div>
</div>

<div id="productModal" class="productModal modal-product">
    <div class="modal-dialog modal-dialog-centered">
        <div data-dismiss="modal" class="modal-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 22 22" fill="none">
                <path d="M20 2L11 11M2 20L11 11M11 11L2 2M11 11L20 20" stroke="#C71F24" stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="product-view-body">
            <div id="productModal-loading"></div>
            <div class="product-category-carousel" id="product-category-carousel"></div>
        </div>
        <div class="product-modal-share fl fl-w fl-ai-c">
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
            <div class="product-modal-nav fl fl-w fl-ai-c fl-jc-e">
                <span>Другие крупы</span>
                <div class="arrows fl fl-ai-c"></div>
            </div>
        </div>
    </div>
</div>

<?php //Модалка для поиска ?>
<?php $this->widget('application.modules.zendsearch.widgets.SearchBlockWidget', [
    'view' => 'search-form-modal'
]); ?>

<?php //Модалка для поиска по каталогу ?>
<?php /*$this->widget('application.modules.store.widgets.SearchProductWidget', [
    'view' => 'search-product-form-modal'
]);*/ ?>

<?php $fancybox = $this->widget(
    'gallery.extensions.fancybox3.AlFancybox', [
        'target' => '[data-fancybox]',
        'lang'   => 'ru',
        'config' => [
            'animationEffect' => "fade",
            'buttons' => [
                "zoom",
                "close",
            ]
        ],
    ]
); ?>

<div class='notifications top-right' id="notifications"></div>
<div class="ajax-loading"></div>
<!-- container end -->

<?php \yupe\components\TemplateEvent::fire(DefautThemeEvents::BODY_END);?>
</body>
</html>