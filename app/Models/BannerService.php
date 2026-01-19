<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class BannerService extends Model
{
    use HasFactory;

    protected $table = 'banner_services';

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'short_detail',
        'long_detail',
    ];

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

    public function serviceLinks()
    {
        return $this->hasMany(BannerServicesLink::class, 'banner_services_id');
    }
}
