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
     */
    public function run(): void
    {
        Product::query()->insert([
            [
                'created_at' => now(),
                'name' => 'Черри Чиз',
                'description' => 'Изысканные помидорки Черри, насыщенный сыр Филадельфия и тягучая Моцарелла.',
                'image' => '/public/img/cherri-chiz.webp',
                'calories' => 272,
                'cost' => 590,
            ],
            [
                'name' => '«Чикен Комбо»',
                'description' => 'Три наши топовые пиццы (23 см) - Чикен Рэнч, Чикен Барбекю и Куриный Жульен + литр клюквенного морса в одном комбо.',
                'image' => '/public/img/Чикен Комбо.webp',
                'calories' => 320,
                'cost' => 1920,
            ],
            [
                'name' => 'Пиццамен',
                'description' => 'Наша фирменная пицца – тягучая моцарелла, сочная куриная грудка и пепперони, поджаристый бекон, спелые томаты, шампиньоны, красный лук и ароматный чеснок. Посыпается пармезаном и свежей зеленью.',
                'image' => '/public/img/пиццамен.webp',
                'calories' => 242,
                'cost' => 590,
            ],
            [
                'name' => 'Пепперони',
                'description' => 'Классический рецепт пиццы пепперони – пикантные колбаски пепперони со свежими шампиньонами и сыром моцарелла.',
                'image' => '/public/img/пепперони.webp',
                'calories' => 264,
                'cost' => 530,
            ],
            [
                'name' => 'Классика',
                'description' => 'Классическое сочетание пикантных колбасок пепперони и ветчины, свежих шампиньонов с сырами моцарелла и пармезан.',
                'image' => '/public/img/классика.webp',
                'calories' => 235,
                'cost' => 600,
            ],
            [
                'name' => 'Мясная',
                'description' => 'Изысканное сочетание куриной грудки, свинины, ветчины, поджаристого бекона и колбасок пепперони в сочетании с сыром моцарелла.',
                'image' => '/public/img/Мясная.webp',
                'calories' => 580,
                'cost' => 580,
            ],
            [
                'name' => 'Гавайская',
                'description' => 'Сочетание сладкого ананаса, ветчины и сыра моцарелла.',
                'image' => '/public/img/гавайская.webp',
                'calories' => 230,
                'cost' => 530,
            ],
            [
                'name' => 'Маргарита',
                'description' => 'Сочные тепличные томаты и нежный сыр моцарелла.',
                'image' => '/public/img/маргарита.webp',
                'calories' => 230,
                'cost' => 490,
            ],
            [
                'name' => 'Домашняя',
                'description' => 'Спелые томаты, шампиньоны, ветчина и сыр моцарелла, посыпается пармезаном и ароматной свежей зеленью.',
                'image' => '/public/img/домашняя.webp',
                'calories' => 220,
                'cost' => 630,
            ],
            [
                'name' => 'Куриный жульен',
                'description' => 'Пряный горчичный соус, сыр моцарелла, ароматный чеснок и красный лук, куриная грудка и свежие шампиньоны.',
                'image' => '/public/img/кур жульен.webp',
                'calories' => 260,
                'cost' => 610,
            ],
        ]);
    }
}
