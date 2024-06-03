<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cources extends Model
{
    use HasFactory;
    

    protected $table = 'cources';

    protected $fillable = ['name', 'category', 'desc'];

   // public function students(){
        //return $this->hasMany(Student::class);
   // }
//}
}
