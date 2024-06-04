<x-app-layout>
    <x-slot name="header">
        {{--  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Candidat') }}
        </h2>  --}}
    </x-slot>
{{--  <p>Bienvenue {{ Auth::user()->name }}</p>  --}}

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
<div class="container">
    {{--  <h1>test</h1>  --}}
    
    <div class="row">
        <div class="col-lg-6 ">
        </div>  
        <div class="col-lg-6 ">
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Ajouter un Document</a>
            {{--  @if(auth()->user())  --}}
            {{--  <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Libelle</th>
                        <th>Document</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead> 
                <tbody>
                        <tr>
                            <td>{{ $media->libelle }}</td>  
                            <td>{{ $media->document }}</td>
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
                </tbody>         
            </table>
            @endif  --}}
        </div>
    </div>
</div>











</x-app-layout>
