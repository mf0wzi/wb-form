<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute .',
    'active_url' => 'الرابط ليس صالحًا. :attribute',
    'after' => 'يجب أن يكون :attribute تاريخًا بع :date.',
    'after_or_equal' => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن يحتوي :attribute على أحرف فقط.',
    'alpha_dash' => 'يجب أن يحتوي :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط.',
    'array' => 'يجب أن يكون :attribute عبارة عن مصفوفة.',
    'before' => 'يجب أن يكون :attribute تاريخًا سابقًا :date.',
    'before_or_equal' => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date.',
    'between' => [
        'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
        'file' => 'يجب أن يكون :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون :attribute بين :min و :max الأحرف.',
        'array' => 'يجب أن يكون :attribute بين :min و :max العناصر.',
    ],
    'boolean' => 'يجب أن يكون :attribute الحقل "صح" أو "خطأ".',
    'confirmed' => 'تأكيد لـ :attribute غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'هذا :attribute ليس تاريخًا صالحًا.',
    'date_equals' => 'يجب أن يكون :attribute  تاريخًا مساويًا لـ :date.',
    'date_format' => 'هذا :attribute لا يطابق صيغة :format.',
    'different' => 'يجب أن يكون :attribute و :other مختلفين.',
    'digits' => 'هذا :attribute يجب أن :digits رقم',
    'digits_between' => 'يجب أن يكون :attribute بين :min و :max للأرقام.',
    'dimensions' => 'يحتوي :attribute على أبعاد صورة غير صالحة.',
    'distinct' => 'هذا :attribute له قيمة مكررة.',
    'email' => 'يجب أن يكون عنوان :attribute صالحًا.',
    'ends_with' => 'يجب أن ينتهي :attribute بواحد مما يلي: :values.',
    'exists' => 'هذا :attribute المحدد غير صالح.',
    'file' => 'يجب أن يكون :attribute ملفًا.',
    'filled' => 'يجب أن يكون لهذا :attribute قيمة.',
    'gt' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أكبر من :value حروف.',
        'array' => 'يجب أن يكون :attribute أكبر من :value العناصر.',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
        'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أكبر من أو يساوي :value حروف.',
        'array' => 'يجب أن يحتوي :attribute على :value عناصر أو أكثر.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
        'file' => 'يجب ألا يكون :attribute أكبر من :max كيلوبايت.',
        'string' => 'يجب ألا يكون :attribute أكبر من :max حروف.',
        'array' => 'يجب ألا يكون :attribute أكبر من :max العناصر.',
    ],
    'mimes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'mimetypes' => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'min' => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'file' => 'يجب أن يكون :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يكون :attribute على الأقل :min حروف.',
        'array' => 'يجب ألا يكون :attribute على الأقل :min العناصر.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'تنسيق :attribute غير صالح.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'كلمة المرور غير صحيحة',
    'present' => 'The :attribute field must be present.',
    'regex' => 'تنسيق :attribute غير صالح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'يكون هذا :attribute مطلوبًا عندما :other هو :value.',
    'required_unless' => 'يكون هذا :attribute مطلوبًا ما لم يكن :other الآخر في :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'تنسيق :attribute غير صالح.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'personal_information' => '1. البيانات الشخصية لصاحب المنشأة',
        'company_information' => '2. بيــــانات المنـــشأة',
        'company_information_other' => '3. بيــــانات المنـــشأة',
        'general_information' => '4. بيانات عامة',
        'next' => 'التالي',
        'previous' => 'سابق',
        'complete' => 'أنهى',
        'name' => 'الاسم',
        'email' => 'بريد إلكتروني',
        'phone' => 'رقم الهاتف',
        'password' => 'كلمه السر',
        'password_name' => 'كلمه السر',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'remember_me' => 'تذكرنى',
        'terms' => 'شرط',
        'already_registered' => 'هل انت مسجل من قبل؟',
        'forget_password' => ' نسيت كلمة المرور ',
        'login' => 'تسجيل الدخول',
        'register' => 'تسجيل حساب جديد',
        'registration_success' => 'نجاح التسجيل',
        'registration_finish_message' => 'شكرا لك. لقد أرسلنا لك بريدًا إلكترونيًا إلى :email',
        'back_to_home' => 'العودة إلى الصفحة الرئيسية',
        'arabic_name' => 'الاسم (باللغة العربية)',
        'english_name' => 'الاسم (باللغة الإنجليزية)',
        'gender' => 'الجنــس',
        'birthday' => 'تاريخ الميـــلاد',
        'mobile_number' => 'رقم الجوال',
        'kin_mobile_number' => 'رقم جوال أقرب شخص',
        'city' => 'المدينة',
        'district' => 'المديرية',
        'address' => 'العنوان',
        'qualification' => 'المؤهل الدراسي',
        'com_name' => 'اسم المنشأة',
        'com_city' => 'المحافظة',
        'com_district' => 'المديرية',
        'com_address' => 'عنوان المنشأة',
        'com_number' => 'رقم تلفون المنشأة',
        'com_fax' => 'رقم الفاكس',
        'com_email' => 'البريد الالكتروني',
        'com_sector' => 'قطاع المنشآة',
        'com_other_sector' => 'أخرى، اذكر قطاع العمل',
        'com_area' => 'مجال العمل',
        'com_activities' => 'ماهي الأنشطة التي تقوم بها المنشأة / الجمعية',
        'com_size' => 'ما هو حجم منشأتك بناءً على عدد موظفي المنشأة ؟',
        'com_esta_date' => 'تاريخ التأسيس',
        'com_male_per_emp_no' => 'عدد الموظفين ذكور الأساسيين',
        'com_female_per_emp_no' => 'عدد الموظفين إناث الأساسيين',
        'com_per_emp_avg_salary' => 'متوسط الراتب',
        'com_male_tem_emp_no' => 'عدد العمالة ذكور المؤقتة',
        'com_female_tem_emp_no' => 'عدد العمالة إناث المؤقتة',
        'com_tem_emp_avg_salary' => 'متوسط الأجور ',
        'com_bank_account' => 'هل لديك حساب بنكي؟  يرجى ذكر البنك',
        'com_other_bank_account' => 'يرجى ذكر حساب بنكي اخر ؟',
        'com_permit' => 'هل لديك تصريح عمل',
        'com_permit_other' => 'نوع التصريح ؟ الاخر',
        'com_permit_renewal_date' => 'تاريخ آخر تجديد',
        'com_archive' => 'هل تقوم بأرشفة عملياتك المالية و الإدارية ؟',
        'com_clients_no_2020' => 'عدد العملاء (منشآت صغيرة و متوسطة / أعضاء الجمعية) في 2020',
        'com_supplier_no' => 'عدد الموردين الذين تتعامل معهم منشأتك لاستيراد المواد / الآلات الأساسية لتشغيل المنشأة',
        'com_firm_no' => 'عدد الشركات التي تقوم بتوزيع منتجاتك لها / في حالة امتلاك منشأة خدمية كم هي الشركات التي تقدم لها خدماتك',
        'com_external_audit' => 'هل تقوم الشركة بالاستعانة بشركة / استشاري لعمل المراجعة الخارجية للمنشأة',
        'com_external_audit_yes' => 'هل تقوم المنشأة بطلب عمل مراجعة دورية؟ ',
        'com_last_external_audit' => 'متى كانت آخر عملية مراجعة ؟',
        'com_partner' => 'هل يوجد لديك شريك ؟',
        'com_your_job_description' => 'صفتك الوظيفية؟',
        'com_your_job_description_other' => 'صفتك الوظيفية أخر؟',
        'com_financial_source' => 'هل لديك المصدر المالي لتغطية ما نسبته (50%) من تكاليف خطة استمرارية مشروعك  (10 الف إلى 15 الف دولار)؟',
        'com_financial_source_amount' => 'في حالة الإجابة نعم: كم مقدرتك المالية ؟',
        'com_smeps_financial_assist_before' => 'هل حصلت على تمويل سابق من قبل وكالة تنمية المنشآت الصغيرة والأصغر ؟',
        'com_how_do_you_know' => 'كيف عرفت عن المشروع ؟',
        'com_how_do_you_know_other' => 'كيف عرفت عن المشروع ؟  أخرى',
        ],

];
