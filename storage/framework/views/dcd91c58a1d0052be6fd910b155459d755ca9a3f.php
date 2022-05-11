
<?php $__env->startSection('side'); ?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-8">
     
    

        <div class="my-2 flex sm:flex-row flex-col justify-end">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                    
                </div>
              

                <form action="">
                    <div class="relative w-32 border-none mx-2">
                       
                        
                     
                 
                </div>
                    
                        
                </form>   
                  
                </div>
            </div>
            <div class="block relative ">

                <form action="">
                <button type="submit" value="search">
                    <div class="absolute flex items-center ml-2 h-10">
                        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
                        </svg>
                      </div>
                </button>
                <input placeholder="بحث"
                name="q"    class="px-4 text-right py-3 w-full rounded-md bg-gray-50 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" />
                </form>
            </div>
        </div>


        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full text-right" style="direction: rtl" >
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الاسم</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الوظيفة</th>
                               
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    نوع المستخدم</th>

                                    <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    الحالة</th>   
                                    <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    العمليات</th>     
                                
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            
                        

                              

                                

                                
                        </tbody>
                    </table>

                
                </div>
            </div>
        </div>
    </div>
</main>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\enjezli\enjezli\resources\views/admin/users/users.blade.php ENDPATH**/ ?>