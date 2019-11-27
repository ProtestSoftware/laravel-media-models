<?php

namespace ProtestSoftware\LaravelMediaModels;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ProtestSoftware\LaravelMediaModels\Skeleton\SkeletonClass
 */
class LaravelMediaModelsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-media-models';
    }
}
