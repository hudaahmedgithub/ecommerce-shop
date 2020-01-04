<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\User;

class CartsController extends Controller
{
      public function viewCart(Request $request)
    {   
          $carts=Cart::get();
          return view('admin.cart.view_cart')->with(compact('carts'));
     }
     public function addCart(Request $request)
    {   
                
     if($request->isMethod('post')){
             $data = $request->all();
       
        if(empty($data['title']&& $data['result'] && $data['description']))
           {
               return redirect()->back()->with('flash_message_error','Check if any field not full !!!');
           }
             $problem=new Cart;
             //$product->id=$data['id'];
             //$problem->id_parent=$data['id_parent'];
             //$product->date=$data['date'];
             $problem->title=$data['title'];
             $problem->result=$data['result'];
             //$product->time=$data['time'];
             $problem->description=$data['description'];
             $problem->save();
             return redirect()->back()->with('flash_message_success','Problem Added Successfully !!!');
     }
     /*$categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disable>Select</option>";
        
        foreach($categories as $cat)
        {
     
       $categories_dropdown .= "<option value='".$cat->id."' >".$cat->name."</option>";
     
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                
           foreach($sub_categories as $sub_cat)
           {
               $categories_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
           }
            
        }*/
          return view('admin.cart.add_caring_problem');//->with(compact('categories_dropdown'));    
    }

     public function editCart(Request $request , $id=null)
    {        
    if($request->isMethod('post'))
        {
            $data =$request->all();
            Cart::where(['id'=>$id])->
            update(['title'=>$data['title'],
            'result'=>$data['result'],
            'description'=>$data['description']]);
        
        return redirect('/admin/view-carts')->with('flash_message_success','User updated Successfully !!!');
    
    }   
         $cart=Cart::where(['id'=>$id])->first();
         return view('admin.cart.edit_cart')->with(compact('cart'));
     }   

  public function deleteCart($id=null)
    {    
        
    if(!empty($id))
    {
        Cart::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Cart deleted Successfully !!!');
    }
  }
    
}
