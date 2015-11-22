<div id="shop_edit_form" class="shop form">
<hr class="hr1">
<p class="notice">下部にある「登録する」ボタンで編集内容が適応されます。</p>
<p class="notice"><font color="red">*</font> がついている項目はかならず入力してください。</p>
<hr class="hr2">
<?php echo $this->Form->create('News', array('class' => 'form-horizontal'));?>
	<table id="main_box">
		<tr>
			<td><font color="red">*</font><?php echo __('カテゴリ'); ?></td>
			<td>
				<?php echo $this->Form->input('news_type_id', array('label' => false, 'class' => 'select', 'empty'=>array('' =>'選択してください')));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('タイトル'); ?></td>
			<td>
				<?php echo $this->Form->input('title', array('label' => false, 'placeholder' => 'タイトル', 'class' => 'text text2'));?>
			</td>
		</tr>
		<tr>
			<td><font color="red">*</font><?php echo __('内容'); ?></td>
			<td>
				<?php echo $this->Form->textarea('content', array('label' => false, 'placeholder' => '内容', 'class' => 'text'));?>
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
