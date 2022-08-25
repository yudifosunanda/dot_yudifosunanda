<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPajakModel extends Model
{
    use HasFactory;
    protected $table='item_pajak';
    protected $fillable = ['item_id','pajak_id'];
    public $timestamps = false;

}
