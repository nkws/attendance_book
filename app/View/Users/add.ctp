<div class="users form">
	<h2><?php echo __('Add User'); ?></h2>
	<?php
    echo $this->Form->create('User');//UsersControllerのadd()に対してPOSTする
		echo $this->Form->input('username', array(
			'label' => __('E-mail(username)')
		));
		echo $this->Form->input('password');
    echo $this->Form->input('name');
		echo $this->Form->end(__('Submit'));
	?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Login'), array('action' => 'login')); ?></li>
		<li><?php echo $this->Html->link(__('List Appointments'), array('controller' => 'appointments', 'action' => 'index')); ?> </li>
	</ul>
</div>