<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'client_name', 'summary', 'cover_image', 'original_cover_image_name'];

    public static function generateSlug($string){

        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $it_exists = Project::where('slug', $slug)->first();
        $c = 1;
        while($it_exists){
            $slug = $original_slug . "-" . $c;
            $it_exists = Project::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
