<?php namespace Bantenprov\Staf\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Staf facade.
 *
 * @package Bantenprov\Staf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Staf extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'staf';
    }
}
