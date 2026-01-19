<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerServicesLink extends Model
{
    use HasFactory;

    protected $table = 'banner_services_link';

    protected $fillable = [
        'banner_services_id',
        'services_id',
    ];

    
    public function bannerService()
    {
        return $this->belongsTo(BannerService::class, 'banner_services_id');
    }

    
    public function service()
    {
        return $this->belongsTo(Service::class, 'services_id');
    }
}
