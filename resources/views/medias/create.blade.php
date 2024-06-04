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
            {{ __('Ajout Document') }}
        </h2>
    </x-slot>
       <div class="container">
        <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <!-- Name -->
            <div>
                <x-input-label for="libelle" :value="__('Libelle')" />
                <x-text-input id="libelle" class="block mt-1 w-full" type="text" name="libelle" :value="old('libelle')" required autofocus autocomplete="libelle" />
                <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="document" :value="__('Document')" />
                <input type="file" name="document">
                <x-input-error :messages="$errors->get('document')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Ajouter') }}
                </x-primary-button>
            </div>
            
        </form>
       </div>
</x-app-layout>