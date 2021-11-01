<?php 
$this->title = Yii::t('default', 'Error') . ' ' . $error['code']; 
?>

<div class="page-error">
    <div class="content-site">
        <ul class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active">Ошибка 404</li>
        </ul>
        <div class="page-error-wrap fl fl-d-c fl-ai-c">
            <div class="page-error__text text-center">
                <div class="page-error__title">Что-то пошло не так</div>
                <p>Возможно страница, которую вы запрашиваете была удалена <br>или даже никогда не существовала. Чтобы найти нужную информацию, рекомендуем <br>перейти на <a href="/">главную страницу</a></p>
            </div>
            <div class="page-error__img text-center">
                <img src="<?= $this->mainAssets . '/images//404/404.svg' ?>" alt="error_404">
            </div>
            <div class="text-center">
                <a href="/" class="btn btn-gray btn-svg btn-svg-right">
                    <span>На главную</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                    <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#38434E" stroke-width="3" stroke-linecap="round"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>