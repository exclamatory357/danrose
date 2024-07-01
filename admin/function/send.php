<?php



$text = 'Hi, This is a test message.';

$number = '09762132056';



exec('echo '.$text.' | gnokii --sendsms '.$number); ?>