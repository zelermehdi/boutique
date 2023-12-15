<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\Produc; // Utilisez le modèle "Product"

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 30; $i++) {
            $product = Produc::create([
                'title' => $faker->sentence(4),
                'slug' => $faker->slug,
                'subtitle' => $faker->sentence(5),
                'description' => $faker->text,
                'price' => $faker->numberBetween(15, 300) * 100,
                'image' => 'https://via.placeholder.com/200x250',
            ]);

            // Vous devez associer les produits à des catégories en utilisant attach() comme suit :
            $categories = [rand(1, 5), rand(1, 5)];
            $product->categories()->attach($categories);
            
        }
    }
}
