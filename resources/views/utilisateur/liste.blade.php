<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
        <title>Administrateur</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  </head>
  <body><br>
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Liste des utilisateurs</h4>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <a href="/ajouter" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus me-2"></i> Ajouter un nouveau</a>
                                                </div>
                                            </div>
                
                                        </div>
                                        <div class="table-responsive mb-4">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Prénoms</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Service</th>
                                                    <th scope="col" style="width: 200px;">Actions</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                    @php
                                                        $ide = 1;
                                                    @endphp
                                                   @foreach($utilis  as $utili)
                                                       <td>{{$ide}}</td>
                                                        <td>{{$utili->nom}}</td>
                                                        <td>{{$utili->prenom}}</td>
                                                        <td>{{$utili->email}}</td>
                                                        <td>{{$utili->poste->nomposte}}</td>
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                  <div>
                                                                  <a href="{{route('modifier',$utili->id)}}" class="px-2 text-primary"><i class="uil uil-pen font-size-18"></i>Modifier</a>
                                                                  <a href="javascript:void(0);" class="px-2 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                                  </div>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="{{route('supprimer',$utili->id)}}" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i>Supprimer</a>
                                                                    <a href="javascript:void(0);" class="px-2 text-danger"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @php
                                                      $ide+=1;
                                                     @endphp
          
                                                    @endforeach
<!--
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>E-mail</th>
          <th>Service</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody>
        @php
          $ide = 1;
        @endphp
        @foreach($utilis  as $utili)
        <tr>
          <td>{{$ide}}</td>
          <td>{{$utili->nom}}</td>
          <td>{{$utili->prenom}}</td>
          <td>{{$utili->email}}</td>
          <td>{{$utili->poste->nomposte}}</td>
          <td>
            <a href="{{route('modifier',$utili->id)}}" class="btn btn-info">Modifier</a>
            <a href="{{route('supprimer',$utili->id)}}" class="btn btn-danger">Supprimer</a>
          </td>
        </tr>
          @php
            $ide+=1;
          @endphp
          
        @endforeach
      </tbody>
    -->
            </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>