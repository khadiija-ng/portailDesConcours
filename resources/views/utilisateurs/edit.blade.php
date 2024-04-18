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
            {{ __('Ajout Utilisateur') }}
        </h2>
    </x-slot>
       <div class="container">
        <form action="{{ route('utilisateur.update', $user->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
              <x-input-label for="name" :value="__('Nom')"/>
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2"/>
          </div>
  
          <div>
              <x-input-label for="prenom" :value="__('Prenom')" />
              <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" value="{{ $user->prenom }}" required autofocus autocomplete="prenom" />
              <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
          </div>
{{--    
          <div>
              <x-input-label for="date_de_naissance" :value="__('Date de Naissance')" />
              <x-text-input id="date_de_naissance" class="block mt-1 w-full" type="date" name="date_de_naissance" value="{{ $user->date_de_naissance }}" required autofocus autocomplete="date_de_naissance" />
              <x-input-error :messages="$errors->get('date_de_naissance')" class="mt-2" />
          </div>
           <div>
              <x-input-label for="lieu_de_naissance" :value="__('Lieu de Naissance')" />
              <x-text-input id="lieu_de_naissance" class="block mt-1 w-full" type="text" name="lieu_de_naissance" value="{{ $user->lieu_de_naissance }}" required autofocus autocomplete="lieu_de_naissance" />
              <x-input-error :messages="$errors->get('lieu_de_naissance')" class="mt-2" />
          </div>
          <div>
              <x-input-label for="address" :value="__('Adresse Permanente')" />
              <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $user->address }}" required autofocus autocomplete="address" />
              <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>  --}}
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
          {{--  <!-- Email Address -->
           <div>
              <x-input-label for="nationalite" :value="__('Nationalite')" />
              <x-text-input id="nationalite" class="block mt-1 w-full" type="text" name="nationalite" value="{{ $user->nationalite }}" required autofocus autocomplete="nationalite" />
              <x-input-error :messages="$errors->get('nationalite')" class="mt-2" />
          </div>
          <div class="mt-4">
              <x-input-label for="email" :value="__('Email')" />
              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          <!-- phone -->
          <div class="mt-4">
              <x-input-label for="phone" :value="__('Phone')" />
              <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $user->phone }}" required autocomplete="phone" />
              <x-input-error :messages="$errors->get('phone')" class="mt-2" />
           </div>
       
        <div class="mt-4" hidden="hidden">
              <x-input-label for="password" :value="__('Password')" />
  
              <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              value="{{ $user->password }}"
                              required autocomplete="new-password" />
  
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>   --}}

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Modifier') }}
                </x-primary-button>
            </div>
            
        </form>
       </div>
</x-app-layout>