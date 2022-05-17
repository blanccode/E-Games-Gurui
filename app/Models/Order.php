<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function getDonationPrice($value) {
        if (!empty($value)) {
            return $value;
        }
//        switch ($value) {
//            case 'option-1':
//                $price = '1.00';
//                break;
//            case 'option-2':
//                $price = '5.00';
//                break;
//            case 'option-3':
//                $price = '10.00';
//                break;
//            default:
//                $price = '0.00';
//        }
//        return $price;
    }


}
