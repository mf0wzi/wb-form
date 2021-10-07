<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  mixed  $email
     */
    public function sendEmail($email, $name = null)
    {
        $details = [
            'name' => $name,

            'title' => 'مشروع تحسين الحماية المجتمعية والاستجابة لجائحة كورونا',

            'body' => 'تم تسجيل معلومات حسابك الأولية بنجاح ، يرجى تسجيل الدخول مرة أخرى وإكمال استمارة ورفع الملفات المطلوبة',

            'url' => 'https://wb.smeps-brave.org/dashboard/',

            'button' => ' استكمال تسجيل المعلومات المتبقية',

            'thanks' => 'شكرا'

        ];

        $emailAddress = $email;
        Mail::to("$emailAddress")->send(new \App\Mail\SuccessfullyRegistered($details));
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[7][0-9]*$/u', 'max:9', 'unique:users'],
//            'phone' => ['required', 'string', 'regex:/^((([0\u0660\u06F0]|([1-9\u0661-\u0669\u06F1-\u06F9][0\u0660\u06F0]*?)+)(\.)[0-9\u0660-\u0669\u06F0-\u06F9]*)|(([0\u0660\u06F0]?|([1-9\u0661-\u0669\u06F1-\u06F9][0\u0660\u06F0]*?)+))|\b)$/', 'max:9', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'uuid' => Str::uuid()->toString(),
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $this->sendEmail( $input['email'],$input['name']);

        return $user;
    }
}
