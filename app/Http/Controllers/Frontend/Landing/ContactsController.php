<?php

namespace App\Http\Controllers\Frontend\Landing;

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\DB;
use App\Models\Products\Slider;
use Illuminate\Http\Request;
use App\Models\Utilities\Contact;
use Illuminate\Support\Facades\Mail;
use Auth;
class ContactsController extends FrontendController
{
    public function contact(Request $request){
      if(Auth::check())
	  {
       if($request->isMethod('post')){
		    $data = $request->all();
		   if($data['name']==Auth::user()->name){
		     $contact=new Contact;
             $contact->name=$data['name'];
             $contact->email=$data['email']; 
             $contact->phone=$data['phone']; 
             $contact->message=$data['message'];
             $contact->save();
		   }
 $email="admin1000@yopmail.com";
            $messageData=
                [
                'name'=>$data['name'],
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'comment'=>$data['message']
                ];
            Mail::send('frontend.landing.emails.enquiry',$messageData,
                      function($message)use($email)
                       {
                           $message->to($email)->subject('Enquiry from E-com');
                       });
            return redirect()->back()->with('flash_message_success','Thank you for your enquiry, we will get back soon.');
           // echo "test";die;
    }
	}
         return view('frontend.landing.pages.contact');
}
    /***************add contact***************/
    public function addContact(Request $request)
    {   
         if($request->isMethod('post')){
             $data = $request->all();
             
        if(empty($data['name'] && $data['email'] && $data['subject'] && $data['message']))
           {
               return redirect()->back()->with('flash_message_error','Check if any field not full !!!');
           }
             $contac=new Contact;
            // $contac->id=$data['id'];
             $contac->name=$data['name'];
             $contac->email=$data['email'];
             $contac->subject=$data['subject'];
             $contac->message=$data['message'];
             $contac->save();
     }
         return view('admin.contact.add_contact');
     }
    
    /*****************view contact*************/
    
   public function viewContact(Request $request)
    {   
         $contacts=Contact::get();
         return view('admin.contact.view_contact')->with(compact('contacts'));
    }
    
    /************delete contact*********/
     public function deleteContact($id=null)
    {    
        
    if(!empty($id))
    {
        Contact::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','contact deleted Successfully !!!');
    }
  }
    /***************update contact********/
   public function editContact(Request $request , $id=null)
    {        
    if($request->isMethod('post'))
        {
            $data =$request->all();
            Contact::where(['id'=>$id])->
            update(['id'=>$data['id'],
            'name'=>$data['name'],
            'email'=>$data['email'],
            'subject'=>$data['subject'],
             'message'=>$data['message']]);
        
        return redirect('/admin/view-contact')->with('flash_message_success','contact updated Successfully !!!');
    
    }   
         $contacts=Contact::where(['id'=>$id])->first();
         return view('admin.contact.edit_contact')->with(compact('contacts'));
     }   
}
