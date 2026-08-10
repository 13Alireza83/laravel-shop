<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ۱. دسته‌بندی رو چک کن (اگه نیست بساز)
        $category = Category::first();
        if (!$category) {
            $category = Category::create([
                'name' => 'الکترونیک',
                'slug' => 'electronics',
                'description' => 'محصولات الکترونیکی',
                'is_active' => true,
            ]);
        }

        // ۲. محصولات نمونه
        $products = [
            [
                'name' => 'لپ‌تاپ ایسوس',
                'slug' => 'asus-laptop',
                'description' => 'لپ‌تاپ ایسوس مدل ۲۰۲۴',
                'price' => 25000000,
                'stock' => 10,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'گوشی سامسونگ',
                'slug' => 'samsung-phone',
                'description' => 'گوشی سامسونگ گلکسی S24',
                'price' => 18000000,
                'stock' => 5,
                'category_id' => $category->id,
                'is_active' => true,
            ],
            [
                'name' => 'پیراهن مردانه',
                'slug' => 'men-shirt',
                'description' => 'پیراهن مردانه طرح دار',
                'price' => 500000,
                'stock' => 20,
                'category_id' => $category->id,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('✅ محصولات نمونه با موفقیت وارد شدند!');
    }

}
