<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at']; // Enables soft delete timestamp

    protected $primaryKey = 'subcategory_id';

    protected $table = 'sub_categories';

    protected $fillable = ['category_id','subcategory_name','slug'];
}
