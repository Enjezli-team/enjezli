
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/user_dashboard.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/user_project.css')); ?>">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>

                <span class='p_relative'>
                    مشاريعي
                    <span class='myproject_count'>
                      <?php echo e($data->count()); ?>


                    </span>

                </span>
                <div class='add edit'>
                    <a href='<?php echo e(route('projects.create')); ?>'>
                        <i class='bx bx-plus'></i>
                    </a>

                </div>

            </div>

        </div>
     <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  
        <div class='porto_container'>

          
            <div class=' porto shadow'>

                <div class='edit'>
                    <?php if($item->status == 0|| $item->status == 1): ?>
                    <a href="<?php echo e(route('projects.edit',$item->id)); ?>">
                        <i class='bx bxs-edit'></i>
                    </a>
                    <?php else: ?>
                   
                    <?php endif; ?>
                </div>
   <a href="projects/<?php echo e($item->id); ?>">
                <div class='img_container'>
                    <div class='img_project'>
                    </div>
                    <div class='personal_info_first'>
                        <div class='phone'>
                            <i class='bx bx-time'></i> <span class='time'> 22/2/2 22:22pm
                            </span>
                        </div>
                        <div class='offer'>
                            العروض
                            <span class='time'> <?php echo e($item->sal_offers->count()); ?> 
                            </span>
                        </div>
                    </div>
                </div>




                <div class='personal_desc'>

                    <div class='title_desc'>
                        <h5><i class='bx bxs-quote-right'></i></h5>

                        <span><?php echo e($item->title); ?> </span>
                        <h5><i class='bx bxs-quote-left'></i></h5>

                    </div>
                    <div class='desc'>
                        <?php echo e(Str::substr($item->description,0, 80)); ?>... 



                      

                    </div>
                    <div class='details'>
                        <div>
                            السعر
                            <span>
                                <?php echo e($item->price); ?>

                            </span>
                            $

                        </div>
                        <div>
                            الحالة
                            <?php if($item->status == 1): ?>
                            <span>مفتوح</span>
                         <?php elseif($item->status == 0): ?>
                        <span>: معلق </span>
                        <?php elseif($item->status == 2): ?>
                        <span>قيد التنفيذ </span>
                        <?php elseif($item->status == 3): ?>
                        <span>تم التسليم</span>
                        <?php elseif($item->status == 4): ?>
                        <span>لا يتلقى عروض</span>
                        <?php elseif($item->status == 5): ?>
                        <span>مغلق</span>
                        <?php endif; ?>


                        </div>
                        <div>
                            المدة
                            <span>
                                <?php echo e($item->duration); ?>

                            </span>
                            ايام
                        </div>

                    </div>

                </div>
            </div>

        </a> 

<div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
        </div>

    
    </section>

<?php echo $__env->make("website.users.user_dashboard.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\laaaaaaaaaaaaaaaaaaast\Enjezli-new\resources\views/website/users/project/projects_d.blade.php ENDPATH**/ ?>