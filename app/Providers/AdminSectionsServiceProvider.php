<?php

namespace App\Providers;

use Modules\Products\Entities\Attribute;
use Modules\Products\Entities\AttributeValue;
use Modules\Products\Entities\Category;
use Modules\Products\Entities\Product;
use Modules\Users\Models\Permission;
use Modules\Users\Models\Role;
use Modules\Users\Models\User;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
	     User::class => 'App\Http\Sections\Users',
	     Role::class => 'App\Http\Sections\Role',
	     Permission::class => 'App\Http\Sections\Permission',

	     Category::class => 'App\Http\Sections\Category',
	     Product::class => 'App\Http\Sections\Product',
	     AttributeValue::class => 'App\Http\Sections\AttributeValue',
	     Attribute::class => 'App\Http\Sections\Attribute',
    ];

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
