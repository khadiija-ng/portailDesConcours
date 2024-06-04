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
            <form method="POST" action="{{ route('concours.store') }}" enctype="multipart/form-data">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="nom" :value="__('Nom')" />
                    <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>
        
                <div>

                    <x-input-label for="description" :value="__('Description')" />
                    <textarea  id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" required rows="5"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="date_debut" :value="__('Date Debut')" />
                    <x-text-input id="date_debut" class="block mt-1 w-full" type="date" name="date_debut" :value="old('date_debut')" required autofocus autocomplete="date_debut" />
                    <x-input-error :messages="$errors->get('date_debut')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="date_fin" :value="__('Date Fin')" />
                    <x-text-input id="date_fin" class="block mt-1 w-full" type="date" name="date_fin" :value="old('date_fin')" required autofocus autocomplete="date_fin" />
                    <x-input-error :messages="$errors->get('date_fin')" class="mt-2" />
                </div>

                <div>
                    <input type="radio" name="etat" value="1"> Ouvert<br>
                    <input type="radio" name="etat" value="0"> Fermé<br>
                    {{--  <x-input-label for="etat" :value="__('Etat')" />
                    <x-text-input id="etat" class="block mt-1 w-full" type="number" name="etat" :value="old('etat')" required autofocus autocomplete="etat" />  --}}
                    <x-input-error :messages="$errors->get('etat')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="Frais" :value="__('Frais')" />
                    <x-text-input id="Frais" class="block mt-1 w-full" type="text" name="Frais" :value="old('Frais')" required autofocus autocomplete="Frais" />
                    <x-input-error :messages="$errors->get('Frais')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <input type="file" name="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div >
                    {{--  hidden='Auth()->user()->role_id == 2 ?  "hidden" : " "'  --}}
                    {{--  <x-text-input id="etablissement" class="block mt-1 w-full" type="hidden" name="etablissement_id" :value="$etablissement->id"  />  --}}
                        <select name="etablissement_id" id="etablissement">
                            @foreach ($etablissement as  $val)
                                <option value="{{ $val->id }}">{{ $val->libelle }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Ajouter') }}
                    </x-primary-button>
                </div>
                
            </form>
           </div>
    </x-app-layout>