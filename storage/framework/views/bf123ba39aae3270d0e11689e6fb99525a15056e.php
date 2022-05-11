<?php $__env->startSection('side'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <strong>Whoops!</strong> 
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>



  <form action="<?php echo e(route('update_section',$section->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>




    <div class="  ">
      <div class="bg-white py-6 rounded-md  m-4 p-4 shadow-md">
        
        <div class="space-y-4 mt-6 grid grid-cols-4 gap-4">
          <button class="w-full mt-5 bg-[#219EBC] text-white py-2 rounded-md font-semibold tracking-tight">تعديل</button>
      
                
                <div></div>
                <div></div>
          <div class="">
            <input type="text" placeholder="اسم القسم " class=" py-2 bg-gray-100 text-right w-full" name="title" value="<?php echo e($section->title); ?>"/>
          </div>
       
        </div>
        </div>
    </div>
  </form>


  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\enjezli\enjezli\resources\views/admin/update_section.blade.php ENDPATH**/ ?>