<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
    integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="<?php echo e(asset('auth_assets/project_assests/css/style.css ')); ?>">


<?php $__env->startSection('content'); ?>
    <div class="loginContainer_2 sign-up-container up">

        <div class="container overflow-hidden  mt-5 form_con ">
            <div class="row">
                <div class="col">
                    <div class="mx-auto p-3">
                        <div class="">
                            <div class="">
                                <div class="p-3 shadow-lg rounded-3">
                                    <h2 class="text-center"> تعديل مشروع
                                    </h2>
                                    <div class="logo-container">

                                    </div>
                                    
                                    <form method="POST" class='d-grid gap-4'
                                        action="<?php echo e(route('projects.update', $data['id'])); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <div class="user-box mt-3 d-grid gap-4">
                                            <label> عنوان المشروع </label>
                                            <input id="face" name="title" type="text" class="form-control"
                                                value="<?php echo e($data['title']); ?>">
                                            <?php $__errorArgs = ['title'];
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

                                        <div class="user-box d-grid gap-4">

                                            <label> المهارات </label>
                                            <div class="w-100">
                                                <select class="selectpicker w-100" name="skills[]" multiple
                                                    aria-label="المهارات " data-live-search="true">
                                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($skill['id']); ?>"><?php echo e($skill['title']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php $__errorArgs = ['skills'];
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

                                        <div class="user-box mt-2 d-grid gap-4">

                                            <label> تفاصيل المشروع </label>
                                            <textarea id="face" name="description" type="text" class="form-control" rows="6">
                                           <?php echo e($data['description']); ?>

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
                                            


                                            <div class="row gx-5 ">
                                                <div class="col-lg row-md">

                                                    <div class="user-box mt-2 d-grid gap-4">
                                                        <small>
                                                            الميزانية المتوقعة


                                                        </small>
                                                        <input id="face" name="price" type="text" class="form-control"
                                                            value='<?php echo e($data['price']); ?>'>
                                                        
                                                    </div>
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

                                                <div class="col-lg row-md ">
                                                    <div class="user-box mt-2 d-grid gap-4">
                                                        <small>
                                                            المدة المتوقعة للتسليم

                                                            (أيام)
                                                        </small>
                                                        <input id="face" name="duration" type="number"
                                                            class="form-control" value='<?php echo e($data['duration']); ?>'>
                                                        <?php $__errorArgs = ['duration'];
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
                                                </div>
                                            </div>






                                            <div class="user-box mt-2 ">

                                                <div class="input-group custom-file-button">
                                                    <label class="input-group-text" for="inputGroupFile">ملفات
                                                        توضيحية</label>
                                                    <input type="file" name="files[]" class="form-control"
                                                        id="inputGroupFile" multiple>
                                                </div>

                                            </div>



                                            <div class='btn-cont'>
                                                <button class="show_more" type='submit'> حفظ</button>
                                                <button class="show_more" type=''> الغاء</button>
                                            </div>



                                        </div>
                                </div>





                                </form>


                            </div>

                        </div>
                    </div>
                </div>



                <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                                crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
                                integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
                                crossorigin="anonymous" referrerpolicy="no-referrer"></script>




                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById("output");
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };

                    $(function() {
                        $('#datepicker').datepicker();
                    });
                </script>
            <?php $__env->stopSection(); ?>

<?php echo $__env->make("website.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/website/users/project/edit.blade.php ENDPATH**/ ?>