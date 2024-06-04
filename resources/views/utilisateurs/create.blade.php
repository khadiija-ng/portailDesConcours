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
            {{ __('Ajout Concour') }}
        </h2>
    </x-slot>
       <div class="container">
        <form method="POST" action="{{ route('utilisateur.store') }}" >
            @csrf
            <!-- Name -->
            <div>
              <x-input-label for="name" :value="__('Nom')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
  
          <div>
              <x-input-label for="prenom" :value="__('Prenom')" />
              <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
              <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
          </div>
  
  
          <div>
              <x-input-label for="date_de_naissance" :value="__('Date de Naissance')" />
              <x-text-input id="date_de_naissance" class="block mt-1 w-full" type="date" name="date_de_naissance" :value="old('date_de_naissance')" required autofocus autocomplete="date_de_naissance" />
              <x-input-error :messages="$errors->get('date_de_naissance')" class="mt-2" />
          </div>
           <div>
              <x-input-label for="lieu_de_naissance" :value="__('Lieu de Naissance')" />
              <x-text-input id="lieu_de_naissance" class="block mt-1 w-full" type="text" name="lieu_de_naissance" :value="old('lieu_de_naissance')" required autofocus autocomplete="lieu_de_naissance" />
              <x-input-error :messages="$errors->get('lieu_de_naissance')" class="mt-2" />
          </div>
          <div>
              <x-input-label for="address" :value="__('Adresse Permanente')" />
              <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
              <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>
          <!-- Email Address -->
           <div>
              <x-input-label for="nationalite" :value="__('Nationalite')" />
              <x-text-input id="nationalite" class="block mt-1 w-full" type="text" name="nationalite" :value="old('nationalite')" required autofocus autocomplete="nationalite" />
              <x-input-error :messages="$errors->get('nationalite')" class="mt-2" />
          </div>
          <div>
            <label for="serie">Sélectionnez votre serie :</label>
            <select class=""  name="serie" id="serie" >
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
                <option value="L2">L2</option>
                <option value="S4">S4</option>
                <option value="neant">neant</option>
            </select>
          </div>
          <div class="mt-4">
              <x-input-label for="email" :value="__('Email')" />
              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          <!-- phone -->
          <div class="mt-4">
              <x-input-label for="phone" :value="__('Phone')" />
              <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
              <x-input-error :messages="$errors->get('phone')" class="mt-2" />
           </div>

           <div>
            <select name="etablissement_id" id="etablissements">
                @foreach ($etablissements as  $etablissement)
                    <option value="{{ $etablissement->id }}">{{ $etablissement->libelle }}</option>
                @endforeach
            </select>
            </div>
            <div>
                <select name="role_id" id="roles">
                    @foreach ($roles as  $role)
                        <option value="{{ $role->id }}">{{ $role->titre }}</option>
                    @endforeach
                </select>
            </div>
           
          <!-- Password -->
          <div class="mt-4">
              <x-input-label for="password" :value="__('Password')" />
  
              <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
  
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
  
          <!-- Confirm Password -->
          {{--  <div class="mt-4">
              <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
  
              <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
  
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>  --}}

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Ajouter') }}
                </x-primary-button>
            </div>
            
        </form>
       </div>
</x-app-layout>