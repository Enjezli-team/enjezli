
@extends('Admin.layout.side')
@section('side')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>الرجاء ادخال بيانات</strong> 
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('update_skills',$skills->id) }}" method="POST">
    @csrf
    <div class="flex items-center justify-center h-screen bg-gray-100">
      <div class="bg-white py-6 rounded-md px-10 max-w-lg shadow-md">
        <h1 class="text-center text-lg font-bold text-gray-500">تعديل المهاره</h1>
        <div class="space-y-4 mt-6">
          <div class="w-full">
            <input type="text" placeholder="اسم المهاره " class="px-4 py-2 bg-gray-50 text-right" name="title" value="{{$skills->title}}"/>
          </div>
          
        
        </div>
        <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">تعديل</button>
      </div>
    </div>
  </form>


  

@endsection