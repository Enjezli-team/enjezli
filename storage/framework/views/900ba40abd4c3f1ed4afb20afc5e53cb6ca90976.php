
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/user_dashboard.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/user_offer.css')); ?>">

    <section class="home">
        <div class="page_title">
            <div class='title shadow'>

                <span class='p_relative'>
                    العروض
                    <span class='myproject_count'>
                      <?php echo e($offers->count()); ?>


                    </span>

                </span>
         

            </div>

        </div>
        <?php if(!$offers->isEmpty()): ?> 
        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
        <div class='porto_container'>

      

            <div class=' porto shadow'>

                <div class='edit'>
                   
                    <?php if($offer->sal_project_id->status==1 && $offer->status==0): ?>
                  
                    <?php elseif($offer->sal_project_id->status==1 && $offer->status==1): ?>
                  
                    <form action="<?php echo e(route('cancelOffer')); ?>" method="post">
                       <?php echo csrf_field(); ?>
                       <input style="display:none" type="text" name="offer_id" value='<?php echo e($offer->id); ?>'>
                       <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء العرض    </button>
                   </form> 
                   
                   <?php elseif($offer->sal_project_id->status==4 && $offer->status==1): ?>

                      
                       <form action="<?php echo e(route('cancelOffer')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <input style="display:none" type="text" name="offer_id" value='<?php echo e($offer->id); ?>'>
                           <button  style="color:black ;border:none;background:transparent" type='submit '>   إلغاء العرض    </button>
                       </form>
                   
                   <?php elseif($offer->sal_project_id->status==4 && $offer->status==2): ?>
                 
                       <form action="<?php echo e(route('confirmOffer')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <input style="display:none" type="text" name="project_id" value='<?php echo e($offer->sal_project_id->id); ?>'>
                           <input style="display:none" type="text" name="offer_id" value='<?php echo e($offer->id); ?>'>

                           <button  style="color:black ;border:none;background:transparent" type='submit '>   قبول المشروع  </button>
                       </form>
                       <form action="<?php echo e(route('cancelOffer')); ?>" method="post">
                           <?php echo csrf_field(); ?>
                           <input style="display:none" type="text" name="offer_id" value='<?php echo e($offer->id); ?>'>
                           <button  style="color:black ;border:none;background:transparent" type='submit '>    رفض المشروع    </button>
                       </form>
                       <?php elseif($offer->sal_project_id->status==2 && $offer->status==3): ?>
                      
                        <form action="<?php echo e(route('finishWork')); ?>" method="post"> 
                        
                            <?php echo csrf_field(); ?>
                           <input style="display:none" type="text" name="project_id" value='<?php echo e($offer->sal_project_id->id); ?>'>
                           <input style="display:none" type="text" name="offer_id" value='<?php echo e($offer->id); ?>'>

                           <button  style="color:black ;border:none;background:transparent" type='submit '>   تسليم المشروع  </button>
                       </form> 

                      
                 <?php endif; ?>

                </div>
                <a href="projects/<?php echo e($offer->sal_project_id->id); ?>#offer<?php echo e($offer->id); ?>">
              
                <div class='img_container'>
                    <div class='img_project'>
                    </div>
                    <div class='personal_info_first'>
                        <div class='phone'>
                            <i class='bx bx-time'></i> <span class='time'> 22/2/2 22:22pm
                            </span>
                        </div>
                      
                    </div>
                </div>




                <div class='personal_desc'>

                    <div class='title_desc'>
                        <h5><i class='bx bxs-quote-right'></i></h5>

                        <span> <?php echo e($offer->sal_project_id->title); ?></span>
                        <h5><i class='bx bxs-quote-left'></i></h5>

                    </div>
                    <div class='desc'>
                        <?php echo e(Str::substr($offer->description,0, 80)); ?>...  
                    </div>
                    <div class='details'>
                        <div>
                            السعر
                            <span>
                                <?php echo e($offer->price); ?>

                            </span>
                            $

                        </div>
                        
                        <div>
                            الحالة
                            <?php if($offer->sal_project_id->status==1 && $offer->status==0): ?>
                            <a style="color:black" class="status">ملغي</a>
                            <?php elseif($offer->sal_project_id->status==1 && $offer->status==1): ?>
                            <a style="color:black" class="status">بانتظار الموافقة </a>
                           
                          
                           <?php elseif($offer->sal_project_id->status==4 && $offer->status==1): ?>
        
                               <a style="color:black" class="status">   مقبول</a> 
                              
                           
                           <?php elseif($offer->sal_project_id->status==4 && $offer->status==2): ?>
                           <a style="color:black" class="status">تمت موافقتك </a> 
                              
                               <?php elseif($offer->sal_project_id->status==2 && $offer->status==3): ?>
                               <a style="color:black" class="status">قيد التنفيذ </a> 
                               
                                
                               <?php elseif($offer->sal_project_id->status==3 && $offer->status==3): ?>
                         
                               
                               <a style="color:black" class="status"> قيد التسليم   </a>
                               <?php elseif($offer->sal_project_id->status==5 && $offer->status==3): ?>
                               <a style="color:black" class="status"> تم  الاستلام   </a>
                               <?php elseif($offer->sal_project_id->status==1 && $offer->status==4): ?>
                               <a style="color:black" class="status">مرفوض</a>
                         <?php endif; ?>
        


                        </div>
                        <div>
                            المدة
                            <span>
                                <?php echo e($offer->duration); ?>

                            </span>
                            ايام
                        </div>

                    </div>

                </div>
            
            </div>

        </a>

        <div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

        </div>

    
    </section>

<?php echo $__env->make("website.users.user_dashboard.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\لااله ال الله\مجلد جديد\Enjezli-new\resources\views/website/users/offers/index.blade.php ENDPATH**/ ?>