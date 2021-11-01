<div class="recipes-block recipes-slider slick-slider" id="recipes-box">
    <?php foreach ($models as $key => $model): ?>
        <?php Yii::app()->controller->renderPartial('//news/news/_item', ['data' => $model]) ?>
    <?php endforeach; ?>
</div>
<div class="recipes-block__more text-center">
    <a href="/news" class="btn btn-gray btn-svg btn-svg-right">
        <span>Больше рецептов</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
        <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"></path>
        </svg>
    </a>
</div>

<?php foreach($models as $key => $model): ?>
    <div id="news-box-modal-<?= $model->id; ?>" data-id="<?= $model->id; ?>" class="modal fade modal-recipes" role="dialog">
        <div class="modal-dialog modal-dialog_recipes" role="document">
            <div class="modal-content modal-content_recipes">
                <div data-dismiss="modal" class="modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 22 22" fill="none">
                        <path d="M20 2L11 11M2 20L11 11M11 11L2 2M11 11L20 20" stroke="#C71F24" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="modal-body_recipes modal-body">
                    <div class="recipes-item__params fl fl-w fl-ai-c">
                        <div class="recipes-time"><?= $model->cooking; ?></div>
                        <div class="recipes-visit color-black fl fl-ai-c">
                            <img src="/uploads/image/icon/eye-black.svg" alt="Кол-во просмотров">
                            <span class="visit-count"><?= $model->visit; ?></span>
                        </div>
                    </div>
                    <div class="recipes-item__title">
                        <?= $model->title; ?>
                    </div>
                    <?php if($model->video): ?>
                        <div class="recipes-item__video">
                            <?= $model->video; ?>
                        </div>
                    <?php else: ?>
                        <div class="recipes-item__preview">
                            <picture class="absolute-img-picture">
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
                        <div class="recipes-item__carousel">
                            <div class="thumb-carousel thumb-carousel-<?= $model->id ?> slick-slider">
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
                <div data-dismiss="modal" class="btn-close-modal btn btn-gray">Закрыть</div>
            </div>
        </div>
    </div>

    <?php Yii::app()->getClientScript()->registerScript("modal-carousel-{$model->id}", "
        $('#news-box-modal-{$model->id}').on('shown.bs.modal', function() {
            // console.log('test');
            $('#news-box-modal-{$model->id}').find('.thumb-carousel').slick('refresh');
            $('#news-box-modal-{$model->id}').find('.slick-initialized').slick('refresh');

            var id = $('#news-box-modal-{$model->id}').attr('data-id');
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
