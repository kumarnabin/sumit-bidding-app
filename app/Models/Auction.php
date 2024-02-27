<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\User;
class Auction extends Model
{
    use HasFactory;
    protected $fillable = ["item_id", "user_id", "price"];


    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function buyer(){
        return $this->belongsTo(User::class);
    }
}
