<link rel="stylesheet" href="<?php echo e(asset('auth_assets/project_assests/css/project_card.css ')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/model.css ')); ?>">


<style>
    /****search effect******/


    /****search effect******/

    .search {
        cursor: pointer;
        color: #186d80;
        font-size: 18px;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 50px;
        width: 50px;
        border-style: none;
        padding: 10px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: transparent;
        padding-right: 40px;
        color: #257587;
    }

    .input-search::placeholder {
        color: gray;
        letter-spacing: 2px;
    }

    .btn-search {
        width: 50px;
        height: 50px;
        border-style: none;
        font-size: 16px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color: black;
        background-color: transparent;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 177px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid gray;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 177px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid gray;
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    @media (min-width:768px) {
        .input-search:focus {
            width: 170px;
        }
    }

    .show_more {
        background-color: #186d80;
        color: white;
        border-radius: 0.25rem;
    }

    .show_more:hover {
        background-color: white;
        color: #186d80;
    }

    .price {
        font-size: 33px;
        color: #186d80;
    }

</style>

<?php $__env->startSection('content'); ?>
    <!-- End Navbar -->
    <div class="container-fluid mt-5 ">
        <div class="page-header min-height-300 border-radius-xl mt-4 text-center text-white d-flex justify-content-center"
            style="">
            <span class="mask bg-gradient-dark"></span>
            <div class='text-center' style='z-index:12'>
                <h3 class='text-white'>
                  مشاريعي
                 [                                             <?php echo e($data->count()); ?>


]
                 </h3>
                <p>
تعرض هذه الصفحة    المشاريع التي قمت بنشرها
                </p>
            </div>
        </div>

    </div>
    <div class="container-fluid pb-4">
        <div class="row">
    <?php if(session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session()->get('success')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif(session()->has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session()->get('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-12 col-xl-4 mt-3 ">
                <div class="card h-100 ">
                      <div class="">
                        <a href="projects/<?php echo e($item->id); ?>">
                            <div class="personal_info_container myworks" style="width: auto;height:415px">
                                <div class="container_card">
                                    <div class="">
                                        <h2 class="h4">     <?php echo e(Str::substr($item->title, 0, 15)); ?>

                                        ....
</h2>
                                        <div class='mt-3 mb-3'>
                                            <div class="flex  align-items-baseline gap-2">
                                                <span>
                                                    <ion-icon name="person-outline"></ion-icon>
                                                </span>
                                                <h5></h5>
                                            </div>
                                            <div class="flex gap-2">
                                                <span>
                                                    <ion-icon name="time-outline"></ion-icon>
                                                </span>
                                                <span class="aut_pub"></span>

                                            </div>
                                        </div>

                                        <div>
                                          <?php echo e(Str::substr($item->description, 0, 50)); ?>

                                         ...معرفة المزيد 


                                        </div>
                                        <div class="liks_shows">
                                            <ul class="d-grid w-100 gap-1 pe-0" >
                                        <div class='d-flex w-100 justify-content-between align-items-center'>
                                            <div>
                                               <li>
                                              
                                                        <span  class="price">    <?php echo e($item->price); ?>$</span>
                                                 
                                                </li>
                                            </div>
                                              
                                              <div>
                                            
                                                        <span> الفترة</span>
                                                        :
                                                        <span>   <?php echo e($item->duration); ?>يوم</span>
                                             
                                                </li>
                                             

                                           
                                              </div>
                                        </div>
                                   
                                                <li class='d-flex gap-2'>
                                                    <a href="" class="status">
                                                    الحالة:
                                                      <?php if($item->status == 1): ?>
                                        <span style="    color: #3a416f;
    background: #4fc3f796;
    padding: 1px 12px;">مفتوح</span>
                                    <?php elseif($item->status == 0): ?>
                                        <span style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;">: معلق </span>
                                    <?php elseif($item->status == 2): ?>
                                        <span style="    color: #3a416f;
    background: #4fc3f796;
    padding: 1px 12px;">قيد التنفيذ </span>
                                    <?php elseif($item->status == 3): ?>
                                        <span style="    color: #3a416f;
    background: #f1f8e9;
    padding: 1px 12px;">تم التسليم</span>
                                    <?php elseif($item->status == 4): ?>
                                        <span style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;">لا يتلقى عروض</span>
                                    <?php elseif($item->status == 5): ?>
                                        <span style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;">مغلق</span>
                                    <?php endif; ?>
                                                     </a>
                                                </li>
                                           
                                           
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="hr">
                                    </div>
                                     
                                    <div class="liks_shows">
                    <?php if($item->status == 0 || $item->status == 1): ?>
                      
                            <a href="<?php echo e(route('projects.edit', $item->id)); ?>" class="show_more">
                                                تعديل 
                          </a>
                          
                        <?php else: ?>
                        <?php endif; ?>
                           

  

  
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

        </div>



    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master_dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Road\v2\Enjezli-new\resources\views/website/users/project/projects_d.blade.php ENDPATH**/ ?>