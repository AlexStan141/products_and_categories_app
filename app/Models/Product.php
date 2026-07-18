<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image', 'category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeName(Builder $query, string $name){
        $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopePrice(Builder $query, $from = null, $to = null){
        if($from && $to){
            $query->whereBetween('price', [$from, $to]);
        } else if (!$from && $to) {
            $query->where('price', '<=', $to);
        } else if ($from && !$to) {
            $query->where('price', '>=', $from);
        }
    }

    public function scopeDescription(Builder $query, string $description){
        $query->where('description', 'LIKE', '%' . $description . '%');
    }
}
