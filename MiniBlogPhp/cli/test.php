<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Form.php';

$form = new Form();
echo Form::checkbox('demo', 'Demo', []);

?>
