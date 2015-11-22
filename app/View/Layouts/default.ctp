<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<?php if($this->name == 'Top') echo ''; ?>
	<title><?php echo $title_for_layout; if (@$title_for_layout) echo '｜'; echo $site_name; ?></title>
	<?php
		//echo $this->Html->meta('icon');
		/** jQueryの読込 */
		echo $this->Html->script('jquery-1.7.2.min');
		
		/** BootStrapの読込 */
		echo $this->Html->script('bootstrap_js/bootstrap.min');
		
		/** CSSの読込 */
		echo $this->Html->css('bootstrap_css/bootstrap.min');
		echo $this->Html->css('bootstrap_css/bootstrap-responsive.min');
		
		echo $this->Html->css('customer_style');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 class="">soap-n MASTER SYSTEM</h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
