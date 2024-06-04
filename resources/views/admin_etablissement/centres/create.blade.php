<x-app-layout>
    <style>
        .container {
            justify-content: center;
            align-items: center;
            width: 60%; 
            margin: 0 auto;
        }
       form div{
            padding: 5px;
        }
       
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajout Un Centre') }}
        </h2>
    </x-slot>
       <div class="container">
        <form method="POST" action="{{ route('centre.store') }}">
            @csrf
            <input type="hidden" name="etablissement_id" value="{{ $etablissement->id }}">
            <!-- Name -->
            <div>
                <x-input-label for="nom" :value="__('Centre')" />
                <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Ajouter') }}
                </x-primary-button>
            </div>
            
        </form>
       </div>
</x-app-layout>