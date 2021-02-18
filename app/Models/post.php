<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{  //アップロードファイルと、画像タイトル
    protected $fillable = [
        'image_file_name',
        'image_title',
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
