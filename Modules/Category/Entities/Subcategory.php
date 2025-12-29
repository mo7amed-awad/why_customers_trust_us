<?php

namespace Modules\Category\Entities;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Entities\Model as Category;
class Subcategory extends Model
{

    use Translatable;

    protected $guarded = [];

    protected $table = 'subcategories';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
