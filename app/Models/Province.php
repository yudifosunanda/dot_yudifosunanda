<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table='province';
    protected $fillable = ['province_id','province'];
    public $timestamps = false;

    public function cities()
     {
      return $this->hasMany(City::class,'province_id','province_id');
     }
}
