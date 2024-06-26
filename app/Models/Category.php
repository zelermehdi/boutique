<?php

namespace App\Models;

use App\Models\Produc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function products(){
        return $this->belongsToMany(Produc::class);
    }
}
