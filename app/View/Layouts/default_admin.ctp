<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<?php echo $this->Html->css('common'); ?>
<?php if($this->name == 'Shop') echo $this->Html->css('new'); ?>
<?php if($this->name == 'News') echo $this->Html->css('new'); ?>
<?php echo $this->Html->css('home'); ?>
<?php echo $this->Html->css('custom'); ?>
<title><?php //echo $title_for_layout; if (@$title_for_layout) echo '｜'; echo $site_name; ?></title>
<!--<link rel="shortcut icon" href="/img/favicon.ico">
<link rel="icon" type="image/gif" href="/img/animated_favicon1.gif">-->
<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="/js/setting.js"></script>
<script type="text/javascript" src="/js/modules/ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="header">
	<?php echo $this->element('header'); ?>
	<?php echo $this->element('search_form'); ?>
</div><!-- #header [End] -->
<div id="wrapper">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
</div><!-- #wrapper [End] -->
	<?php echo $this->element('footer'); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
