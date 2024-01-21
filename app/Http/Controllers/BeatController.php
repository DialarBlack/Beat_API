<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use App\Models\Like;
use Illuminate\Http\Request;

class BeatController extends Controller
{
    public function like(Beat $beat)
    {
        // Vérifier l'authentification de l'utilisateur (vous pouvez utiliser Laravel Passport pour l'authentification API)
        
        // Créer un nouveau like associé au beat et à l'utilisateur authentifié
        $like = new Like();
        $like->likeable_id = $beat->id;
        $like->likeable_type = Beat::class;
        $like->user_id = auth()->user()->id;
        $like->save();
        
        // Retourner une réponse JSON ou un code de statut approprié
    }

    public function store(Request $request)
    {
        // Vérifier l'authentification de l'utilisateur
        // Vérifier si l'utilisateur est autorisé à accéder au fichier premium


          $isPremium = $request->input('is_premium');
    
          if ($isPremium && !auth()->user()->isPremium()) {
        // Retourner une réponse d'erreur indiquant que l'utilisateur n'est pas autorisé
           }
    
        // Créer un nouveau beat
          $beat = new Beat();
          $beat->slug = $request->input('slug');
          $beat->title = $request->input('title');
          $beat->premium_file = $request->input('premium_file');
          $beat->free_file = $request->input('free_file');
          $beat->save();
    
    // Retourner le beat créé en réponse JSON ou un code de statut approprié
   }
}


