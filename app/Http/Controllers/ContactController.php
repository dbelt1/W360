<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use App\Model\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index(Request $request)
    {
        $priority = $request->priority;

        if($priority){
            $contacts = Contact::orderBy('id')->priority($priority)->get(['name','lastName','email','priority']);
        }else{
            $contacts = Contact::all();
        }

        return $contacts;
    }
    
    public function email(){
        $contacts = Contact::get(['email']);
        return $contacts;
    }

   
    public function store(Request $request)
    {

        $request->validate([
            'priority' => 'required',
            'name'=>'required',
            'last_name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        
        $saveData = new Contact;
        $saveData->name = $request->name;
        $saveData->lastName = $request->last_name;
        $saveData->email = $request->email;
        $saveData->priority = $request->priority;
        $saveData->save();
        //guardar mensaje asignandolo a cada contacto
        $saveMessage = Message::addMessage($saveData->id,$request->message);
        return 'si guardo';
    }

    

}
