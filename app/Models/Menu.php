<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $fillable = [
       'name',
       'parent_id',
       'description',
       'content',
       'slug',
       'active'
   ];
}
