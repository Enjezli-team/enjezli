
@extends('Admin.layout.side')
@section('side')

<form action="{{ route('add_section') }}" method="POST">
    @csrf




    <div class="  ">
      <div class="bg-white py-6 rounded-md  m-4 p-4 shadow-md">
        <h1 class="text-center text-lg font-bold text-gray-500">أضف قسم</h1>
        
        <div class="space-y-4 mt-6 grid grid-cols-4 gap-4">
          <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">إضافة</button>
        <div></div>
                {{-- <label class="w-full block text-xs mb-2 text-gray-400">Action</label> --}}
           <div class="relative border-none">
                  <select name="section" class="text-gray-600 appearance-none py-2.5 border-none bg-gray-100 inline-block rounded leading-tight w-full">
                    
                    @foreach ($section as $section) 
                    <option class="pt-6" value={{$section->id}}>{{$section->title}}</option>
                
                      @endforeach
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                    <?xml version="1.0" encoding="UTF-8"?>
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="12" height="12"><path d="M6.41,9H17.59a1,1,0,0,1,.7,1.71l-5.58,5.58a1,1,0,0,1-1.42,0L5.71,10.71A1,1,0,0,1,6.41,9Z"/></svg>
                    
                  </div>
           
          </div>
          <div class="">
            <input type="text" placeholder="اسم القسم " class=" py-2 bg-gray-100 text-right w-full" name="title"/>
          </div>
        </div>
        </div>
    </div>
  </form>


  

@endsection