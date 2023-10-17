<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Poste;
use App\Models\Utili;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Utilisateurcontroller extends Controller
{
    public function liste_utilisateur()
    {
        $utilis = Utili::all();
        return view('utilisateur.liste', compact('utilis'));
    }
    public function ajouter_utilisateur()
    {
        $data=Poste::all();
        return view('utilisateur.ajouter',compact('data'));
    }
    public function ajouter_utilisateur_traitement(Request $request, Utili $utili)
    {
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $utili = new Utili();
        $utili->nom=$request->nom;
        $utili->prenom=$request->prenom;
        $utili->email=$request->email;
        $utili->poste_id=$request->poste;
        $utili->password=$request->password;
        $utili->save();

        return redirect('/administrateur')->with('status','Utilisateur ajouté avec succès');

    }
    public function modifier_utilisateur($id)
    {
        $data=Poste::all();
        $utilis = Utili::find($id);

        return view ('utilisateur.modifier', compact('utilis','data'));
        
    }
    public function modifier_utilisateur_traitement(Request $request)
    {
        $request->validate([
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $utili = Utili::find ($request->id);
        $utili->nom=$request->nom;
        $utili->prenom=$request->prenom;
        $utili->email=$request->email;
        $utili->poste_id=$request->poste;
        $utili->password=$request->password;
        $utili->update();

        return redirect('/administrateur')->with('status','Utilisateur a été modifié avec succès');
    }

    public function supprimer_utilisateur($id)
    {
        $utili = Utili::destroy($id);

        return redirect('/administrateur')->with('status','Utilisateur a été supprimé avec succès');

    }
/*
    public function register()
    {
        return view('register');
    }
 
    public function registerPost(Request $request)
    {
        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
 
        $user->save();
 
        return back()->with('success', 'Register successfully');
    }
*/
 
    public function connexion()
    {
        return view('authentification.connexion');
    }
 
    public function connexionPost(Request $request)
    {
        $conns = [
            'email' => $request->email,
            'password' => $request->password,
        ];
      /*$email_bdd=Utili::all()->pluck('email');
      $password_bdd=Utili::all()->pluck('password');
      $a="soumahopietro@gmail.com";
      foreach($email_bdd as $email){
        if($email===$a){
            echo "c'est bon";
            break;
        }*/
        $utili_email=Utili::where('email', $conns['email'])->first();
        $utili_password=Utili::where('password',$conns['password'] )->first();
        if($utili_email AND $utili_password ){
            return redirect('/accueil')->with('success', 'Vous etes connecté');
        }
        else{
            return back()->with('error', 'Error Email or Password');
        }

      }

        

    public function deconnecter()
    {
        Auth::logout();
 
        return redirect()->route('connexion');
    }
}

