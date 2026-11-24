<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Коллекции из меню шапки
        $collections = Category::create(['name' => 'Collections', 'slug' => 'collections']);
        foreach (['Anastasia', 'Frozen', 'H₂0', 'Raya and the Last Dragon', 'The Swan Princess', 'W.i.t.c.h.', 'Winx Club'] as $i => $name) {
            Category::create([
                'parent_id' => $collections->id,
                'name' => $name,
                'slug' => Str::slug(str_replace('₂', '2', $name)),
                'sort_order' => $i,
            ]);
        }

        // «Shop by category»
        $types = Category::create(['name' => 'Jewelry', 'slug' => 'jewelry']);
        foreach (['Necklaces', 'Rings', 'Earrings', 'Bracelets'] as $i => $name) {
            Category::create([
                'parent_id' => $types->id,
                'name' => $name,
                'slug' => Str::slug($name),
                'sort_order' => $i,
            ]);
        }
    }
}
