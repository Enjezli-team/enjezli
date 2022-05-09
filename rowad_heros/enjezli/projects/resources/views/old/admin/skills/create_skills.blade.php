
@extends('Admin.layout.side')
@section('side')

<form action="{{ route('add_skills') }}" method="POST">
    @csrf
    <div class="flex items-center justify-center h-screen bg-gray-100">
      <div class="bg-white py-6 rounded-md px-10 max-w-lg shadow-md">
        <h1 class="text-center text-lg font-bold text-gray-500">أضف مهاره</h1>
        <div class="space-y-4 mt-6">
          <div class="w-full">
            <input type="text" placeholder="اسم المهاره " class="px-4 py-2 bg-gray-50 text-right" name="title"/>
          </div>
        
        </div>
        <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">إضافة</button>
      </div>
    </div>
  </form>


  

@endsection