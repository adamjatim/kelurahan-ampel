<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 

class Tag extends Model
{
    use HasFactory;

    use Sluggable;

    protected $guarded = ['id'];

    public function articles(){
        return $this->belongsTohasMany(Article::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
} 
