<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Section;
use App\Models\Service;

class UserMessage extends Model
{
    use HasFactory;


    protected $appends =['user_name', 'section_name', 'user_email','user_phone','service_name'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id','section_id', 'message', 'contant_type','file_name', 'service_id','reply'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];


    public function getUserNameAttribute($val)
    {if (isset($this->user()->get()->toArray()[0]['name'])) {
        return $this->user()->get()->toArray()[0]['name'];
    }
        return 'لا يوجد اسم مستخدم';
    }

    public function getSectionNameAttribute($val)
    {
        
if (isset($this->section()->get()->toArray()[0]['name'])) {
    return $this->section()->get()->toArray()[0]['name'];
}
        return 'لا يوجد اسم قسم';
        
    } 

    public function getServiceNameAttribute($val)
    {
        
if (isset($this->service()->get()->toArray()[0]['name'])) {
    return $this->service()->get()->toArray()[0]['name'];
}
        return 'لا يوجد خدمة';
        
    } 
    
    public function getUserEmailAttribute($val)
    {
        if (isset($this->user()->get()->toArray()[0]['email'])) {
            return $this->user()->get()->toArray()[0]['email'];
        }
        return "لا يوجد ايميل مستخدم";

    }

    public function getUserPhoneAttribute($val)
    {
        if (isset($this->user()->get()->toArray()[0]['phone'])) {
            return $this->user()->get()->toArray()[0]['phone'];
        }
        return "لا يوجد رقم جوال مستخدم";

        
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }
}
