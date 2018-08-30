# BrainBlocks for Laravel

An integration helper for taking Nano payments via BrainBlocks.io

This package adds a few helpers when adding a BrainBlocks button with Laravel

## Installation

```
composer require binarycabin/brainblocks
```

In .env, add your Nano wallet address the button will send to:

```
BRAINBLOCKS_RECEIVE_ADDRESS=nano_1999...
```

## Adding Buttons

Simply include the button view where you would like the button to appear. Be sure to include the amount (in rai) that the button will take as well as the url the button will POST to with a valid brainblocks token:

```
@include('brainblocks::button',['amount'=>1000,'action'=>url('/pay')])
```

You can add multiple buttons on this page using this include. Then at the bottom of the page, be sure to add your javascript

```
@include('brainblocks::scripts')
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

`BrainBlocks::getTokenResponse` will return the full response from the BrainBlocks, this can be validated manually or you can use the `validateResponse` helper.

By default, the `validateResponse` helper will make sure:
- the `fulfilled` property is `true`
- the "destination" address matches the address your config
The second property takes an array of additional validations you would like to check, for example checking the amount.

## Custom Currencies

In addition to the default "rai", you can change the currency used to any of the supported currencies listed on [brainblocks.io](https://brainblocks.io)

```
@include('brainblocks::button',['amount'=>5,'currency'=>'usd','action'=>url('/pay')])
```

Be sure to update your validator to look for the correct currency and amount

```
$responseIsValid = \BrainBlocks::validateResponse($brainBlocksResponse,[
	'amount' => 5,
	'currency' => 'usd',
]);
```

## Custom Destination

If you need a specific button to go to a destination address other than the one set in your configuration, you can add it as an option as well

```
@include('brainblocks::button',['amount'=>1000,'destination'=>'nano_11223344...','action'=>url('/pay')])
```

Be sure to update your validator to look for the changed destination instead of the default

```
$responseIsValid = \BrainBlocks::validateResponse($brainBlocksResponse,[
	'amount_rai' => 1000,
	'destination' => 'xrb_1kojnrrw8rtybqsqk5uh7bcioo8thkiqjkibmn43togd416gzfye6j44b9sc',
]);
```

## Donate

[![Donate with NaNote](https://i.imgur.com/aLoptWA.png)](https://nanote.net/pay/binarycabin)






