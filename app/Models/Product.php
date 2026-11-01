<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes; 
    protected $primaryKey = 'product_id';

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'sku',
        'price',
        'sale_price',
        'quantity',
        'category_id',
        'subcategory_i',
        'brand_id',
        'vendor_id',
        'tags',
        'image',
        'gallery_images',
        'colors',
        'size',
        'ingredients',
        'skin_type',
        
    ];

    protected $dates = ['deleted_at'];

    public function category(){
        
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory(){
        
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }



}
