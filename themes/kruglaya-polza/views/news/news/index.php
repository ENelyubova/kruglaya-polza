<?php
$this->title = Yii::t('NewsModule.news', 'Рецепты');
$this->breadcrumbs = [Yii::t('NewsModule.news', 'Рецепты')];
?>

<a href="#0" class="cd-top">Top</a> 
<div class="page-recipes pb">
    <div class="content-site">
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', [
                'links' => $this->breadcrumbs,
        ]); ?>
        <h1 class="heading heading-page heading-block">Рецепты</h1>

        <div class="recipes-control">
            <form id="filter-recipes" method="get" class="recipes-control__main">
                <?= CHtml::hiddenField( Yii::app()->getRequest()->csrfTokenName, Yii::app()->getRequest()->csrfToken); ?>
                <input type="hidden"
                       name="customCategory"
                       value="">
            
                <div class="recipes-control-wrap fl fl-w fl-ai-c">
                    <span class="recipes-control__label">Блюда из:</span>
                    <?php foreach (News::getCategoryList() as $key => $category): ?>
                        <div class="recipes-control__item js-cheked">
                            <span  data-value="<?= $key; ?>" data-input="customCategory"><?= $category; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="submit" value="Submit" class="hidden">
            </form>
        </div>


        <div class="recipes-block fl fl-w" id="recipes-box">
            <?php foreach ($dataProvider->getData() as $data): ?>
                <?php Yii::app()->controller->renderPartial('//news/news/_item', ['data' => $data]) ?>
            <?php endforeach; ?>
        </div>


        <?php foreach($dataProvider->getData() as $data): ?>
            <div id="news-box-modal-<?= $data->id; ?>" data-id="<?= $data->id; ?>" class="modal fade modal-recipes" role="dialog">
                <div class="modal-dialog modal-dialog_recipes" role="document">
                    <div class="modal-content modal-content_recipes">
                        <div data-dismiss="modal" class="modal-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 22 22" fill="none">
                                <path d="M20 2L11 11M2 20L11 11M11 11L2 2M11 11L20 20" stroke="#C71F24" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="modal-body_recipes modal-body">
                            <div class="recipes-item__params fl fl-w fl-ai-c">
                                <div class="recipes-time"><?= $data->cooking; ?></div>
                                <div class="recipes-visit color-black fl fl-ai-c">
                                    <img src="/uploads/image/icon/eye-black.svg" alt="Кол-во просмотров">
                                    <span class="visit-count"><?= $data->visit; ?></span>
                                </div>
                            </div>
                            <div class="recipes-item__title">
                                <?= $data->title; ?>
                            </div>
                            <?php if($data->video): ?>
                                <div class="recipes-item__video">
                                    <?= $data->video; ?>
                                </div>
                            <?php else: ?>
                                <div class="recipes-item__preview">
                                    <picture class="absolute-img-picture">
                                        <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                                        <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                                        <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(360, 250, true, null,'image'); ?>" type="image/webp">
                                        <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(360, 250, true, null,'image'); ?>">

                                        <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->title; ?>">
                                    </picture>
                                </div>
                            <?php endif; ?>

                            <div class="recipes-item__info"><?= $data->full_text; ?></div>

                            <?php $photos = $data->getAttributeValue('box1')['gallery']; ?>
                            <?php if($data->getAttributeValue('box1')['name']): ?>
                                <div class="recipes-item__carousel">
                                    <div class="thumb-carousel thumb-carousel-<?= $data->id ?> slick-slider">
                                        <?php foreach ($photos as $key => $photo): ?>
                                            <div class="thumb-carousel__item">
                                                <?php if($photo['desc']) : ?>
                                                    <a class="videoPress-box__play fl fl-al-it-c fl-ju-co-c" data-fancybox="iframe" href="<?= $photo['desc']; ?>">
                                                <?php else: ?>
                                                    <a data-fancybox="image" href="<?= $data->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>">
                                                <?php endif; ?>
                                                    <picture class="absolute-img-picture">
                                                        <source media="(min-width: 401px)" srcset="<?= $data->geFieldGalImageWebp(0, 0, false,  $photo['image']); ?>" type="image/webp">
                                                        <source media="(min-width: 401px)" srcset="<?= $data->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>">

                                                        <source media="(min-width: 1px)" srcset="<?= $data->geFieldGalImageWebp(370, 240, true,  $photo['image']); ?>" type="image/webp">
                                                        <source media="(min-width: 1px)" srcset="<?= $data->getFieldGalImageUrl(370, 240, true,  $photo['image']); ?>">

                                                        <img src="<?= $data->getFieldGalImageUrl(0, 0, false,  $photo['image']); ?>" alt="<?= $data->title; ?>">
                                                    </picture>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($data->short_text): ?>
                                <div class="recipes-item__info">
                                    <?= $data->short_text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div data-dismiss="modal" class="btn-close-modal btn btn-gray">Закрыть</div>
                    </div>
                </div>
            </div>
            <?php Yii::app()->getClientScript()->registerScript("modal-carousel-{$data->id}", "
                $('#news-box-modal-{$data->id}').on('shown.bs.modal', function() {
                    $('#news-box-modal-{$data->id}').find('.thumb-carousel').slick('refresh');
                    $('#news-box-modal-{$data->id}').find('.slick-initialized').slick('refresh');

                    var id = $('#news-box-modal-{$data->id}').attr('data-id');
                    var data = {'id': id};

                    data[yupeTokenName] = yupeToken;
                     $.ajax({
                        url: '/visit',
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                    });
                });
            "); ?>

        <?php endforeach; ?>
    </div>
</div>

<?php Yii::app()->clientScript->registerScript('news-script', "
    $(document).delegate('.js-cheked', 'click', function(e) {
        if(!$(this).hasClass('active')){
            $('.js-cheked').removeClass('active');
            $(this).addClass('active');
        }

        var value = $(this).find('span').data('value');
        var input = $(this).find('span').data('input');
        console.log(input);
        $('input[name='+input+']').val(value);
        updateNews();
        return false;
    })
    function updateNews() {
        var form = $('#filter-recipes'),
        data = form.serialize();

        $('.ajax-loading').fadeIn(500);

        var top = $('#recipes-box').offset().top - 40;

        $('body,html').animate({
            scrollTop: top + 'px'
        }, 400);

        data[yupeTokenName] = yupeToken;
        $.ajax({
            url: '',
            type: 'GET',
            data: data,
            dataType: 'html',
            success: function(html) {
                $('#recipes-box').html($(html).find('#recipes-box').html())
            },
            complete: function(html){
                $('.ajax-loading').delay(100).fadeOut(500);
            }
        });
    }
") ?>
