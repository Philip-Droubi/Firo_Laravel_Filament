<?php

use App\Enums\CustomerServiceCardStatus;
use App\Enums\CustomerServiceTypes;

return [

    /*
    |--------------------------------------------------------------------------
    | App Keys Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for various keys in the system
    | that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    //Public
    'yes' => 'نعم',
    'no' => 'لا',
    'draft' => 'مسودة',
    'item' => 'عنصر',
    'items' => 'عناصر',
    'logs' => 'سجلات',
    'text' => 'النص',
    'lang' => 'اللغة',
    'author' => 'المؤلف',
    'name' => 'الاسم',
    'name_en' => 'اسم إنكليزي',
    'name_ar' => 'اسم عربي',
    'description' => 'الوصف',
    'type' => 'النوع',
    'link' => 'الرابط',
    'title' => 'العنوان',
    'device_name' => 'الجهاز',
    'ip_address' => 'عنوان ال IP',
    'main_image' => 'الصورة الرئيسية',
    'status info' => 'معلومات الحالة',
    'title & description' => 'العنوان والوصف',
    'messages count' => 'عدد الرسائل',
    'your-message' => 'رسالتك',
    'no messages yet' => 'لا يوجد رسائل بعد!',
    'send' => 'إرسال',
    'question' => 'سؤال',
    'answer' => 'إجابة',
    'visible' => 'مرئي',
    'invisible' => 'غير مرئي',
    'visibility' => 'الرؤية',
    'active' => 'فعّال',
    'all' => 'الكل',
    'inactive' => 'غير فعال',
    'status' => 'الحالة',
    'image' => 'الصورة',
    'message' => 'رسالة',
    'private' => 'خاص',
    'public' => 'عام',
    'close' => 'إغلاق',
    'open' => 'فتح',
    'reopen' => 'إعادة فتح',
    'deleted' => 'محذوف',
    'deleted_at' => 'تاريخ الحذف',
    'published' => 'منشور',
    'published_at' => 'تاريخ النشر',
    'deactive_at' => 'تاريخ إلغاء التفعيل',
    'created_by' => 'أنشء بواسطة',
    'updated_by' => 'عُدل بواسطة',
    'last_updated_by' => 'عُدل بواسطة',
    'created_at' => 'تاريخ الإنشاء',
    'updated_at' => 'تاريخ التحديث',

    //Navigation Groups
    'system info' => 'معلومات النظام',
    'system management' => 'إدارة النظام',
    'system users' => 'مستخدمي النظام',
    'system services' => 'خدمات النظام',

    //Country & State
    'country' => 'دولة',
    'countries' => 'الدول',
    'state' => 'المحافظة/ولاية',
    'states' => 'المحافظات/الولايات',
    'city' => 'المدينة',
    'country code' => 'رمز الدولة',
    'dial code' => 'رمز الهاتف',

    //Contact Us
    'contact us' => 'تواصل معنا',
    'contact' => 'وسيلة تواصل',
    'contacts' => 'وسائل التواصل',

    //About us
    'about us' => 'من نحن',

    //TOS
    'term' => 'شرط خدمة',
    'term of services' => 'شروط الخدمة',

    //Privacy Policies
    'privacy policies' => 'سياسات الخصوصية',

    //FAQ
    'faq' => 'الأسئلة الشائعة',

    //Main Reports
    'main reports' => 'أنواع البلاغات',
    'report' => 'بلاغ',
    'reports' => 'بلاغات',

    //Defined Skills
    'skills' => 'المهارات',
    'skill' => 'مهارة',

    //Categories & Sub-Categories
    'categories' => 'الفئات',
    'category' => 'فئة',
    'sub categories' => 'الفئات الفرعية',
    'sub category' => 'فئة فرعية',

    //App Features
    'feature' => 'ميزة',
    'app features' => 'ميزات النظام',

    //Articles
    'articles' => 'مقالات',
    'article' => 'مقالة',
    'Article Creation Info' => 'معلومات إنشاء المقالة',

    //Roles
    'role' => 'دور',
    'roles' => 'الأدوار',
    'abilities' => 'الصلاحيات',

    //Users
    'users' => 'مستخدمين',
    'user' => 'مستخدم',
    'admin' => 'مدير',
    'admins' => 'مدراء',
    'about user' => 'حول المستخدم',
    'account name' => 'اسم الحساب',
    'email' => 'البريد الالكتروني',
    'phone number' => 'رقم الهاتف',
    'last seen' => 'آخر ظهور',
    'first name' => 'الاسم الأول',
    'middle name' => 'الاسم الأوسط',
    'last name' => 'الاسم الأخير',
    'birth date' => 'تاريخ الميلاد',
    'portfolio' => 'معرض الأعمال',
    'password' => 'كلمة المرور',
    'password confirmation' => 'تأكيد كلمة المرور',
    'User Account Info' => 'معلومات حساب المستخدم',
    'User personal info' => 'معلومات المستخدم الشخصية',
    'User Creation Info' => 'معلومات إنشاء المستخدم',
    'Creation Info' => 'معلومات الإنشاء',
    'Account Status' => 'حالة الحساب',
    'Account is active' => 'الحساب فعال',
    'bg_image' => 'صورة الغلاف',
    'freelancer' => 'مستقل',
    'stakeholder' => 'صاحب عمل',
    'tfa' => 'مصادقة ثنائية',
    'logout all' => 'تسجيل الخروج لكل أجهزتي',

    //Login History
    'login history page title' => ' :user_name سجل تسجيل الدخول لـ',
    'login history' => 'سجل تسجيل الدخول',

    //Auth
    'Email / Username' => 'البريد الالكتروني / اسم المستخدم',

    //Ban System
    'ban log' => 'سجل الحظر',
    'reason' => 'السبب',
    'auto ban' => 'حظر آلي',
    'banned_until' => 'حظر لغاية',
    'banned only' => 'فقط المحظورين',
    'ban user' => 'حظر المستخدم',
    'unban user' => 'إلغاء حظر المستخدم',
    'ban' => 'حظر',
    'banned_user' => 'المستخدم المحظور',

    //User Points
    'points' => 'النقاط',
    'user_points' => 'نقاط المستخدم',
    'case' => 'الحالة',

    //User Reports
    "reporter name" => 'اسم المُبَلِغ',
    "reported name" => 'اسم المُبَلَغ عنه',
    "report case" => 'نوعية البلاغ',
    "report on" => 'بلاغ على',
    "reports on" => 'بلاغات على',
    "report type" => 'نوع البلاغ',
    'reports count' => 'عدد البلاغات',

    //User Service
    'users services' => 'خدمات المستخدمين',
    'user service' => 'خدمة المستخدم',
    'user services' => 'خدمة المستخدم',

    //DashBoard
    'this week' => ' لهذا الاسبوع',
    'this month' => ' لهذا الشهر',
    'all time' => 'في كل الأوقات',
    'new users' => 'المستخدمين الجدد',
    'active admins' => 'المدراء النشطين',

    //Customer card
    CustomerServiceCardStatus::PENDING->value => 'باللإنتظار',
    CustomerServiceCardStatus::OPEN->value => 'مفتوح',
    CustomerServiceCardStatus::CLOSED->value => 'مغلق',
    CustomerServiceTypes::INQUIRY->value => 'استفسار',
    CustomerServiceTypes::BUG->value  => 'مشكلة تقنية',
    'customer cards' => 'بطاقات خدمة العميل',
    'customers cards' => 'بطاقات خدمة العملا',
    'customer card' => 'بطاقة خدمة العميل',
];
