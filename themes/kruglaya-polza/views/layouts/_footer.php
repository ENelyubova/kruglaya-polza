<footer class="footer <?= ($this->action->id=='index' && $this->id=='hp') ? 'footer-home box-style-white' : 'footer-page box-style-gray'; ?> box-style">
    <div class="content-site">
        <div class="footer-panel fl fl-jc-sb">
            <div class="footer-menu">
                <?php if (Yii::app()->hasModule('menu')) : ?>
                    <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
                <?php endif; ?>
            </div>
            
            <div class="footer-contacts footer-item">
                <div class="footer-contacts-item footer-contacts-phone">
                    <div class="phone">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer-contacts-item footer-contacts-email">
                    <?php if (Yii::app()->hasModule('contentblock')): ?>
                        <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-contacts-item footer-contacts-address">
                    <p>Адрес офиса:</p>
                    <div class="address">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'address']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="footer-callback">
                <div class="footer-contacts-item">
                    <p>У вас есть вопросы? Задайте их нам!</p>
                    <a href="#writeUsModal" data-toggle="modal" class="btn btn-red btn-svg btn-svg-right">
                        <span>Написать нам</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                        <path d="M2 2V2C4.29243 5.28814 7.31901 7.99732 10.84 9.91296L11 10L10.84 10.087C7.31901 12.0027 4.29243 14.7119 2 18V18" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </a>
                </div>
                <div class="footer-contacts-item footer-contacts-social">
                    <div class="social">
                        <?php if (Yii::app()->hasModule('contentblock')): ?>
                            <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom fl fl-ai-c fl-jc-sb">
            <div class="footer-info"> 
               <div class="footer-info-text">© <?= date('Y'); ?> «Круглая польза» ООО. Копирование и использование любой информации размещенной на сайте допускается только с указанием источника или по договоренности с администрацией сайта</div>
            </div>
            <div class="footer-nav">
                <ul>
                    <li>
                        <a href="/policy">Политика конфиденциальности</a>
                    </li>
                </ul>
            </div>
            <div class="dc56">
                <a href="https://dcmedia.ru/"></a>
                <p>Разработка сайта</p>
            </div>
        </div>
    </div>
</footer>
