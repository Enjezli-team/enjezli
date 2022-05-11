
@extends('Admin.layout.side')
@section('side')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> 
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- <form action="{{ route('update_section',$section->id) }}" method="POST">
    @csrf
    <div class="flex items-center justify-center h-screen bg-gray-100">
      <div class="bg-white py-6 rounded-md px-10 max-w-lg shadow-md">
        <h1 class="text-center text-lg font-bold text-gray-500">تعديل قسم</h1>
        <div class="space-y-4 mt-6">
          <div class="w-full">
            <input type="text" placeholder="اسم القسم " class="px-4 py-2 bg-gray-50 text-right" name="title" value="{{$section->title}}"/>
          </div>
          
        
        </div>
        <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">تعديل</button>
      </div>
    </div>
  </form> --}}

  <form action="{{ route('update_section',$section->id) }}" method="POST">
    @csrf




    <div class="  ">
      <div class="bg-white py-6 rounded-md  m-4 p-4 shadow-md">
        
        <div class="space-y-4 mt-6 grid grid-cols-4 gap-4">
          <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">تعديل</button>
      
                {{-- <label class="w-full block text-xs mb-2 text-gray-400">Action</label> --}}
                <div></div>
                <div></div>
          <div class="">
            <input type="text" placeholder="اسم القسم " class=" py-2 bg-gray-100 text-right w-full" name="title" value="{{$section->title}}"/>
          </div>
       
        </div>
        </div>
    </div>
  </form>


  

@endsection