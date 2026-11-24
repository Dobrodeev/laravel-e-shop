<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $necklaces = Category::where('slug', 'necklaces')->firstOrFail();
        $collections = Category::where('slug', 'collections')->firstOrFail();

        // Товары из вёрстки
        $odette = Product::create([
            'name' => 'Odette necklace from “Swan princess” cartoon inspired',
            'slug' => 'odette-necklace',
            'sku' => 'GB-0001',
            'description' => 'Every princess deserves to have her own talisman that will bring her happiness.',
            'price' => 22,
            'old_price' => 31,
            'image' => 'img/slide3.jpg',
            'stock' => 10,
            'is_featured' => true,
        ]);
        $odette->categories()->attach([$necklaces->id, Category::where('slug', 'the-swan-princess')->value('id')]);
        foreach (range(0, 3) as $i) {
            $odette->images()->create(['path' => 'img/cartmini.jpg', 'sort_order' => $i]);
        }

        $paris = Product::create([
            'name' => 'Necklace “Together in Paris” classic version',
            'slug' => 'together-in-paris-classic',
            'sku' => 'GB-0002',
            'price' => 36,
            'old_price' => 51,
            'image' => 'img/cartmini.jpg',
            'stock' => 5,
        ]);
        $paris->categories()->attach([$necklaces->id, Category::where('slug', 'anastasia')->value('id')]);

        // Демо-товары: по 4 в каждой коллекции, один из них со скидкой
        $collections->children->each(function (Category $collection) use ($necklaces) {
            Product::factory()->count(3)->create()
                ->merge(Product::factory()->onSale()->count(1)->create())
                ->each(fn (Product $p) => $p->categories()->attach([$collection->id, $necklaces->id]));
        });
    }
}
