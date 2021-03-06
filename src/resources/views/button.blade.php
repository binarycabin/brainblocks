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
if(empty($method)){
	$method = 'POST';
}
?>
<div v-pre rel="brainblocks-button" data-id="{{ $buttonId }}" data-amount="{{ $amount }}" data-destination="{{ $destination }}" data-currency="{{ $currency }}" data-size="{{ $size }}" data-expanded="{{ $expanded }}" id="{{ $buttonId }}-button"></div>
<form action="{{ $action }}" @if($method == 'GET') method="GET" @else method="POST" @endif id="{{ $buttonId }}-form">
    @if(!in_array($method,['GET','POST']))
    <input type="hidden" name="_method" value="{{ $method }}" />
    @endif
    <input type="hidden" name="brainblocks_token" id="{{ $buttonId }}-token" value="" />
    {{ csrf_field() }}
</form>
