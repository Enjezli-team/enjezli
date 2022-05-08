<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="<?php echo e(asset('auth_assets/project_assests/css/project_details.css ')); ?>">
<style>
    a{
      text-decoration: none;  
      color:black;
    }    
</style>
<div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 ">
               

               
                <span><a href="<?php echo e(route('projects.create')); ?>">اضافة مشروع</a></span>

                <div class="accordion mt-3 " id="accordionExample">
                    <div class="accordion-item">
                       
                        <?php if(!$data->isEmpty()): ?> 
                                <h2 class="accordion-header d-flex justify-content-between align-items-center p-3 pt-1 pm-1" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                المشاريع 
                            
                                </button>
                                <div class="select">
                                    <select id="standard-select">
                                        <option value="">الاحدث</option>
                                        <option value="">الاقدم</option>
                                    </select>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                             
                                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                  <div class="accordion-body">
                                    
                               
                                  <a href="projects/<?php echo e($item->id); ?>"> <div class="personal_info_container myworks">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-start">
                                                <div class="img_con">

                                                </div>
                                                 <div class="container_card">
                                                    <header class="">

                                                        <div>
                                                          
                                                            <h3> <?php echo e($item->title); ?></h3>
                                                             العروض: <span> <?php echo e($item->sal_offers->count()); ?> </span>
                                                              <div class="desc"> <?php echo e($item->description); ?></div>
                                                              
                                                        </div>
                                                             حالة المشروع
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
                                                            
                                                            
                                                            <?php if($item->status == 0|| $item->status == 1): ?>

                                                            <span><a href="<?php echo e(route('projects.edit',$item->id)); ?>">تعديل</a></span>
                                                                
                                                            <?php endif; ?>
                                                           
                        

                                                    </header>




                                                </div> 
                                            </div>
                                    
                                        </div>
                                      
                                    </div>
                                </div></a> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                            
                                 
                                </div> 
                            
                                
                                <?php endif; ?>
                            
                               
                                

                           

                               
                          
                    </div>

                </div>








            </div>
            <!-- Side -->
     

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html><?php /**PATH C:\Users\DELL\Desktop\newstrongEnergy\last\Enjezli-new\resources\views/website/users/project/projects_d.blade.php ENDPATH**/ ?>