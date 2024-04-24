<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class FakeDataTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@gmail.com'
        ]);

        $categories = [
            'Actualités' => [
                'Politique',
                'Économie',
                'Sport'
            ],
            'Divertissement' => [
                'Cinéma',
                'Musique',
                'Sorties'
            ],
            'Technologie' => [
                'Informatique' => [
                    'Ordinateurs de bureau',
                    'PC portable',
                    'Connexion internet'
                ],
                'Gadgets' => [
                    'Smartphones',
                    'Tablettes',
                    'Jeux vidéo'
                ]
            ],
            'Santé' => [
                'Médecine',
                'Bien-être'
            ]
        ];

        $this->saveCategories($categories);

        Category::query()
            ->eachById(function ($category) {
                News::factory()
                    ->times(mt_rand(10, 20))->create([
                        'category_id' => $category->id,
                    ]);
            });
    }

    protected function saveCategories($categories, $parent = null)
    {

        foreach ($categories as $key => $category) {
            $parentCategory = Category::query()
                ->create([
                    'name' => is_array($category) ? $key : $category,
                ]);

            if ($parent) {
                $parentCategory->parent()->associate($parent);
                $parentCategory->save();
            }

            if (is_array($category)) {
                $this->saveCategories($category, $parentCategory);
            }
        }
    }

}
