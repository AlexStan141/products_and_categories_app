<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function scopeName(Builder $query, string $name){
        $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeMinPriceInterval(Builder $query, $from = null, $to = null){
        if($from && $to){
            $query->whereBetween('min_price', [$from, $to]);
        } else if (!$from && $to){
            $query->where('min_price', '<=', $to);
        } else if ($from && !$to){
            $query->where('min_price', '>=', $from);
        }
    }

    public function scopeMaxPriceInterval(Builder $query, $from = null, $to = null){
        if($from && $to){
            $query->whereBetween('max_price', [$from, $to]);
        } else if (!$from && $to){
            $query->where('max_price', '<=', $to);
        } else if ($from && !$to){
            $query->where('max_price', '>=', $from);
        }
    }
}
