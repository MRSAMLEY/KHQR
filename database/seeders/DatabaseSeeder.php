<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Test User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Product Array with Categories for the Sidebar
        $products = [
            [
                'name' => '3in1 phone charging cable',
                'category' => 'Charging',
                'description' => 'Charging cable with 3 different head',
                'price' => 16400, 
                'image' => 'https://images-na.ssl-images-amazon.com/images/I/51GnVoAOC0L._SL500_._AC_SL500_.jpg',
            ],
            [
                'name' => 'USB CABKE',
                'category' => 'Charging',
                'description' => 'Lightning to USB Cable (1m)',
                'price' => 12000, 
                'image' => 'https://www.cablechick.com.au/product_images/1m-lightning-to-usb-cable-for.jpg',
            ],
            [
                'name' => 'USB Power Adapter',
                'category' => 'Charging',
                'description' => 'Adapter រន្ធ​ USB	',
                'price' => 12000, 
                'image' => 'https://i5.walmartimages.com/seo/Apple-USB-Power-Adapter_d71c8371-36c5-41d0-b4f7-e7788c46afbd_1.1045dc4d0032c38a29252cca5d838e9f.png?odnHeight=573&odnWidth=573&odnBg=FFFFFF',
            ],
            [
                'name' => 'Cigarette Lighter USB Adapter',
                'category' => 'Charging',
                'description' => 'ឧបករណ៍សាកទូរស័ព្ទតាមរយៈរន្ធបារីឡាន',
                'price' => 60000, 
                'image' => 'https://5.imimg.com/data5/ANDROID/Default/2024/10/457072502/CV/LT/SK/73078272/product-jpeg-250x250.jpg',
            ],
            [
                'name' => 'WLC-17 – Biva',
                'category' => 'Charging',
                'description' => 'Magnetic suction stand charger',
                'price' => 110700, 
                'image' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTQRyZGB_m7nefu3Nwym-t5-kFXlM-xUNL4kHu4NXraTw7b84cv',
            ],
            [
                'name' => 'GE 5 Ft Heavy Duty Extension Cord',
                'category' => 'Charging',
                'description' => 'Extension cable 5 meters ព្រីភ្លើងត 5 ម៉ែត្រ 延长线5米',
                'price' => 90200, 
                'image' => 'https://i5.walmartimages.com/seo/5-Ft-Extension-Cord-Heavy-Duty-16AWG-Indoor-Outdoor-Use-for-Workshops_4c93eafa-5ff8-4a6f-a0af-de77ad8da88e.043d1843b62b74e43184bd82317c5c44.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF',
            ],
            [
                'name' => 'Magnetic Wireless Charging Station for Apple Series',
                'category' => 'Charging',
                'description' => '',
                'price' => 102500, 
                'image' => 'data:image/jpeg;base64,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'
            ],
            [
                'name' => 'Saii Fast USB-C / Lightning Cable',
                'category' => 'Charging',
                'description' => 'USB - C to Lightning Cable (1m)',
                'price' => 12000, 
                'image' => 'https://www.mytrendyphone.eu/images/Saii-Digibuddy-Fast-USB-C-Lightning-Cable-iPhone-iPad-iPod-1m-21122023-01-p.jpg'
            ],
            [
                'name' => 'Apple USB-C 60W Charge Cable (1m)',
                'category' => 'Charging',
                'description' => 'Apple USB-C 60W Charge Cable (1m)',
                'price' => 12000, 
                'image' => 'https://sokly.sgp1.digitaloceanspaces.com/Accessories/Apple/Connector/60-w-usb-c-charge-cable-1-m/1-1741920020IiuqU.png'
            ],
            [
                'name' => 'USB -C 20W Power Adapter',
                'category' => 'Charging',
                'description' => 'USB -C 20W Power Adapter',
                'price' => 12000, 
                'image' => 'https://img.drz.lazcdn.com/static/np/p/d0a0962af5bc7ecb4adbcc32c5a1240d.png_720x720q80.png'
            ],
            [
                'name' => 'Iphone 15 pro max 35w USB-C Power Adapter',
                'category' => 'Charging',
                'description' => 'Iphone 15 pro max 35w USB-C Power Adapter',
                'price' => 28000, 
                'image' => 'https://phonetogo.ca/cdn/shop/files/35w-usb-c-power-adapter-with-to-cable-combo-for-iphone-137.webp?v=1715195474'
            ],
            [
                'name' => 'Iphone 14 pro max 35w USB -C Power Adapter',
                'category' => 'Charging',
                'description' => 'Iphone 14 pro max 35w USB -C Power Adapter',
                'price' => 28000, 
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqaZS2ApZ-IQanIYwAkmysswemOL8Msxuq7g&s'
            ],
            [
                'name' => 'Iphone 13 pro max 25w USB -C Power Adapter',
                'category' => 'Charging',
                'description' => 'Iphone 13 pro max 25w USB -C Power Adapter',
                'price' => 28000, 
                'image' => 'https://jadeals.com/wp-content/uploads/iphone-12-pro-max-charger-set.jpg'
            ],
            [
                'name' => 'Iphone 13 pro max 20w USB -C Power Adapter',
                'category' => 'Charging',
                'description' => 'Iphone 13 pro max 20w USB -C Power Adapter',
                'price' => 28000, 
                'image' => 'https://jadeals.com/wp-content/uploads/iphone-12-pro-max-charger-set.jpg'
            ],
            [
                'name' => 'Baioteng 150w charging set',
                'category' => 'Charging',
                'description' => 'Baioteng 150w charging set',
                'price' => 26650, 
                'image' => 'https://gw.alicdn.com/bao/uploaded/i1/2159696199/O1CN01z974gO1vfCJ2CRuA0_!!2159696199.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}