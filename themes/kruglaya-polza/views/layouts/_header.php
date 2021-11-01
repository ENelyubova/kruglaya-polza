 <header class="header <?= ($this->action->id=='index' && $this->id=='hp') ? 'header-home' : 'header-page'; ?>">
  <div class="content-wrapper fl fl-ai-c">
    <div class="content-site">
      <div class="header-content fl fl-ai-c fl-jc-sb">
        <div class="header-logo">
          <a href="/" class="logo">
            <img src="<?= $this->mainAssets . '/images/logo.svg' ?>" alt="Круглая Польза">
          </a>
        </div><!-- logo --> 
      
        <div class="header-catalog">
          <a href="/store" class="btn btn-red btn-svg btn-svg-left">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
              <rect width="6.50388" height="6.50388" rx="2" fill="white"/>
              <rect y="8.26538" width="6.50388" height="6.50388" rx="2" fill="white"/>
              <rect x="8.2655" width="6.50388" height="6.50388" rx="2" fill="white"/>
              <rect x="8.2655" y="8.26538" width="6.50388" height="6.50388" rx="2" fill="white"/>
            </svg>
            <span>Продукция</span>
          </a>
        </div>  
        
        <div class="header-menu menu">
          <?php if (Yii::app()->hasModule('menu')) : ?>
            <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
          <?php endif; ?>
        </div>
      
        <div class="header-wholesale">
          <a href="/optovye-zakupki" class="btn btn-gray">Оптовые закупки</a>
        </div>
      </div>
    </div>

    <div class="header-search">
      <a class="fl fl-ai-c fl-jc-c" data-toggle="modal" data-target="#search-form-Modal" href="#">
        <img src="<?= $this->mainAssets . '/images/icon/search.svg' ?>" alt="">
      </a>
    </div><!-- header-search-mobile -->

    <div class="mobile-panel">
      <button class="m-menu-button m-menu-open fl fl-ai-c fl-jc-c">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </button>
    </div><!-- mobile-panel -->
    <div class="mobile-menu">
      <div class="content-site">
        <div class="mobile-content">
          <?php if (Yii::app()->hasModule('menu')) : ?>
            <?php $this->widget('application.modules.menu.widgets.MenuWidget', ['name' => 'top-menu', 'view' => 'menu']); ?>
          <?php endif; ?>
          <hr>
          <div class="mobile-content__item phone">
            <?php if (Yii::app()->hasModule('contentblock')): ?>
              <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'phone']); ?>
            <?php endif; ?>
          </div>
          <div class="mobile-content__item phone">
            <?php if (Yii::app()->hasModule('contentblock')): ?>
              <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'email']); ?>
            <?php endif; ?>
          </div>
          <div class="mobile-content__item social">
            <?php if (Yii::app()->hasModule('contentblock')): ?>
              <?php $this->widget("application.modules.contentblock.widgets.ContentBlockWidget", ['code'=>'social']); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div> 
</header>
