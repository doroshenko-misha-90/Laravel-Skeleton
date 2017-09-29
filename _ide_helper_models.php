<?php
/**
 * A helper file for your Eloquent Entities
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\Users\Models{
/**
 * Modules\Users\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User wherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereRoleIs($role = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace Modules\Users\Models{
/**
 * Modules\Users\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace Modules\Users\Models{
/**
 * Modules\Users\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Users\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Users\Models\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\Attribute
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Attribute whereName($value)
 */
	class Attribute extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $order
 * @property int $parent_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace Modules\Products\Entities{
/**
 * Modules\Products\Entities\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string $img
 * @property int $price
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Products\Entities\Attribute[] $attributes
 * @property-read \Modules\Products\Entities\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Products\Entities\Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

