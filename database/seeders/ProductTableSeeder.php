<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'name' => $faker->words(3, true),
                'slug' => Str::slug($faker->words(3, true)),
                'description' => $faker->paragraph(5),
                'short_description' => $faker->sentence(),
                'sku' => strtoupper(Str::random(10)),
                'price' => $faker->randomFloat(2, 50, 500),
                'sale_price' => $faker->randomElement([null, $faker->randomFloat(2, 30, 400)]),
                'quantity' => $faker->numberBetween(1, 100),
                
                'tags' => json_encode([$faker->word, $faker->word, $faker->word]),
                'image' => $faker->imageUrl(300, 300, 'fashion', true, 'handbag'),
                'gallery_images' => json_encode([
                    $faker->imageUrl(300, 300, 'fashion'),
                    $faker->imageUrl(300, 300, 'fashion'),
                    $faker->imageUrl(300, 300, 'fashion')
                ]),
                'colors' => json_encode($faker->randomElements(['Black', 'Brown', 'Tan', 'Red', 'Blue'], 3)),
                'size' => json_encode($faker->randomElements(['Small', 'Medium', 'Large'], 2)),
                'ingredients' => $faker->sentence(8),
                'skin_type' => $faker->randomElement(['oily', 'dry', 'sensitive', 'combination', 'normal']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

