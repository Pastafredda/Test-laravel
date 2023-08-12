<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Farm;
use App\Models\Rabbit;




class FarmerController extends Controller
{
    public function index(){

        $farmers = Farmer :: all();
        return view('pages.farmer-index', compact('farmers'));
    }

    public function show($id){
        $farmer = Farmer :: findOrFail($id);
        return view('pages.farmer-show',compact('farmer'));
    }

    public function create(){

        $farms = Farm :: all();
        return view('pages.farmer-create',compact('farms'));
    }

    // public function store(Request $request){
    //     $data = $request ->all();
    //     $farmer = Farmer :: create($data);
    //     $farmer -> farms()->attach($data['farms']);

    //     return redirect() -> route('farmer-show', $farmer -> id);
    // }

    public function store(Request $request) {
        $data = $request->all();

        if (array_key_exists('farms', $data)) {
            $farmer = Farmer::create($data);
            $farmer->farms()->attach($data['farms']);
        } else {
            $farmer = Farmer::create($data);
        }

        return redirect()->route('farmer-show', $farmer->id);
    }

    public function edit ($id){
        $farmer = Farmer :: findOrFail($id);
        $farms = Farm :: all();

        return view('pages.farmer-edit',compact('farms', 'farmer'));
    }

    public function update(Request $request,$id){
        $farmer = Farmer :: findOrFail($id);
        $data = $request->all();
        $farmer ->update($data);
        $farmer ->farms()->sync($data['farms']);

        return view('pages.farmer-show',compact('farmer'));

    }

    public function delete ($id){
        $farmer = Farmer :: findOrFail($id);

        foreach($farmer -> rabbits as $rabbit){
            $rabbit ->delete();
        }

        $farmer ->farms()->detach();

        $farmer -> delete();

        return redirect() ->route('farmer-index');
    }

}

