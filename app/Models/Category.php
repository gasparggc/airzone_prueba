<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function store($request){

        $this->name = $request['name'];
        $this->slug = $request['slug'];

        return $this->save();
    }

    public function search(){
        return Category::all();

    }

    public function searchById($id){
        $category = Category::find($id);

        return $category;
    }

    public function updateById($request, $id){
        $category = Category::find($id);

        $category->name = $request['name'];
        $category->slug = $request['slug'];
        $category['visible'] = $request['visible'] ?? $category['visible'];
        
        return $category->save();
    }

    public function deleteById($id){
        $category = Category::find($id);

        if(!empty($category)){
            return $category->delete();
        }else{
            return false;
        }
    }
}
