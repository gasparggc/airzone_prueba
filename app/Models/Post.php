<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function search($id){
        $post = Post::find($id);

        return $post;
    }

    /*      Probe a hacer todo en una misma consulta sin tener que llamar a dos modelos distintos
    * pero como resultado obtenía tantos objetos como comentarios distintos, así que para
    * facilitar el código finalmente me decanté por llamar a los 2 modelos Post y Comment.
    */
    public function post_activity($id){

        $post = DB::table('posts')
        ->join('users as owners', 'posts.user_id', '=','owners.id')
        ->leftjoin('comments', 'posts.id', '=','comments.post_id')
        ->leftjoin('users as writers', 'comments.user_id', '=','writers.id')
        ->select('posts.id','posts.title','posts.short_content', 'owners.username as owner','comments.content as comments','writers.username as writer')
        ->where('posts.id', $id)
        ->get();

        return $post;
    }
}
