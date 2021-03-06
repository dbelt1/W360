<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name,lastName,email,priority'];

    public function messages(){
        return $this->hasMany('App\Model\Message');
    }
    public function scopePriority($query,$priority){
        if($priority){
            return $query->where('priority', 'LIKE', "%$priority%");
        }
        
    }
}
