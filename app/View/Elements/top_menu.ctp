<div class="top_menu">
	<ul>
		<li class="logotBtn"><?php echo $this->Html->link('◆ログアウト', array('controller' => 'users', 'action' => 'logout')); ?></li>
		<li class="logotBtn"><?php echo $this->Html->link('◇お知らせ作成', array('controller' => 'news', 'action' => 'add')); ?></li>
		<li class="logotBtn"><?php echo $this->Html->link('◇お知らせ一覧', array('controller' => 'news', 'action' => 'index')); ?></li>
	</ul>
</div>