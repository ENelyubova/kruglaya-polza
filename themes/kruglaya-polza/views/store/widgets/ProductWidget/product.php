<?php if($products): ?>
	<?php foreach($products as $data): ?>
		<?php $this->render('../../product/_item', ['data'=>$data, 'button'=>true]); ?>
	<?php endforeach; ?>
<?php endif; ?>
