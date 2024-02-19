<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostInstagram extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'description',
        'is_like',
        'posting_gambar',
        'is_sponsor',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

}
