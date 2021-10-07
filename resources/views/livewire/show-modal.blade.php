<div>
    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="showModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
              Background overlay, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!--
              Modal panel, show/hide based on modal state.

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl" x-show="showModal" @click.away="showModal = false">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 text-right" id="modal-title">
                                مشروع تحسين الحماية المجتمعية والاستجابة لجائحة كورونا لدعم شركات القطاع الخاص والجمعيات التعاونية
                            </h3>
                            <div class="mt-2">
{{--                                <p class="text-sm text-gray-500 text-right p-10">--}}

{{--                              --}}
{{--                                    --}}
{{--                                </p>--}}

<!--
  Welcome to Tailwind Play, the official Tailwind CSS playground!

  Everything here works just like it does when you're running Tailwind locally
  with a real build pipeline. You can customize your config file, use features
  like `@apply`, or even add third-party plugins.

  Feel free to play with this example if you're just learning, or trash it and
  start from scratch if you know enough to be dangerous. Have fun!
-->
                                <div class="">
                                    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
                                        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-5">
                                            <div class="max-w-md mx-auto">
                                                <div class="divide-y divide-gray-200">
                                                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                        <p class="text-center md:text-center font-bold text-2xl">نبذة عن المشروع</p>
                                                        <div class="divide-y divide-gray-200">
                                                            <p dir="RTL" class="text-justify">يعمل المشروع على دعم الشركات والأعمال ووكالات الأعمال لضمان استمراريتها في تقديم السلع الهامة، خاصة في الجانب الغذائي، وذلك للمساعدة في تقليل نسبة البطالة وخلق فرص عمل جديدة تساهم في تحسين سبل العيش من خلال الدعم المالي والتقني. كما يهدف المشروع إلى تحسين القدرة الإنتاجية، رفع الكفاءة في سلاسل القيمة، خلق فرص عمل، وتحسين سبل العيش الأساسية، تحقيق الأمن الغذائي، ورفع مستوى تغذية الأسرة. يتبع كل ذلك منهج الوكالة في تبني وإحداث التغيير، والذي يعتمد على أنه كلَّما تحسنت سلاسل القيمة فإن سبل المعيشة ستتحسن، من خلال فرص العمل التي ستصبح متوفرة وتساهم في رفع دخل الأسر، وكذلك تحسين وزيادة الإنتاج. وبذلك فإن الشركات والجمعيات المستهدفة ستكون أكثر قدرةً على الاستمرارية في ظل أي وضع مضطرب، وستستمر في توفير البضائع الحيوية خاصة من المواد الغذائية. إضافةً إلى أن المجتمعات المحلية ستصبح أكثر قدرة على التكيف والاستمرار في العمل حتى عند غياب توفر الغذاء، الخدمات الصحية أو تفشي الفقر</p>

                                                            <p class="text-center md:text-center font-bold text-2xl pt-10">شروط التسجيل</p>
                                                            <ul dir="RTL" class="list-disc space-y-2 pt-5 text-right">
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p class="ml-2">
                                                                        أن لا يقل عمر المنشأة عن سنتين
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p class="ml-2">
                                                                        أن يكون لدى المنشأة ترخيص قانوني
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p class="ml-2">
                                                                        أن تكون المنشأة قائمة ولم تقفل بسبب الأزمة الراهنة
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        أن يكون عملها ضمن القطاع الغذائي (زراعة – ثروة حيوانية – الأسماك).
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        لم تحصل المنشأة على أي دعم سابق من وكالة تنمية المنشآت الصغيرة والأصغر .SMEPS
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        أن يكون المشروع في إحدى المحافظات المستهدفة (صنعاء – عدن - حضرموت – تعز – الحديدة – لحج).
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        إحضار الحسابات الختامية للمنشأة لسنتين ماضية (خاص للجمعيات).
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        أن يكون لدى المنشأة حساب بنكي، مع تقديم رسالة صادرة من البنك تبين أن الحساب فعّال وسليم. (KYC)
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        أن تمتلك المنشأة نظام أرشفة لعملياتها الإدارية والمالية.
                                                                    </p>
                                                                </li>
                                                                <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                    <p dir="RTL" class="ml-2">
                                                                        أن تكون المنشأة قادرة على دفع 50% من قيمة المنحة التماثلية.
                                                                    </p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <p class="text-right font-bold text-lg">يهدف المشروع لدعم المنشأة التالية ضمن القطاعات المستهدفة الشركات المتوسط والصغيرة الجمعيات</p>
                                                    </div>
                                                    <div class="pt-6 text-base leading-6 sm:leading-7">
                                                        <p dir="RTL" class="text-center font-bold text-2xl pb-10">الخدمات التي يقدمها المشروع</p>
                                                        <p dir="RTL" class="text-right font-bold text-lg">الدعم الفني</p>
                                                        <ul dir="RTL" class="list-disc space-y-2 pt-5">
                                                            <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                <p class="ml-2">
                                                                    التدريب على (منهج استمرارية الأعمال)
                                                                </p>
                                                            </li>
                                                            <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                <p class="ml-2">
                                                                    الدعم الاستشاري والتوجيه خلال فترة المشروع
                                                                </p>
                                                            </li>
                                                            <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                <p class="ml-2">
                                                                    الدعم المالي
                                                                </p>
                                                            </li>
                                                        </ul>
                                                        <p dir="RTL" class="text-right font-bold text-lg pt-5">الدعم الفني</p>
                                                        <ul dir="RTL" class="list-disc space-y-2 pt-5">
                                                            <li class="flex items-start">
                                                                    <span class="h-6 flex items-center sm:h-7">
                                                                      <svg class="flex-shrink-0 h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                                      </svg>
                                                                    </span>
                                                                <p class="ml-2">
                                                                    منح مالية تماثلية غير مستردة
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <button type="button" @click="showModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
