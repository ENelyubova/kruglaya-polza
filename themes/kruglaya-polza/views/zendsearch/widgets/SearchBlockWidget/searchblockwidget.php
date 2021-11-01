<?php Yii::import('application.modules.zendsearch.ZendSearchModule'); ?>
<div class="search-group">
	<?= CHtml::beginForm(['/zendsearch/search/search'], 'get', ['class' => 'form-inline']); ?>
	<?= CHtml::textField(
	    'q',
	    '',
	    ['placeholder' => Yii::t('ZendSearchModule.zendsearch', 'Поиск по сайту'), 'class' => 'form-control']
	); ?>
		<!-- <span class="icon-search icon"></span> -->
	    <button type="submit" class="btn btn-search fl fl-ai-c fl-jc-c">
			<span class="icon-search"></span>
	    </button>
	<?= CHtml::endForm(); ?>
</div>





