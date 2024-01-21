<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function like(Post $post)
    {
        // Vérifier l'authentification de l'utilisateur (vous pouvez utiliser Laravel Passport pour l'authentification API)
        // Créer un nouveau like associé au post et à l'utilisateur authentifié
        $like = new Like();
        $like->likeable_id = $post->id;
        $like->likeable_type = Post::class;
        $like->user_id = auth()->user()->id;
        $like->save();
        
        // Retourner une réponse JSON ou un code de statut approprié
    }

    public function store(Request $request)
    {
        // Vérifier l'authentification de l'utilisateur
        
        // Créer un nouveau post
        $post = new Post();
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->save();
        
        // Retourner le post créé en réponse JSON ou un code de statut approprié
    }
}
