<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('about_us')->delete();
        
        \DB::table('about_us')->insert(array (
            0 => 
            array (
                'id' => 1,
                'lang' => 'en',
                'text' => '<h1>About Us</h1><h3>Welcome to Firo!</h3><p>At Firo, we are dedicated to connecting talented freelancers with clients who need their expertise. Our platform is designed to make freelancing easy, efficient, and rewarding for everyone involved.</p><h3><strong>Our Mission</strong></h3><p>Our mission is to empower freelancers by providing a platform that offers diverse opportunities and fosters professional growth. We aim to help clients find the perfect match for their projects, ensuring high-quality results and satisfaction.</p><h3><strong>Our Vision</strong></h3><p>We envision a world where freelancers can thrive and clients can easily access top-notch talent. Our goal is to be the go-to platform for freelancing, where both freelancers and clients can achieve their goals seamlessly.</p><h3><strong>Our Values</strong></h3><ul><li><strong>Integrity:</strong> We maintain the highest standards of honesty and transparency in all our interactions.</li><li><strong>Innovation:</strong> We continuously seek new ways to improve our platform and services.</li><li><strong>Excellence:</strong> We are committed to delivering exceptional experiences for both freelancers and clients.</li><li><strong>Collaboration:</strong> We believe in the power of teamwork and the value of diverse perspectives.</li></ul><h3><strong>Meet the Team</strong></h3><p>Our team is composed of passionate professionals who are experts in their fields. From developers to customer support, we work together to ensure that Firo is the best place for freelancers and clients to connect and collaborate.</p><p>Thank you for choosing Firo. We look forward to helping you achieve your freelancing and project goals.</p>',
                'last_update_by' => 1,
                'created_at' => '2024-02-02 02:28:15',
                'updated_at' => '2024-12-20 17:50:29',
            ),
            1 => 
            array (
                'id' => 2,
                'lang' => 'ar',
                'text' => '<h1 dir="rtl">حول</h1><h3 dir="rtl">مرحبًا بكم في Firo!</h3><p dir="rtl">في Firo، نحن ملتزمون بربط المستقلين الموهوبين مع العملاء الذين يحتاجون إلى خبراتهم. تم تصميم منصتنا لجعل العمل الحر سهلًا وفعالًا ومجزٍ للجميع.</p><h3 dir="rtl"><strong>مهمتنا</strong></h3><p dir="rtl">مهمتنا هي تمكين المستقلين من خلال توفير منصة تقدم فرصًا متنوعة وتعزز النمو المهني. نحن نسعى لمساعدة العملاء في العثور على المطابقة المثالية لمشاريعهم، مما يضمن نتائج عالية الجودة ورضا تام.</p><h3 dir="rtl"><strong>رؤيتنا</strong></h3><p dir="rtl">نحن نتطلع إلى عالم يمكن فيه للمستقلين الازدهار ويمكن للعملاء الوصول بسهولة إلى أفضل المواهب. هدفنا هو أن نكون المنصة المفضلة للعمل الحر، حيث يمكن لكل من المستقلين والعملاء تحقيق أهدافهم بسلاسة.</p><h3 dir="rtl"><strong>قيمنا</strong></h3><ul dir="rtl"><li><strong>النزاهة:</strong> نحن نحافظ على أعلى معايير الصدق والشفافية في جميع تعاملاتنا.</li><li><strong>الابتكار:</strong> نحن نسعى باستمرار لتحسين منصتنا وخدماتنا بطرق جديدة.</li><li><strong>التميز:</strong> نحن ملتزمون بتقديم تجارب استثنائية لكل من المستقلين والعملاء.</li><li><strong>التعاون:</strong> نحن نؤمن بقوة العمل الجماعي وقيمة وجهات النظر المتنوعة.</li></ul><h3 dir="rtl"><strong>تعرف على الفريق</strong></h3><p dir="rtl">فريقنا يتكون من محترفين شغوفين وخبراء في مجالاتهم. من المطورين إلى دعم العملاء، نعمل معًا لضمان أن تكون Firo أفضل مكان لربط المستقلين والعملاء والتعاون بينهم.</p><p dir="rtl">شكرًا لاختياركم Firo. نتطلع إلى مساعدتكم في تحقيق أهدافكم في العمل الحر والمشاريع.</p>',
                'last_update_by' => 1,
                'created_at' => '2024-02-02 02:28:15',
                'updated_at' => '2024-12-20 17:55:22',
            ),
        ));
        
        
    }
}