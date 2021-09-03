<div>
    <div class="d-flex flex-row flex-wrap p-2 justify-content-center align-items-center">
        @if($this->count < 1)

            @foreach($pokemons as $pokemon)
                <div class="card m-2">
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$pokemon->name}}</h4>
                    </div>
                    <div class="card-footer">
                        <button class="btn bg-primary text-white m-2" wire:click="seeAbility('{{$pokemon->url}}')" >
                            See Ability
                        </button>
                    </div>
                </div>
            @endforeach

        @else
            @if(\Auth::check())
                <span wire:click="back">{{\Auth::user()}}</span>
                @foreach($ability as $ability)
                    <ul>
                        <li>{{$ability->ability->name}}</li>
                    </ul>
                @endforeach
            @else
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <h3>Debes estar autenticado para visualizar las abilidades del pokemon</h3>
                    <button class="btn bg-danger text-white" ><a href="/login" >Autenticate</a></button>
                </div>    
            @endif
        @endif
    </div>
</div>
