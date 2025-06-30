<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected static function booted()
    {
        static::saving(function ($galeri) {
            $slug = Str::slug($galeri->judul);
            $originalSlug = $slug;
            $counter = 1;

            while (self::where('slug', $slug)->where('id', '!=', $galeri->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $galeri->slug = $slug;
        });
    }

}