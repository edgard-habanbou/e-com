<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartProducts extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "product_id", "quantity", "shopping_cart_id"];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class);
    }
}
