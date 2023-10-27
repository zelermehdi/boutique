<?php

namespace Database\Seeders;
use Faker\Factory as FakerFactory;

use App\Models\Produc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = FakerFactory::create();
        for ($i = 0; $i < 30; $i++) {
     Produc::create([

'title'=> $faker->sentence(4),
'slug'=> $faker->slug,
'subtitle'=> $faker->sentence(5),
'description'=> $faker->text,
'price'=> $faker->numberBetween(15,300)*100,

'image'=>'https://via.placeholder.com/200x250'

        ]);
        
        
        }
}
}
