<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\SectionManager;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name', 'name', 'id', 'description', 'manager_id',
    ];


    public function SectionManager()
    {
        return $this->hasOne(SectionManager::class,'id');
    }
}
