<div class="form-floating mb-3">
    <input value="@isset($concour->nom){{ $concour->nom }}@endisset" type="text" name="nom"
        id="nom" class="form-control" placeholder="nom Concour">
    <label for="title">Nom Concour</label>
    @error('nom')
        <div class="">{{ $message }} </div>
    @enderror
</div>
<div class="form-floating">
    <textarea name="description" id="description" class="form-control">
        @isset($product->description)
        {{ $product->description }}
@endisset
</textarea>
<label for="description">Description du produit</label>
</div>

<div class="form-floating mb-3">
    <input value="@isset($concour->date_debut){{ $concour->date_debut }}@endisset" type="date" name="date_debut"
        id="date_debut" class="form-control" placeholder="Date D ouverture">
    <label for="title">Date D ouverture</label>
    @error('date_debut')
        <div class="">{{ $message }} </div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input value="@isset($concour->date_fin){{ $concour->date_fin }}@endisset" type="date" name="date_fin"
        id="date_fin" class="form-control" placeholder="Date De Fermeture">
    <label for="title">Date De Fermeture</label>
    @error('date_fin')
        <div class="">{{ $message }} </div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input value="@isset($concour->image){{ $concour->image }}@endisset" type="text" name="image"
        id="image" class="form-control" placeholder="Image du concour">
    <label for="image">Image du concour</label>
    @error('image')
        <div class="">{{ $message }} </div>
    @enderror
</div>

<div class="form-floating mb-3">
    <input value="@isset($concour->etat){{ $concour->etat }}@endisset" type="number" name="etat"
        id="etat" class="form-control" placeholder="etat du concour">
    <label for="stock">Etat du concour</label>
</div>

<div class="form-floating mb-3">

    <select name="etablissement_id" id="etablissement_id" class="form-select">

        @if (isset($concour->etablissement_id))
            <option value="{{ $product->etablissement_id }}">
                {{ $concour->etablissement->name }}
            </option>
        @else
            <option checked>
                Choisisser l etablissement du concour
            </option>
        @endif


        @foreach ($etablissement as $val)
            @if (isset($concour->etablissement_id))
                @if ($concour->etablissement_id != $val->id)
                <option value="{{ $val->id }}">
                    {{ $val->name }}
                </option>
                @endif
                @else
                <option value="{{ $val->id }}">
                    {{ $val->name }}
                </option>
            @endif
            
        @endforeach
    </select>
    @error('category_id')
        <div class="">{{ $message }} </div>
    @enderror
</div>

<div class="form-check">
    <input id="status" type="checkbox" value="1" class="form-check-inoput" checked>
    <label for="status" class="form-check-label">
        Statut du produit
    </label>
</div>
