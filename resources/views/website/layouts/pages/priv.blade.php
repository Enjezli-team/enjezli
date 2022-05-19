<!--
    =========================================================
    * Soft UI Dashboard - v1.0.3
    =========================================================
    
    * Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
    * Copyright 2021 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://www.creative-tim.com/license)
    
    * Coded by Creative Tim
    
    =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="icon" type="image/png" href="{{ asset('svg/logo.svg') }}">
    <title>
        إنجزلي </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('user_dash_assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('user_dash_assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('user_dash_assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('user_dash_assets/css/soft-ui-dashboard.css') }}?v=1.0.3" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            border-color: white !important;
        }

        .d_grid {
            display: grid;
        }

        .text_container_body {
            align-items: end;
            justify-content: end;
            margin-bottom: 33px;
        }

        .text_container {
            width: 400px;
            height: calc(100% - 100px);
            padding-left: 53px;
        }

        .text_container .text {
            padding: 17px;
            border-top: 3px solid;
            border-right: 3px solid;
            height: calc(100% - -44px);
            padding: 47px 40px;
            border-top: 3px solid;
            border-right: 3px solid;
            height: calc(100% - -2px);
        }

        .text_container_body .text_container .text h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text_container_body .text_container .text p {
            margin-top: 19px;
            line-height: 27px;
            margin-bottom: 32px;
        }

        .text_container_body2 {
            justify-content: start;
        }

        .text_container_body2 .text {
            border-right: none;
            border-left: 3px solid;
        }

        .text_container_body3 {
            justify-content: center;
            justify-items: center;
        }

        .text_container_body3 .text_containers {
            width: 449px;
            display: grid;
            justify-content: center;
            height: 300px;
            justify-items: center;
        }

        .text_container_body3 .text_containers .text {
            width: 414px;
            background-color: transparent;
            height: 170px;
            border-left: 3px solid;
            border-right: 3px solid;
        }

        .text_container_body3 .text_containers .text>div:first-child {
            height: inherit;
            display: grid;
            text-align: center;
            justify-content: center;
            align-items: end;
        }

        .text_container_body3 .text_containers .line_containers {
            margin-top: 15px;
        }

        .text_container_body3 .text_containers .line1 {
            height: 1px;
            width: 307px;
            background: white;
        }

        .text_container_body3 .text_containers .line2 {
            float: left;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .text_container_body3 .text_containers .end {
            margin-top: 8vh;
            padding: 8px 40px;
            border: 1px solid white;
            display: grid;
            align-items: end;
            justify-items: end;
            text-align: center;
        }

        .list-group {
            padding-right: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 0;
            flex-direction: row;
        }

        .custom_btn {
            border: none;
            cursor: pointer;
            background: #1c829a;
            color: white;
            padding: 2px 7px;
            border-radius: 0.25rem;
        }

        .count {
            position: absolute;
            right: 49px;
            top: -13px;
            width: 34px;
            height: 27px;
            background-color: #cce5ed;
            border-radius: 0.25rem;
            text-align: center;
            padding: -6px;
            border-bottom-right-radius: 0px;
        }

        .text_primary {
            color: #1c829a;
        }

        .card-header:first-child {
            border-radius: 1rem 1rem 1rem 1rem;
        }

        .bg-gradient-dark {
            background-image: linear-gradient(310deg, #1c829a 0%, #1c829a 100%);
        }

        .priv_container {
            margin-top: 24vh;
            background-color: #f8f9fa;
            padding-bottom: 22px;
        }

        .container-fluid {
            background: white;
        }

        .priv_btn {
       display: flex;
    justify-content: end;
    align-items: center;
    gap: 6px;
    padding-left: 20px;
        }
        .priv_btn a{
            color:inherit;
            transition:.6s;
        }
           .priv_btn a:hover{
            color:#1c829a;
        }

    </style>

</head>

<body class="g-sidenav-show " style="direction: rtl;">

    <!-- End Navbar -->
    
    <div class="container-fluid priv_container ">
          <div class='priv_btn'>
<a href='/'>

                العودة للصفحة السابقة
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>

            </div>
        <div class="page-header min-height-300 border-radius-xl mt-4 d-grid align-items-center justify-content-center text-center"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask  bg-gradient-dark "></span>
  
            <div class="text-white" style="z-index: 11;">
                <h3 class="text-white">سياسة الخصوصية</h3>
                <p>تعرض هذه الصفحة بنود الخصوصية والامان التي تهمك </p>
            </div>

        </div>


    </div>
    <div class="container-fluid py-4">
        <div class="row">


            <div class="col-12 mt-4 ">
                <div class="card mb-4 ">
                    <div class="card-header pb-0 p-3  text-center">

                    </div>
                    <div class="card-body p-3 " style="background-color: #cce5ed;">
                        <div class="row ">
                            <div class="col-12 d-flex justify-content-center flex-wrap">
                                <div class="text_container_body">
                                    <div class="text_container">
                                        <div class="text">
                                            <h3><span>كيف يتعامل مستقل مع المعلومات التي تزودنا بها؟ </span>
                                                <div> <span><i class='bx bxs-quote-left'></i></span></div>
                                            </h3>

                                            <p> يلتزم موقع مستقل بتأمين خصوصيتك حين تزور موقعنا وتتواصل معنا إلكترونيًا.
                                                هذه الصفحة توضح الوجه الذي سيتم عبره استخدام أي معلومات شخصية تزودنا بها
                                                خلال تواجدك في موقعنا.
                                            </p>
                                            <div>
                                                <h3><span> انتفاء المسؤولية القانونية
                                                    </span>
                                                    <div> <span><i class='bx bxs-quote-left'></i></span></div>
                                                </h3>

                                                <p> يقر المُستخدِم بأنه المسؤول الوحيد عن طبيعة الاستخدام الذي يحدده
                                                    للموقع الإلكتروني مستقل، وتخلي إدارة موقع مستقل طرفها، إلى أقصى مدى
                                                    يجيزه القانون، من كامل المسؤولية عن أية خسائر أو أضرار أو نفقات أو
                                                    مصاريف
                                                    يتكبدها المُستخدِم أو يتعرض لها هو أو أي طرف آخر من جراء استخدام
                                                    الموقع الإلكتروني مستقل أو العجز عن استخدامه.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text_container_body text_container_body2">
                                    <div class="text_container">
                                        <div class="text">
                                            <h3><span>الرقابة على المحتوى</span>
                                                <div> <span><i class='bx bxs-quote-left'></i></span></div>
                                            </h3>

                                            <p>
                                                تحتفظ إدارة موقع مستقل الإلكتروني بالحق في مراقبة أي محتوى يدخله
                                                المشترك، دون أن يكون ذلك لزاما عليها، لذا تحتفظ بالحق (من دون التزام) في
                                                حذف أو إزالة أو تحرير أي مواد مدخلة من شأنها انتهاك شروط وأحكام الموقع
                                                دون الرجوع للمستخدم. إن قوانين حقوق النشر
                                                والتأليف المحلية و العالمية والأجنبية والمعاهدات الدولية تحمي جميع
                                                محتويات هذا الموقع، ومن خلال الاشتراك فيه فإن المشترك يوافق ضمنيا وبشكل
                                                صريح على الالتزام بإشعارات حقوق النشر التي تظهر على صفحاته. </p>
                                            <div>
                                                <h3><span> حساب المشترك وكلمة السر وأمن المعلومات
                                                    </span>
                                                    <div> <span><i class='bx bxs-quote-left'></i></span></div>
                                                </h3>

                                                <p>
                                                    يختار المشترك كلمة سر / مرور لحسابه، وسيُدخل عنوانا بريديا خاصا به
                                                    لمراسلته عليه، وتكون مسؤولية حماية كلمة السر هذه وعدم مشاركتها أو
                                                    نشرها على المشترك، وفي حال حدوث أي معاملات باستخدام كلمة السر هذه
                                                    فسيتحمل المشترك كافة المسؤوليات المترتبة على ذلك، دون
                                                    أدنى مسؤولية على موقع مستقل. يتحمل المشترك كامل المسؤولية عن جميع
                                                    المحتويات الخاصة به، التي يرفعها وينشرها عبر الموقع. لا يمكن للمشترك
                                                    حذف حسابه من مستقل بأي وسيلة ولا تعديل اسم المستخدم لحسابه، بسبب
                                                    تعلق الحساب بأمور مالية وحقوق مستخدمين آخرين يمكن الرجوع لها في أي
                                                    وقت.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="text_container_body text_container_body3">
                                    <div class="text_containers">
                                        <div class="text">
                                            <div class="d-flex justify-content-center">
                                                <div>
                                                    <p>شكرا لوجودك وانضمام لعائلة منصة إنجزلي<i
                                                            class='bx bxs-quote-left'></i> </p>
                                                    <p> سياسة الخصوصية تضمن لك حقك نتمنى لك بالبقاء سعيدا<i
                                                            class='bx bx-smile'></i></p>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="end">هذه السياسة محل تغيير دائم وتطوير، مع إشعار
                                                المشتركين  و الزوار بذلك ، وعلى المشتركين مراجعة هذه السياسات بشكل دوري
                                            </div>
                                        <div class="line_containers">
                                            <div class="line1"></div>
                                            <div class="line2 line1"></div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </div>

        <!--   Core JS Files   -->
        <script src={{ asset('user_dash_assets/js/core/popper.min.js') }}></script>
        <script src={{ asset('user_dash_assets/js/core/bootstrap.min.js') }}></script>
        <script src={{ asset('user_dash_assets/js/plugins/perfect-scrollbar.min.js') }}></script>
        <script src={{ asset('user_dash_assets/js/plugins/smooth-scrollbar.min.js') }}></script>
        <script src={{ asset('user_dash_assets/js/plugins/fullcalendar.min.js') }}></script>
        <script src={{ asset('user_dash_assets/js/plugins/chartjs.min.js') }}></script>

        <script src={{ asset('user_dash_assets/js/plugins/choices.min.js') }}></script>

        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src={{ asset('user_dash_assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}></script>



</body>

</html>
