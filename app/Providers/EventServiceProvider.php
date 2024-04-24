<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\User;
use App\Observers\AdminObserver;
use App\Observers\CustomerObserver;
use App\Observers\UserObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        //
    ];
}
