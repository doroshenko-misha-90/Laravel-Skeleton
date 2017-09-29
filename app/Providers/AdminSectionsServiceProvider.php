<?php

namespace App\Providers;

use Modules\Pages\Models\Page;
use Modules\Users\Models\Permission;
use Modules\Users\Models\Role;
use Modules\Users\Models\User;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = array(
	     User::class => 'App\Http\Sections\Users',
	     Role::class => 'App\Http\Sections\Role',
	     Permission::class => 'App\Http\Sections\Permission',

	     Page ::class => 'App\Http\Sections\Page',
    );

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
