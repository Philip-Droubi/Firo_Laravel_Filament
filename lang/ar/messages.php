<?php

use App\Enums\CustomerServiceCardStatus;
use App\Enums\CustomerServiceTypes;
use App\Enums\ProjectStatuses;
use App\Enums\ProposalLogStatuses;
use App\Enums\ProposalStatuses;

return [

    /*
    |--------------------------------------------------------------------------
    | App messages Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during App for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    //public
    'now' => 'الآن',
    'yes' => 'نعم',
    'no' => 'لا',
    "days :day ago" => "منذ :day يوم",
    "multiple days :day ago" => "منذ :day أيام",
    'Unknown' => 'غير معروف',
    'somthing went wrong' => 'حدث خطأ ما :(',
    'unauthenticated' => 'غير مصرح بالدخول',
    'UnAuthenticated' => 'غير مصرح بالدخول',
    'invalid data' => 'بيانات غير صالحة',
    'Invalid credentials' => 'بيانات غير صالحة',
    'Bad request' => 'طلب غير صحيح',
    'Too many requests' => 'العديد من الطلبات',
    'Access denied' => 'تم رفض الوصول',
    'Welcome' => ' مرحبا ',
    'Not found' => 'غير موجود',
    'User not found' => 'المستحدم غير موجود',
    'UnAccepted action' => 'فعل غير مقبول',
    'deleted' => 'تم الحذف',
    'auto generated' => 'توليد تلقائي',
    'No changes occurred' => 'لم يحدث أي تغيير',
    'Updated successfully' => 'تم التحديث بنجاح',
    'You need to logIn' => 'يتوجب عليك تسجيل الدخول',
    'You need to recover this account first' => 'عليك استعادة الحساب أولا',
    'Server is running' => 'السيرفر شغال ومتل الليرة',
    'Requset sent.' => 'تم إرسال الطلب',
    'Account deleted' => 'تم حذف الحساب',
    'Account deactivated' => 'تم تعطيل الحساب',
    'Account activated' => 'تم تنشيط الحساب',
    'Your account has been deactivated' => 'لقد تمَّ تعطيل حسابك',
    'Failed to deactivate your account' => 'فشل في إلغاء تفعيل حسابك',
    'Reactive your account' => 'إعادة تفعيل حسابك',
    'The user account has been reactivated.' => 'تم إعادة تفعيل حساب المستخدم',
    'Password updated' => 'تم تحديث كلمة المرور',
    'Password update' => 'تحديث كلمة المرور',
    'User not found or already has an account' => 'لم يتم العثور على المستخدم أو انه بالفعل يملك حساب',
    'logged out' => 'تم تسجيل الخروج',
    'Login denied' => 'تم رفض تسجيل الدخول',
    "The deletion was rejected" => "تم رفض عملية الحذف",
    "created" => "تم الإنشاء",
    "Please come between" => 'الرجاء الحضور بين تاريخ ',
    "The app has never been used" => "لم يستخدم التطبيق مطلقا",
    "Your account is not activated." => "حسابك ليس فعال",
    "User not found or The user does not have an account" => "المستخدم غير موجود أو أنه بالأصل لا يملك حساب",
    "You can't edit or delete this type" => "لا يمكنك تعديل أو حذف هذا النوع",
    "Account password has been changed" => "لقد تمَّ تغيير كلمة مرور حسابك",
    "Password reset" => "إعادة تعيين كلمة المرور",
    "Too many connections, please try again later." => "العديد من محاولات الاتصال, الرجاء المحاولة لاحقا",
    "Route not found" => "مسار غير موجود",
    "Invalid OTP" => "رمز تحقق غير صالح",
    "You can't delete this type" => "لا يمكنك حذف هذا النوع",
    "Email verification" => "تأكيد بريد إلكتروني",
    "invalid app version" => "إصدار غير صحيح",
    "Invalid platform type" => "نوع منصة غير مقبول",
    "Type is not valid" => "نوع غير مقبول",
    "Failed to delete"  => "تعذر الحذف",
    "Two-factor authentication" => "رمز المصادقة الثنائية",
    "Too many login attempts" => "العديد من محاولات تسجيل الدخول, الرجاء المحاولة بعد :decay_minutes دقائق.",
    "Invalid request" => "طلب غير صحيح",
    "User reported" => "تم الإبلاغ عن المستخدم, شكرا",
    "retrieved" => "تمت الاستعادة",
    "failed to retrieve" => "فشلت الاستعادة",
    "Firo admin" => "مدير في فيرو",
    "Can not report this" => "لا يمكن الإبلاغ على هذا",
    "Invalid user" => "مستخدم غير متاح",
    "accepted" => "مقبول",
    "refused" => "مرفوض",
    "undefined" => "غير محدد",
    "Added to favorites list" => "تمت الإضافة إلى قائمة المفضلة",
    "Removed from favorites list" => "تمت الإزالة من قائمة المفضلة",
    "deleted item" => "عنصر محذوف",
    "Can not deactive your account!" => "لا يمكنك تعطيل حسابك",
];
