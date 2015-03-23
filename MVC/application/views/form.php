<html>
<head>
<title>Insert Data Into Database Using CodeIgniter Form</title>
<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="http://localhost/CodeIgniter/css/styles.css"/>
</head>
<body>
<div id="container">
<?php echo form_open('insert_ctrl'); ?>
<h1>Register</h1>
<?php echo form_label('Username :'); ?> <?php echo form_error('dusername'); ?>
<?php echo form_input(array('id' => 'dusernname', 'name' => 'dusername')); ?>
<?php echo form_label('Email :'); ?> <?php echo form_error('demail'); ?>
<?php echo form_input(array('id' => 'demail', 'name' => 'demail')); ?>
<?php echo form_label('Password :'); ?> <?php echo form_error('dpassword'); ?>
<?php echo form_input(array('id' => 'dpassword', 'name' => 'dpassword')); ?>
<?php echo form_label('Re-enter Password :'); ?> <?php echo form_error('dpassword2'); ?>
<?php echo form_input(array('id' => 'dpassword2', 'name' => 'dpassword2')); ?>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit'));?>
<?php echo form_close(); ?>
</div>
</body>
</html>