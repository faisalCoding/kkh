<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Section;

class SectionManager extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $appends =['section_id', 'section_name'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','id', 'email', 'password','section'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getSectionIdAttribute($val)
    {
        
        if (isset(  $this->section()->get()->toArray()[0]['id'])) {
            return  $this->section()->get()->toArray()[0]['id'];
        }
        return 0;
    }

    public function getSectionNameAttribute($val)
    {
        
        if (isset(  $this->section()->get()->toArray()[0]['name'])) {
            return  $this->section()->get()->toArray()[0]['name'];
        }
        return "لم ينسب لقسم";
        
    }
    public function section()
    {
        return $this->hasOne(Section::class,'manager_id','id');
    }
}
