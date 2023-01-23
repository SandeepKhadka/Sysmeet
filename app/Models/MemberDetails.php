<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class MemberDetails extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'slug', 'member_desc', 'role', 'experience', 'responsibility', 'phone', 'email', 'biography', 'prof_skill', 'photo', 'facebook_link', 'twitter_link', 'pinterest_link', 'instagram_link', 'linked_in_link'];

    public function getSlug($title){
        $slug = Str::slug($title);
        if ($this->where('slug',$slug)->count() > 0){
            $slug .= date('Ymdhis').rand(0,99);
        }
        return $slug;
    }
}
