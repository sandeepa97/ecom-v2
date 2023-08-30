<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    public function product()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(BrandType::class, 'brand_type_id', 'id');
    }

}
