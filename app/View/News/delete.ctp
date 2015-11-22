<div>
	<h2>店舗削除</h2>
</div>

<div>
	<?php echo $this->Form->create('Shop', array('type' => 'delete')); ?>
	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>

	<h3>店舗ID</h3>
	<p><?php echo h($this->data['Shop']['id']) ?></p>

	<h3>店舗名</h3>
	<p><?php echo h($this->data['Shop']['name']); ?>


	<h3>※解除されるカテゴリー</h3>
	<ul>
		<?php if (count($this->data['Category']) <= 0): ?>
			<li>なし</li>
		<?php else: ?>
			<?php foreach($this->data['Category'] as $deleteCategory): ?>
			<li>
				<?php echo h($deleteCategory['name']); ?>
			</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>

	
	<p>よろしければ「削除」ボタンを押してください</p>

	<?php echo $this->Form->end(' 削除 '); ?>
</div>

<div class="pageLinks">
	<p><?php echo $this->Html->link('戻る', array('action' => 'edit', $this->data['Shop']['id'])); ?></p>
</div>