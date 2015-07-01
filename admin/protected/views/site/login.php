<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'login-form',
	'htmlOptions' => array('class' => 'form-signin'),
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
)); ?>
<h3>请登录</h3>

<?php
echo CHtml::openTag('label', array('for' => 'username', 'class' => 'sr-only'));
echo CHtml::closeTag('label');
echo $form->textField($model, 'username', array(
	'class' => 'form-control',
	'placeholder' => 'UserName',
));
echo $form->error($model, 'username');

echo CHtml::openTag('label', array('for' => 'password', 'class' => 'sr-only'));
echo CHtml::closeTag('label');
echo $form->passwordField($model, 'password', array(
	'class' => 'form-control',
	'placeholder' => 'Password',
));
echo $form->error($model, 'password');

echo CHtml::openTag('div', array('class' => 'checkbox'));
echo CHtml::openTag('label');
echo $form->checkBox($model, 'rememberMe', array('checked' => true, 'uncheckValue' => false));
echo '自动登录';
echo $form->error($model, 'rememberMe');
echo CHtml::closeTag('label');
echo CHtml::closeTag('div');
?>
<?php echo CHtml::submitButton('登陆', array('class' => 'btn btn-lg btn-primary btn-block')); ?>

<?php $this->endWidget(); ?>

