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
              
                {{ __('liste Des Candidats en') }} {{ $concour->nom }}
                 {{--  {{$etablissement->libelle}}  --}}
            
            </h2>
        </x-slot>
        <div class="container">
            <br>
            <br>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse e-mail</th>
                <th>Status</th>
               
                {{--  <th>id</th>  --}}
                {{--  <th>Image</th>  --}}
                {{--  <th>Description</th>  --}}
                <th class="text-end">Actions</th>
            </tr>
        </thead> 
        @if(isset($userInscrit))
        <tbody>
            @foreach ($userInscrit as $val)
                <tr>
                    <td>{{ $val->users->name }}</td>  
                    <td>{{ $val->users->prenom }}</td>  
                    <td>{{ $val->users->email }}</td>
                    <td>{{ $val->statut }}</td>  
                   
                    {{--  <td>{{ $val->id }}</td>    --}}

                    {{--  <td>{{ $val->image }}</td>  --}}
                    {{--  <td>{{ $val->description }}</td>   --}}
                 <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a class="btn btn-warning btn-sm" href="{{ route('detail',$val->id) }}">
                            Details
                        </a>
                        {{--  <a class="btn btn-primary btn-sm" href="">
                            Modifier
                        </a>  --}}
                        {{--  <a class="btn btn-primary btn-sm" href="{{route('utilisateur.edit', $val->id)}}">
                            Modifier
                        </a>
                        <form action="{{ route('utilisateur.destroy',$val->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                                    <button onclick="return confirm('Êtes-vous sûr ?')"
                                    type="submit" class="btn btn-danger btn-sm">
                                        Supprimer
                                    </button>
                        </form>  --}}
                    </div>
                 </td>
                </tr>
            @endforeach
        </tbody> 
        @endif        
    </table>
    <div class="position-relative">
        <div class="position-absolute start-50">
            {{ $userInscrit->links('pagination::bootstrap-4') }}
        </div>
    </div>
        </div>
</x-app-layout>