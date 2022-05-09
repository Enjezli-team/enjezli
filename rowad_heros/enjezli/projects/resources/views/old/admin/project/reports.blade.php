@extends('Admin.layout.side')
@section('side')


<!-- component -->
<div class="h-screen flex items-start mt-4 justify-center bg-gray-200">

    <!-- Card -->
    <div class="bg-white p-8 w-[42rem]"> 


        {{-- logo --}}
        <div class="flex flex-col items-center">
                 
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" class="my-4" viewBox="0 0 219.503 305.654">
                <defs>
                  <linearGradient id="linear-gradient" x1="0.174" y1="0.584" x2="0.94" y2="0.263" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#219ebc"/>
                    <stop offset="0.507" stop-color="#19768c"/>
                    <stop offset="1" stop-color="#114f5e"/>
                  </linearGradient>
                  <linearGradient id="linear-gradient-2" x1="0.087" y1="0.636" x2="0.962" y2="0.41" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#219ebc"/>
                    <stop offset="1" stop-color="#114f5e"/>
                  </linearGradient>
                  <linearGradient id="linear-gradient-3" x1="0.5" y1="0" x2="0.5" y2="1" xlink:href="#linear-gradient-2"/>
                </defs>
                <g id="Layer_2" data-name="Layer 2" transform="translate(-0.023)">
                  <g id="graphics">
                    <path id="Path_62" data-name="Path 62" d="M40.44,169.17C24.69,160.31,11,144.82,9,128.53c-3.63-29,14-50.82,36.45-60.88,26.84-12,8.93-3.41,111.61-31.94C206.37,22,209.53,9.21,208.42,0c13.33,9.21,17.43,59.41-5.68,74.51C179,90,131.65,93.25,72.16,111.09,19.86,126.77,27.6,155.67,40.44,169.17Z" fill="url(#linear-gradient)"/>
                    <path id="Path_63" data-name="Path 63" d="M29.87,177.69a67.851,67.851,0,0,1,14.78-6.94c74.4-18,80.92-17.62,105.61-24,67.27-17.26,59.19-31.64,60.9-37.38,12.41,14,12.62,57.61-10.38,70.7C172.9,196,123.83,201.18,61.66,217.52c-20.23,5.32-32.07,11.66-40.92,19.17-9.83,8.34-12.52,20.53-5,30.76,6.58,8.94,24.19,7.48,43.7,4.61,34.61-5.09,78.49-15.7,90.81-19.31,55.36-16.19,59.19-31.64,60.9-37.38,12.41,14,12.62,57.61-10.38,70.71-18.22,10.38-35.53,16.35-73,18.73-27.47,1.74-77.37,3.38-101.8-23.42-2.38-2.6-21.39-17.8-25.32-44C-3,213.07,9.63,190.36,29.87,177.69Z" fill="url(#linear-gradient-2)"/>
                    <path id="Path_64" data-name="Path 64" d="M88.43,160.46h0c-22.28,5.08-43.8,10.29-43.8,10.29l-1.1.38c-1.06-.63-2.1-1.28-3.12-2-12.83-13.5-20.56-42.4,31.73-58.08q5.41-1.62,10.69-3.09C68.19,114.26,47.49,148.19,88.43,160.46Z" fill="url(#linear-gradient-3)"/>
                    <path id="Path_65" data-name="Path 65" d="M74.7,266.43a38.128,38.128,0,0,0,3.09,2.35c-6.25,1.28-12.43,2.41-18.34,3.28-19.51,2.87-37.12,4.33-43.7-4.61-7.53-10.23-4.84-22.42,5-30.76C37,222.89,58.06,218.23,79.47,213,63.82,220.54,50.69,246,74.7,266.43Z" fill="url(#linear-gradient-3)"/>
                  </g>
                </g>
              </svg>
              
            <span class=" text-2xl mx-2 font-semibold">انجز لي</span>
            
         </div>
  
      <!-- Header -->
      <header class="flex  text-sm text-right justify-end mt-2">
        <p class="mr-1">نظره حول المشروع</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90 -ml-2"  viewBox="0 0 24 24" stroke="#219EBC">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
      </header>
  
      <!-- Title -->
      <h2 class="font-bold text-3xl mt-2 text-right">
       اسم المشروع
      </h2>
  
      <!-- Tags -->
      <p class="mt-5 text-right"> 
        طالب الخدمة:
        <a href="#" class="text-[#219EBC]">أكاديمية رواد  </a>
      </p>
  
      <p class="text-right"> 
       منجز الخدمة:
        <a href="#" class="text-[#219EBC]"> سباء الشميري </a>
      </p>
  
      <!-- Description -->
      <h3 class="font-bold text-xl text-right mt-8"> وصف المشروع </h3>
      <p class="text-right"> 
    منصة إلكترونية تسهل عملية البحث عن مقدم خدمة يمتلك المهارة المناسبة لتقديم خدمة معينة ، وكذلك تسهل إيجاد فرص عمل للأشخاص الذين يمتلكون مهارات مختلفة .  تمكن المنصة طالب الخدمة من إضافة طلباته ومقدم الخدمة من التقديم لأي طلب يناسب مهاراته
  </p>


     <!-- Description -->
     <h3 class="font-bold text-xl text-right mt-8"> المهارات المطلوبة  </h3>
     <p class="text-right"> 
السرعة ,الصبر , المشي على  الاسبرنت بالاضافة بوتستراب و لارافل  </p>


      {{-- time --}}
      <p class="mt-5 text-right"> 
          مدة التسليم 
        <a href="#" class="text-[#219EBC]"> 30 أيام  </a>
      </p>
  
      <p class="text-right"> 
          تاريخ التسليم :
         <a href="#" class="text-[#219EBC]"> 17 / 5 / 2022  </a>
      </p>
  
      <!-- Button -->
      {{-- <button class="bg-[#219EBC] text-white font-semibold py-2 px-5 text-sm mt-6 inline-flex items-center group">
        <p> READ MORE </p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-2 delay-100 duration-200 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button> --}}
  
    </div>
  
  </div>





@endsection