<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
      }
      public function terms()
      {
          return view('term_services');
      }
  
      public function privacy()
      {
          return view('privacy');
      }
}
