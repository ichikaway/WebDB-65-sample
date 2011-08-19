<div class="posts form">
<?php echo $this->Xform->create('Post');?>
	<fieldset>
		<legend><?php __('Add Post'); ?></legend>
	<?php
		echo $this->Xform->input('name');
		echo $this->Xform->input('email');
		echo $this->Xform->input('email_confirm');
		echo $this->Xform->input('text');
	?>
	<?php
		 if($this->Xform->checkConfirmScreen() === true) {
				echo $this->Xform->input('confirm' , array('type' => 'hidden', 'value' => 1));
		 }
	?>
	</fieldset>
<?php echo $this->Xform->end(__('Submit', true));?>

</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index'));?></li>
	</ul>
</div>