<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
        'name'=> 'high tech',
        'slug'=>'high-tech'
       ]);

       Category::create([
        'name'=> 'livres',
        'slug'=>'livres'
       ]);

       Category::create([
        'name'=> 'meubles',
        'slug'=>'meubles'
       ]);

       Category::create([
        'name'=> 'jeux',
        'slug'=>'jeux'
       ]);

       Category::create([
        'name'=> 'nourriture',
        'slug'=>'nourriture '
       ]);

}
}