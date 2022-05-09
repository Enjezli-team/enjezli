

<?php $__env->startSection('side'); ?>

<form action="<?php echo e(route('add_section')); ?>" method="POST">
    <?php echo csrf_field(); ?>




    <div class="  ">
      <div class="bg-white py-6 rounded-md  m-4 p-4 shadow-md">
        <h1 class="text-center text-lg font-bold text-gray-500">أضف قسم</h1>
        
        <div class="space-y-4 mt-6 grid grid-cols-4 gap-4">
          <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">إضافة</button>
        <div></div>
                
           <div class="relative border-none">
                  <select name="section" class="text-gray-600 appearance-none py-2.5 border-none bg-gray-100 inline-block rounded leading-tight w-full">
                    
                    <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <option class="pt-6" value=<?php echo e($section->id); ?>><?php echo e($section->title); ?></option>
                
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\enjezli\enjezli\resources\views/Admin/create_section.blade.php ENDPATH**/ ?>