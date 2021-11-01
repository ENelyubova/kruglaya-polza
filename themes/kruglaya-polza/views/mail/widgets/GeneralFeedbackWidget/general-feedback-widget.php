<?php $hasFlash = Yii::app()->user->hasFlash($this->successKey) ?>

<?php if ($this->buttonModal) : ?>
    <?= CHtml::link($this->buttonModal, "#{$this->id}", [
        'data-toggle' => 'modal',
        'data-target' => "#{$this->id}",
    ])  ?>
<?php endif; ?>
<?= CHtml::openTag('div', $this->modalHtmlOptions) ?>
    <div class="modal-wrap fl fl-jc-c fl-ai-fs">
        <div class="modal-dialog modal-dialog_call fl fl-jc-c">
            <div class="modal-img"></div>
            <div class="modal-content modal-content_call">
                <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', $this->formOptions) ?>
                    <div class="modal-header">
                        <button data-dismiss="modal" class="modal-close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 22 22" fill="none">
                                <path d="M20 2L11 11M2 20L11 11M11 11L2 2M11 11L20 20" stroke="#C71F24" stroke-width="3" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <div class="modal-heading" id="myModalLabel">
                            <h3><?= $this->titleModal; ?></h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!-- <p><?= $this->subTitleModal ?></p> -->
                        <?php if ($hasFlash) : ?>
                            <script>
                                $("#<?= $this->id; ?>").modal('hide');
                                $("#messageModal").modal('show');
                                setTimeout(function(){
                                    $("#messageModal").modal('hide');
                                }, 4000);
                            </script>
                            
                        <?php endif ?>
                            
                        <?= $form->hiddenField($model, 'key', ['value' => $this->id]) ?>
                        <?php if ($this->showAttributeName) : ?>
                            <?= $form->textFieldGroup($model, 'name', [
                                'widgetOptions'=>[
                                    'htmlOptions'=>[
                                        'class' => '',
                                        'autocomplete' => 'off',
                                        'placeholder' => 'Представьтесь, пожалуйста*'
                                    ]
                                ]
                            ]); ?>
                        <?php endif ?>
        
                        <div class="form-flex fl fl-w">
                            <?php if ($this->showAttributePhone) : ?>
                                <?= $form->maskedTextFieldGroup($model, 'phone', [
                                    'widgetOptions' => [
                                        'mask' => '+7(999)999-99-99',
                                        'id' => 'phone-'.$this->id,
                                        'htmlOptions'=>[
                                            'class' => 'data-mask',
                                            'data-mask' => 'phone',
                                            'placeholder' => 'Телефон*',
                                            'autocomplete' => 'off'
                                        ]
                                    ]
                                ]); ?>
                            <?php endif ?>
                                    
                            <?php if ($this->showAttributeEmail) : ?>
                                <?= $form->textFieldGroup($model, 'email') ?>
                            <?php endif ?>
                        </div>
        
                        <?php if ($this->showAttributeBody) : ?>
                            <?= $form->textAreaGroup($model, 'body') ?>
                        <?php endif ?>
        
                        <?php if ($this->showAttributeJson) : ?>
                            <?= $form->hiddenField($model, 'json') ?>
                        <?php endif ?>
        
                        <div class="form-bot">
                            <div class="form-captcha">
                                <div class="g-recaptcha" data-sitekey="<?= Yii::app()->params['key']; ?>"></div>
                                <?= $form->error($model, 'verify');?>
                            </div>
                            <div class="form-button fl fl-ai-c">
                                <?php if ($this->showCloseButton) : ?>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t("mailModule.mail", "Close"); ?></button>
                                <?php endif ?>
                                <button id="<?= $this->sendButtonId ?>" type="submit" class="btn btn-red">
                                    <?= $this->sendButtonText ?>
                                </button>

                                <div class="terms_of_use">
                                    * Оставляя заявку Вы соглашаетесь с 
                                    <a target="_blank" href="/policy">Политикой конфиденциальности</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                <?php $this->endWidget() ?>
            </div>
        </div>
    </div>
<?= CHtml::closeTag('div') ?>

<?php Yii::app()->clientScript->registerScript($this->id.'-script', "
$('#{$this->modalHtmlOptions['id']}').on('show.bs.modal', function (e) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    $.getScript('https://www.google.com/recaptcha/api.js', function () {});
    head.appendChild(script);
});

$(document).delegate('#{$this->formOptions['id']}', 'submit', function() {
    var form = $(this);
    var data = form.serialize();
    var url = form.attr('action');
    var type = form.attr('method');
    var selectorForm = '#{$this->formOptions['id']}';
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'html',
        success: function(data) {
            $(selectorForm).html($(data).find(selectorForm).html());
            // var mask = $('.js-code-phone option:selected').data('mask');
            // if (mask !== undefined) {
            // }
            $('[data-mask=phone]').mask('+7(999)999-99-99', {
                'placeholder':'_',
                'completed':function() {
                    //console.log('ok');
                }
            });
            $.getScript('https://www.google.com/recaptcha/api.js', function () {});
        }
    })
    return false;
})
") ?>