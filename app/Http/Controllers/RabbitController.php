<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rabbit;
use App\Models\Farmer;

class RabbitController extends Controller
{
    public function index(){

        $rabbits = Rabbit :: all();
        return view('/pages.rabbit-index', compact('rabbits'));
    }

    public function show($id){
        $rabbit = Rabbit :: findOrFail($id);

        return view('pages.rabbit-show', compact('rabbit'));
    }

    public function create(){
        $farmers = Farmer :: all();
        return view('pages.rabbit-create', compact('farmers'));
    }

    public function store(Request $request){
        $data = $request -> validate($this -> getValidations(),$this -> getValidationsMessage());
        $rabbit=Rabbit :: create($data);
        return redirect()-> route('rabbit-show', $rabbit ->id);
    }

    public function edit($id){
        $rabbit = Rabbit :: findOrFail($id);
        $farmers = Farmer :: all();
        return view('pages.rabbit-edit', compact('farmers', 'rabbit'));
    }

    public function update(Request $request, $id){
        $data = $request -> validate($this -> getValidations(),$this -> getValidationsMessage());
        $rabbit = Rabbit :: findOrFail($id);
        $rabbit ->update($data);
        return redirect()-> route('rabbit-show', $rabbit ->id);

    }

    public function delete ($id){
        $rabbit = Rabbit :: findOrFail($id);
        $rabbit -> delete();
        return redirect() ->route('rabbit-index');
    }

    private function getValidations(){
        return[
            "name" => "required|string|min:3|max:64",
            "code" => "required|string|min:10|max:10",
            "weight" => "required|integer",
            "farmer_id" => "required|integer"
        ];
    }

    private function getValidationsMessage(){
        return[
            "name.required" => "Inserisci un nome perfavore",
            "name.min" => "Inserisci un nome con minimo 3 caratteri",
            "name.max" => "Perfavore non superare i 64 caratteri",
            "code.required" => "Inserisci un codice perfavore",
            "code.min" => "Il codice deve essere di 10 caratteri",
            "code.max" => "Il codice deve essere di 10 caratteri",
            "weight.required" => "Inserisci il peso perfavore",
            "weight.integer" =>"Inserisci un peso valido",
            "farmer_id.required" => "Inserisci un proprietario perfavore"
        ];
    }
}
