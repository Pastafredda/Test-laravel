<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rabbit;
use App\Models\Farmer;

class RabbitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rabbits = Rabbit :: factory()-> count(100) -> make();

        foreach($rabbits as $rabbit){

            $farmer = Farmer :: inRandomOrder()-> first();

            $rabbit-> farmer_id = $farmer -> id;
            $rabbit -> save();
        }
    }
}
