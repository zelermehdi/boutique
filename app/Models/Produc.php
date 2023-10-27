<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produc extends Model
{



    public function getprice(){
        $price=$this->price /100;
        return number_format( $price,2,","," "). '€';
    }
    use HasFactory;
}
