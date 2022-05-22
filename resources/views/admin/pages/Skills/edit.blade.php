
@extends('admin.layouts.master')
@section('side')
<!-- Main content -->



<body class="antialiased sans-serif bg-gray-200">
	<div x-data="app()" x-cloak>
		<div class="max-w-3xl mx-auto px-4 py-10 m-16">

		

			<div class="w-full rounded bg-gray-100 p-4">	
				<!-- Top Navigation -->
				<div class="">
					<div class="flex flex-col md:flex-row md:items-center md:justify-between">
						<div class="flex-1">
							<div x-show="step === 1">
								<div class="text-lg font-bold text-right text-gray-700 leading-tight">اضافة مهاره</div>
							</div>
							
					
						</div>
					</div>
				</div>
				<!-- /Top Navigation -->

				<!-- Step Content -->
				<div class="">	
					<div>
						<div class="mb-5 text-center">
                            
                        <form method="POST" action="/admin/skills/{{$data->id}}" enctype="multipart/form-data">
                            @csrf
    
                            @method('PATCH')
						
						</div>

						<div class="mb-5 text-right">
							<label for="firstname" class="font-bold mb-1 text-gray-700 block">المهاره</label>
							<input type="text"
                            name="name" value="{{$data->title}}"
								class="w-full px-4 py-3 text-right rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
								placeholder="ادخل المهاره ">
                                @if ($errors->has('name'))
                                <small class="text-sm text-red-700">{{ $errors->first('name') }}</small>
                            @endif   
						</div>

						<div class="mb-5 text-right ">

                          

							<label for="email" class="font-bold mb-1 text-gray-700 block">المهاره الاب</label>
                            <select name="parent" class="w-full py-2.5 rounded bg-white mb-1 text-right">
                                <option value=0>لا يوجد</option>
                                @foreach($parent as $p)
                                  <option {{($data->parent_id==$p->id) ? 'selected' : ''}} value="{{$p->id}}">{{$p->title}}</option>
                                      
                                @endforeach
                            </select>

                                @if ($errors->has('parent'))
                                <small class="text-sm text-red-700">{{ $errors->first('parent') }}</small>
                            @endif   
						</div>


                        
                       
                        	<!-- Bottom Navigation -->	
		<div class="">
			<div class="max-w-3xl mx-auto">
				<div class="flex justify-between">
					<div class="w-1/2">
						<button
                        type="submit"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-[#186D80] hover:bg-[#186D80] font-medium" 
						>حفظ</button>
					</div>

					<div class="w-1/2 text-right">
                        
						<a href="/admin/skills"
							class="w-32 focus:outline-none border border-transparent py-2  px-12 rounded-lg shadow-sm text-center text-white bg-[#8ECAE6] hover:bg-[#186D80] font-medium" 
						>تراجع</a>

				
					</div>
				</div>
			</div>
		</div>
		<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->	

                    </form>

					</div>
				
				</div>
				<!-- / Step Content -->
			</div>
		</div>

	
	</div>


</body>
<!-- /.content -->
@endsection


