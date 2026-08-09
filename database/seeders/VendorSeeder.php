<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Target directory for storage public products
        $storageDir = storage_path('app/public/products');
        if (!File::exists($storageDir)) {
            File::makeDirectory($storageDir, 0755, true, true);
        }

        // Vendors & Stores Data
        $vendors = [
            [
                'user' => [
                    'name' => 'سامي العتيبي (تيك زون)',
                    'email' => 'vendor1@marsa.com',
                ],
                'store' => [
                    'name' => 'متجر تيك زون (TechZone)',
                    'slug' => 'techzone-store',
                    'description' => 'المتجر الرائد في توفير الهواتف الذكية وأجهزة الحاسوب والأجهزة التقنية بأفضل الأسعار.',
                    'slogan' => 'أحدث الأجهزة الإلكترونية والتقنية',
                    'phone' => '+966551112233',
                    'address' => 'الرياض - حي العليا',
                ],
                'products' => [
                    [
                        'name' => 'آيفون 15 برو ماكس 256 جيجابايت',
                        'subcategory_name' => 'هواتف و أجهزة لوحية',
                        'price' => 4899.00,
                        'discount' => 200.00,
                        'stock' => 25,
                        'is_featured' => true,
                        'description' => 'هاتف آبل ايفون 15 برو ماكس بسعة 256 جيجابايت مع شاشة Super Retina XDR وشريحة A17 Pro الفائقة.',
                        'image_name' => 'iphone15_promax.png',
                        'color' => '#1e293b',
                    ],
                    [
                        'name' => 'لابتوب ماك بوك برو 16 M3 Max',
                        'subcategory_name' => 'أجهزة لابتوب و كمبيوتر',
                        'price' => 9999.00,
                        'discount' => 500.00,
                        'stock' => 10,
                        'is_featured' => true,
                        'description' => 'لابتوب آبل ماك بوك برو سعة 18 جيجابايت RAM وهارد 512 جيجابايت SSD مع معالج M3 Pro وشاشة 16 بوصة.',
                        'image_name' => 'macbook_pro.png',
                        'color' => '#334155',
                    ],
                    [
                        'name' => 'سماعات سوني لاسلكية WH-1000XM5',
                        'subcategory_name' => 'سماعات',
                        'price' => 1299.00,
                        'discount' => 100.00,
                        'stock' => 40,
                        'is_featured' => false,
                        'description' => 'سماعات رأس لاسلكية فوق الأذن بتقنية إلغاء الضوضاء الرائدة مع بطارية تدوم حتى 30 ساعة.',
                        'image_name' => 'sony_headphones.png',
                        'color' => '#0f172a',
                    ],
                    [
                        'name' => 'ساعة ذكية أبل واتش الجيل التاسع',
                        'subcategory_name' => 'ملحقات',
                        'price' => 1699.00,
                        'discount' => 50.00,
                        'stock' => 30,
                        'is_featured' => true,
                        'description' => 'ساعة آبل الذكية الجيل التاسع مع شاشة Retina دائماً نشطة ومستشعرات متقدمة لقياس الصحة.',
                        'image_name' => 'apple_watch_9.png',
                        'color' => '#475569',
                    ],
                    [
                        'name' => 'جهاز بلايستيشن 5 سليم 1 تيرابايت',
                        'subcategory_name' => 'أجهزة الالعاب',
                        'price' => 2199.00,
                        'discount' => 0.00,
                        'stock' => 15,
                        'is_featured' => true,
                        'description' => 'منصة ألعاب سوني بلايستيشن 5 سليم مع محرك أقراص وسعة تخزين 1 تيرابايت SSD.',
                        'image_name' => 'ps5_slim.png',
                        'color' => '#2563eb',
                    ],
                ]
            ],
            [
                'user' => [
                    'name' => 'رانيا الأحمد (فاكتوري الموضة)',
                    'email' => 'vendor2@marsa.com',
                ],
                'store' => [
                    'name' => 'متجر فاكتوري للموضة (Fashion Hub)',
                    'slug' => 'fashion-hub-store',
                    'description' => 'متجر متخصص في أحدث صيحات الموضة، الأحذية، والساعات الفاخرة للرجال والنساء.',
                    'slogan' => 'عالم من الأناقة والعصرية',
                    'phone' => '+966552223344',
                    'address' => 'جدة - شارع التحلية',
                ],
                'products' => [
                    [
                        'name' => 'حذاء نايكي اير فورس 1 أبيض كلاسيك',
                        'subcategory_name' => 'أحذية',
                        'price' => 499.00,
                        'discount' => 50.00,
                        'stock' => 50,
                        'is_featured' => true,
                        'description' => 'حذاء رياضي كلاسيكي باللون الأبيض الفاخر من نايكي يوفر الراحة والأناقة للاستخدام اليومي.',
                        'image_name' => 'nike_air_force.png',
                        'color' => '#dc2626',
                    ],
                    [
                        'name' => 'ساعة رجالية أنيقة ستانلس ستيل',
                        'subcategory_name' => 'ساعات',
                        'price' => 1850.00,
                        'discount' => 150.00,
                        'stock' => 12,
                        'is_featured' => true,
                        'description' => 'ساعة رجالية أنيقة بحزام ستانلس ستيل فاخر ومقاومة للماء حتى عمق 100 متر.',
                        'image_name' => 'luxury_watch.png',
                        'color' => '#d97706',
                    ],
                    [
                        'name' => 'جاكيت جلدي رجالي فاخر',
                        'subcategory_name' => 'ملابس رجال',
                        'price' => 650.00,
                        'discount' => 80.00,
                        'stock' => 20,
                        'is_featured' => false,
                        'description' => 'جاكيت رجالي مصنوع من الجلد الطبيعي الفاخر بتصميم عصري وبطانة مريحة للطقس البارد.',
                        'image_name' => 'leather_jacket.png',
                        'color' => '#78350f',
                    ],
                    [
                        'name' => 'حقيبة يد نسائية جلدية أنيقة',
                        'subcategory_name' => 'حقائب',
                        'price' => 580.00,
                        'discount' => 60.00,
                        'stock' => 18,
                        'is_featured' => true,
                        'description' => 'حقيبة نسائية فاخرة بتصميم إيطالي مميز ومساحة واسعة تتناسب مع كافة المناسبات.',
                        'image_name' => 'handbag_luxury.png',
                        'color' => '#9333ea',
                    ],
                    [
                        'name' => 'نظارة شمسية راي بان كلاسيكية',
                        'subcategory_name' => 'نظارات شمسية',
                        'price' => 520.00,
                        'discount' => 40.00,
                        'stock' => 35,
                        'is_featured' => false,
                        'description' => 'نظارات شمسية أصلية بإطار معدني ذهبي وعدسات مستقطبة تحمي العينين من الأشعة فوق البنفسجية.',
                        'image_name' => 'rayban_sunglasses.png',
                        'color' => '#059669',
                    ],
                ]
            ],
            [
                'user' => [
                    'name' => 'طارق الماجد (بيت السعادة)',
                    'email' => 'vendor3@marsa.com',
                ],
                'store' => [
                    'name' => 'متجر بيت السعادة (Home & Living)',
                    'slug' => 'home-living-store',
                    'description' => 'يوفر أفضل أجهزة المطبخ، الأثاث المودرن والديكورات العصرية لمنزل متكامل.',
                    'slogan' => 'كل ما يحتاجه منزلك عصري وأنيق',
                    'phone' => '+966553334455',
                    'address' => 'الدمام - الشاطئ',
                ],
                'products' => [
                    [
                        'name' => 'ماكينة صانعة القهوة نسبريسو إسنزا',
                        'subcategory_name' => 'أجهزة المطبخ',
                        'price' => 649.00,
                        'discount' => 50.00,
                        'stock' => 30,
                        'is_featured' => true,
                        'description' => 'ماكينة تحضير القهوة والاسبريسو بالكبسولات بتصميم مدمج وضغط مضخة 19 بار.',
                        'image_name' => 'nespresso_machine.png',
                        'color' => '#b45309',
                    ],
                    [
                        'name' => 'مقلاة هوائية بدون زيت 5.5 لتر',
                        'subcategory_name' => 'أجهزة المطبخ',
                        'price' => 599.00,
                        'discount' => 70.00,
                        'stock' => 22,
                        'is_featured' => true,
                        'description' => 'مقلاة هوائية بدون زيت بسعة 5.5 لتر لإعداد طعام صحي ومقرمش بسرعات عالية.',
                        'image_name' => 'air_fryer_xl.png',
                        'color' => '#ea580c',
                    ],
                    [
                        'name' => 'طقم كنبة مودرن 3 مقاعد',
                        'subcategory_name' => 'أثاث',
                        'price' => 2899.00,
                        'discount' => 300.00,
                        'stock' => 8,
                        'is_featured' => true,
                        'description' => 'كنبة مودرن مريحة ومصنوعة من القماش الفاخر المانع للبقع مع هيكل خشب زان قوي.',
                        'image_name' => 'modern_sofa.png',
                        'color' => '#4b5563',
                    ],
                    [
                        'name' => 'مكنسة كهربائية ذكية روبوت',
                        'subcategory_name' => 'مستلزمات التنظيف',
                        'price' => 1799.00,
                        'discount' => 200.00,
                        'stock' => 14,
                        'is_featured' => false,
                        'description' => 'مكنسة وممسحة ذكية تعمل بالتطبيق والخرائط ثلاثية الأبعاد لتنظيف الأرضيات بكفاءة.',
                        'image_name' => 'robot_vacuum.png',
                        'color' => '#0284c7',
                    ],
                    [
                        'name' => 'طقم مفرش سرير قطني فاخر 4 قطع',
                        'subcategory_name' => 'مفروشات وبياضات',
                        'price' => 320.00,
                        'discount' => 30.00,
                        'stock' => 40,
                        'is_featured' => false,
                        'description' => 'مفرش سرير كينج 4 قطع مصنوع من القطن الطبيعي 100% بنعومة فائقة وتصميم جذاب.',
                        'image_name' => 'bedding_set.png',
                        'color' => '#0d9488',
                    ],
                ]
            ],
            [
                'user' => [
                    'name' => 'ليلى الحارثي (نضارة وعطور)',
                    'email' => 'vendor4@marsa.com',
                ],
                'store' => [
                    'name' => 'متجر نضارة وعطور (Beauty & Glow)',
                    'slug' => 'beauty-glow-store',
                    'description' => 'منتجات العناية بالبشرة الأصلية، وأرقى العطور العالمية والعناية الشخصية.',
                    'slogan' => 'جمالك وأناقتك يبدآن من هنا',
                    'phone' => '+966554445566',
                    'address' => 'الخبر - الحزام الذهبي',
                ],
                'products' => [
                    [
                        'name' => 'عطر ديور سوڤاج للرجال 100 مل',
                        'subcategory_name' => 'العطور',
                        'price' => 590.00,
                        'discount' => 50.00,
                        'stock' => 45,
                        'is_featured' => true,
                        'description' => 'عطر رجالي ساحر بنفحات الفلفل المكسيكي والعنبر واللافندر يدوم طويلاً.',
                        'image_name' => 'dior_sauvage.png',
                        'color' => '#1e1b4b',
                    ],
                    [
                        'name' => 'مصفف ومجفف الشعر اير راب',
                        'subcategory_name' => 'العناية بالشعر',
                        'price' => 2299.00,
                        'discount' => 100.00,
                        'stock' => 10,
                        'is_featured' => true,
                        'description' => 'مصفف شعر احترافي يعمل بالهواء دون حرارة مفرطة لابتكار تسريحات متنوعة ومموجة.',
                        'image_name' => 'dyson_airwrap.png',
                        'color' => '#be185d',
                    ],
                    [
                        'name' => 'سيروم العناية بالبشرة الليلي 50 مل',
                        'subcategory_name' => 'العناية بالبشرة',
                        'price' => 380.00,
                        'discount' => 40.00,
                        'stock' => 60,
                        'is_featured' => true,
                        'description' => 'سيروم مرطب ومغذي للبشرة يساعد على تجديد الخلايا وتقليل تجاعيد الوجه أثناء النوم.',
                        'image_name' => 'skincare_serum.png',
                        'color' => '#065f46',
                    ],
                    [
                        'name' => 'عطر شانيل كوكو مدموازيل نسائي',
                        'subcategory_name' => 'العطور',
                        'price' => 680.00,
                        'discount' => 60.00,
                        'stock' => 25,
                        'is_featured' => true,
                        'description' => 'عطر نسائي أيقوني بنفحات البرتقال المنعش والياسمين والورد لمظهر أنيق وجذاب.',
                        'image_name' => 'chanel_coco.png',
                        'color' => '#9d174d',
                    ],
                    [
                        'name' => 'ماكينة تشذيب اللحية فيليبس',
                        'subcategory_name' => 'العناية بالرجال',
                        'price' => 270.00,
                        'discount' => 20.00,
                        'stock' => 35,
                        'is_featured' => false,
                        'description' => 'ماكينة تشذيب اللحية والشعر بتقنية الذكاء الاصطناعي وشفرات من الستانلس ستيل الحاد.',
                        'image_name' => 'beard_trimmer.png',
                        'color' => '#374151',
                    ],
                ]
            ],
            [
                'user' => [
                    'name' => 'فهد الدوسري (الأبطال للرياضة)',
                    'email' => 'vendor5@marsa.com',
                ],
                'store' => [
                    'name' => 'متجر الأبطال للرياضة (FitWorld)',
                    'slug' => 'fitworld-sport-store',
                    'description' => 'متجر متكامل لمستلزمات الرياضة، معدات اللياقة البدنية ومستلزمات التخييم.',
                    'slogan' => 'معدات رياضية واحترافية لصحة أفضل',
                    'phone' => '+966555556677',
                    'address' => 'مكة المكرمة - العزيزية',
                ],
                'products' => [
                    [
                        'name' => 'جهاز سير كهربائي 3 حصان',
                        'subcategory_name' => 'معدات اللياقة البدنية',
                        'price' => 2350.00,
                        'discount' => 250.00,
                        'stock' => 7,
                        'is_featured' => true,
                        'description' => 'جهاز مشي كهربائي بمحرك قاطرة 3 حصان مع شاشة رقمية وسرعات تصل إلى 16 كم/ساعة.',
                        'image_name' => 'treadmill_electric.png',
                        'color' => '#15803d',
                    ],
                    [
                        'name' => 'دراجة هوائية جبلية 29 بوصة',
                        'subcategory_name' => 'الدراجات الهوائية وملحقاتها',
                        'price' => 1599.00,
                        'discount' => 150.00,
                        'stock' => 12,
                        'is_featured' => true,
                        'description' => 'دراجة جبلية بإطار ألومنيوم خفيف ومساعدات أميمية وناقل حركة شيمانو 21 سرعة.',
                        'image_name' => 'mountain_bike.png',
                        'color' => '#b91c1c',
                    ],
                    [
                        'name' => 'طقم أثقال قابلة للتعديل 24 كجم',
                        'subcategory_name' => 'معدات اللياقة البدنية',
                        'price' => 720.00,
                        'discount' => 70.00,
                        'stock' => 25,
                        'is_featured' => false,
                        'description' => 'زوج من الدامبلز الذكية القابلة للتعديل من 2.5 كجم حتى 24 كجم بحركة واحدة.',
                        'image_name' => 'adjustable_dumbbells.png',
                        'color' => '#4338ca',
                    ],
                    [
                        'name' => 'خيمة تخييم مقاومة للماء 4 أشخاص',
                        'subcategory_name' => 'التخييم',
                        'price' => 340.00,
                        'discount' => 30.00,
                        'stock' => 20,
                        'is_featured' => true,
                        'description' => 'خيمة تخييم مقاومة للماء والرياح مجهزة بنوافذ تهوية وسهلة التركيب والفك.',
                        'image_name' => 'camping_tent.png',
                        'color' => '#854d0e',
                    ],
                    [
                        'name' => 'سجادة يوجا وسادة تمارين 10 ملم',
                        'subcategory_name' => 'ملابس رياضية',
                        'price' => 110.00,
                        'discount' => 10.00,
                        'stock' => 50,
                        'is_featured' => false,
                        'description' => 'سجادة يوجا سميكة مانعة للانزلاق ومصنوعة من مواد صديقة للبيئة مريحة للمفاصل.',
                        'image_name' => 'yoga_mat.png',
                        'color' => '#6d28d9',
                    ],
                ]
            ]
        ];

        foreach ($vendors as $vData) {
            // 1. Create or update vendor user
            $user = User::updateOrCreate(
                ['email' => $vData['user']['email']],
                [
                    'name' => $vData['user']['name'],
                    'password' => Hash::make('password'),
                    'role' => 'vendor',
                    'is_active' => true,
                    'email_verified_at' => now(),
                ]
            );

            // 2. Create or update Store
            $store = Store::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => $vData['store']['name'],
                    'slug' => $vData['store']['slug'],
                    'description' => $vData['store']['description'],
                    'slogan' => $vData['store']['slogan'],
                    'phone' => $vData['store']['phone'],
                    'address' => $vData['store']['address'],
                ]
            );

            // 3. Create products & representative images
            foreach ($vData['products'] as $pData) {
                // Find matching subcategory or default to 1st
                $subcategory = Subcategory::where('name', $pData['subcategory_name'])->first();
                $subcategoryId = $subcategory ? $subcategory->id : 1;

                $product = Product::updateOrCreate(
                    [
                        'store_id' => $store->id,
                        'slug' => Str::slug($pData['name'], '-', 'ar') ?: Str::slug($pData['image_name']),
                    ],
                    [
                        'name' => $pData['name'],
                        'subcategory_id' => $subcategoryId,
                        'description' => $pData['description'],
                        'price' => $pData['price'],
                        'discount' => $pData['discount'],
                        'stock' => $pData['stock'],
                        'status' => 'active',
                        'is_featured' => $pData['is_featured'],
                    ]
                );

                // Generate representative PNG image file in storage/app/public/products/
                $imageRelativePath = 'products/' . $pData['image_name'];
                $fullImagePath = storage_path('app/public/' . $imageRelativePath);

                $this->generateProductImage($fullImagePath, $pData['name'], $pData['color']);

                // Create ProductImage entry
                ProductImage::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'image_path' => $imageRelativePath,
                    ],
                    [
                        'is_main' => true,
                    ]
                );
            }
        }
    }

    /**
     * Generate a crisp, elegant PNG image with product label and color accent
     */
    private function generateProductImage(string $path, string $label, string $hexColor): void
    {
        $width = 600;
        $height = 600;

        $im = imagecreatetruecolor($width, $height);
        if (!$im) return;

        // Parse hex color
        $hex = ltrim($hexColor, '#');
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        // Colors
        $bgColor = imagecolorallocate($im, 248, 250, 252); // Soft light grey
        $accentColor = imagecolorallocate($im, $r, $g, $b);
        $textColor = imagecolorallocate($im, 30, 41, 59); // Slate dark
        $white = imagecolorallocate($im, 255, 255, 255);

        // Fill background
        imagefill($im, 0, 0, $bgColor);

        // Draw top accent banner
        imagefilledrectangle($im, 0, 0, $width, 180, $accentColor);

        // Draw inner card rectangle
        imagefilledrectangle($im, 40, 140, $width - 40, $height - 40, $white);
        imagerectangle($im, 40, 140, $width - 40, $height - 40, $accentColor);

        // Render text label
        $text = mb_substr($label, 0, 35);
        imagestring($im, 5, 60, 200, "MARSA PRODUCT", $accentColor);
        imagestring($im, 5, 60, 250, mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8'), $textColor);
        imagestring($im, 4, 60, 320, "High Quality Original Product", $textColor);

        // Save image file
        imagepng($im, $path);
        imagedestroy($im);
    }
}
