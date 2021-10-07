<div>
    <x-jet-dialog-modal id="new" maxWidth="2xl" class="pointer-events-none" wire:model="openAddForm">
        <form>
            <x-slot name="title">
                {{ __('View') }}
            </x-slot>

            <x-slot name="content">
                <div class="loading" wire:loading>
                    Submit in Process...
                </div>

                <div class="h-auto">
                    @csrf
                    <div x-data="{ step: {{$step}} }" x-cloak>
                        <div class="max-w-3xl mx-auto px-4 py-10">

                            <div dir="{{ __('system.localization') }}" x-show.transition="step === 'complete'">
                                <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                                    <div>
                                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">{{ __('forms.registration_success') }}</h2>

                                        <div class="text-gray-600 mb-8">
                                            {{ __('forms.registration_finish_message', ['email' => $email]) }}
                                        </div>

                                        <button
                                            x-on:click="$wire.complete().delay(10)"
                                            class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                        >{{ __('forms.back_to_home') }}</button>
                                    </div>
                                </div>
                            </div>

                            <div x-show.transition="step != 'complete'">
                                <!-- Top Navigation -->
                                <div class="border-b-2 py-4">
                                    <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`خطوة: ${step} من 5`"></div>
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                        <div class="flex-1">
                                            <div x-show="step === 1">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">{{__('forms.personal_information')}}</div>
                                            </div>

                                            <div x-show="step === 2">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">{{__('forms.company_information')}}</div>
                                            </div>

                                            <div x-show="step === 3">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">{{__('forms.company_information_other')}}</div>
                                            </div>

                                            <div x-show="step === 4">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">{{__('forms.general_information')}}</div>
                                            </div>

                                            <div x-show="step === 5">
                                                <div class="text-lg font-bold text-gray-700 leading-tight">{{__('forms.files')}}</div>
                                            </div>

                                        </div>

                                        <div class="flex items-center md:w-64">
                                            <div class="w-full bg-white rounded-full mr-2">
                                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 5 * 100) +'%'"></div>
                                            </div>
                                            <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 5 * 100) +'%'"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Top Navigation -->

                                <!-- Step Content -->
                                <div class="py-10 md:py-10 mb-8">

                                    @if ($errors->any())
                                        @foreach ($errors->all() as $key => $error)
                                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                                                <div class="flex">
                                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                                    <div>
                                                        <p class="font-bold">{{ $key+1 }} :</p>
                                                        <p class="text-sm">{{ $error }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div x-show.transition.in="step === 1">

                                        <div class="mt-4">
                                            <x-jet-input type="hidden" wire:model.lazy="form_user_id" id="form_user_id" autocomplete="form_user_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                            <x-jet-input type="hidden" wire:model.lazy="uuid" id="uuid" autocomplete="uuid" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"/>
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="arabic_name" class="block text-sm font-medium text-gray-700">{{__('forms.arabic_name', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="arabic_name" id="arabic_name" autocomplete="arabic_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="arabic_name" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="english_name" class="block text-sm font-medium text-gray-700">{{__('forms.english_name', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="english_name" id="english_name" autocomplete="english_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="english_name" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="gender" class="block text-sm font-medium text-gray-700">{{__('forms.gender', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="gender" wire:model="gender" autocomplete="gender" class="inline-flex justify-center w-full mt-1 rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                                                <option value="">اختر صنف</option>
                                                <option value="male">ذكر</option>
                                                <option value="female">أنثى</option>
                                            </select>
                                            <x-jet-input-error for="gender" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="birthday" class="block text-sm font-medium text-gray-700">{{__('forms.birthday', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-flatpickr name="birthday" wire:model.lazy="birthday" id="birthday" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            {{--                            <x-jet-date-picker id="birthday" name="birthday" wire:model="birthday" autocomplete="off" hidden_element="hidden_start_date" required/>--}}
                                            <x-jet-input-error for="birthday" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="mobile_number" class="block text-sm font-medium text-gray-700">{{__('forms.mobile_number', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="mobile_number" id="mobile_number" autocomplete="mobile_number" maxlength="9" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="mobile_number" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="kin_mobile_number" class="block text-sm font-medium text-gray-700">{{__('forms.kin_mobile_number', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="kin_mobile_number" id="kin_mobile_number" autocomplete="kin_mobile_number" maxlength="9" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="kin_mobile_number" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <div>
                                                <div class="mb-8">
                                                    <x-jet-label for="city" class="block text-sm font-medium text-gray-700">{{__('forms.city', ['extra'=>'*'])}}</x-jet-label>
                                                    <select id="city" name="city" wire:model="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value=''>Choose a city</option>
                                                        @foreach($cities as $city)
                                                            <option value={{ $city->id }}>{{ $city->city_name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-jet-input-error for="city" class="mt-2" />
                                                @if(count($districts) > 0)
                                                    <div class="mb-8">
                                                        <x-jet-label for="district" class="block text-sm font-medium text-gray-700">{{__('forms.district', ['extra'=>'*'])}}</x-jet-label>
                                                        <select id="district" name="district" wire:model="district"
                                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            <option value=''>Choose a District</option>
                                                            @foreach($districts as $district)
                                                                <option value={{ $district->id }}>{{ $district->district_name_ar }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <x-jet-input-error for="district" class="mt-2" />
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="address" class="block text-sm font-medium text-gray-700">{{__('forms.address', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-textarea id="address" wire:model.lazy="address" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="address" required>
                                            </x-jet-textarea>
                                            <x-jet-input-error for="address" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="qualification" class="block text-sm font-medium text-gray-700">{{__('forms.qualification', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="qualification" wire:model.lazy="qualification" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="qualification" required>
                                                <option value="">حدد مستوى التعليم الخاص بك</option>
                                                <option value="None">غير متوفر</option>
                                                <option value="school">المدرسة</option>
                                                <option value="high_school">المدرسة الثانوية</option>
                                                <option value="diploma">دبلوم</option>
                                                <option value="university">جامعة</option>
                                                <option value="master">ماجستير</option>
                                                <option value="phd">دكتوراه</option>
                                            </select>
                                            <x-jet-input-error for="qualification" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="email" class="block text-sm font-medium text-gray-700">{{__('forms.email', ['extra'=>''])}}</x-jet-label>
                                            <x-jet-input type="email" wire:model="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                            <x-jet-input-error for="email" class="mt-2" />
                                        </div>

                                    </div>
                                    <div x-show.transition.in="step === 2">

                                        <div class="mt-4">
                                            <x-jet-label for="com_name" class="block text-sm font-medium text-gray-700">{{__('forms.com_name', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="com_name" id="com_name" autocomplete="com_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_name" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="firmType" class="block text-sm font-medium text-gray-700">{{__('forms.firmType', ['extra'=>''])}}</x-jet-label>
                                            <select id="firmType" wire:model.lazy="firmType" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="firmType">
                                                <option value="">اختر نوع المنشأة</option>
                                                <option value="cooperative_association">جمعية تعاونية</option>
                                                <option value="company">شركة</option>
                                                <option value="supply_chains">سلاسل امداد</option>
                                            </select>
                                            <x-jet-input-error for="firmType" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <div>
                                                <div class="mb-8">
                                                    <x-jet-label for="com_city" class="block text-sm font-medium text-gray-700">{{__('forms.com_city', ['extra'=>'*'])}}</x-jet-label>
                                                    <select id="com_city" name="com_city" wire:model="com_city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        <option value=''>Choose a city</option>
                                                        @foreach($cities as $com_city)
                                                            <option value={{ $com_city->id }}>{{ $com_city->city_name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <x-jet-input-error for="com_city" class="mt-2" />
                                                @if(count($com_districts) > 0)
                                                    <div class="mb-8">
                                                        <x-jet-label for="com_district" class="block text-sm font-medium text-gray-700">{{__('forms.com_district', ['extra'=>'*'])}}</x-jet-label>
                                                        <select id="com_district" name="com_district" wire:model="com_district"
                                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                            <option value=''>Choose a District</option>
                                                            @foreach($com_districts as $com_district)
                                                                <option value={{ $com_district->id }}>{{ $com_district->district_name_ar }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <x-jet-input-error for="com_district" class="mt-2" />
                                                @endif
                                            </div>

                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_address" class="block text-sm font-medium text-gray-700">{{__('forms.com_address', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-textarea id="com_address" wire:model.lazy="com_address" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_address" required>
                                            </x-jet-textarea>
                                            <x-jet-input-error for="com_address" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_number" class="block text-sm font-medium text-gray-700">{{__('forms.com_number', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="com_number" id="com_number" autocomplete="com_number" maxlength="9" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_number" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_fax" class="block text-sm font-medium text-gray-700">{{__('forms.com_fax', ['extra'=>''])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="com_fax" id="com_fax" autocomplete="com_fax" maxlength="6" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_fax" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_email" class="block text-sm font-medium text-gray-700">{{__('forms.com_email', ['extra'=>''])}}</x-jet-label>
                                            <x-jet-input type="email" wire:model.lazy="com_email" id="com_email" autocomplete="com_email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_email" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_sector" class="block text-sm font-medium text-gray-700">{{__('forms.com_sector', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_sector" wire:model.lazy="com_sector" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_sector" required>
                                                <option value="">اختر قطاع المنشآة</option>
                                                <option value="food_processing">إنتاج أغذية</option>
                                                <option value="agriculture">زراعي</option>
                                                <option value="fish">سمكي</option>
                                                <option value="livestock">ثروة حيوانية</option>
                                                <option value="others">أخرى</option>
                                            </select>
                                            <x-jet-input-error for="com_sector" class="mt-2" />
                                        </div>

                                        @if($com_sector == 'others')
                                            <div class="mt-4">
                                                <x-jet-label for="com_other_sector" class="block text-sm font-medium text-gray-700">{{__('forms.com_other_sector', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-input type="text" wire:model.lazy="com_other_sector" id="com_other_sector" autocomplete="com_other_sector" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_other_sector" class="mt-2" />
                                            </div>
                                        @endif

                                        <div class="mt-4">
                                            <x-jet-label for="com_area" class="block text-sm font-medium text-gray-700">{{__('forms.com_area', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_area" wire:model.lazy="com_area" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_area" required>
                                                <option value="">اختر مجال العمل</option>
                                                <option value="commercial">تجاري</option>
                                                <option value="services">خدمي</option>
                                                <option value="industrial">صناعي</option>
                                                <option value="production">إنتاجي</option>
                                            </select>
                                            <x-jet-input-error for="com_area" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_activities" class="block text-sm font-medium text-gray-700">{{__('forms.com_activities', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-textarea id="com_activities" wire:model.lazy="com_activities" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_activities" required>
                                            </x-jet-textarea>
                                            <x-jet-input-error for="com_activities" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_size" class="block text-sm font-medium text-gray-700">{{__('forms.com_size', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_size" wire:model.lazy="com_size" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_size" required>
                                                <option value="">Select your Company Size</option>
                                                <option value="1">منشأة متناهية الصغر : عدد العملاء من 1 إلى 4</option>
                                                <option value="2">منشأة صغيرة : عدد العملاء من 5 إلى 19</option>
                                                <option value="3">منشأة متوسطة : عدد العملاء من 20 إلى 99</option>
                                                <option value="4">منشأة كبيرة : عدد العملاء من 100  فأكثر</option>
                                            </select>
                                            <x-jet-input-error for="com_size" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_esta_date" class="block text-sm font-medium text-gray-700">{{__('forms.com_esta_date', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-flatpickr name="com_esta_date" wire:model.lazy="com_esta_date" id="com_esta_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_esta_date" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_male_per_emp_no" class="block text-sm font-medium text-gray-700">{{__('forms.com_male_per_emp_no', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_male_per_emp_no" id="com_male_per_emp_no" autocomplete="com_male_per_emp_no" maxlength="4" max="9999" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_male_per_emp_no" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_female_per_emp_no" class="block text-sm font-medium text-gray-700">{{__('forms.com_female_per_emp_no', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_female_per_emp_no" id="com_female_per_emp_no" autocomplete="com_female_per_emp_no" maxlength="4" max="9999" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_female_per_emp_no" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_per_emp_avg_salary" class="block text-sm font-medium text-gray-700">{{__('forms.com_per_emp_avg_salary', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="com_per_emp_avg_salary" id="com_per_emp_avg_salary" autocomplete="com_per_emp_avg_salary" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_per_emp_avg_salary" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_male_tem_emp_no" class="block text-sm font-medium text-gray-700">{{__('forms.com_male_tem_emp_no', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_male_tem_emp_no" id="com_male_tem_emp_no" autocomplete="com_male_tem_emp_no" maxlength="4" max="9999" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_male_tem_emp_no" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_female_tem_emp_no" class="block text-sm font-medium text-gray-700">{{__('forms.com_female_tem_emp_no', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_female_tem_emp_no" id="com_female_tem_emp_no" autocomplete="com_female_tem_emp_no" maxlength="4" max="9999" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_female_tem_emp_no" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_tem_emp_avg_salary" class="block text-sm font-medium text-gray-700">{{__('forms.com_tem_emp_avg_salary', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="text" wire:model.lazy="com_tem_emp_avg_salary" id="com_tem_emp_avg_salary" autocomplete="com_tem_emp_avg_salary" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_tem_emp_avg_salary" class="mt-2" />
                                        </div>

                                    </div>
                                    <div x-show.transition.in="step === 3">

                                        <div class="mt-4">
                                            <x-jet-label for="com_bank_account" class="block text-sm font-medium text-gray-700">{{__('forms.com_bank_account', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_bank_account" wire:model="com_bank_account" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_bank_account" required>
                                                <option value="">حدد البنك</option>
                                                <option value="tadhamon_international_islamic_bank">مصرف التضامن الإسلامي الدولي</option>
                                                <option value="saba_islamic_bank">مصرف سبأ الإسلامي</option>
                                                <option value="alkuraimi_bank">بنك الكريمي</option>
                                                <option value="yemen_kuwait_bank">مصرف اليمن والكويت</option>
                                                <option value="cac_bank">مصرف التسليف التعاوني الزراعير</option>
                                                <option value="international_bank_of_yemen">مصرف اليمن الدولي</option>
                                                <option value="yemen_commercial_bank">المصرف التجاري اليمني</option>
                                                <option value="national_bank_of_yemen">المصرف الأهلي اليمني</option>
                                                <option value="united_bank_limited">يونايتد مصرف</option>
                                                <option value="yemen_gulf_bank">مصرف اليمن والخليج</option>
                                                <option value="qatar_national_bank">مصرف قطر الوطني</option>
                                                <option value="central_bank_of_yemen">المصرف المركزي اليمني</option>
                                                <option value="shamil_bank_of_yemen_and_bahrain">مصرف اليمن والبحرين الشامل</option>
                                                <option value="yemen_bank_for_reconstruction_and_development">المصرف اليمني للإنشاء والتعمير</option>
                                                <option value="calyon">كاليون كريديت أجريكول ب.ت.إ</option>
                                                <option value="al_arabi_bank">المصرف العربي</option>
                                                <option value="rafidain_bank">مصرف الرافدين</option>
                                                <option value="eskan_bank">مصرف الإسكان</option>
                                                <option value="yemeni_islamic_bank_for_finance_and_investment">المصرف الإسلامي اليمني للتمويل والاستثمار</option>
                                                <option value="none">لايوجد</option>
                                                <option value="others">أخرى</option>
                                            </select>
                                            <x-jet-input-error for="com_bank_account" class="mt-2" />
                                        </div>

                                        @if($com_bank_account == 'others')
                                            <div class="mt-4">
                                                <x-jet-label for="com_other_bank_account" class="block text-sm font-medium text-gray-700">{{__('forms.com_other_bank_account', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-input type="text" wire:model="com_other_bank_account" id="com_other_bank_account" autocomplete="com_other_bank_account" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_other_bank_account" class="mt-2" />
                                            </div>
                                        @endif

                                        <div class="mt-4">
                                            <x-jet-label for="com_permit" class="block text-sm font-medium text-gray-700">{{__('forms.com_permit', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_permit" wire:model="com_permit" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_permit" required>
                                                <option value="">اختر نوع التصريح</option>
                                                <option value="commercial_register">إسجل تجاري</option>
                                                <option value="profession_license">رخصة مزاولة مهنة</option>
                                                <option value="others">أخرى</option>
                                                <option value="none">لايوجد</option>
                                            </select>
                                            <x-jet-input-error for="com_permit" class="mt-2" />
                                        </div>

                                        @if($com_permit == 'others')
                                            <div class="mt-4">
                                                <x-jet-label for="com_permit_other" class="block text-sm font-medium text-gray-700">{{__('forms.com_permit_other', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-input type="text" wire:model.lazy="com_permit_other" id="com_permit_other" autocomplete="com_permit_other" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_permit_other" class="mt-2" />
                                            </div>

                                            <div class="mt-4">
                                                <x-jet-label for="com_permit_renewal_date" class="block text-sm font-medium text-gray-700">{{__('forms.com_permit_renewal_date', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-flatpickr name="com_permit_renewal_date" wire:model.lazy="com_permit_renewal_date" id="com_permit_renewal_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_permit_renewal_date" class="mt-2" />
                                            </div>
                                        @elseif($com_permit != 'none')
                                            <div class="mt-4">
                                                <x-jet-label for="com_permit_renewal_date" class="block text-sm font-medium text-gray-700">{{__('forms.com_permit_renewal_date', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-flatpickr name="com_permit_renewal_date" wire:model.lazy="com_permit_renewal_date" id="com_permit_renewal_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_permit_renewal_date" class="mt-2" />
                                            </div>
                                        @endif

                                        <div class="mt-4">
                                            <x-jet-label for="com_archive" class="block text-sm font-medium text-gray-700">{{__('forms.com_archive', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_archive" wire:model.lazy="com_archive" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_archive" required>
                                                <option value="">اختر طريقة الأرشفة</option>
                                                <option value="electronic">إلكترونية</option>
                                                <option value="paper_base">ورقية</option>
                                                <option value="none">لايوجد</option>
                                            </select>
                                            <x-jet-input-error for="com_archive" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_clients_no_2020" class="block text-sm font-medium text-gray-700">{{__('forms.com_clients_no_2020', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_clients_no_2020" id="com_clients_no_2020" autocomplete="com_clients_no_2020" maxlength="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_clients_no_2020" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_supplier_no" class="block text-sm font-medium text-gray-700">{{__('forms.com_supplier_no', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_supplier_no" id="com_supplier_no" autocomplete="com_supplier_no" maxlength="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_supplier_no" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_firm_no" class="block text-sm font-medium text-gray-700">{{__('forms.com_firm_no', ['extra'=>'*'])}}</x-jet-label>
                                            <x-jet-input type="number" wire:model.lazy="com_firm_no" id="com_firm_no" autocomplete="com_firm_no" maxlength="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                            <x-jet-input-error for="com_firm_no" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_external_audit" class="block text-sm font-medium text-gray-700">{{__('forms.com_external_audit', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_external_audit" wire:model="com_external_audit" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_external_audit" required>
                                                <option value="">اختر الإجابة</option>
                                                <option value="yes">نعم</option>
                                                <option value="no">لا</option>
                                            </select>
                                            <x-jet-input-error for="com_external_audit" class="mt-2" />
                                        </div>

                                        @if($com_external_audit == 'yes')
                                            <div class="mt-4">
                                                <x-jet-label for="com_external_audit_yes" class="block text-sm font-medium text-gray-700">{{__('forms.com_external_audit_yes', ['extra'=>'*'])}}</x-jet-label>
                                                <select id="com_external_audit_yes" wire:model="com_external_audit_yes" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_external_audit_yes" required>
                                                    <option value="">اختر الإجابة</option>
                                                    <option value="yearly">سنويًا</option>
                                                    <option value="every_6_months">6 أشهر</option>
                                                    <option value="others">أخرى</option>
                                                </select>
                                                <x-jet-input-error for="com_external_audit_yes" class="mt-2" />
                                            </div>

                                            <div class="mt-4">
                                                <x-jet-label for="com_last_external_audit" class="block text-sm font-medium text-gray-700">{{__('forms.com_last_external_audit', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-flatpickr name="com_last_external_audit" wire:model="com_last_external_audit" id="com_last_external_audit" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_last_external_audit" class="mt-2" />
                                            </div>
                                        @endif

                                        <div class="mt-4">
                                            <x-jet-label for="com_partner" class="block text-sm font-medium text-gray-700">{{__('forms.com_partner', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_partner" wire:model="com_partner" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_partner" required>
                                                <option value="">اختر الإجابة</option>
                                                <option value="yes">نعم</option>
                                                <option value="no">لا</option>
                                            </select>
                                            <x-jet-input-error for="com_partner" class="mt-2" />
                                        </div>

                                        <div class="mt-4">
                                            <x-jet-label for="com_your_job_description" class="block text-sm font-medium text-gray-700">{{__('forms.com_your_job_description', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_your_job_description" wire:model="com_your_job_description" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_your_job_description" required>
                                                <option value="">اختر الإجابة</option>
                                                <option value="ED">المدير التنفيذي</option>
                                                <option value="DED">نائب المدير</option>
                                                <option value="others">أخرى</option>
                                            </select>
                                            <x-jet-input-error for="com_your_job_description" class="mt-2" />
                                        </div>

                                        @if($com_your_job_description == 'others')
                                            <div class="mt-4">
                                                <x-jet-label for="com_your_job_description_other" class="block text-sm font-medium text-gray-700">{{__('forms.com_your_job_description_other', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-input type="text" wire:model.lazy="com_your_job_description_other" id="com_your_job_description_other" autocomplete="com_your_job_description_other" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_your_job_description_other" class="mt-2" />
                                            </div>
                                        @endif

                                        <div class="mt-4">
                                            <x-jet-label for="com_financial_source" class="block text-sm font-medium text-gray-700">{{__('forms.com_financial_source', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_financial_source" wire:model="com_financial_source" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_financial_source" required>
                                                <option value="">اختر الإجابة</option>
                                                <option value="yes">نعم</option>
                                                <option value="no">لا</option>
                                            </select>
                                            <x-jet-input-error for="com_financial_source" class="mt-2" />
                                        </div>

                                        @if($com_financial_source == 'yes')
                                            <div class="mt-4">
                                                <x-jet-label for="com_financial_source_amount" class="block text-sm font-medium text-gray-700">{{__('forms.com_financial_source_amount', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-input type="number" wire:model="com_financial_source_amount" id="com_financial_source_amount" autocomplete="com_financial_source_amount" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_financial_source_amount" class="mt-2" />
                                            </div>
                                        @endif

                                        <div class="mt-4">
                                            <x-jet-label for="com_smeps_financial_assist_before" class="block text-sm font-medium text-gray-700">{{__('forms.com_smeps_financial_assist_before', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_smeps_financial_assist_before" wire:model.lazy="com_smeps_financial_assist_before" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_smeps_financial_assist_before" required>
                                                <option value="">اختر الإجابة</option>
                                                <option value="yes">نعم</option>
                                                <option value="no">لا</option>
                                            </select>
                                            <x-jet-input-error for="com_smeps_financial_assist_before" class="mt-2" />
                                        </div>

                                    </div>
                                    <div x-show.transition.in="step === 4">

                                        <div class="mt-4">
                                            <x-jet-label for="com_how_do_you_know" class="block text-sm font-medium text-gray-700">{{__('forms.com_how_do_you_know', ['extra'=>'*'])}}</x-jet-label>
                                            <select id="com_how_do_you_know" wire:model="com_how_do_you_know" class="inline-flex justify-center w-full rounded-md px-5 py-2 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="com_how_do_you_know" required>
                                                <option value="">اختر الإجابة</option>
                                                <option value="ads">الإعلان</option>
                                                <option value="consultant">استشاري</option>
                                                <option value="friend">صديق</option>
                                                <option value="social_media">وسائل التواصل الاجتماعي</option>
                                                <option value="others">أخرى</option>
                                            </select>
                                            <x-jet-input-error for="com_bank_account" class="mt-2" />
                                        </div>

                                        @if($com_how_do_you_know == 'others')
                                            <div class="mt-4">
                                                <x-jet-label for="com_how_do_you_know_other" class="block text-sm font-medium text-gray-700">{{__('forms.com_how_do_you_know_other', ['extra'=>'*'])}}</x-jet-label>
                                                <x-jet-input type="text" wire:model.lazy="com_how_do_you_know_other" id="com_how_do_you_know_other" autocomplete="com_how_do_you_know_other" maxlength="12" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required/>
                                                <x-jet-input-error for="com_how_do_you_know_other" class="mt-2" />
                                            </div>
                                        @endif
                                    </div>
                                    <div x-show.transition.in="step === 5">

                                        <div class="mt-4">
                                            <livewire:file-uploads wire:key="'file-uploads-'.{{ now() }}" :user_id="$user_id" :uuid="$uuid" :name="$arabic_name"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- / Step Content -->
                            </div>

                        </div>

                        <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
                            <div class="loading" wire:loading wire:target="increment, decrement">
                                Submit in Process...
                            </div>
                            <div class="max-w-3xl mx-auto px-4">
                                <div class="flex justify-between">
                                    <div class="w-1/2">
                                        <button
                                            x-show="step > 1"
                                            x-on:click="$wire.decrement()"
                                            wire:loading.attr="disabled"
                                            class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                        >{{__('forms.previous')}}</button>
                                    </div>

                                    <div class="w-1/2 text-left">
                                        <button
                                            x-show="step < 5"
                                            x-on:click="$wire.increment()"
                                            wire:loading.attr="disabled"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                        >{{__('forms.next')}}</button>

                                        <button
                                            @click="step = 'complete'"
                                            x-show="step === 5"
                                            x-on:click="$wire.complete()"
                                            wire:loading.attr="disabled"
                                            class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                                        >{{__('forms.complete')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-start">
                    <x-jet-secondary-button wire:click.prevent="hideForm" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>
                </div>
            </x-slot>
        </form>
    </x-jet-dialog-modal>
</div>
