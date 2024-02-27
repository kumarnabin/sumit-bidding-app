<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "user_id",
        "category_id",
        "price",
        "description",
        "bidding_start",
        "bidding_end"

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

}
