<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrivacyPoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('privacy_policies')->delete();
        
        \DB::table('privacy_policies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'lang' => 'en',
                'text' => '<h1>privacy policy</h1><h3><strong>1. Introduction</strong></h3><p>Welcome to Firo! We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website.</p><h3><strong>2. Information We Collect</strong></h3><ul><li><strong>Personal Information:</strong> We may collect personal information such as your name, email address, phone number, and payment details when you register on our site, subscribe to our newsletter, or engage in other activities.</li><li><strong>Usage Data:</strong> We collect information about your interactions with our website, including IP address, browser type, pages visited, and the time and date of your visit.</li></ul><h3><strong>3. How We Use Your Information</strong></h3><ul><li>To provide and maintain our services.</li><li>To notify you about changes to our services.</li><li>To allow you to participate in interactive features of our website.</li><li>To provide customer support.</li><li>To gather analysis or valuable information to improve our website.</li><li>To monitor the usage of our website.</li><li>To detect, prevent, and address technical issues.</li></ul><h3><strong>4. Sharing Your Information</strong></h3><p>We do not sell, trade, or otherwise transfer your personal information to outside parties except as described in this Privacy Policy. We may share your information with:</p><ul><li><strong>Service Providers:</strong> To assist us in operating our website and conducting our business.</li><li><strong>Legal Requirements:</strong> If required by law or in response to valid requests by public authorities.</li></ul><h3><strong>5. Security of Your Information</strong></h3><p>We use administrative, technical, and physical security measures to protect your personal information. However, no method of transmission over the internet or method of electronic storage is 100% secure.</p><h3><strong>6. Your Data Protection Rights</strong></h3><p>Depending on your location, you may have the following rights regarding your personal information:</p><ul><li>The right to access – You have the right to request copies of your personal data.</li><li>The right to rectification – You have the right to request that we correct any information you believe is inaccurate.</li><li>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</li><li>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</li><li>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</li><li>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</li></ul><h3><strong>7. Changes to This Privacy Policy</strong></h3><p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>',
                'last_update_by' => 1,
                'created_at' => '2024-02-02 02:36:52',
                'updated_at' => '2024-12-20 18:01:58',
            ),
            1 => 
            array (
                'id' => 2,
                'lang' => 'ar',
                'text' => '<h1 dir="rtl">سياسة الخصوصية</h1><h3 dir="rtl"><strong>1. المقدمة</strong></h3><p dir="rtl">مرحبًا بكم في Firo! نحن ملتزمون بحماية خصوصيتك. تشرح سياسة الخصوصية هذه كيفية جمع واستخدام وحماية معلوماتك عند زيارة موقعنا.</p><h3 dir="rtl"><strong>2. المعلومات التي نجمعها</strong></h3><ul dir="rtl"><li><strong>المعلومات الشخصية:</strong> قد نجمع معلومات شخصية مثل اسمك، عنوان بريدك الإلكتروني، رقم هاتفك، وتفاصيل الدفع عند التسجيل في موقعنا، الاشتراك في نشرتنا الإخبارية، أو المشاركة في أنشطة أخرى.</li><li><strong>بيانات الاستخدام:</strong> نجمع معلومات حول تفاعلاتك مع موقعنا، بما في ذلك عنوان IP، نوع المتصفح، الصفحات التي تمت زيارتها، ووقت وتاريخ زيارتك.</li></ul><h3 dir="rtl"><strong>3. كيفية استخدام معلوماتك</strong></h3><ul dir="rtl"><li>لتقديم وصيانة خدماتنا.</li><li>لإخطارك بالتغييرات في خدماتنا.</li><li>للسماح لك بالمشاركة في الميزات التفاعلية لموقعنا.</li><li>لتقديم دعم العملاء.</li><li>لجمع التحليل أو المعلومات القيمة لتحسين موقعنا.</li><li>لمراقبة استخدام موقعنا.</li><li>لاكتشاف ومنع ومعالجة المشاكل التقنية.</li></ul><h3 dir="rtl"><strong>4. مشاركة معلوماتك</strong></h3><p dir="rtl">نحن لا نبيع أو نتاجر أو ننقل معلوماتك الشخصية إلى أطراف خارجية إلا كما هو موضح في سياسة الخصوصية هذه. قد نشارك معلوماتك مع:</p><ul dir="rtl"><li><strong>مقدمي الخدمات:</strong> لمساعدتنا في تشغيل موقعنا وإدارة أعمالنا.</li><li><strong>المتطلبات القانونية:</strong> إذا كان ذلك مطلوبًا بموجب القانون أو استجابة لطلبات صالحة من السلطات العامة.</li></ul><h3 dir="rtl"><strong>5. أمان معلوماتك</strong></h3><p dir="rtl">نستخدم تدابير أمنية إدارية وتقنية وفيزيائية لحماية معلوماتك الشخصية. ومع ذلك، لا توجد طريقة نقل عبر الإنترنت أو طريقة تخزين إلكترونية آمنة بنسبة 100%.</p><h3 dir="rtl"><strong>6. حقوق حماية بياناتك</strong></h3><p dir="rtl">اعتمادًا على موقعك، قد تكون لديك الحقوق التالية فيما يتعلق بمعلوماتك الشخصية:</p><ul dir="rtl"><li>الحق في الوصول – لديك الحق في طلب نسخ من بياناتك الشخصية.</li><li>الحق في التصحيح – لديك الحق في طلب تصحيح أي معلومات تعتقد أنها غير دقيقة.</li><li>الحق في المحو – لديك الحق في طلب محو بياناتك الشخصية، في ظل ظروف معينة.</li><li>الحق في تقييد المعالجة – لديك الحق في طلب تقييد معالجة بياناتك الشخصية، في ظل ظروف معينة.</li><li>الحق في الاعتراض على المعالجة – لديك الحق في الاعتراض على معالجة بياناتك الشخصية، في ظل ظروف معينة.</li><li>الحق في نقل البيانات – لديك الحق في طلب نقل البيانات التي جمعناها إلى منظمة أخرى، أو مباشرة إليك.</li></ul>',
                'last_update_by' => 1,
                'created_at' => '2024-02-02 02:36:52',
                'updated_at' => '2024-12-20 18:05:24',
            ),
        ));
        
        
    }
}