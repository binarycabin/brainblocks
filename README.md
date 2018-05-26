# BrainBlocks for Laravel

An integration helper for taking Nano payments via BrainBlocks.io

This package adds a few helpers when adding a BrainBlocks button with Laravel

## Installation

```
composer require binarycabin/brainblocks
```

In .env, add your Nano wallet address the button will send to:

```
BRAINBLOCKS_RECEIVE_ADDRESS=xrb_1999...
```

## Adding Buttons

Simply include the button view where you would like the button to appear. Be sure to include the amount (in rai) that the button will take as well as the url the button will POST to with a valid brainblocks token:

```
@include('brainblocks::button',['amountRai'=>1000,'action'=>url('/pay')])
```

## Validating BrainBlocks Responses

In your POST route, call the 

```
Route::post('/pay', function(Request $request){
    $brainBlocksResponse = \BrainBlocks::getTokenResponse($request->brainblocks_token);
    $responseIsValid = \BrainBlocks::validateResponse($brainBlocksResponse,[
        'amount_rai' => 200,
    ]);
    dump($brainBlocksResponse);
    if($responseIsValid){
    	//.. do successful stuff
    }
});
```

BrainBlocks::getTokenResponse will return the full response from the BrainBlocks, this can be validated manually or you can use the "validateResponse" helper.

By default, the validateResponse helper will make sure:
- the "fufilled" property is "true"
- the "destination" address matches the address your config
The second property takes an array of additional validations you would like to check, for example checking the amount.