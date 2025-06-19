## متطلبات التثبيت

تأكد من أن لديك المتطلبات الأساسية التالية مثبتة على جهازك:

* PHP >= 8.3
* Composer
* Node.js >= v20.6.1 و npm (أو yarn) 
* قاعدة بيانات (مثل MySQL، PostgreSQL، SQLite)
* Git

## خطوات التثبيت

### خطوات التثبيت

*  **استنساخ المستودع:** قم باستنساخ مستودع Git الخاص بالتطبيق باستخدام الأمر التالي:
    ```bash
    git clone [https://github.com/a6e6s/CSDS.git](https://github.com/a6e6s/CSDS.git)
    cd CSDS
    ```

*  **تثبيت الاعتمادات باستخدام Composer:** قم بتثبيت تبعيات PHP باستخدام Composer:
    ```bash
    composer install
    ```

*  **تثبيت حزم Node.js:** قم بتثبيت تبعيات JavaScript باستخدام npm:
    ```bash
    npm install
    ```

*  **بناء أصول التطبيق:** قم بتجميع أصول التطبيق (CSS، JavaScript، إلخ):
    ```bash
    npm run build
    ```

*  **توليد مفتاح التطبيق:** قم بإنشاء مفتاح تطبيق Laravel جديد:
    ```bash
    php artisan key:generate
    ```

*  **ربط مجلد التخزين:** قم بإنشاء رابط رمزي لمجلد `storage/app/public` في المجلد `public`:
    ```bash
    php artisan storage:link
    ```

*  **تشغيل الترحيلات وتعبئة قاعدة البيانات:** قم بتنفيذ ترحيلات قاعدة البيانات وتشغيل الـ seeders (إذا كانت موجودة):
    ```bash
    php artisan migrate:fresh --seed
    ```

*  **تشغيل خادم التطوير:** ابدأ تشغيل خادم تطوير Laravel:
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
  - [x] building admin CRUD for hospitals
  - [x] building admin CRUD for specialities
  - [x] building admin CRUD for offers
  - [x] building admin CRUD for doctors
  - [x] building admin CRUD for reviews
  - [ ] building admin CRUD for available appointment
  - [x] building admin VIEW for orders

### front
  - [x] Search
  - [x] Doctor 
  - [x] Doctors 
  - [ ] Doctor dashboard
  - [ ] Appointments pages
  - [ ] offers ,offer pages
  - [ ] patient profile
