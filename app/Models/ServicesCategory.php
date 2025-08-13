<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesCategory extends Model
{
    use HasFactory;

    protected $table = 'services_categories';

    protected $fillable = [
        'title',
        'slug',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'services_category_id');
    }
}

