<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected static function booted()
    {
        static::saving(function ($berita) {
            $slug = Str::slug($berita->judul);
            $originalSlug = $slug;
            $counter = 1;

            while (self::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $berita->slug = $slug;
        });
    }
}