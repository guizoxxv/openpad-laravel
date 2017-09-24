<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

  protected $fillable = ['name', 'text'];

  // Override default Route Model Biding key
  public function getRouteKeyName() {

    return 'name';

  }

}
