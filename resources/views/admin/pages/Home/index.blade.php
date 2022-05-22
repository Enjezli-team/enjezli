@extends('admin.layouts.master')
@section('side')

    


    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-8">
      <div class="grid pb-10  mt-4 ">
          <!-- Start Content-->
          
            <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 mt-3">
              <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
              style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                <div class="absolute inset-0 bg-[#8ECAE6] bg-opacity-75 transition duration-300 ease-in-out"></div>
                  <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center text-center  justify-center">
                  <div>
                    <div class="text-white text-lg flex space-x-2 items-center text-center  justify-center">
                     
                      <p>المشاريع الجديدة</p>
                    </div>
                    <h3 class="text-white text-3xl m-2 font-bold">
                      {{$openpro->count()}}
                    </h3>
                     <a class="bg-sky-50 px-4 py-1 rounded text-lg mt-2 text-[#186D80] " href={{ url('admin/project_status/1') }}>
                       مزيد من التفاصيل
                     </a>
                  </div>
                </div>
            </div>
              
               <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                  <div class="absolute inset-0 bg-[#186D80] bg-opacity-75 transition duration-300 ease-in-out"></div>
                    <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center text-center  justify-center">
                    <div>
                      <div class="text-white text-lg flex space-x-2 items-center text-center  justify-center">
                        
                        <p> المشاريع قيد التنفيذ</p>
                      </div>
                      <h3 class="text-white text-3xl m-2 font-bold">
                        {{$executepro->count()}}
                      </h3>
                      <a  href={{ url('admin/project_status/2') }} class="bg-emerald-50 px-4 py-1 rounded text-lg mt-2 text-[#186D80] ">
                        مزيد من التفاصيل
                      </a>
                    </div>
                  </div>
              </div>
               <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
                style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                  <div class="absolute inset-0 bg-[#8ECAE6] bg-opacity-75 transition duration-300 ease-in-out"></div>
                  <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center text-center  justify-center">
                    <div>
                      <div class="text-white text-lg  items-center ">
                        
                        <p>طالبي الخدمات</p>
                      </div>
                      <h3 class="text-white text-3xl m-2 font-bold">
                        {{$seeker->count()}}
                      </h3>
                      <a href="/admin/user_status/{{$type=3}}" class="bg-sky-50 px-4 py-1 rounded text-lg mt-2 text-[#186D80] ">
                        مزيد من التفاصيل
                      </a>
                    </div>
                  </div>
              </div>        
              <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
              style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
                <div class="absolute inset-0 bg-[#2B899E] bg-opacity-75 transition duration-300 ease-in-out"></div>
                <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center text-center  justify-center">
                  <div>
                    <div class="text-white text-lg  items-center ">
                     
                      <p> منجزي الخدمات</p>
                    </div>
                    <h3 class="text-white text-3xl m-2 font-bold">
                   
                      {{$provider->count()}}
                    </h3>
                    <a href="/admin/user_status/{{$type=3}}"  class="bg-emerald-50 px-4 py-1 rounded text-lg mt-2 text-[#186D80] ">
                      مزيد من التفاصيل
                    </a>
                  </div>
                </div>
            </div>  
            </div>
            
          <!-- End Content-->
      </div>
    </div>
  </main>



 
<!-- component -->
<div class=" py-6 flex justify-between lg:flex-row   sm:py-12">
<div class="relative relative sm:w-full mx-12 ">
  <div class="bg-[#186D80] bg-opacity-75 shadow mt-6  rounded-lg p-6">
    <h3 class="text-gray-600 text-lg text-center font-semibold mb-4 text-white">المهارات</h3>
    <ul class="flex items-center justify-center space-x-2">
        <!-- Story #1 -->
        @foreach ($skill as $myskill )
          
        <li class="flex flex-col items-center space-y-2">
            <!-- Ring -->
            <div class="block bg-white p-1 rounded-lg" >
                <div class="h-16 w-16 text-lg font-bold rounded-lg shadow flex items-center bg-[#8ECAE6] text-white  justify-center" >
                  <p class="hidden">  {{mb_internal_encoding("UTF-8");}} </p>
                  <p>{{mb_substr($myskill->title, 0, 1)}}</p>
                </div>
              </div>
            <!-- Username -->
            <span class="text-xs  text-white">
                {{$myskill->title}}
            </span>
        </li>

        @endforeach
  
    </ul>
</div>
</div>
  
  <div class="relative relative sm:w-full mx-12 ">
		<div
			class="absolute inset-0 bg-gradient-to-r from-[#8ECAE6] to-[#186D80] shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-4 bg-white shadow-lg sm:rounded-3xl sm:p-16">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-lg font-semibold text-right">   مرحبا بك يا {{Auth::user()->name}} </h1>
				</div>
				<div class="divide-y divide-gray-200">
					<div class="py-4 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
					
						{{-- <div class="relative">
							<textarea autocomplete="off" id="" name="noti" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" height="4" ></textarea>
						</div> --}}
						{{-- <div class="relative">
							<button class="bg-[#186D80] text-white rounded-md px-2 py-1">ارسال</button>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
  
</div>

@endsection
