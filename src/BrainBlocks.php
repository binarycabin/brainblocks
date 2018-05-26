<?php

namespace BinaryCabin\BrainBlocks;

class BrainBlocks{

    public static function getTokenResponse($token){
        $client = new \GuzzleHttp\Client();
        $request = $client->request('GET', 'https://brainblocks.io/api/session/'.$token.'/verify', []);
        $contents = $request->getBody()->getContents();
        return json_decode($contents);
    }

    public static function validateResponse($response,$rules=[]){
    	$defaultRules = [
    		'fulfilled' => true,
    		'destination' => config('brainblocks.receive-address')
    	];
    	$rules = array_merge($defaultRules, $rules);
    	foreach($rules as $ruleProperty => $ruleValue){
    		if(empty($response->$ruleProperty) || $response->$ruleProperty != $ruleValue){
    			return false;
    		}
    	}
    	return true;
    }

}