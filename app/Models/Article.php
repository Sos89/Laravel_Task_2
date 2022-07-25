<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'text',
        'cover',
        'created_at',
        'updated_at'
    ];

    public function images(){
        return$this->hasMany(Image::class);
    }
}
