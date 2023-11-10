<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */function run(): void
    {
        Product::query()->insert([
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Черри Чиз',
                'description' => 'Изысканные помидорки Черри, насыщенный сыр Филадельфия и тягучая Моцарелла.',
                'image' => 'img/catalog/черричиз.jpg',
                'calories' => 272,
                'cost' => 590,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => '«Чикен Комбо»',
                'description' => 'Три наши топовые пиццы (23 см) - Чикен Рэнч, Чикен Барбекю и Куриный Жульен + литр клюквенного морса в одном комбо.',
                'image' => 'img/catalog/ветчинагрибы.webp',
                'calories' => 320,
                'cost' => 1920,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Пиццамен',
                'description' => 'Наша фирменная пицца – тягучая моцарелла, сочная куриная грудка и пепперони, поджаристый бекон, спелые томаты, шампиньоны, красный лук и ароматный чеснок. Посыпается пармезаном и свежей зеленью.',
                'image' => 'img/catalog/пиццамен.jpg',
                'calories' => 242,
                'cost' => 590,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Пепперони',
                'description' => 'Классический рецепт пиццы пепперони – пикантные колбаски пепперони со свежими шампиньонами и сыром моцарелла.',
                'image' => 'img/catalog/пепперони.jpg',
                'calories' => 264,
                'cost' => 530,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Классика',
                'description' => 'Классическое сочетание пикантных колбасок пепперони и ветчины, свежих шампиньонов с сырами моцарелла и пармезан.',
                'image' => 'img/catalog/классика.jpg',
                'calories' => 235,
                'cost' => 600,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Мясная',
                'description' => 'Изысканное сочетание куриной грудки, свинины, ветчины, поджаристого бекона и колбасок пепперони в сочетании с сыром моцарелла.',
                'image' => 'img/catalog/мясная.jpg',
                'calories' => 580,
                'cost' => 580,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Гавайская',
                'description' => 'Сочетание сладкого ананаса, ветчины и сыра моцарелла.',
                'image' => 'img/catalog/гавайская.jpg',
                'calories' => 230,
                'cost' => 530,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Маргарита',
                'description' => 'Сочные тепличные томаты и нежный сыр моцарелла.',
                'image' => 'img/catalog/маргарита.jpg',
                'calories' => 230,
                'cost' => 490,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Домашняя',
                'description' => 'Спелые томаты, шампиньоны, ветчина и сыр моцарелла, посыпается пармезаном и ароматной свежей зеленью.',
                'image' => 'img/catalog/домашняя.jpg',
                'calories' => 220,
                'cost' => 630,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-6 months', now()),
                'name' => 'Куриный жульен',
                'description' => 'Пряный горчичный соус, сыр моцарелла, ароматный чеснок и красный лук, куриная грудка и свежие шампиньоны.',
                'image' => 'img/catalog/куржульен.jpg',
                'calories' => 260,
                'cost' => 610,
            ],
        ]);
    }
}
