<div class="news_index">
<?php echo $this->element('top_menu'); ?>
<div class="paginator">
	<?php $this->Paginator->options(array('url' => $searchword)); ?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('前へ'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('次へ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('{:count} 件中 {:page} ページ目 ({:start} ～ {:end} 件表示)')
			));
		?>
	</p>
</div><!--.paginator-->
		<form id="news_list" name="news_list" method="POST">
		<table class="check_group">
			<thead>
			<tr class="title">
				<th class="title1 avoid-sort">＃</th>
				<th class="title2 title3x">ID</th>
				<th class="title2 title2x">カテゴリ</th>
				<th class="title3">タイトル</th>
				<th class="title4">内容</th>
			</tr>
			</thead>
<?php foreach($newsList as $news): ?>
<?php $class = ''; if($news['News']['status'] == 2) : $class .= "caution "; endif;?>
			<tr class="<?php echo $class;?>">
				<td class="td1"><input type="checkbox" name="" value="" class="checkbox"></td>
				<td class="td8"><?php echo h($news['News']['id']); ?></td>
				<td><?php echo h($news['NewsType']['name']); ?></td>
				<td><a href="/news/edit/<?php echo $news['News']['id'];?>"><?php echo h($news['News']['title']); ?></a></td>
				<td><?php echo nl2br($news['News']['content']); ?></td>
			</tr>
<?php endforeach; ?>

		</table>
	</form>
	
<div class="paginator">
	<p>
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('{:count} 件中 {:page} ページ目 ({:start} ～ {:end} 件表示)')
			));
		?>
	</p>
	<?php $this->Paginator->options(array('url' => $searchword)); ?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('前へ'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('次へ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div><!--.paginator-->
</div>