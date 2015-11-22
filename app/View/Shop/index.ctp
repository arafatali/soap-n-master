<div class="shop_index">
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
		<div class="btn_box">
			<button type="" class="btn check_all">全てを選択</button>
			<button type="" class="btn2 uncheck_all">全てのﾁｪｯｸをはずす</button>
		</div>
		<form id="shop_list" name="shop_list" method="POST">
		<table class="check_group">
			<thead>
			<tr class="title">
				<th class="title1 avoid-sort">＃</th>
				<th class="title2">コード</th>
				<th class="title2">店名</th>
				<th class="title3">地域</th>
				<th class="title4">プラン</th>
				<th class="title5">オプ</th>
				<th class="title6">支払</th>
				<th class="title7">振込み名義</th>
				<th class="title8">電話番号</th>
				<th class="title9">Rank</th>
				<th class="title10 {sorter: false}">Memo</th>
				<th class="title11">違反</th>
			</tr>
			</thead>
<?php foreach($shops as $shop): ?>
<?php $class = ''; if($shop['Shop']['pay_status_id'] == 2) : $class .= "caution "; endif;?>
<?php if($shop['Shop']['violation_cnt'] >= 1) : $class .= "violation"; endif;?>
			<tr class="<?php echo $class;?>">
				<td class="td1"><input type="checkbox" name="" value="" class="checkbox"></td>
				<td class="td8"><?php echo h($shop['Shop']['shop_cd']); ?></td>
				<td><a href="/shop/edit/<?php echo $shop['Shop']['id'];?>"><?php echo h($shop['Shop']['name']); ?></a></td>
				<td><?php echo h($shop['Prefecture']['pref_name']); ?></td>
				<td><?php echo h($shop['Plan']['plan_name']); ?></td>
				<td class="td4"><?php echo h($shop['Option']['option_name']); ?></td>
				<td><?php if($shop['Shop']['pay_status_id'] == 2) : echo '<span>'; endif; echo h($shop['PayStatus']['pay_status_name']); if($shop['Shop']['pay_status_id'] == 2) : echo '</span>'; endif; ?></td>
				<td><?php echo h($shop['Shop']['payer']); ?></td>
				<td><?php echo h($shop['Shop']['tel']); ?></td>
				<td><?php echo h($shop['Shop']['ranking_pt']); ?></td>
				<td style="word-break:break-all;"><?php echo h($shop['Shop']['memo']); ?></td>
				<td class="td2"><?php echo h($shop['Shop']['violation_cnt']); ?></td>
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