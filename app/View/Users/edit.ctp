<!-- app/View/Users/add.ctp -->
<?php echo $this->element('login/content_top');?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <?php 
		echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
		echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!'));
		echo $this->Form->input('email');
        echo $this->Form->input('password_update', array( 'label' => 'New Password (leave empty if you do not want to change)', 'maxLength' => 255, 'type'=>'password','required' => 0));
		echo $this->Form->input('password_confirm_update', array('label' => 'Confirm New Password *', 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
		echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php echo $this->element('login/content_bottom');?>