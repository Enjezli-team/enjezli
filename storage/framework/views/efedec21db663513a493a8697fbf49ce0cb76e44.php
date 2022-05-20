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
.flex1{flex:1 1 auto;}
</style>

<?php $__env->startSection('content'); ?>
    <!-- End Navbar -->
    <div class="container-fluid mt-5 ">
        <div class="page-header min-height-300 border-radius-xl mt-4 text-center text-white d-flex justify-content-center"
            style="">
            <span class="mask bg-gradient-dark"></span>
            <div class='text-center' style='z-index:12'>
                <h3 class='text-white'>
                 عرض العروض
                 [                        <?php echo e($offers->count()); ?>

]
                 </h3>
                <p>
تعرض هذه الصفحة العروض التي قدمت اليها
                </p>
            </div>
        </div>

    </div>
    <div class="container-fluid pb-4">
        <div class="row">
  <?php if(!$offers->isEmpty()): ?>
            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-xl-4 mt-3 ">
                <div class="card h-100 ">
                      <div class="">
                        <a href="projects/<?php echo e($offer->sal_project_id->id); ?>#offer<?php echo e($offer->id); ?>">
                            <div class="personal_info_container myworks" style="width: auto;height:415px">
                                <div class="container_card">
                                    <div class="">
                                        <h2 class="h4"><?php echo e($offer->sal_project_id->title); ?></h2>
                                        <div class='mt-3 mb-3'>
                                            <div class="flex  align-items-baseline gap-2">
                                                <span>
                                                    <ion-icon name="person-outline"></ion-icon>
                                                </span>
                                                <h6><?php echo e($offer->sal_project_id->sal_created_by->name); ?></h6>
                                            </div>
                                            <div class="flex gap-2">
                                                <span>
                                                    
                                                </span>
                                                <span class="aut_pub"> </span>

                                            </div>
                                        </div>

                                        <div>
                                          <?php echo e(Str::substr($offer->description, 0, 50)); ?>

                                         ...معرفة المزيد 


                                        </div>
                                        <div class="liks_shows">
                                            <ul class="d-grid w-100 gap-1 pe-0" >
                                        <div class='d-flex w-100 justify-content-between align-items-center'>
                                            <div>
                                               <li>
                                                        <span  class="price">    <?php echo e($offer->price); ?>$</span>
                                                </li>
                                            </div>
                                              
                                              <div>
                                                <li>
                                                        <span> الفترة</span>
                                                        :
                                                        <span>   <?php echo e($offer->duration); ?>يوم</span>
                                                </li>
                                             

                                           
                                              </div>
                                        </div>
                                                
                                                <li class='d-flex gap-2'>
                                                    <a href="" class="status">
                                                    
                                              <?php if($offer->sal_project_id->status == 1 && $offer->status == 0): ?>
                                            <a style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;" class="status">ملغي</a>
                                        <?php elseif($offer->sal_project_id->status == 1 && $offer->status == 1): ?>
                                            <a style="    color: #3a416f;
    background: #c9e1e9;
    padding: 1px 12px;" class="status">بانتظار الموافقة </a>
                                        <?php elseif($offer->sal_project_id->status == 4 && $offer->status == 1): ?>
                                            <a style="    color: #3a416f;
    background: #a5d6a7;
    padding: 1px 12px;" class="status"> مقبول</a>
                                        <?php elseif($offer->sal_project_id->status == 4 && $offer->status == 2): ?>
                                            <a style="    color: #3a416f;
    background: #a5d6a7;
    padding: 1px 12px;" class="status">تمت موافقتك </a>
                                        <?php elseif($offer->sal_project_id->status == 2 && $offer->status == 3): ?>
                                            <a style="    color: #3a416f;
    background: #4fc3f796;
    padding: 1px 12px;" class="status">قيد التنفيذ </a>
                                        <?php elseif($offer->sal_project_id->status == 3 && $offer->status == 3): ?>
                                            
                                            <a style="    color: #3a416f;
    background: #4fc3f796;
    padding: 1px 12px;" class="status"> قيد التسليم </a>
                                        <?php elseif($offer->sal_project_id->status == 5 && $offer->status == 3): ?>
                                            <a style="    color: #3a416f;
    background: #a5d6a7;
    padding: 1px 12px;" class="status"> تم الاستلام </a>
                                        <?php elseif($offer->sal_project_id->status == 1 && $offer->status == 4): ?>
                                            <a style="    color: #3a416f;
    background: #fce4ec;
    padding: 1px 12px;" class="status">مرفوض</a>
                                        <?php endif; ?>


                                                    </a>
                                                </li>
                                           
                                           
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="hr">
                                    </div>
                                    <div class="liks_shows d-flex gap-3" >
                                      <button type="button" class="btn btn-primary flex1" >

                                              تفاصيل 
                                      </button>

                                            <?php if($offer->sal_project_id->status == 1 && $offer->status == 0): ?>
                            <?php elseif($offer->sal_project_id->status == 1 && $offer->status == 1): ?>
                                
                                <button type="button" class="btn btn-primary flex1" data-bs-toggle="modal"
                                    data-bs-target="#cancel<?php echo e($offer->id); ?>">
                                    الغاء العرض
                                </button>
                                   
                                <div class="modal fade" id="cancel<?php echo e($offer->id); ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">الغاء عرض</h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من الغاء العرض ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>

                                                <a href="<?php echo e(route('cancelOffer', $offer->id)); ?>"> <button type="button"
                                                        class="btn btn-danger"> تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php elseif($offer->sal_project_id->status == 4 && $offer->status == 2): ?>
                                
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#accept<?php echo e($offer->id); ?>">
                                    قبول
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="accept<?php echo e($offer->id); ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">قبول مشروع</h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من قبول المشروع ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>

                                                <a
                                                    href="/offer/confirm/<?php echo e($offer->id); ?>/<?php echo e($offer->sal_project_id->id); ?>">
                                                    <button type="button" class="btn btn-danger"> تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#reject<?php echo e($offer->id); ?>">
                                    رفض
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="reject<?php echo e($offer->id); ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">رفض المشروع </h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من رفض المشروع ؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>

                                                <a href="<?php echo e(route('cancelOffer', $offer->id)); ?>"> <button type="button"
                                                        class="btn btn-danger"> تأكيد</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                
                            <?php elseif($offer->sal_project_id->status == 4 && $offer->status == 2): ?>
                                
                                
                            <?php elseif($offer->sal_project_id->status == 2 && $offer->status == 3): ?>
                                
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#deliver<?php echo e($offer->id); ?>">
                                    تسليم
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="deliver<?php echo e($offer->id); ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تسليم المشروع </h5>
                                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                هل أنت متأكد من تسليم المشروع ؟

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success"
                                                    data-bs-dismiss="modal">إلغاء</button>
                                                <form action="<?php echo e(route('finishWork')); ?>" method="post">

                                                    <?php echo csrf_field(); ?>
                                                    <input style="display:none" type="text" name="project_id"
                                                        value='<?php echo e($offer->sal_project_id->id); ?>'>
                                                    <input style="display:none" type="text" name="offer_id"
                                                        value='<?php echo e($offer->id); ?>'>

                                                    <button style="color:black ;border:none;background:transparent"
                                                        type='button ' class="btn btn-danger"> تسليم
                                                        المشروع </button>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

  

  
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        </div>



    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master_dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Road\v2\Enjezli-new\resources\views/website/users/offers/index.blade.php ENDPATH**/ ?>