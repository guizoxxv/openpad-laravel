<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class HomeController extends Controller
{

  public function index() {

    if(request()->session()->has('logged') === true) {

      request()->session()->forget('logged');

    }

    return view('home/index');

  }

  public function ajaxCheckName(Request $request) {

    // Validate
    $this->validate(request(), [

      'name' => [
        'bail',
        'required',
        'regex:/[a-z0-9-_]{3,10}/'
      ]

    ]);

    $exists = File::where('name', request('name'))->exists();

    // Check if name exists in DB
    if($exists === true) {

      return response()->json([
        'exists' => true
      ]);

    } else if ($exists === false) {

      return response()->json([
        'exists' => false
      ]);

    }

  }

  public function submit() {

    $file = request('name');

    if(isset($_POST['submit-load'])) {

      // Redirect to load
      return redirect()->route('load', [$file]);

    }

    if(isset($_POST['submit-create'])) {

      // Redirect to edit
      return redirect()->route('create', [$file]);

    }

  }

}
