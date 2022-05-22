






@extends('admin.layouts.master')
@section('side')







<body class="antialiased sans-serif bg-gray-200">
	<div x-data="app()" x-cloak>
		<div class="max-w-3xl mx-auto px-4 py-10 m-16">

		

			<div class="w-full rounded bg-gray-100 p-4">	
				<!-- Top Navigation -->
				<div class="">
					<div class="flex flex-col md:flex-row md:items-center md:justify-between">
						<div class="flex-1">
							<div x-show="step === 1">
								<div class="text-lg font-bold text-right text-gray-700 leading-tight py-4">حل النزاع  </div>
							</div>
							
					
						</div>
					</div>
				</div>
				<!-- /Top Navigation -->

				<!-- Step Content -->
				<div class="">	
					<div>
						<div class="mb-5 text-center">
                            
                        <form method="POST" action="{{ route('solveConflict') }}">
                            @csrf
    
						
						
							

						<div class="mb-5 text-right">
							<label for="firstname" class="font-bold mb-1 text-gray-700 block"> الخصم مقابل المشروع</label>
							<input type="text"
                            name='conflict_id'
                            value="{{ $conflict_id }}"
								class="w-full px-4 hidden py-3 text-right rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
							>
                                @if ($errors->has('name'))
                                <small class="text-sm text-red-700">{{ $errors->first('conflict_id') }}</small>
                            @endif   
						</div>

                        
						<div class="mb-5 text-right">

                        <select class="w-full text-right rounded p-2" name="percentage" aria-label="الخصم "
                        data-live-search="true">
                        <option value="100">قبول المشروع المسلم</option>
                        <option value="0">رفض المشروع المسلم</option>

                    </select>
                        </div>

						<div class="mb-5 text-right">


							<label for="email" class="font-bold mb-1 text-gray-700 block">توصيف الحل</label>
							<input type="text"
                            name="solution"
								class="w-full px-4 py-3 text-right rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
							>
                                @if ($errors->has('solution'))
                                <small class="text-sm text-red-700">{{ $errors->first('solution') }}</small>
                            @endif   
						</div>


                        
                       
                        	<!-- Bottom Navigation -->	
		<div class="">
			<div class="max-w-3xl mx-auto">
				<div class="flex justify-between">
					<div class="text-right">
						<button
                        type="submit"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-[#186D80] hover:bg-[#186D80] font-medium" 
						>حفظ</button>
					</div>

					<div class=" text-right">
                        
						<a href="/admin/users"
							class="w-32 focus:outline-none border border-transparent py-2 my-2  px-12 rounded-lg shadow-sm text-center text-white bg-[#8ECAE6] hover:bg-[#186D80] font-medium" 
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

@endsection

                



