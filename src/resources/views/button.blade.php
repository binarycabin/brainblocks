<?php 
$buttonId = 'BB'.rand(100000,999999); 
if(empty($destination)){
	$destination = config('brainblocks.receive-address');
}
if(empty($currency)){
	$currency = 'rai';
}
if(empty($expanded)){
	$expanded = false;
}
if(empty($size)){
	$size = 'responsive';
}
?>
<div v-pre rel="brainblocks-button" data-id="{{ $buttonId }}" data-amount="{{ $amount }}" data-destination="{{ $destination }}" data-currency="{{ $currency }}" data-size="{{ $size }}" data-expanded="{{ $expanded }}" id="{{ $buttonId }}-button"></div>
<form action="{{ $action }}" method="POST" id="{{ $buttonId }}-form">
    <input type="hidden" name="brainblocks_token" id="{{ $buttonId }}-token" value="" />
    {{ csrf_field() }}
</form>
