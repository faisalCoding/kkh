<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\SectionManager;
use  App\Models\Service;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name', 'name', 'id', 'description', 'manager_id','order_by'
    ];


    public function SectionManager()
    {
        return $this->hasOne(SectionManager::class,'id');
    }
    
    public function Service()
    {
        return $this->hasMany(Service::class,'id');
    }
}
