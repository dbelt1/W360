<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message,contact_id'];
    public function contact(){
        return $this->belongsTo('App\Model\Contact');
    }
    static public function addMessage($contact,$message){
        $saveMessage = new Message;
        $saveMessage['contact_id'] = $contact; 
        $saveMessage['message'] = $message; 
        $saveMessage->save(); 
    }
}
