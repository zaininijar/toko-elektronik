<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            // HANNOCHS GENIUS
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS GENIUS',
                'price' => 70000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/EnFrsmNplk',
                'spesification' => '6 WATT',
                'description' => 'HANNOCHS GENIUS - Pencahayaan cerdas dengan daya 6 WATT. Cocok untuk menciptakan atmosfer hangat di berbagai ruangan. Harga: Rp 70.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS GENIUS',
                'price' => 75000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/NdHcAbBHSc',
                'spesification' => '8 WATT',
                'description' => 'HANNOCHS GENIUS - Memberikan pencahayaan optimal dengan daya 8 WATT. Desain elegan untuk penambahan sentuhan modern. Harga: Rp 75.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS GENIUS',
                'price' => 90000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/lHQPQSrbGv',
                'spesification' => '10 WATT',
                'description' => 'HANNOCHS GENIUS - Keajaiban pencahayaan dengan daya 10 WATT. Tawarkan cahaya hangat dan nyaman di setiap sudut ruangan. Harga: Rp 90.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS GENIUS',
                'price' => 107000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/rWmhGgJZYg',
                'spesification' => '12 WATT',
                'description' => 'HANNOCHS GENIUS - Daya penuh 12 WATT untuk pencahayaan intens dan efisien. Desain stylish untuk ruangan yang elegan. Harga: Rp 107.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS GENIUS',
                'price' => 132000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/bdVLFhlpUU',
                'spesification' => '15 WATT',
                'description' => 'HANNOCHS GENIUS - Menghadirkan cahaya luar biasa dengan daya 15 WATT. Ideal untuk menciptakan suasana yang menyenangkan. Harga: Rp 132.000.',
            ],

            // HANNOCHS DAKOTA
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS DAKOTA',
                'price' => 21000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/pylFYeEDfs',
                'spesification' => '10 WATT',
                'description' => 'HANNOCHS DAKOTA - Pencahayaan kuat dengan daya 10 WATT. Desain yang stylish untuk tampilan yang modern. Harga: Rp 21.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS DAKOTA',
                'price' => 27000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/moUdOrNldl',
                'spesification' => '15 WATT',
                'description' => 'HANNOCHS DAKOTA - Daya penuh 15 WATT untuk pencahayaan yang efisien. Ideal untuk berbagai kebutuhan ruangan. Harga: Rp 27.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS DAKOTA',
                'price' => 32000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/GbGHmEYeNo',
                'spesification' => '20 WATT',
                'description' => 'HANNOCHS DAKOTA - Daya besar 20 WATT untuk pencahayaan yang luar biasa. Desain yang modern untuk tampilan yang menarik. Harga: Rp 32.000.',
            ],

            // HANNOCHS SONIC
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS SONIC',
                'price' => 12000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/szGXMSoDSQ',
                'spesification' => '3 WATT',
                'description' => 'HANNOCHS SONIC - Pencahayaan hemat energi dengan daya 3 WATT. Cocok untuk ruangan yang memerlukan cahaya lembut. Harga: Rp 12.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS SONIC',
                'price' => 15000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/CmqvByEqfE',
                'spesification' => '5 WATT',
                'description' => 'HANNOCHS SONIC - Cahaya nyaman dengan daya 5 WATT. Desain yang kompak untuk penggunaan yang praktis. Harga: Rp 15.000.',
            ],

            // HANNOCHS ESSENTIAL GREEN
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 28000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/KxdhvwwOsd',
                'spesification' => '11 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Daya 11 WATT untuk pencahayaan yang cerah. Desain hijau yang ramah lingkungan. Harga: Rp 28.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 29000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/XQdsHFLYTk',
                'spesification' => '14 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Daya 14 WATT untuk pencahayaan yang efisien. Cocok untuk berbagai ruangan. Harga: Rp 29.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 34000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/kUPvZyZIss',
                'spesification' => '18 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Keajaiban pencahayaan dengan daya 18 WATT. Cocok untuk ruangan yang membutuhkan cahaya intens. Harga: Rp 34.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 36000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/RQropkJFKH',
                'spesification' => '23 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Daya 23 WATT untuk pencahayaan yang optimal. Desain yang modern untuk tampilan yang menarik. Harga: Rp 36.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 38000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/FwOmzLrrqu',
                'spesification' => '26 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Daya 26 WATT untuk pencahayaan yang efisien dan intens. Harga: Rp 38.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 54000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/NgNwBWSGtw',
                'spesification' => '36 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Pencahayaan optimal dengan daya 36 WATT. Desain yang modern untuk kebutuhan ruangan yang beragam. Harga: Rp 54.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 69000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/VORQUTtKBQ',
                'spesification' => '45 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Daya 45 WATT untuk pencahayaan luar biasa. Cocok untuk ruangan yang membutuhkan cahaya kuat. Harga: Rp 69.000.',
            ],
            [
                'product_category_id' => 1,
                'name' => 'HANNOCHS ESSENTIAL GREEN',
                'price' => 93000,
                'quantity' => mt_rand(1, 100),
                'picture_path' => 'https://source.unsplash.com/random/kdCaOdhovc',
                'spesification' => '62 WATT',
                'description' => 'HANNOCHS ESSENTIAL GREEN - Daya 62 WATT untuk pencahayaan optimal dan intens. Harga: Rp 93.000.',
            ],
        ];


        \App\Models\Product::insert($product);
    }
}
