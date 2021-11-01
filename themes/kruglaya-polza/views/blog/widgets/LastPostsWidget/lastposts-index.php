<?php if($models): ?>
    <div class="recipes-block slick-slider">
        <?php foreach ($models as $key => $data): ?>
            <div class="recipes-block__item recipes-item">
                <a href="<?= Yii::app()->createUrl('/blog/post/view', ['slug' => $data->slug]); ?>">
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
                        <div class="recipes-item__params fl fl-ai-c">
                            <div class="recipes-time"><?= $data->cooking; ?></div>
                            <div class="recipes-visit fl fl-ai-c">
                                <img src="/uploads/image/icon/eye.svg" alt="Кол-во просмотров">
                                <?= $data->visit; ?>
                            </div>
                        </div>
                        <div class="recipes-item__title">
                            <?= $data->title; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="recipes-block__more text-center">
        <a href="/blogs" class="btn btn-gray btn-svg btn-svg-right">
            <span>Больше рецептов</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
            <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"></path>
            </svg>
        </a>
    </div>
<?php endif; ?>


