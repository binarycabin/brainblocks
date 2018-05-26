<?php

namespace BinaryCabin\BrainBlocks\Facades;

use Illuminate\Support\Facades\Facade;

class BrainBlocks extends Facade
{
    protected static function getFacadeAccessor() {
        return 'brainblocks';
    }
}