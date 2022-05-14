   

<?php $__env->startSection('content'); ?>
   <div class=" container-fluid pb-5">
        <div class="col-12 mb-4">
            <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 ">
                        <i class="fas fa-wifi text-white p-2"></i>
                        <h3 class="text-white mt-4 mb-1 pb-2 text-center">المجموع</h3>
                        <h5 class="text-white  text-center">500$</h5>

                        <div class="col-4 tcard">

                            <div class="me-auto w-20 d-flex align-items-center gap-3 justify-content-end">
                                <img class=" mt-2" src="<?php echo e(asset('master.svg')); ?>" alt="logo" style="width: 100%">>
                                <img class="mt-2" src="<?php echo e(asset('svg/visa.svg')); ?>" alt="logo" style="width: 100%">
                                <img class=" mt-2" src="<?php echo e(asset('svg/paypal-seeklogo.com.svg')); ?>" alt="logo" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 m-auto">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>استلام</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">من</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">الميزانية</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">حالة العمل</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">مقابل</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">التاريخ </th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">نورا</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">اكتمل</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">موقع ويب لمدرسة</span>

                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold"> 22/2/22</span>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm rounded-circle me-2" alt="invision">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">سندس</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">$5,000</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">قيد العمل</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">ويب اندرويد سفت</span>

                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold"> 22/2/22</span>

                                        </div>
                                    </td>

                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make("website.layouts.master_dash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\laaaaaaaaaaaaaaaaaaast\Enjezli-new\resources\views/website/users/wallet/index.blade.php ENDPATH**/ ?>