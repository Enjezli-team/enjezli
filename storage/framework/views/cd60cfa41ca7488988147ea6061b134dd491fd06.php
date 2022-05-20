<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="<?php echo e(asset('auth_assets/project_assests/css/project_details.css ')); ?>">
<style>
    a {
        text-decoration: none;
    }

    .note {
        padding: 5px 8px;
        /* background-color: #e7f7ee; */
        font-size: .8rem;
        /* color:#28b661; */
        color: var(--dark_blue);
        /* color:white; */
        background-color: var(--light_blue);
        /* background-color:   #ecf1f48f; */

        /* background-color:#f1f3f5; */


        /* align-self: flex-start; */
        border-radius: 3px;
    }

    .noteSkill {
        padding: 5px 8px;
        font-size: .8rem;
        color: var(--dark_blue);
        background-color: #ecf1f48f;
        border-radius: 3px;
    }

    .status {


        padding: 5px 8px;
        /* background-color: #e7f7ee; */
        font-size: .8rem;
        /* color:#28b661; */
        /* color:var(--dark_blue); */
        color: #ff9b20;
        background-color: #fff8ec;
        /* background-color:#f1f3f5; */

        /*
        align-self: flex-start; */
        border-radius: 3px;

    }

    .personal_info_container {

        border-radius: 12px;
    }
        body{background:#cce5ed;}
.accordion-collapse{    background: rgba(204, 229, 237, 0.46);}

</style>
 

<?php $__env->startSection('content'); ?>


    <div class="container mt-5 details_container">














   <div class="page-header min-height-300 border-radius-xl  mt-1 mb-3 d-flex justify-content-center align-items-center " style="min-height: 70px !important;
                                                                    border-right: 4px solid #5ab1c5;
                                                                    border-radius: 4px;background-color: white;
                                                                    padding: 10px 10px;
                                                                    ">
            <h6 class='text-center'> <?php echo e($data['title']); ?> </h6>
         
        </div>

 

        
        <div class="row">
            <div class="col-lg-8 ">
                <!-- تفاصيل المشروع -->
                
            
                <div class="card mb-4 personal_info_container myworks">
                    <div class="card-header"> تفاصيل المشروع</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <ul class="list-unstyled mb-0 list-unstyled job_det">
                                    <?php echo e($data['description']); ?>

                                    <?php echo e($data->id); ?>


                                    
                                </ul>
                            </div>
                            
                            <ul class="list-unstyled mb-0 list-unstyled job_det attachment_contianer">
                                <?php if(!$data->sal_project_attach->isEmpty()): ?>
                                    <h4> ملفات توضيحية</h4>
                                    <?php $__empty_1 = true; $__currentLoopData = $data->sal_project_attach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li>
                                            <a href='<?php echo e($attach->file_name); ?>'
                                                style='color:black'><?php echo e($loop->iteration); ?>.<?php echo e($attach->file_type); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- المهارات المطلوبة-->
                <div class="card mb-4 personal_info_container myworks">
                    <div class="card-header">المهارات المطلوبة</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">

                                    <?php $__empty_1 = true; $__currentLoopData = $data->sal_skills_by; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        
                                        <span class="note"><?php echo e($skill->sal_skill->title); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div> لا توجد مهارات </div>
                                    <?php endif; ?>




                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- اضافة عرض
                                                                                                                                                                                                                                                                                                                                                                                                                -->

                <?php if($canMakeOffer && $data->status == 1): ?>
                    <div class="">
                        <div class=" card p-5  personal_info_container myworks">
                            <div class="card-header"> اضافة عرض </div>
                            <form method="POST" action="<?php echo e(route('offers.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input style="display:none" id="face" name="project_id" type="number" class="form-control"
                                    value="<?php echo e($data->id); ?>">
                                <input style="display:none" id="face" name="project_owner" type="number"
                                    class="form-control" value="<?php echo e($data->user_id); ?>">
                                <div class="user-box mt-3">
                                    <label><b> مدة التسليم </b>(أيام) </label>
                                    <input id="face" name="duration" type="number" class="form-control">
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger"><?php echo e($message); ?>*</small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    

                                </div>


                                <div class="user-box mt-3">
                                    <label><b> سعر العرض </b> ($)</label>
                                    <input id="face" name="price" type="text" class="form-control">


                                    <small class="text-danger">سوف تكون مستحقاتك 12.00$ بعد خصم عمولة موقع مستقل</small>

                                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger"><?php echo e($message); ?>*</small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    

                                </div>



                                <div class="user-box mt-2">

                                    <label> <b>تفاصيل العرض </b> </label>
                                    <textarea id="face" name="description" type="text" class="form-control" rows="6"></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger"><?php echo e($message); ?>*</small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    

                                </div>







                                <div class="user-box mt-2">

                                    <div class="input-group custom-file-button">
                                        <label class="input-group-text" for="inputGroupFile">ملفات توضيحية</label>
                                        <input type="file" name="files[]" class="form-control" id="inputGroupFile"
                                            multiple>
                                    </div>

                                </div>




                                <div class="text-start mt-3">
                                    <button class="show_more " type='submit'> اضف عرضك</button>
                                </div>

                            </form>


                        </div>
                    </div>
                <?php endif; ?>




                <div class="accordion mt-3 " id="accordionExample">
                    <div class="accordion-item">

                        <?php if(!$data->sal_offers->isEmpty()): ?>
                            <h2 class="accordion-header d-flex justify-content-between align-items-center p-3 pt-1 pm-1"
                                id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    العروض المقدمة

                                </button>
                            
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">

                                <?php $__currentLoopData = $data->sal_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accordion-body" id='offer<?php echo e($offer->id); ?>'>

                                        <div class="personal_info_container myworks">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-start">
                                                    <div class="img_con">

                                                    </div>
                                                    <div class="container_card">
                                                        <header class="">

                                                            <div>
                                                                <h3> <?php echo e($offer->sal_provider_by->name); ?></h3>
                                                                <h4> <?php echo e($offer->sal_provider_by->sal_profile->Job_title); ?>

                                                                </h4>
                                                            </div>
                                                            <div>
                                                                <div class="evaluated">

                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star-half-outline"></ion-icon>
                                                                </div>
                                                                <span>
                                                                    <?php
                                                                        $currentDate = strtotime(\Carbon\Carbon::now()); //'2022-05-5'
                                                                        $oldDate = strtotime($offer->created_at);
                                                                        $deference = $currentDate - $oldDate;
                                                                        //    echo $deference;
                                                                        $days = floor($deference / (60 * 60 * 24));
                                                                        $hours = floor($deference / (60 * 60));
                                                                        $minutes = floor($deference / 60);
                                                                        $seconds = floor($deference / 60);
                                                                        $time = '';
                                                                        //         if( ){
                                                                        //         $time=$days. يوم
                                                                        //     }
                                                                        //     elseif( $hours>0){
                                                                        //         $time=$days. ساعة
                                                                        //     }
                                                                        //     elseif( $minutes>0){
                                                                        //         $time= $minutes. دقيقة
                                                                        //     }
                                                                        //     else{
                                                                        //         $time=  $seconds.ثانية
                                                                        //     }
                                                                        
                                                                        //    echo $time ;
                                                                    ?>

                                                                    <?php if($days > 0): ?>
                                                                        <?php echo e($days); ?>يوم
                                                                    <?php elseif($hours > 0): ?>
                                                                        منذ <?php echo e($hours); ?> ساعة
                                                                    <?php elseif($minutes > 0): ?>
                                                                        منذ <?php echo e($minutes); ?> دقيقة
                                                                    <?php else: ?>
                                                                        منذ <?php echo e($seconds); ?> ثانية
                                                                    <?php endif; ?>
                                                                    

                                                                </span>


                                                            </div>

                                                        </header>




                                                    </div>
                                                </div>
                                                

                                                



                                                <?php if(Auth()->check()): ?>
                                                    <?php if(Auth::user()->id == $offer->provider_id && $offer->status == 1 && $data->status == 1): ?>
                                                        <div class="select">
                                                            <a href="<?php echo e(route('offers.edit', $offer->id)); ?>"
                                                                style="color:black ;text-decoration:none"
                                                                class="note"> تعديل</a>

                                                        </div>
                                                        
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 1 && $data->status == 1): ?>
                                                        
                                                        <form action="<?php echo e(route('acceptOffer')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input style="display:none" type="text" name="offer_id"
                                                                value='<?php echo e($offer->id); ?>'>
                                                            <button style="color:black ;border:none" type='submit '
                                                                class="note"> قبول العرض</button>
                                                             
                                                        </form>
                                                        <a href="<?php echo e(route('chats_with',[$offer->id,$data->id ])); ?>"><button style="color:black ;border:none" type='submit '
                                                            class="note">  دردشة</button></a>
                                                        
                                                        
                                                        
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 2 && $data->status == 4): ?>
                                                        <form action="<?php echo e(route('cancelConfirm')); ?>" method="post">

                                                            
                                                            <?php echo csrf_field(); ?>


                                                            <input style="display:none" type="text" name="offer_id"
                                                                value='<?php echo e($offer->id); ?>'>
                                                            <input style="display:none" type="text" name="project_owner"
                                                                value='<?php echo e($data['user_id']); ?>'>
                                                            <input style="display:none" type="text" name="project_id"
                                                                value='<?php echo e($data['id']); ?>'>
                                                            <button style="color:black ;border:none" type='submit '
                                                                class="note"> الغاء الموافقة </button>
                                                        </form>
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 4): ?>
                                                        <a style="color:black;text-decoration:none"
                                                            class="status ">تم
                                                            رفضه</a>
                                                    <?php elseif($offer->status == 3 && $data->status == 2 && (Auth::user()->id == $data['user_id'] || Auth::user()->id == $data->handled_by)): ?>
                                                        <a style="color:black" class="status">قيد التنفيذ </a>

                                                        
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 3 && $data->status == 3): ?>
                                                        <a href="<?php echo e(route('reject', $offer->id)); ?>">
                                                            <button style="color:white ;border:none" class="btn btn-primary"
                                                                type='submit ' class="note"> رفض الاستلام</button>
                                                        </a>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#confirmDeliver<?php echo e($offer->id); ?>">
                                                            تأكيد الاستلام
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="confirmDeliver<?php echo e($offer->id); ?>"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            تأكيد الاستلام </h5>
                                                                        <button type="button" class="btn-close "
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        هل أنت متأكد من استلام المشروع ؟

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-success"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <form action="<?php echo e(route('confirmDelivery')); ?>"
                                                                            method="post">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input style="display:none" type="text"
                                                                                name="offer_id"
                                                                                value='<?php echo e($offer->id); ?>'>
                                                                            <input style="display:none" type="text"
                                                                                name="project_owner"
                                                                                value='<?php echo e($data['user_id']); ?>'>
                                                                            <input style="display:none" type="text"
                                                                                name="project_id"
                                                                                value='<?php echo e($data['id']); ?>'>
                                                                            <button style="color:black ;border:none"
                                                                                type='submit ' class="note">
                                                                                تأكيد
                                                                                الاستلام </button>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php elseif($offer->status == 3 && $data->status == 6 && (Auth::user()->id == $data['user_id'] || Auth::user()->hasRole('admin'))): ?>
                                                        <a style="color:black" class="status">رفض الاستلام </a>
                                                    <?php elseif($offer->status == 3 && $data->status == 7 && (Auth::user()->id == $data['user_id'] || Auth::user()->hasRole('admin'))): ?>
                                                        <a style="color:black" class="status"> رفعت شكوى </a>
                                                    <?php elseif($offer->status == 3 && $data->status == 5 && (Auth::user()->id == $data['user_id'] || Auth::user()->id == $data->handled_by)): ?>
                                                        <a style="color:black" class="status">مغلق </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>


                                            
                                            <?php if(Auth()->check()): ?>
                                                <?php if(Auth::user()->id == $data['user_id'] || Auth::user()->id == $offer->provider_id): ?>
                                                    السعر <span class="desc">
                                                        <?php echo e($offer->price); ?>


                                                    </span>
                                                    المدة <span class="desc"> <?php echo e($offer->duration); ?></span>
                                                    <div class="desc"> <?php echo e($offer->description); ?></div>
                                                    <ul
                                                        class="list-unstyled mb-0 list-unstyled job_det attachment_contianer">
                                                        <?php if(!$offer->sal_offer_attach->isEmpty()): ?>
                                                            <h4> ملفات توضيحية</h4>
                                                            <?php $__empty_1 = true; $__currentLoopData = $offer->sal_offer_attach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer_attach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <li>
                                                                    <a href='<?php echo e($offer_attach->file_name); ?>'
                                                                        style='color:black'><?php echo e($loop->iteration); ?>.<?php echo e($offer_attach->file_type); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                    </ul>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="desc">
                                                    <?php echo e(Str::substr($offer->description, 0, 80)); ?>...
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">

                                <?php $__currentLoopData = $data->sal_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accordion-body" id='offer<?php echo e($offer->id); ?>'>

                                        <div class="personal_info_container myworks">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-start">
                                                    <div class="img_con">

                                                    </div>
                                                    <div class="container_card">
                                                        <header class="">

                                                            <div>
                                                                <h3> <?php echo e($offer->sal_provider_by->name); ?></h3>
                                                                <h4> <?php echo e($offer->sal_provider_by->sal_profile->Job_title); ?>

                                                                </h4>
                                                            </div>
                                                            <div>
                                                                <div class="evaluated">

                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star" class='gold'></ion-icon>
                                                                    <ion-icon name="star-half-outline"></ion-icon>
                                                                </div>
                                                                <span>
                                                                    <?php
                                                                        $currentDate = strtotime(\Carbon\Carbon::now()); //'2022-05-5'
                                                                        $oldDate = strtotime($offer->created_at);
                                                                        $deference = $currentDate - $oldDate;
                                                                        //    echo $deference;
                                                                        $days = floor($deference / (60 * 60 * 24));
                                                                        $hours = floor($deference / (60 * 60));
                                                                        $minutes = floor($deference / 60);
                                                                        $seconds = floor($deference / 60);
                                                                        $time = '';
                                                                        //         if( ){
                                                                        //         $time=$days. يوم
                                                                        //     }
                                                                        //     elseif( $hours>0){
                                                                        //         $time=$days. ساعة
                                                                        //     }
                                                                        //     elseif( $minutes>0){
                                                                        //         $time= $minutes. دقيقة
                                                                        //     }
                                                                        //     else{
                                                                        //         $time=  $seconds.ثانية
                                                                        //     }
                                                                        
                                                                        //    echo $time ;
                                                                    ?>

                                                                    <?php if($days > 0): ?>
                                                                        <?php echo e($days); ?>يوم
                                                                    <?php elseif($hours > 0): ?>
                                                                        منذ <?php echo e($hours); ?> ساعة
                                                                    <?php elseif($minutes > 0): ?>
                                                                        منذ <?php echo e($minutes); ?> دقيقة
                                                                    <?php else: ?>
                                                                        منذ <?php echo e($seconds); ?> ثانية
                                                                    <?php endif; ?>
                                                                    

                                                                </span>


                                                            </div>

                                                        </header>




                                                    </div>
                                                </div>
                                                

                                                



                                                <?php if(Auth()->check()): ?>
                                                    <?php if(Auth::user()->id == $offer->provider_id && $offer->status == 1 && $data->status == 1): ?>
                                                        <div class="select">
                                                            <a href="<?php echo e(route('offers.edit', $offer->id)); ?>"
                                                                style="color:black ;text-decoration:none"
                                                                class="note"> تعديل</a>

                                                        </div>
                                                        
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 1 && $data->status == 1): ?>
                                                        
                                                        <form action="<?php echo e(route('acceptOffer')); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input style="display:none" type="text" name="offer_id"
                                                                value='<?php echo e($offer->id); ?>'>
                                                            <button style="color:black ;border:none" type='submit '
                                                                class="note"> قبول العرض</button>
                                                             
                                                        </form>
                                                        <a href="<?php echo e(route('chats_with',[$offer->id,$data->id ])); ?>"><button style="color:black ;border:none" type='submit '
                                                            class="note">  دردشة</button></a>
                                                        
                                                        
                                                        
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 2 && $data->status == 4): ?>
                                                        <form action="<?php echo e(route('cancelConfirm')); ?>" method="post">

                                                            
                                                            <?php echo csrf_field(); ?>


                                                            <input style="display:none" type="text" name="offer_id"
                                                                value='<?php echo e($offer->id); ?>'>
                                                            <input style="display:none" type="text" name="project_owner"
                                                                value='<?php echo e($data['user_id']); ?>'>
                                                            <input style="display:none" type="text" name="project_id"
                                                                value='<?php echo e($data['id']); ?>'>
                                                            <button style="color:black ;border:none" type='submit '
                                                                class="note"> الغاء الموافقة </button>
                                                        </form>
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 4): ?>
                                                        <a style="color:black;text-decoration:none"
                                                            class="status ">تم
                                                            رفضه</a>
                                                    <?php elseif($offer->status == 3 && $data->status == 2 && (Auth::user()->id == $data['user_id'] || Auth::user()->id == $data->handled_by)): ?>
                                                        <a style="color:black" class="status">قيد التنفيذ </a>

                                                        
                                                    <?php elseif(Auth::user()->id == $data['user_id'] && $offer->status == 3 && $data->status == 3): ?>
                                                        <a href="<?php echo e(route('reject', $offer->id)); ?>">
                                                            <button style="color:white ;border:none" class="btn btn-primary"
                                                                type='submit ' class="note"> رفض الاستلام</button>
                                                        </a>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#confirmDeliver<?php echo e($offer->id); ?>">
                                                            تأكيد الاستلام
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="confirmDeliver<?php echo e($offer->id); ?>"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            تأكيد الاستلام </h5>
                                                                        <button type="button" class="btn-close "
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        هل أنت متأكد من استلام المشروع ؟

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-success"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <form action="<?php echo e(route('confirmDelivery')); ?>"
                                                                            method="post">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input style="display:none" type="text"
                                                                                name="offer_id"
                                                                                value='<?php echo e($offer->id); ?>'>
                                                                            <input style="display:none" type="text"
                                                                                name="project_owner"
                                                                                value='<?php echo e($data['user_id']); ?>'>
                                                                            <input style="display:none" type="text"
                                                                                name="project_id"
                                                                                value='<?php echo e($data['id']); ?>'>
                                                                            <button style="color:black ;border:none"
                                                                                type='submit ' class="note">
                                                                                تأكيد
                                                                                الاستلام </button>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php elseif($offer->status == 3 && $data->status == 6 && (Auth::user()->id == $data['user_id'] || Auth::user()->hasRole('admin'))): ?>
                                                        <a style="color:black" class="status">رفض الاستلام </a>
                                                    <?php elseif($offer->status == 3 && $data->status == 7 && (Auth::user()->id == $data['user_id'] || Auth::user()->hasRole('admin'))): ?>
                                                        <a style="color:black" class="status"> رفعت شكوى </a>
                                                    <?php elseif($offer->status == 3 && $data->status == 5 && (Auth::user()->id == $data['user_id'] || Auth::user()->id == $data->handled_by)): ?>
                                                        <a style="color:black" class="status">مغلق </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>


                                            
                                            <?php if(Auth()->check()): ?>
                                                <?php if(Auth::user()->id == $data['user_id'] || Auth::user()->id == $offer->provider_id): ?>
                                                    السعر <span class="desc">
                                                        <?php echo e($offer->price); ?>


                                                    </span>
                                                    المدة <span class="desc"> <?php echo e($offer->duration); ?></span>
                                                    <div class="desc"> <?php echo e($offer->description); ?></div>
                                                    <ul
                                                        class="list-unstyled mb-0 list-unstyled job_det attachment_contianer">
                                                        <?php if(!$offer->sal_offer_attach->isEmpty()): ?>
                                                            <h4> ملفات توضيحية</h4>
                                                            <?php $__empty_1 = true; $__currentLoopData = $offer->sal_offer_attach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer_attach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <li>
                                                                    <a href='<?php echo e($offer_attach->file_name); ?>'
                                                                        style='color:black'><?php echo e($loop->iteration); ?>.<?php echo e($offer_attach->file_type); ?></a>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                    </ul>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <div class="desc">
                                                    <?php echo e(Str::substr($offer->description, 0, 80)); ?>...
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>

                            
                        <?php endif; ?>








                    </div>

                </div>








            </div>

            <!-- Side -->
            <div class="col-lg-4 ">
                <!-- بطاقة المشروع-->

                <div class="card mb-4 personal_info_container myworks">
                    <div class="card-header">بطاقة المشروع</div>
                    <div class="card-body">
                        <ul>
                            <li class="d-flex justify-content-between align-items-center  gap-10">
                                حالة المشروع

                                <?php if($data->status == 4): ?>
                                    لا يتلقى عروض

                                    
                                <?php elseif($data->status == 5): ?>
                                    مغلق
                                <?php elseif($data->status == 1): ?>
                                    <span>مفتوح</span>
                                <?php elseif($data->status == 0): ?>
                                    معلق
                                <?php endif; ?>
                            </li>
                            
                            <li class="d-flex justify-content-between align-items-center">
                                الميزانية <span>$<?php echo e($data->price); ?></span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                مدة التنفيذ
                                <span><span><?php echo e($data->duration); ?></span>ايام
                                </span>
                            </li>
                            
                            <li class="d-flex justify-content-between align-items-center">
                                
                                عدد العروض <span><?php echo e($data->sal_offers->count()); ?></span>

                            </li>
                        </ul>
                    </div>
                    <div>

                        <?php if($data->status == 1 || $data->status == 2 || $data->status == 3): ?>
                            <div class="d-grid">
                                <label class="d-flex align-items-baseline gap-2">
                                    <input type="radio" class="option-input radio" name="example"
                                        <?php if($data->status == 1): ?> checked
                             <?php else: ?>
                                disabled <?php endif; ?> />
                                    مرحلة تلقي العروض </label>
                                <label class="d-flex align-items-baseline gap-2">
                                    <input type="radio" class="option-input radio" name="example"
                                        <?php if($data->status == 2): ?> checked
                                <?php else: ?>
                                     disabled <?php endif; ?> />
                                    مرحلة التنفيذ</label>
                                <label class="d-flex align-items-baseline gap-2"> <input type="radio"
                                        class="option-input radio" name="example"
                                        <?php if($data->status == 3): ?> checked
                            <?php else: ?>
                            
                                 disabled <?php endif; ?> />
                                    مرحلة التسليم </label>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="personal_info_container myworks">
                    <h5>صاحب المشروع</h5>

                    <div class="d-flex align-items-flex-start">
                        <div class="img_con">
                            <img src="
                                                                                                                                                                                                                                                                                                                                                                                                                            <?php if($data->sal_created_by->image != null): ?> <?php echo e($data->sal_created_by->image); ?> <?php endif; ?>"
                                alt="">
                        </div>
                        <div class="container_card">
                            <header class="">

                                <div>
                                    <h3> <?php echo e($data->sal_created_by->name); ?></h3>
                                    <h4> مدير شركة </h4>
                                </div>
                        </div>
                    </div>

                    </header>




                </div>


            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\Road\v3\Enjezli-new\resources\views/website/users/project/show.blade.php ENDPATH**/ ?>