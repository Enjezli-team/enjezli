@extends("website.layouts.master")
@section('content')



    <main class="hero">
        <div class='p-relative'>
            <div class="container_text">
                <h1>مرحبا بكم</h1>
                <h1>إنجزلي</h1>
                <h4>مظلتكم الآمنة في سوق المال والاعمال ,نحن هنا لخدمتكم</h4>
            </div>

        </div>
        <div class="container_img p-relative">


            <img src="{{ asset('svg/enLogo.svg') }}" alt="">
        </div>

    </main>

    <div class="desc">

        <div>
            <h2>كيف تعمل منصة أنجزلي</h2>
        </div>
        <div class="How_to_Start">
            <div>
                <div class="How_start_icon">
                    <ion-icon name="person-add-outline"></ion-icon>
                </div>
                <div>
                    <h3>إنشاء حساب</h3>
                    <p>انشى حساب ك باحث عن خدمة في إنجزلي</p>
                </div>
            </div>
            <div>
                <div class="How_start_icon How_start_icon1">
                    <ion-icon name="add-outline">

                    </ion-icon>
                </div>
                <div>
                    <h3>أضف المشروع</h3>
                    <p>أضف تفاصيل مشروعك والمهارات المطلوبة لإنجازه وابدأ باستقبال عروض المنجزين عليه.</p>

                </div>
            </div>
            <div>
                <div class="How_start_icon How_start_icon2">
                    <ion-icon name="clipboard-outline"></ion-icon>
                </div>
                <div>
                    <h3>اختر العرض المناسب</h3>
                    <p>أضف تفاصيل مشروعك والمهارات المطلوبة لإنجازه وابدأ باستقبال عروض المستقلين عليه.</p>

                </div>
            </div>
            <div>
                <div class="How_start_icon How_start_icon3">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </div>
                <div>
                    <h3> استلم المشروع</h3>
                    <p>سيعمل المنجز الذي اخترته معك حتى انتهاء العمل وتسليم مشروعك بشكل كامل كما أردته.</p>

                </div>
            </div>

        </div>
    </div>
    <div class="lets_start_project">
        <div>
            إنجز عملك بسهولة وامان
            <button class="button">
                أضف مشروعك
                <div class="button__horizontal"></div>
                <div class="button__vertical"></div>
            </button>
        </div>
    </div>
    </div>
    @endsection