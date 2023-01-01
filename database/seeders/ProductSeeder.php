<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(

            [
                [
                    'image' => 'images/products/Textured Polo Shirt.jpg',
                    'name' => 'Textured Polo Shirt',
                    'description' => 'Collared polo shirt with a front button fastening and short sleeves. Vents at the hem. Available size: M.',
                    'price' => 799000,
                    'stock' => 10,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Printed Knit Jacket.jpg',
                    'name' => 'Printed Knit Jacket',
                    'description' => 'Knit jacket featuring a round neck and long sleeves. Contrast prints all over the garment. Ribbed trims. Button-up front. Available size: L.',
                    'price' => 1299000,
                    'stock' => 5,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/High Neck Sweater with Zip.jpg',
                    'name' => 'High Neck Sweater with Zip',
                    'description' => 'Long sleeve sweater made of spun cotton fabric. High neck with front zip fastening collar and ribbed trims. Available size: L.',
                    'price' => 799000,
                    'stock' => 5,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Bomber Jacket with Patches.jpg',
                    'name' => 'Bomber Jacket with Patches',
                    'description' => 'Varsity jacket made of combined fabrics, slightly padded on the inside. Jetted hip pockets and inside pocket detail. Contrast patches and embroidery on the front and back. Ribbed trims. Snap-button front. Available size: L.',
                    'price' => 1899000,
                    'stock' => 3,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Slim Fit Chinos.jpg',
                    'name' => 'Slim Fit Chinos',
                    'description' => 'Slim fit trousers made of stretchy cotton fabric. Featuring front pockets, rear buttoned well pockets and zip fly and top button fastening. Available size: M.',
                    'price' => 799000,
                    'stock' => 10,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Printed Knit Joggers.jpg',
                    'name' => 'Printed Knit Joggers',
                    'description' => 'Trousers featuring an elastic waistband with drawstrings. Front pockets and rear pocket detail. Contrast prints all over the garment. Ribbed hems. Available size: M.',
                    'price' => 999000,
                    'stock' => 5,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Knit Cargo Trousers.jpg',
                    'name' => 'Knit Cargo Trousers',
                    'description' => 'Trousers made of spun cotton. Adjustable elastic waistband. Front pockets and back pocket detail. Patch pockets on the legs. Ribbed cuffs. Available size: M.',
                    'price' => 699000,
                    'stock' => 5,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Premium Slim Fit Jeans.jpg',
                    'name' => 'Premium Slim Fit Jeans',
                    'description' => 'Slim fit jeans. Five pockets. Front zip fly and button fastening. Available size: M.',
                    'price' => 799000,
                    'stock' => 20,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Basic Tulle T-Shirt.jpg',
                    'name' => 'Basic Tulle T-Shirt',
                    'description' => 'Semi-sheer top with a high neck and long sleeves. Available size: M.',
                    'price' => 399000,
                    'stock' => 4,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Striped Oversize Shirt.jpg',
                    'name' => 'Striped Oversize Shirt',
                    'description' => 'Satin shirt with a johnny collar, long sleeves and a button-up front. Available size: L.',
                    'price' => 899000,
                    'stock' => 12,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Semi-Sheer Shirt with Patch Pockets.jpg',
                    'name' => 'Semi-Sheer Shirt with Patch Pockets',
                    'description' => 'Printed collared shirt with a V-neckline and long sleeves. Front patch pockets. Button-up front with matching covered buttons. Available size: L.',
                    'price' => 999000,
                    'stock' => 2,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Ribbed Knit Cardigan.jpg',
                    'name' => 'Ribbed Knit Cardigan',
                    'description' => 'V-neck cardigan with long sleeves and front button fastening. Available size: L.',
                    'price' => 1199000,
                    'stock' => 8,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Plush Jogging Trousers.jpg',
                    'name' => 'Plush Jogging Trousers',
                    'description' => 'High-waist trousers featuring an adjustable elastic drawstring waistband, side pockets and elastic cuffed hems. Available size: M.',
                    'price' => 699000,
                    'stock' => 4,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Box Pleat Skorts.jpg',
                    'name' => 'Box Pleat Skorts',
                    'description' => 'High-waist skort with box pleats. Invisible size zip fastening. Available size: M.',
                    'price' => 899000,
                    'stock' => 10,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Faux Leather Straight Trousers.jpg',
                    'name' => 'Faux Leather Straight Trousers',
                    'description' => 'Mid-rise trousers with five pockets. Straight long legs. Zip fly and metal top button fastening. Available size: M.',
                    'price' => 1099000,
                    'stock' => 2,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Faux Leather Midi Skirt.jpg',
                    'name' => 'Faux Leather Midi Skirt',
                    'description' => 'High-waist midi skirt. Side pockets. Front zip fly and metal hook fastening. Available size: M.',
                    'price' => 1199000,
                    'stock' => 11,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Floral Jacquard Jacket.jpg',
                    'name' => 'Floral Jacquard Jacket',
                    'description' => 'Jacket with a lightly padded interior. Lapel collar and long sleeves with buttoned cuffs. Hip welt pockets. Button-up front. Available size: L.',
                    'price' => 2699000,
                    'stock' => 2,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Faux Leather Belted Jumpsuit.jpg',
                    'name' => 'Faux Leather Belted Jumpsuit',
                    'description' => 'Jumpsuit with lapel collar and V-neck. Featuring long sleeves and patch pockets on the front and back. Matching belt with a golden buckle. Straight leg. Front fastening with zip and matching covered buttons. Available size: M.',
                    'price' => 1799000,
                    'stock' => 4,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ],

                [
                    'image' => 'images/products/Printed Midi Dress.jpg',
                    'name' => 'Printed Midi Dress',
                    'description' => 'Midi dress made of viscose. High neck with tied detail in the same fabric and long sleeves. Pleated detail on the front. Invisible back zip fastening and buttons on the neck. Available size: M.',
                    'price' => 2699000,
                    'stock' => 5,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]
            ]
        );
    }
}
