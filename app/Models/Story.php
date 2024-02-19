<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    // namaAkun: 'Ruffles',
    // description:
    //     'Username Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ',
    // fotoProfile: 'foto_profile',
    // jumlahLike: 1,
    // isLike: false,
    // postingGambar: 'foto_profile',
    // isSponsor: true,
    protected $fillable = [
        'id_user',
        'caption',
        'text',
        'foto_story'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
