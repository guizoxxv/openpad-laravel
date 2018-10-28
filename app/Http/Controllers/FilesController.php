<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Validator;

class FilesController extends Controller
{

  public function load(File $file) {

    return view('files/load', compact('file'));

  }

  public function create($name) {

    return view('files/create', ['name' => $name]);

  }

  public function submitCreate() {

    File::create([

      'name' => request('name'),
      'text' => request('text')

    ]);

    return redirect()->route('load', ['file' => request('name')]);

  }

  public function raw(File $file) {

    return view('files/raw', compact('file'));

  }

  public function edit(File $file) {

    return view('files/edit', compact('file'));

  }

  public function delete(File $file) {

    File::where('name', $file->name)->delete();

    return redirect()->route('home');

  }

  public function changePassword(Request $request) {

    // Validate
    $validator = Validator::make($request->all(), [

      'password' => [
        'bail',
        'required',
        'confirmed',
        'regex:/[a-zA-Z0-9!@#$%&amp;*\-_+=]{3,10}/'
      ]

    ]);

    if($validator->fails()) {

      return redirect("/file/{$request->name}/edit#modal-change-password")->withErrors($validator);

    }

    // File::where('name', request('name'))->update(['password' => encrypt(request('password'))]); TODO: How to check if updte was successfull?
    $file = File::where('name', request('name'))->first();
    $file->password = encrypt(request('password'));
    $saved = $file->save();

    if($saved === true) {

      $request->session()->put('logged', true);

    }

    return redirect()->route('edit', ['file' => request('name')]);

  }

  public function checkPassword(Request $request) {

    // Validate
    $validator = Validator::make($request->all(), [

      'password' => [
        'bail',
        'required',
        'regex:/[a-zA-Z0-9!@#$%&amp;*\-_+=]{3,10}/'
      ]

    ]);

    if($validator->fails()) {

      return redirect("/file/{$request->name}/#modal-check-password")->withErrors($validator);

    }

    $file = File::where('name', request('name'))->first();

    if(request('password') === decrypt($file->password)) {

      $request->session()->put('logged', true);

      return redirect()->route('edit', ['file' => request('name')]);

    } else {

      return redirect("/file/{$request->name}/#modal-check-password")->withErrors('Passwords did not match');

    }

  }

  public function ajaxUpdateText() {

    File::where('name', request('name'))->update(['text' => request('text')]);

  }

}
