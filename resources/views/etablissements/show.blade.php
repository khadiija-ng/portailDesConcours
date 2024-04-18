 <x-app-layout>
    <style>
        .container {
            margin-top: 10px;
            justify-content: center;
            align-items: center;
            width: 75%; 
            margin: 0 auto;
        }
    </style>
 <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('liste Des Concours de') }}
                 {{$etablissement->libelle}}
            </h2>
        </x-slot>

<div class="container">
    <br>
    <br>
<table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Date Debut</th>
                            <th >Date Fin</th>
                            <th>Etat</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($concour as $val)
                            <tr>
                                <td>{{ $val->nom }}</td>  
                                <td>{{ $val->date_debut }}</td>  
                                <td>{{ $val->date_fin }}</td>  
                                <td>{{ $val->etat }}</td>  
                             <td>
                                <div class="d-flex gap-2 w-100 justify-content-end">
                                    <a class="btn btn-warning btn-sm" href="">
                                        Details
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="">
                                        Modifier
                                    </a>
                                    <form action="" method="post">
                                        @csrf
                                        @method("DELETE")
                                                <button onclick="return confirm('Êtes-vous sûr ?')"
                                                type="submit" class="btn btn-danger btn-sm">
                                                    Supprimer
                                                </button>
                                    </form>
                                </div>
                             </td>
                            </tr>
                        @endforeach
                    </tbody>         
                </table>
            </div>

 </x-app-layout>