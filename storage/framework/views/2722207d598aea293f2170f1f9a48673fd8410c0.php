
<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="city_search_url" value="<?php echo e(route('city.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('city.create')); ?>" data-toggle="tooltip" data-placement="left" title="Add New City" class="btn btn-primary btn-sm">Add New City</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-4">
                            <input type="text" id="search" class="form-control" placeholder="Type name to search" style="margin-bottom:5px">
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                        <div class="d-flex col-sm-3">
                            <div class="row-fluid">
                                <select class="selectpicker" name="country" id="country" data-show-subtext="true" data-live-search="true">
                                    <option value="All" selected>Search by country</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex col-sm-3">
                            <select class="form-control" name="state" id="search_state">
                                <option value="All" selected>Search by state</option>
                            </select>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>NAME</th>
                                <th>STATE</th>
                                <th>COUNTRY</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="id-<?php echo e($model->id); ?>">
                                    <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td><?php echo e($model->name); ?></td>
                                    <td><?php echo e($model->hasState->name); ?></td>
                                    <td><?php echo e($model->hasState->hasCountry->name); ?></td>
                                    
                                    <td width="250px">
                                        <a href="<?php echo e(route("city.show", $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show City" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="7">
                                    Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('change','#country',function(e) {
            select = $(this);
            selectedOption = select.find( "option[value=" + select.val() + "]" );
            var country =  selectedOption.val();
            var search = $('#search').val();
            var state = $('#search_state').val();
            var pageurl = $('#city_search_url').val();
            var page = 1;

            fetchAll(pageurl, page, search, country, state);
            $.ajax({
                url:"<?php echo e(route('admin.get_states')); ?>",
                type: 'get',
                data: {country_id:country},
                success: function(response){
                    var html = '';
                    html += '<option value="All">Search by state</option>';
                    jQuery.each(response.states, function(index, state) {
                        html += '<option value="'+state.id+'">'+state.name+'</option>';
                    });

                    $('#search_state').html(html);
                }
            });
        });
        $(document).on('change','#search_state',function(e) {
            select = $(this);
            selectedOption = select.find( "option[value=" + select.val() + "]" );
            var state =  selectedOption.val();
            var search = $('#search').val();
            var country = $('#country').val();
            var pageurl = $('#city_search_url').val();
            var page = 1;
            fetchAll(pageurl, page, search, country, state);
        });
        $('#search').keyup((function(e) {
            var search = $(this).val();
            var country = $('#country').val();
            var state = $('#search_state').val();
            var pageurl = $('#city_search_url').val();
            var page = 1;
            fetchAll(pageurl, page, search, country, state);
        }));

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var search = $('#search').val();
            var country = $('#country').val();
            var state = $('#search_state').val();
            var pageurl = $('#city_search_url').val();
            var page = $(this).attr('href').split('page=')[1];
            fetchAll(pageurl, page, search, country, state);
        });

        function fetchAll(pageurl, page, search, country, state){
            $.ajax({
                url:pageurl+'?page='+page+'&search='+search+'&country='+country+'&state='+state,
                type: 'get',
                success: function(response){
                    $('#body').html(response);
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/cities/index.blade.php ENDPATH**/ ?>