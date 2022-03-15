<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PokeIndex extends Component
{

    public $pokemons;

    public $ability;

    public $count;

    protected $listeners = [
        'alert' => 'alert'
    ];

    public function mount()
    {
        $response = Http::withOptions(["verify" => false])->get('https://pokeapi.co/api/v2/pokemon?limit=100&offset=200');

        $response->body = json_decode($response->body());
        $this->pokemons = $response->body->results;
//         dd($this->pokemons);
    }

    public function seeAbility($url)
    {
        $response = Http::withOptions(["verify" => false])->get($url);
        $response->body = json_decode($response->body());

        $this->ability = $response->body->abilities;
        $this->count = count($this->ability);

        $this->mount();
    }

    public function back()
    {
        $this->ability = [];
    }

    public function alert()
    {
        $this->alert('warning', 'Autenticate!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }

    public function render()
    {
        return view('livewire.poke-index', ['pokemons' => $this->pokemons , 'ability' => $this->ability]);
    }
}
