<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesToChooseUs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'order_id', 'status'];

}
