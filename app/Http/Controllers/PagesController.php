<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller{
 
    public function index($id=0){
   
      // Fetch all records
      $userData['data'] = Page::getuserData();
   
      $userData['edit'] = $id;
  
      // Fetch edit record
      if($id>0){
        $userData['editData'] = Page::getuserData($id);
      }
  
      // Pass to view
      return view('index')->with("userData",$userData);
    }
  
    public function save(Request $request){
   
      if ($request->input('submit') != null ){
  
        // Update record
        if($request->input('editid') !=null ){
          $name = $request->input('name');
          $email = $request->input('email');
          $editid = $request->input('editid');
  
          if($name !='' && $email != ''){
             $data = array('name'=>$name,"email"=>$email);
   
             // Update
             Page::updateData($editid, $data);
  
             Session::flash('message','Update successfully.');
   
          }
   
        }else{ // Insert record
           $name = $request->input('name');
           $username = $request->input('username');
           $email = $request->input('email');
  
           if($name !='' && $username !='' && $email != ''){
              $data = array('name'=>$name,"username"=>$username,"email"=>$email);
   
              // Insert
              $value = Page::insertData($data);
              if($value){
                Session::flash('message','Insert successfully.');
              }else{
                Session::flash('message','Username already exists.');
              }
   
           }
        }
   
      }
      return redirect()->action('PagesController@index',['id'=>0]);
    }
  
    public function deleteUser($id=0){
  
      if($id != 0){
        // Delete
        Page::deleteData($id);
  
        Session::flash('message','Delete successfully.');
        
      }
      return redirect()->action('PagesController@index',['id'=>0]);
    }
  }
