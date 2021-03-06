<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table='products';
    protected $fillable = ['product_code','product_barcode','name','description','unitPrice','category_id','user_id','created_at','updated_at'];
    public function purchaseorders()
    {
        return $this->belongsToMany('App\Purchaseorder','purchaseorder_product')->pivot('product_id','unitPrice','qty','amount','user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tmpPurchaseOrders()
    {
        return $this->hasMany(TmpPurchaseOrder::class);
    }
}