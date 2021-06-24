<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdminPermission
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $http_method
 * @property string|null $http_path
 * @property int $order
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereHttpMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereHttpPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminPermission extends Model
{
    //
}
