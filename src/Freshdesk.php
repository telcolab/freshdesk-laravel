<?php
namespace TelcoLAB\Freshdesk\Laravel;

use Illuminate\Support\Facades\Facade;
use TelcoLAB\Freshdesk\SDK\Freshdesk as FreshdeskClient;

class Freshdesk extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FreshdeskClient::class;
    }
}
