<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container" style=" background:#fff;border-radius:5px;box-shadow:0 .5rem 1.5rem rgba(0,0,0, .1);">
<br>
<h6 align="center"style="font-size: 17px;
    font-weight: 900;
    ">Ajouter utilisateur</h6><br>

<form action="/ajouter/traitement" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<div class="form-group">
<div class="row ">
        <label  class="col-3" >Nom:</label>
        <div class="col-9">
        <input type="text"  style="width: 200px;"class="form-control shadow-none" name="nom" id="" autofocus required>
    </div>
    </div>
    </div><br>
    <div class="form-group">
<div class="row ">
        <label  class="col-3" >Prénom:</label>
        <div class="col-9">
        <input type="text"  style="width: 200px;"class="form-control shadow-none" name="prenom" id="" autofocus required>
    </div>
    </div>
    </div><br>
<div class="form-group">
<div class="row ">
        <label  class="col-3" >Email:</label>
        <div class="col-9">
        <input type="email"  style="width: 200px;"class="form-control shadow-none" name="email" id="" autofocus required>
    </div>
    </div>
    </div><br>
    <div class="form-group">
<div class="row ">
        <label  class="col-3" >Service:</label>
        <div class="col-9">
        	<select style="width: 200px; class="form-select shadow-none" name="poste">
             @foreach($data as $row)
            <option value="{{$row->id}}">{{$row->nomposte}}</option>
            @endforeach
        	</select>
    </div>
    </div>
    </div><br>
    <div class="form-group">
<div class="row ">
        <label  class="col-3" >Mot de passe:</label>
        <div class="col-9">
        <input type="password"  style="width: 200px;"class="form-control shadow-none" name="password" id="" autofocus required>
    </div>
    </div>
    </div><br> 
    <div class="form-group">
<div class="row ">
     <div class="col-3">
       <button type="submit" class="btn btn-success" name="envoi"><i class="fa fa-floppy-o"> Enregistrer</i></button>
    </div>
    <div class="col-3">
    <a href="/administrateur">
        <p class="btn btn-danger"><i class="fa fa-arrow-left"> Annuler</i></p>
    </a>
    </div>
</div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>