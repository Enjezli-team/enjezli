<link rel="stylesheet" href="<?php echo e(asset('auth_assets/project_assests/css/project_card.css ')); ?>">


<?php $__env->startSection('content'); ?>
    <div class="profile">

        <div class="d-flex project_container">

            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a class='title' href="<?php echo e(route('projects.show', $item['id'])); ?>">
                    <div class="personal_info_container myworks">
                        <div class="container_card">
                            <header class="">
                                <h2><?php echo e($item['title']); ?></h2>
                                <div>
                                    <div class="flex">
                                        <span>
                                            <ion-icon name="person-outline"></ion-icon>
                                        </span>
                                        <h5><?php echo e($item->sal_created_by->name); ?> </h5>
                                    </div>
                                    <div class="flex">
                                        <span>
                                            <ion-icon name="time-outline"></ion-icon>
                                        </span>
                                        

                                    </div>
                                </div>

                                <div>
                                    <?php echo e(Str::substr($item->description,0, 80)); ?>...  


                                </div>
                                <div class="liks_shows">
                                    <ul>
                                        <li>
                                            <a href="" class="">
                                                <span> الفترة</span>
                                                <span><?php echo e($item['duration']); ?>يوم</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="">
                                                <span> السعر :</span>
                                                <span><?php echo e($item['price']); ?>$</span>
                                            </a>
                                        </li>
                                        <li>

                                            <li>
                                                <a href="" class="">
                                                    <span>:العروض</span>
                                                    <span> <?php echo e($item->sal_offers->count()); ?></span>
                                                </a>
                                            </li>
                                            
                                        </li>
                                    </ul>
                                </div>
                            
                            </header>

                            <div class="hr">
                            </div>
                            <div class="liks_shows">
                                <a href="<?php echo e(route('projects.show', $item['id'])); ?>"><button class="show_more">
                                        التقديم</button></a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>




        </div>

    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("website.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/website/users/project/index.blade.php ENDPATH**/ ?>