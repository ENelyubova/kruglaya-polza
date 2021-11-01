<div class="about-block__item about-item">
    <a href="<?= Yii::app()->createUrl('/page/page/view', ['slug' => $item->slug]); ?>">
        <?php if($item->image): ?>
            <picture class="absolute-img-picture">
                <source media="(min-width: 401px)" srcset="<?= $item->getImageUrlWebp(0, 0, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 401px)" srcset="<?= $item->getImageNewUrl(0, 0, true, null,'image'); ?>">

                <source media="(min-width: 1px)" srcset="<?= $item->getImageUrlWebp(360, 250, true, null,'image'); ?>" type="image/webp">
                <source media="(min-width: 1px)" srcset="<?= $item->getImageNewUrl(360, 250, true, null,'image'); ?>">

                <img src="<?= $item->getImageNewUrl(0, 0, true, null,'image'); ?>" alt="<?= $item->title; ?>">
            </picture>
        <?php else : ?>
            <?= CHtml::image(Yii::app()->getTheme()->getAssetsUrl() . '/images/nophoto.jpg','', ['class' => 'absolute-img']); ?>
        <?php endif; ?>

        <div class="about-item__text fl fl-d-c fl-jc-e">
            <div class="about-item__params fl fl-ai-c">
                <div class="about-time">30минут</div>
                <div class="about-visit fl fl-ai-c">
                    <img src="/uploads/image/icon/eye.svg" alt="Кол-во просмотров">
                    2
                </div>
            </div>
            <div class="about-item__title">
                <?= $item->title; ?>
            </div>
        </div>
    </a>
</div>