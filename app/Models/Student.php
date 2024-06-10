<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name', 'nim', 'major', 'class', 'course_id'];

    /**
     * 1 to 1:
     * hasOne(namaModelnya)  : table saat ini meminjam id
     *
     * belongsTo(namaModelnya) : table saat ini meminjam id dari table lain
     * 
     * 1 to M:
     * hasMany(NamaModelnya)
     * belongsToMany(namaModelnya)
     */
    
    
    // mendefinisikan relasi ke model course
    public function course(){
        return $this->belongsTo(Cources::class, 'course_id');
    }
}
