<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceList extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'summary', 'order_id', 'tag', 'status', 'description', 'slug'];

    public function getSlug($title){
        $slug = Str::slug($title);
        if ($this->where('slug',$slug)->count() > 0){
            $slug .= date('Ymdhis').rand(0,99);
        }
        return $slug;
    }

}
