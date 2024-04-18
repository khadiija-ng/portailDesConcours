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
            {{ __('Ajout etablissement') }}
        </h2>
    </x-slot>
       <div class="container">
        <form method="POST" action="{{ route('etablissements.store') }}" enctype="multipart/form-data">
            @csrf
    
            <!-- Name -->
            <div>
                <x-input-label for="libelle" :value="__('Libelle')" />
                <x-text-input id="libelle" class="block mt-1 w-full" type="text" name="libelle" :value="old('libelle')" required autofocus autocomplete="libelle" />
                <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="sigle" :value="__('Sigle')" />
                <x-text-input id="sigle" class="block mt-1 w-full" type="text" name="sigle" :value="old('sigle')" required autofocus autocomplete="sigle" />
                <x-input-error :messages="$errors->get('sigle')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="logo" :value="__('Logo')" />
                <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" required autofocus autocomplete="logo" />
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Adresse')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Ajouter') }}
                </x-primary-button>
            </div>
            
        </form>
       </div>
</x-app-layout>