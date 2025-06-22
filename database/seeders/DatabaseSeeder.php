<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Page;
use App\Models\Review;
use App\Models\Slide;
use App\Models\Specialty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Ahmed Elmahdy',
            'email' => 'a6e6s1@gmail.com',
            'type' => 'admin',
            'password' => Hash::make('thephantom'),
            'status' => 1,
        ]);


        $sliders = [
            [
                'title' => 'رعاية صحية متميزة',
                'subtitle' => 'نقدم أفضل الخدمات الطبية بأيدي أمهر الأطباء',
                'image_alt' => 'فريق طبي يبتسم',
                'image' => 'slider1.jpg', // اسم ملف الصورة، تأكد من وجودها في المسار الصحيح
                'url' => '/', // الرابط الذي يؤدي إليه السلايدر (مثلاً الصفحة الرئيسية)
                'status' => 1,
            ],
            [
                'title' => 'احجز موعدك الآن بسهولة',
                'subtitle' => 'استعرض التخصصات والأطباء المتاحين واحجز بضغطة زر',
                'image_alt' => 'شخص يستخدم تطبيق حجز المواعيد',
                'image' => 'slider2.jpg',
                'url' => '/appointments/create', // رابط لصفحة حجز المواعيد
                'status' => 1,
            ],
            [
                'title' => 'عروض طبية خاصة لا تفوتها',
                'subtitle' => 'اكتشف باقات الفحص والعلاج بأسعار تنافسية',
                'image_alt' => 'ملصق عرض طبي',
                'image' => 'slider3.jpg',
                'url' => '/offers', // رابط لصفحة العروض
                'status' => 1,
            ],
        ];

        DB::table('slides')->insert($sliders);


        $cities = [
            ['status' => 1, 'name' => 'أبو المطامير'],
            ['status' => 1, 'name' => 'أبو النمرس'],
            ['status' => 1, 'name' => 'أبو تشت'],
            ['status' => 1, 'name' => 'أبو تيج'],
            ['status' => 1, 'name' => 'أبو كبير'],
            ['status' => 1, 'name' => 'أبو قرقاص'],
            ['status' => 1, 'name' => 'أبو حمص'],
            ['status' => 1, 'name' => 'أخميم'],
            ['status' => 1, 'name' => 'أرمنت'],
            ['status' => 1, 'name' => 'أشمون'],
            ['status' => 1, 'name' => 'أسوان'],
            ['status' => 1, 'name' => 'أسيوط'],
            ['status' => 1, 'name' => 'إدكو'],
            ['status' => 1, 'name' => 'إدفو'],
            ['status' => 1, 'name' => 'إسنا'],
            ['status' => 1, 'name' => 'الأقصر'],
            ['status' => 1, 'name' => 'الإسماعيلية'],
            ['status' => 1, 'name' => 'العاشر من رمضان'],
            ['status' => 1, 'name' => 'العريش'],
            ['status' => 1, 'name' => 'الغردقة'],
            ['status' => 1, 'name' => 'الفيوم'],
            ['status' => 1, 'name' => 'القصير'],
            ['status' => 1, 'name' => 'القاهرة'],
            ['status' => 1, 'name' => 'القناطر الخيرية'],
            ['status' => 1, 'name' => 'القنطرة'],
            ['status' => 1, 'name' => 'القرين'],
            ['status' => 1, 'name' => 'الكرنك'],
            ['status' => 1, 'name' => 'الكوم الأحمر'],
            ['status' => 1, 'name' => 'الخانكة'],
            ['status' => 1, 'name' => 'الخصوص'],
            ['status' => 1, 'name' => 'الدخيلة'],
            ['status' => 1, 'name' => 'الداخلة'],
            ['status' => 1, 'name' => 'الدلنجات'],
            ['status' => 1, 'name' => 'دمياط'],
            ['status' => 1, 'name' => 'دمنهور'],
            ['status' => 1, 'name' => 'دهب'],
            ['status' => 1, 'name' => 'دير مواس'],
            ['status' => 1, 'name' => 'دسوق'],
            ['status' => 1, 'name' => 'درو'],
            ['status' => 1, 'name' => 'درب نجم'],
            ['status' => 1, 'name' => 'رشيد'],
            ['status' => 1, 'name' => 'رأس البر'],
            ['status' => 1, 'name' => 'رأس سدر'],
            ['status' => 1, 'name' => 'رأس غارب'],
            ['status' => 1, 'name' => 'رفح'],
            ['status' => 1, 'name' => 'الزقازيق'],
            ['status' => 1, 'name' => 'الزرقا'],
            ['status' => 1, 'name' => 'السادات'],
            ['status' => 1, 'name' => 'الساحل الشمالي'],
            ['status' => 1, 'name' => 'السنبلاوين'],
            ['status' => 1, 'name' => 'السويس'],
            ['status' => 1, 'name' => 'الشروق'],
            ['status' => 1, 'name' => 'الشهداء'],
            ['status' => 1, 'name' => 'الشيخ زايد'],
            ['status' => 1, 'name' => 'الطور'],
            ['status' => 1, 'name' => 'طلخا'],
            ['status' => 1, 'name' => 'طما'],
            ['status' => 1, 'name' => 'طنطا'],
            ['status' => 1, 'name' => 'قها'],
            ['status' => 1, 'name' => 'قفط'],
            ['status' => 1, 'name' => 'قليوب'],
            ['status' => 1, 'name' => 'قنا'],
            ['status' => 1, 'name' => 'قويسنا'],
            ['status' => 1, 'name' => 'كوم أمبو'],
            ['status' => 1, 'name' => 'كوم حمادة'],
            ['status' => 1, 'name' => 'كفر الدوار'],
            ['status' => 1, 'name' => 'كفر الزيات'],
            ['status' => 1, 'name' => 'كفر الشيخ'],
            ['status' => 1, 'name' => 'كفر صقر'],
            ['status' => 1, 'name' => 'كفر سعد'],
            ['status' => 1, 'name' => 'كفر شكر'],
            ['status' => 1, 'name' => 'كفر طه'],
            ['status' => 1, 'name' => 'كفر عقب'],
            ['status' => 1, 'name' => 'كرداسة'],
            ['status' => 1, 'name' => 'الأوسطة'],
            ['status' => 1, 'name' => 'الباجور'],
            ['status' => 1, 'name' => 'البدرشين'],
            ['status' => 1, 'name' => 'البداري'],
            ['status' => 1, 'name' => 'البساتين'],
            ['status' => 1, 'name' => 'البصالية'],
            ['status' => 1, 'name' => 'البلينا'],
            ['status' => 1, 'name' => 'بني سويف'],
            ['status' => 1, 'name' => 'بني عبيد'],
            ['status' => 1, 'name' => 'بني مزار'],
            ['status' => 1, 'name' => 'بني مر'],
            ['status' => 1, 'name' => 'بلبيس'],
            ['status' => 1, 'name' => 'بلطيم'],
            ['status' => 1, 'name' => 'بلقاس'],
            ['status' => 1, 'name' => 'بنها'],
            ['status' => 1, 'name' => 'ببا'],
            ['status' => 1, 'name' => 'بركة السبع'],
            ['status' => 1, 'name' => 'برج العرب'],
            ['status' => 1, 'name' => 'برج البرلس'],
            ['status' => 1, 'name' => 'بركة'],
            ['status' => 1, 'name' => 'بورسعيد'],
            ['status' => 1, 'name' => 'بور فؤاد'],
            ['status' => 1, 'name' => 'بوش'],
            ['status' => 1, 'name' => 'بولاق الدكرور'],
            ['status' => 1, 'name' => 'بيلا'],
            ['status' => 1, 'name' => 'تلا'],
            ['status' => 1, 'name' => 'تل العمارنة'],
            ['status' => 1, 'name' => 'تل بسطة'],
            ['status' => 1, 'name' => 'تمي الأمديد'],
            ['status' => 1, 'name' => 'توخ'],
            ['status' => 1, 'name' => 'الخارجة'],
            ['status' => 1, 'name' => 'الحمام'],
            ['status' => 1, 'name' => 'الحسينية'],
            ['status' => 1, 'name' => 'الحوامدية'],
            ['status' => 1, 'name' => 'الحويطات'],
            ['status' => 1, 'name' => 'داهية'],
            ['status' => 1, 'name' => 'دكرنس'],
            ['status' => 1, 'name' => 'دنقلا'],
            ['status' => 1, 'name' => 'سوهاج'],
            ['status' => 1, 'name' => 'سيدي براني'],
            ['status' => 1, 'name' => 'سيدي سالم'],
            ['status' => 1, 'name' => 'سيدي عبد الرحمن'],
            ['status' => 1, 'name' => 'سرس الليان'],
            ['status' => 1, 'name' => 'سفاجا'],
            ['status' => 1, 'name' => 'سمالوط'],
            ['status' => 1, 'name' => 'سمنود'],
            ['status' => 1, 'name' => 'سنورس'],
            ['status' => 1, 'name' => 'شبرا الخيمة'],
            ['status' => 1, 'name' => 'شبين القناطر'],
            ['status' => 1, 'name' => 'شبين الكوم'],
            ['status' => 1, 'name' => 'شربين'],
            ['status' => 1, 'name' => 'شرم الشيخ'],
            ['status' => 1, 'name' => 'شونة'],
            ['status' => 1, 'name' => 'صان الحجر'],
            ['status' => 1, 'name' => 'صدفا'],
            ['status' => 1, 'name' => 'طامية'],
            ['status' => 1, 'name' => 'طهطا'],
            ['status' => 1, 'name' => 'طلبا'],
            ['status' => 1, 'name' => 'العامرية'],
            ['status' => 1, 'name' => 'العياط'],
            ['status' => 1, 'name' => 'العدوة'],
            ['status' => 1, 'name' => 'الغنايم'],
            ['status' => 1, 'name' => 'الفرافرة'],
            ['status' => 1, 'name' => 'الفشن'],
            ['status' => 1, 'name' => 'الفنار'],
            ['status' => 1, 'name' => 'القنطرة شرق'],
            ['status' => 1, 'name' => 'الكاب'],
            ['status' => 1, 'name' => 'الكردي'],
            ['status' => 1, 'name' => 'الكوم الأحمر (محافظة أسوان)'],
            ['status' => 1, 'name' => 'الكوم الأحمر (محافظة البحيرة)'],
            ['status' => 1, 'name' => 'اللابيني'],
            ['status' => 1, 'name' => 'المحلة الكبرى'],
            ['status' => 1, 'name' => 'المحمودية'],
            ['status' => 1, 'name' => 'المنزلة'],
            ['status' => 1, 'name' => 'المنشأة'],
            ['status' => 1, 'name' => 'المنصورة'],
            ['status' => 1, 'name' => 'المنيا'],
            ['status' => 1, 'name' => 'المنيا الجديدة'],
            ['status' => 1, 'name' => 'المطرية'],
            ['status' => 1, 'name' => 'المرج'],
            ['status' => 1, 'name' => 'المستقبل'],
            ['status' => 1, 'name' => 'النوبارية الجديدة'],
            ['status' => 1, 'name' => 'النيل'],
            ['status' => 1, 'name' => 'باريس'],
            ['status' => 1, 'name' => 'بلطيم الجديدة'],
            ['status' => 1, 'name' => 'بني سويف الجديدة'],
            ['status' => 1, 'name' => 'توشكى الجديدة'],
            ['status' => 1, 'name' => 'طيبة الجديدة'],
            ['status' => 1, 'name' => 'دمياط الجديدة'],
            ['status' => 1, 'name' => 'رشيد الجديدة'],
            ['status' => 1, 'name' => 'سوهاج الجديدة'],
            ['status' => 1, 'name' => 'شمال سيناء'],
            ['status' => 1, 'name' => 'غرب سهيل'],
            ['status' => 1, 'name' => 'قنا الجديدة'],
            ['status' => 1, 'name' => 'كوم أمبو الجديدة'],
            ['status' => 1, 'name' => 'مدينة 15 مايو'],
            ['status' => 1, 'name' => 'مدينة 6 أكتوبر'],
            ['status' => 1, 'name' => 'مدينة بدر'],
            ['status' => 1, 'name' => 'مدينة السادات'],
            ['status' => 1, 'name' => 'مدينة الشروق'],
            ['status' => 1, 'name' => 'مدينة العبور'],
            ['status' => 1, 'name' => 'مدينة العلمين الجديدة'],
            ['status' => 1, 'name' => 'مدينة العاشر من رمضان'],
            ['status' => 1, 'name' => 'مدينة الفيوم الجديدة'],
            ['status' => 1, 'name' => 'مدينة القاهرة الجديدة'],
            ['status' => 1, 'name' => 'مدينة المستقبل'],
            ['status' => 1, 'name' => 'مدينة المنصورة الجديدة'],
            ['status' => 1, 'name' => 'مدينة النوبارية الجديدة'],
            ['status' => 1, 'name' => 'مدينة بني سويف الجديدة'],
            ['status' => 1, 'name' => 'مدينة طيبة الجديدة'],
            ['status' => 1, 'name' => 'مدينة دمياط الجديدة'],
            ['status' => 1, 'name' => 'مدينة سوهاج الجديدة'],
            ['status' => 1, 'name' => 'مدينة قنا الجديدة'],
            ['status' => 1, 'name' => 'مدينة غرب أسيوط ناصر'],
            ['status' => 1, 'name' => 'مدينة أخميم الجديدة'],
            ['status' => 1, 'name' => 'مدينة أسوان الجديدة'],
            ['status' => 1, 'name' => 'مدينة أسيوط الجديدة'],
            ['status' => 1, 'name' => 'مدينة برج العرب الجديدة'],
            ['status' => 1, 'name' => 'مدينة توشكى الجديدة'],
            ['status' => 1, 'name' => 'مدينة ناصر (غرب أسيوط)'],
            ['status' => 1, 'name' => 'مرسى علم'],
            ['status' => 1, 'name' => 'مرسى مطروح'],
            ['status' => 1, 'name' => 'مشتول السوق'],
            ['status' => 1, 'name' => 'مغاغة'],
            ['status' => 1, 'name' => 'ملوى'],
            ['status' => 1, 'name' => 'منفلوط'],
            ['status' => 1, 'name' => 'منوف'],
            ['status' => 1, 'name' => 'ميت أبو الكوم'],
            ['status' => 1, 'name' => 'ميت غمر'],
            ['status' => 1, 'name' => 'ميت سلسيل'],
            ['status' => 1, 'name' => 'ميت نما'],
            ['status' => 1, 'name' => 'ميت رهينة'],
            ['status' => 1, 'name' => 'ميت فارس'],
            ['status' => 1, 'name' => 'ناصر'],
            ['status' => 1, 'name' => 'نجع حمادي'],
            ['status' => 1, 'name' => 'نقادة'],
            ['status' => 1, 'name' => 'نصر النوبة'],
            ['status' => 1, 'name' => 'نصر مدينة'],
            ['status' => 1, 'name' => 'وادي النطرون'],
        ];
        DB::table('cities')->insert($cities);

        $specialties = [
            [
                'name' => 'طب الأسرة',
                'description' => 'يهتم بالرعاية الصحية الشاملة والمستمرة للأفراد والعائلات من جميع الأعمار.',
                'logo' => 'family_medicine.png', // مثال لاسم ملف الصورة
                'status' => 1
            ],
            [
                'name' => 'الطب الباطني',
                'description' => 'يركز على الوقاية، التشخيص، وعلاج الأمراض التي تصيب الأعضاء الداخلية للكبار.',
                'logo' => 'internal_medicine.png',
                'status' => 1
            ],
            [
                'name' => 'طب الأطفال',
                'description' => 'يعنى بصحة الأطفال والمراهقين، من الولادة وحتى نهاية سن المراهقة.',
                'logo' => 'pediatrics.png',
                'status' => 1
            ],
            [
                'name' => 'الجراحة العامة',
                'description' => 'تختص بإجراء العمليات الجراحية لعلاج مجموعة واسعة من الأمراض والإصابات.',
                'logo' => 'general_surgery.png',
                'status' => 1
            ],
            [
                'name' => 'أمراض القلب',
                'description' => 'يتعامل مع تشخيص وعلاج أمراض القلب والأوعية الدموية.',
                'logo' => 'cardiology.png',
                'status' => 1
            ],
            [
                'name' => 'الأمراض الجلدية',
                'description' => 'تشخيص وعلاج الأمراض التي تصيب الجلد، الشعر، والأظافر.',
                'logo' => 'dermatology.png',
                'status' => 1
            ],
            [
                'name' => 'أمراض الجهاز الهضمي',
                'description' => 'يركز على الجهاز الهضمي بما في ذلك المريء والمعدة والأمعاء والكبد والبنكرياس.',
                'logo' => 'gastroenterology.png',
                'status' => 1
            ],
            [
                'name' => 'طب العيون',
                'description' => 'يهتم بصحة العين والرؤية، بما في ذلك التشخيص الجراحي والطبي لأمراض العيون.',
                'logo' => 'ophthalmology.png',
                'status' => 1
            ],
            [
                'name' => 'جراحة العظام',
                'description' => 'تختص بالجهاز العضلي الهيكلي، بما في ذلك العظام والمفاصل والأربطة والأوتار.',
                'logo' => 'orthopedics.png',
                'status' => 1
            ],
            [
                'name' => 'طب الأنف والأذن والحنجرة',
                'description' => 'تشخيص وعلاج أمراض الأنف والأذن والحنجرة والرأس والعنق.',
                'logo' => 'ent.png',
                'status' => 1
            ],
            [
                'name' => 'أمراض النساء والتوليد',
                'description' => 'يعنى بصحة الجهاز التناسلي للمرأة ورعاية الحوامل والولادة.',
                'logo' => 'gynecology_obstetrics.png',
                'status' => 1
            ],
            [
                'name' => 'المسالك البولية',
                'description' => 'يركز على الجهاز البولي للذكور والإناث والجهاز التناسلي للذكور.',
                'logo' => 'urology.png',
                'status' => 1
            ],
            [
                'name' => 'الأشعة التشخيصية',
                'description' => 'استخدام تقنيات التصوير الطبي (مثل الأشعة السينية والرنين المغناطيسي) لتشخيص الأمراض.',
                'logo' => 'radiology.png',
                'status' => 1
            ],
            [
                'name' => 'التخدير والعناية المركزة',
                'description' => 'إدارة الألم وتوفير الرعاية للمرضى قبل وأثناء وبعد الجراحة وفي وحدات العناية المركزة.',
                'logo' => 'anesthesiology_icu.png',
                'status' => 1
            ],
            [
                'name' => 'طب الطوارئ',
                'description' => 'تقديم الرعاية الطبية الفورية للحالات الحادة والمفاجئة.',
                'logo' => 'emergency_medicine.png',
                'status' => 1
            ],
            [
                'name' => 'طب الأعصاب',
                'description' => 'تشخيص وعلاج الاضطرابات التي تؤثر على الدماغ والحبل الشوكي والأعصاب.',
                'logo' => 'neurology.png',
                'status' => 1
            ],
            [
                'name' => 'الطب النفسي',
                'description' => 'يركز على تشخيص وعلاج الاضطرابات العقلية والعاطفية والسلوكية.',
                'logo' => 'psychiatry.png',
                'status' => 1
            ],
            [
                'name' => 'طب الأسنان',
                'description' => 'يهتم بالوقاية والتشخيص والعلاج لأمراض الفم والأسنان والفكين.',
                'logo' => 'dentistry.png',
                'status' => 1
            ],
            [
                'name' => 'التغذية العلاجية',
                'description' => 'استخدام الغذاء والنظام الغذائي لعلاج الأمراض والوقاية منها.',
                'logo' => 'dietetics.png',
                'status' => 1
            ],
            [
                'name' => 'العلاج الطبيعي',
                'description' => 'استعادة الوظيفة والحركة وتقليل الألم بعد الإصابة أو المرض أو الإعاقة.',
                'logo' => 'physical_therapy.png',
                'status' => 1
            ],
        ];

        DB::table('specialties')->insert($specialties);

        $hospitals = [
            [
                'name' => 'مستشفى النور التخصصي',
                'address' => 'شارع التحرير، مدينة نصر، القاهرة',
                'description' => 'مستشفى رائد يقدم رعاية صحية متكاملة في مختلف التخصصات الطبية.',
                'logo' => 'alnoor_hospital.png',
                'latitude' => 30.0444, // مثال لإحداثيات القاهرة
                'longitude' => 31.2357,
                'status' => 1,
                'phone' => '+20223456789',
            ],
            [
                'name' => 'المستشفى الدولي',
                'address' => 'طريق الإسكندرية الصحراوي، الإسكندرية',
                'description' => 'مستشفى خاص يوفر خدمات طبية عالية الجودة ومعايير عالمية.',
                'logo' => 'international_hospital.png',
                'latitude' => 31.2001, // مثال لإحداثيات الإسكندرية
                'longitude' => 29.9187,
                'status' => 1,
                'phone' => '+20345678901',
            ],
            [
                'name' => 'مستشفى الحياة',
                'address' => 'شارع الهرم، الجيزة',
                'description' => 'مركز طبي متقدم يضم نخبة من الأطباء في كافة التخصصات.',
                'logo' => 'alhayat_hospital.png',
                'latitude' => 30.0131, // مثال لإحداثيات الجيزة
                'longitude' => 31.2089,
                'status' => 1,
                'phone' => '+20227890123',
            ],
            [
                'name' => 'مركز الأمل الطبي',
                'address' => 'كورنيش النيل، المنيا',
                'description' => 'مستشفى متخصص في الرعاية الأولية والطوارئ، مع أقسام متقدمة.',
                'logo' => 'alamal_medical_center.png',
                'latitude' => 28.1099, // مثال لإحداثيات المنيا
                'longitude' => 30.7502,
                'status' => 1,
                'phone' => '+20862345678',
            ],
            [
                'name' => 'مستشفى السلام العام',
                'address' => 'شارع الجمهورية، أسيوط',
                'description' => 'يقدم خدمات طبية متنوعة للمجتمع، مع التركيز على الجودة والرحمة.',
                'logo' => 'alsalam_hospital.png',
                'latitude' => 27.1809, // مثال لإحداثيات أسيوط
                'longitude' => 31.1837,
                'status' => 1,
                'phone' => '+20882345678',
            ],
        ];

        DB::table('hospitals')->insert($hospitals);

        $doctors = [
            [
                'name' => 'د. أحمد السعيد',
                'title' => 'استشاري أمراض باطنية',
                'email' => 'ahmed.elsayed@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor1.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، ماجستير أمراض باطنية',
                'hospital_id' => 1, // افترض وجود مستشفى بمعرف 1
                'specialty_id' => 2, // افترض وجود تخصص 'الطب الباطني' بمعرف 2
                'city_id' => 1, // افترض وجود مدينة بمعرف 1 (مثل القاهرة)
                'status' => 1,
            ],
            [
                'name' => 'د. سارة محمود',
                'title' => 'أخصائية طب أطفال',
                'email' => 'sara.mahmoud@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor2.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، زمالة طب الأطفال',
                'hospital_id' => 2, // افترض وجود مستشفى بمعرف 2
                'specialty_id' => 3, // افترض وجود تخصص 'طب الأطفال' بمعرف 3
                'city_id' => 2, // افترض وجود مدينة بمعرف 2 (مثل الإسكندرية)
                'status' => 1,
            ],
            [
                'name' => 'د. خالد علي',
                'title' => 'استشاري جراحة عظام',
                'email' => 'khalid.ali@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor3.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، دكتوراة جراحة العظام',
                'hospital_id' => 1,
                'specialty_id' => 9, // افترض وجود تخصص 'جراحة العظام' بمعرف 9
                'city_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'د. فاطمة الزهراء',
                'title' => 'أخصائية أمراض جلدية',
                'email' => 'fatima.zahraa@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor4.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، دبلوم الأمراض الجلدية والتجميل',
                'hospital_id' => 3, // افترض وجود مستشفى بمعرف 3
                'specialty_id' => 6, // افترض وجود تخصص 'الأمراض الجلدية' بمعرف 6
                'city_id' => 3, // افترض وجود مدينة بمعرف 3 (مثل الجيزة)
                'status' => 1,
            ],
            [
                'name' => 'د. محمد جابر',
                'title' => 'استشاري أمراض قلب',
                'email' => 'mohamed.gaber@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor5.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، زمالة أمراض القلب',
                'hospital_id' => 2,
                'specialty_id' => 5, // افترض وجود تخصص 'أمراض القلب' بمعرف 5
                'city_id' => 2,
                'status' => 1,
            ],
            [
                'name' => 'د. لمياء حسن',
                'title' => 'أخصائية نساء وتوليد',
                'email' => 'lamiaa.hassan@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor6.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، ماجستير نساء وتوليد',
                'hospital_id' => 3,
                'specialty_id' => 11, // افترض وجود تخصص 'أمراض النساء والتوليد' بمعرف 11
                'city_id' => 3,
                'status' => 1,
            ],
            [
                'name' => 'د. يوسف شريف',
                'title' => 'استشاري أنف وأذن وحنجرة',
                'email' => 'youssef.sherif@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor7.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، دكتوراة أنف وأذن وحنجرة',
                'hospital_id' => 1,
                'specialty_id' => 10, // افترض وجود تخصص 'طب الأنف والأذن والحنجرة' بمعرف 10
                'city_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'د. نوران عادل',
                'title' => 'أخصائية تغذية علاجية',
                'email' => 'nouran.adel@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor8.jpg',
                'certifications' => 'بكالوريوس علوم تغذية، دبلوم تغذية علاجية',
                'hospital_id' => 2,
                'specialty_id' => 19, // افترض وجود تخصص 'التغذية العلاجية' بمعرف 19
                'city_id' => 2,
                'status' => 1,
            ],
            [
                'name' => 'د. عصام فؤاد',
                'title' => 'استشاري مسالك بولية',
                'email' => 'essam.fouad@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor9.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، زمالة المسالك البولية',
                'hospital_id' => 1,
                'specialty_id' => 12, // افترض وجود تخصص 'المسالك البولية' بمعرف 12
                'city_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'د. مريم صلاح',
                'title' => 'طبيبة أسرة',
                'email' => 'maryam.salah@example.com',
                'password' => Hash::make('password'),
                'image' => 'doctor10.jpg',
                'certifications' => 'بكالوريوس طب وجراحة، شهادة في طب الأسرة',
                'hospital_id' => 3,
                'specialty_id' => 1, // افترض وجود تخصص 'طب الأسرة' بمعرف 1
                'city_id' => 3,
                'status' => 1,
            ],
        ];

        DB::table('doctors')->insert($doctors);

        $offers = [
            [
                'title' => 'فحص شامل للقلب',
                'image' => 'offer1.jpg',
                'price' => 1500.00,
                'new_price' => 999.00,
                'body' => 'يشمل الفحص: تخطيط قلب كهربائي، إيكو قلب، تحليل إنزيمات القلب، استشارة طبيب قلب.',
                'hospital_id' => 1, // افترض وجود مستشفى بمعرف 1
                'status' => 1,
                'start_at' => Carbon::now(),
                'end_at' => Carbon::now()->addMonth(1),
            ],
            [
                'title' => 'باقة صحة المرأة',
                'image' => 'offer2.jpg',
                'price' => 1200.00,
                'new_price' => 750.00,
                'body' => 'فحص نساء شامل، مسحة عنق الرحم، فحص الثدي السريري، تحليل فيتامين د.',
                'hospital_id' => 2, // افترض وجود مستشفى بمعرف 2
                'status' => 1,
                'start_at' => Carbon::now()->subDays(5),
                'end_at' => Carbon::now()->addMonth(2),
            ],
            [
                'title' => 'خصم على الكشف بجميع التخصصات',
                'image' => 'offer3.jpg',
                'price' => 300.00,
                'new_price' => 199.00,
                'body' => 'خصم خاص على سعر الكشف لأول مرة في أي تخصص داخل المستشفى.',
                'hospital_id' => 3, // افترض وجود مستشفى بمعرف 3
                'status' => 1,
                'start_at' => Carbon::now(),
                'end_at' => Carbon::now()->addWeeks(3),
            ],
            [
                'title' => 'فحص السكري الشامل',
                'image' => 'offer4.jpg',
                'price' => 800.00,
                'new_price' => 499.00,
                'body' => 'تحليل سكر صائم، سكر تراكمي، وظائف كلى، فحص قدم سكري، استشارة تغذية.',
                'hospital_id' => 1,
                'status' => 1,
                'start_at' => Carbon::now()->addWeek(1),
                'end_at' => Carbon::now()->addMonth(1)->addWeek(1),
            ],
            [
                'title' => 'باقة متابعة الحمل',
                'image' => 'offer5.jpg',
                'price' => 3000.00,
                'new_price' => 2000.00,
                'body' => '4 زيارات متابعة حمل، 2 أشعة سونار ثلاثية الأبعاد، تحاليل دورية.',
                'hospital_id' => 2,
                'status' => 1,
                'start_at' => Carbon::now(),
                'end_at' => Carbon::now()->addMonths(3),
            ],
        ];

        DB::table('offers')->insert($offers);



        Contact::factory(5)->create();
        // Doctor::factory(10)->create();
        // Hospital::factory(10)->create();
        // Offer::factory(10)->create();
        // Order::factory(10)->create();
        Page::factory(10)->create();
        Review::factory(10)->create();
        Slide::factory(3)->create();
        // Specialty::factory(10)->create();
        // User::factory(5)->create();
    }
}
