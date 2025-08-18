<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'services_category_id',
        'title',
        'slug',
        'short_content',
        'content',
        'main_image',
        'details_image',
        'icon_image',
        'breadcrumb_image',
        'sort_order'
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServicesCategory::class, 'services_category_id');
    }

     protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($page) {
            $page->slug = $page->createSlug($page->title);
        });
    }

    private function createSlug($title)
    {
        $slug = Str::slug($title);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

}
