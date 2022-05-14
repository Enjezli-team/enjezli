<?php $__env->startSection('content'); ?>
<style>
    /* complete content  */

    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 77px;
        height: 77px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
    }

    .profile-pic .-label {
        cursor: pointer;
        height: 77px;
        width: 77px;
    }

    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }
</style>
<!-- End Navbar -->
<div class="container-fluid ">
<div class="page-header min-height-300 border-radius-xl mt-4" style="min-height: 70px !important;
border-right: 4px solid #5ab1c5;
border-radius: 4px;background-color: white;
padding: 10px 10px;">
   <h6>معرض الاعمال</h6>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">

                <div class="card-body pt-4 p-3">
                    <form method="POST" action="/works" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <div class="login_icon_box">
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>
                                        <svg id="edit_1_" data-name="edit (1)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path id="Path_90" data-name="Path 90" d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414,3.194,3.194,0,0,0-4.414,0Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0,1.123,1.123,0,0,1,0,1.586Z" fill="#fff"></path>
                                            <path id="Path_91" data-name="Path 91" d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,1,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z" fill="#fff"></path>
                                        </svg>
                                    </span>
                                </label>
                                <input id="file" name="image" value="" type="file" onchange="loadFile(event)">
                                <img src=<?php echo e(asset('svg/logo.svg')); ?> id="output" width="200">
                            </div>
                        </div>
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0 text-primary"> اضافة عمل</h6>
                        </div>
                        <?php if(session('status')): ?>
                                    <div class="text-success">
                                    تم الارسال بنجاح يرجى مراجعة ايميلك

                                    </div>
                                    <?php elseif(session('failed')): ?>
                                    <div class="text-success">
                                    لم يتم الرسال لرجاء اعادة المحاوله

                                    </div>

                                <?php endif; ?>

                                    <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label"> اسم العمل  </label>
                                <input  name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <?php if($errors->has('title')): ?>
                                <small id="emailHelp" class="form-text"><?php echo e($errors->first('title')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-6 col-lg-6">
                                <label for="exampleInputEmail1" class="form-label"> رابط العمل  </label>
                                <input  name="link" type="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <?php if($errors->has('link')): ?>
                                <small id="emailHelp" class="form-text"><?php echo e($errors->first('link')); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3 col-sm-12 col-md-6 col-lg-12">
                                <label for="exampleInputEmail1" class="form-label"> ملفات توضيحيه  </label>
                                <input value="" name="files[]" type="file" multiple class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                <?php if($errors->has('files')): ?>
                                <small id="emailHelp" class="form-text"><?php echo e($errors->first('files')); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3 col-sm-12 ">
                                <label for="exampleInputEmail1" class="form-label">  الوصف </label>
                                <textarea id="face" name="description" type="text" class="form-control" rows="5"></textarea>
                                <?php if($errors->has('description')): ?>
                                <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12  d-flex justify-content-evenly gap-5 " style="float: left;
right: 70%;" role="group" aria-label="Basic outlined example">
                            <button type="submit" class="btn btn-outline-primary ">حفظ</button>
                            <a href="/profiles/<?php echo e(Auth::user()->id); ?>" class="btn btn-outline-dark ">الغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    var loadFile = function(event) {
        var image = document.getElementById("output");
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    $(function() {
        $('#datepicker').datepicker();
    });
    $(document).ready(function() {
        $('#select').selectpicker();
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.master_dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\laaaaaaaaaaaaaaaaaaast\Enjezli-new\resources\views/website/users/works/create.blade.php ENDPATH**/ ?>