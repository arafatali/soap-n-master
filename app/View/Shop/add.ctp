<div id="shop_edit_form" class="shop form">
<hr class="hr1">
<p class="notice">下部にある「登録する」ボタンで編集内容が適応されます。</p>
<p class="notice"><font color="red">*</font> がついている項目はかならず入力してください。</p>
<hr class="hr2">
<?php echo $this->Form->create('Shop', array('class' => 'form-horizontal'));?>
	<table id="main_box">
		<tr>
			<td><font color="red">*</font><?php echo __('店舗コード'); ?></td>
			<td>
				<?php echo $this->Form->input('shop_cd', array('label' => false, 'placeholder' => '00000000', 'class' => 'text text2'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('店舗名'); ?></td>
			<td>
				<?php echo $this->Form->input('name', array('label' => false, 'placeholder' => 'ソープなび', 'class' => 'text text2'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('掲載エリア'); ?></td>
			<td>
				<?php echo $this->Form->input('prefecture_id', array('label' => false, 'class' => 'select', 'empty'=>array('' =>'選択してください')));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('掲載プラン'); ?></td>
			<td>
				<?php echo $this->Form->input('plan_id', array('label' => false, 'class' => 'select', 'empty'=>array('' =>'選択してください')));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('オプション'); ?></td>
			<td>
				<?php echo $this->Form->input('option_id', array('label' => false, 'class' => 'select', 'empty'=>array('' =>'選択してください')));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('支払い'); ?></td>
			<td>
				<?php echo $this->Form->input('pay_status_id', array('label' => false, 'class' => 'select', 'empty'=>array('' =>'選択してください')));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('振込み名義'); ?></td>
			<td>
				<?php echo $this->Form->input('payer', array('label' => false, 'placeholder' => 'ニホン　タロウ', 'class' => 'text text2'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('メールアドレス'); ?></td>
			<td>
				<?php echo $this->Form->input('email', array('label' => false, 'placeholder' => 'shop@soap-n.com', 'class' => 'text text2'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('電話番号'); ?></td>
			<td>
				<?php echo $this->Form->input('tel', array('label' => false, 'placeholder' => '0123-4567-8910', 'class' => 'text text2'));?>
				<p><span class="help-inline">「-」で区切って下さい</span></p>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('ランキングpt'); ?></td>
			<td>
				<?php echo $this->Form->input('ranking_pt', array('label' => false, 'placeholder' => '0', 'class' => 'text text3'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('獲得ポイント'); ?></td>
			<td>
				<?php echo $this->Form->input('get_pt', array('label' => false, 'placeholder' => '0', 'class' => 'text text3'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('違反回数'); ?></td>
			<td>
				<?php echo $this->Form->input('violation_cnt', array('label' => false, 'placeholder' => '0', 'class' => 'text text3'));?>
			</td>
		</tr>
		<tr>
			<td><?php echo __('Memo'); ?></td>
			<td>
				<?php echo $this->Form->textarea('memo', array('label' => false, 'placeholder' => '任意', 'class' => 'text'));?>
			</td>
		</tr>
		<tr>
				<td colspan="2" align="center">
					<?php echo $this->Form->button('登録する', array('class' => 'btn btn-primary')); ?>&nbsp;&nbsp;&nbsp;
					<input type="button" value="戻る" onclick="history.back();">
				</td>
		</tr>
	</table>
	<?php
		echo $this->Form->end();
	?>
</div>
