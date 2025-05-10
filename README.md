## متطلبات التثبيت

تأكد من أن لديك المتطلبات الأساسية التالية مثبتة على جهازك:

* PHP >= 8.1
* Composer
* Node.js و npm (أو yarn)
* قاعدة بيانات (مثل MySQL، PostgreSQL، SQLite)
* Git

## خطوات التثبيت

### خطوات التثبيت

* [x] **استنساخ المستودع:** قم باستنساخ مستودع Git الخاص بالتطبيق باستخدام الأمر التالي:
    ```bash
    git clone [https://github.com/a6e6s/CSDS.git](https://github.com/a6e6s/CSDS.git)
    cd CSDS
    ```

* [x] **تثبيت الاعتمادات باستخدام Composer:** قم بتثبيت تبعيات PHP باستخدام Composer:
    ```bash
    composer install
    ```

* [x] **تثبيت حزم Node.js:** قم بتثبيت تبعيات JavaScript باستخدام npm:
    ```bash
    npm install
    ```

* [x] **بناء أصول التطبيق:** قم بتجميع أصول التطبيق (CSS، JavaScript، إلخ):
    ```bash
    npm run build
    ```

* [x] **توليد مفتاح التطبيق:** قم بإنشاء مفتاح تطبيق Laravel جديد:
    ```bash
    php artisan key:generate
    ```

* [x] **ربط مجلد التخزين:** قم بإنشاء رابط رمزي لمجلد `storage/app/public` في المجلد `public`:
    ```bash
    php artisan storage:link
    ```

* [x] **تشغيل الترحيلات وتعبئة قاعدة البيانات:** قم بتنفيذ ترحيلات قاعدة البيانات وتشغيل الـ seeders (إذا كانت موجودة):
    ```bash
    php artisan migrate:fresh --seed
    ```

* [x] **تشغيل خادم التطوير:** ابدأ تشغيل خادم تطوير Laravel:
    ```bash
    php artisan serve
    ```

بعد تشغيل الأمر الأخير، يمكنك الوصول إلى التطبيق الخاص بك عادةً عبر `http://localhost:8000`.

## الخطوات التالية (اختياري)

* تكوين ملف `.env` الخاص بك بإعدادات قاعدة البيانات والبيئة الأخرى.
* إنشاء قواعد بيانات إذا لم تكن موجودة.
* استكشاف المزيد من أوامر Artisan (`php artisan list`).
* قراءة وثائق Laravel لمزيد من المعلومات حول تطوير التطبيق.




## todo

### admin
  - [x] building admin CRUD for contacts 
  - [x] building admin CRUD for slides 
  - [x] building admin CRUD for cities
  - [ ] building admin CRUD for hospitals
  - [ ] building admin CRUD for specialities
  - [ ] building admin CRUD for offers
  - [ ] building admin CRUD for doctors
  - [ ] building admin CRUD for reviews
  - [ ] building admin CRUD for available appointment
  - [ ] building admin VIEW for orders

### front
  - [ ] Search
  - [ ] Doctor ,Appointments pages
  - [ ] Doctor dashboard
  - [ ] offers ,offer pages
  - [ ] patient profile
