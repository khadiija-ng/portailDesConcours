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
                {{ __('Liste Des Utilisateurs') }}
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
               
                {{--  <th>id</th>  --}}
                {{--  <th>Image</th>  --}}
                {{--  <th>Description</th>  --}}
                <th class="text-end">Actions</th>
            </tr>
        </thead> 
        @if(isset($users))
        <tbody>
            @foreach ($users as $val)
                <tr>
                    <td>{{ $val->name }}</td>  
                    <td>{{ $val->prenom }}</td>  
                    <td>{{ $val->email }}</td>  
                   
                    {{--  <td>{{ $val->id }}</td>    --}}

                    {{--  <td>{{ $val->image }}</td>  --}}
                    {{--  <td>{{ $val->description }}</td>   --}}
                 <td>
                    <div class="d-flex gap-2 w-100 justify-content-end">
                        <a class="btn btn-warning btn-sm" href="">
                            Details
                        </a>
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
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
        </div>
</x-app-layout>