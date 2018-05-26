<?php $brainBlocksButtonId = 'BB'.rand(100000,999999); ?>
<div rel="brainblocks-button" data-id="{{ $brainBlocksButtonId }}" data-amount-rai="{{ $amountRai }}" id="{{ $brainBlocksButtonId }}-button"></div>
<form action="{{ $action }}" method="POST" id="{{ $brainBlocksButtonId }}-form">
    <input type="hidden" name="brainblocks_token" id="{{ $brainBlocksButtonId }}-token" value="" />
    {{ csrf_field() }}
</form>