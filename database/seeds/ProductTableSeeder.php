<?php
use \Illuminate\Database\Seeder;
use MacPrata\Entities\Product;
use Faker\Generator as Faker;
class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB:table('products')->truncate();
        Product::create([
        ]);
    }
}