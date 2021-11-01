<div class="recipes-block__item recipes-item">
    <a data-toggle="modal" data-target="#news-box-modal-<?=  $data->id; ?>" href="#" >
        <?php if($data->image): ?>
            <picture class="absolute-img-picture">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 401px)" srcset="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>">

                <source media="(min-width: 1px)" srcset="<?= $data->getImageUrlWebp(360, 250, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 1px)" srcset="<?= $data->getImageNewUrl(360, 250, true, null,'image'); ?>">

                <img src="<?= $data->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $data->title; ?>">
            </picture>
        <?php else : ?>
            <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.jpg','', ['class' => 'absolute-img']); ?>
        <?php endif; ?>

        <div class="recipes-item__text fl fl-d-c fl-jc-e">
            <div class="recipes-item__params fl fl-w fl-ai-c">
                <div class="recipes-time"><?= $data->cooking; ?></div>
                <div class="recipes-visit color-white fl fl-ai-c">
                    <img src="/uploads/image/icon/eye.svg" alt="Кол-во просмотров">
                    <span class="visit-count"><?= $data->visit; ?></span>
                </div>
            </div>
            <div class="recipes-item__title">
                <?= $data->title; ?>
            </div>
        </div>
    </a>
</div>