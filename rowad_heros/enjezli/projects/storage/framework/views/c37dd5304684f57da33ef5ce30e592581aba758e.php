<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="<?php echo e(asset('auth_assets/project_assests/css/project_details.css ')); ?>">



<?php $__env->startSection('content'); ?>

    <div class="container mt-5 details_container">

        <div class='title'>
            <h3>تصميم نظام محاسبي متكامل</h3>
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


                                    
                                </ul>
                            </div>
                            
                            <ul class="list-unstyled mb-0 list-unstyled job_det attachment_contianer">
                                <?php if(!$data->sal_project_attach->isEmpty()): ?>
                                    <h4> ملفات توضيحية</h4>
                                    <?php $__empty_1 = true; $__currentLoopData = $data->sal_project_attach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li><a><?php echo e($attach->file_name); ?></a> </li>
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
                                        <?php echo e($skill->sal_skill->title); ?>

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



                <div class="">
                    <div class=" card p-5  personal_info_container myworks">
                        <div class="card-header"> اضافة عرض </div>
                        <form method="POST" action="<?php echo e(route('offers.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input style="display:none" id="face" name="project_id" type="number" class="form-control"
                                value="<?php echo e($data->id); ?>">
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
                                <textarea id="face" name="description" type="text" class="form-control" rows="6">
                                                </textarea>
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
                                    <input type="file" name="files[]" class="form-control" id="inputGroupFile" multiple>
                                </div>

                            </div>




                            <div class="text-start mt-3">
                                <button class="show_more " type='submit'> اضف عرضك</button>
                            </div>

                        </form>


                    </div>
                </div>


                <div class="accordion mt-3 " id="accordionExample">
                    <div class="accordion-item">

                        <?php if(!$data->sal_offers->isEmpty()): ?>
                            <h2 class="accordion-header d-flex justify-content-between align-items-center p-3 pt-1 pm-1"
                                id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    العروض المقدمة

                                </button>
                                <div class="select">
                                    <select id="standard-select">
                                        <option value="">الاحدث</option>
                                        <option value="">الاقدم</option>
                                    </select>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">

                                <?php $__currentLoopData = $data->sal_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accordion-body">

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
                                                                <span>منذ دقيقة</span>
                                                            </div>

                                                        </header>




                                                    </div>
                                                </div>
                                                <div class="select">
                                                    <select id="standard-select">
                                                        <option value="">الاحدث</option>
                                                        <option value="">الاقدم</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="desc"> <?php echo e($offer->description); ?></div>
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
                                <?php if($data->status == 1): ?>
                                    <span>مفتوح</span>
                                <?php else: ?>
                                    مغلق
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
                                عدد العروض <span><?php echo e($offers_count); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div>


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
                            <label class="d-flex align-items-baseline gap-2"> <input type="radio" class="option-input radio"
                                    name="example"
                                    <?php if($data->status == 3): ?> checked
                            <?php else: ?>
                                 disabled <?php endif; ?> />
                                مرحلة التسليم </label>
                        </div>

                    </div>

                </div>

                <div class="personal_info_container myworks">
                    <h5>صاحب المشروع</h5>

                    <div class="d-flex align-items-flex-start">
                        <div class="img_con">
                            
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

<?php echo $__env->make("website.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\n\Enjezli-new\rowad_heros\enjezli\projects\resources\views/website/users/project/show.blade.php ENDPATH**/ ?>