<div class="<?php echo e($size); ?>">
    <div class="card border-0 shadow rounded h-100">
        <div class="card-body">
            <form name="<?php echo e($name); ?>" action="<?php echo e(route($route)); ?>" method="get">
                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        <div class="text-muted font-weight-bolder fs-5"><?php echo e($title); ?></div>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <input type="hidden" name="function" value="<?php echo e($form['function']); ?>">
                        <input type="hidden" name="unit" value="<?php echo e($form['unit']); ?>">
                        <select name="range" class="form-control form-control-sm card-value">
                            <?php $__currentLoopData = $form['ranges']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $range): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($range); ?>" <?php if($form['range'] == $range): ?> selected <?php endif; ?>><?php echo e($range); ?> <?php echo e($range == 1 ? $form['trans'][0] : $form['trans'][1]); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="h2 mt-3" data-card-value></div>
                        <div class="mb-2 mt-3" data-card-loading>
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div class="text-muted font-weight-medium">
                            <span class="d-none text-danger" data-card-status-error></span>
                            <span data-card-status-loading><?php echo e(__('Loading...')); ?></span>
                        </div>

                        <div class="ml-n3 mr-n3 mb-n3" style="height: <?php echo e($chart['size']); ?>px" data-card-chart>
                            <canvas id="<?php echo e($name); ?>"></canvas>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    "use strict";
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.querySelector('#<?php echo e($name); ?>').getContext('2d');
        const gradient = ctx.createLinearGradient(0, 0, 0, <?php echo e($chart['size']); ?>);
        gradient.addColorStop(0, '<?php echo e($chart['color_start']); ?>');
        gradient.addColorStop(1, '<?php echo e($chart['color_stop']); ?>');
        const <?php echo e($name); ?> = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '<?php echo e($title); ?>',
                    backgroundColor : gradient,
                    borderColor: '<?php echo e($chart['border_color']); ?>',
                    data: []
                }]
            },
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return parseFloat(tooltipItem.value).format(0, 3, '<?php echo e(__('thousands_separator')); ?>').toString();
                        }
                    }
                },
                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }],
                },
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        right:10,
                        left:10,
                        top:5,
                        bottom:5,
                    }
                }
            }
        });
        getCardTrend(document.querySelector('form[name="<?php echo e($name); ?>"]'), <?php echo e($name); ?>, '<?php echo e(__('thousands_separator')); ?>', <?php echo e($chart['total']); ?>);
        document.querySelector('form[name="<?php echo e($name); ?>"] select[name="range"]').addEventListener('change' , function() {
            getCardTrend(document.querySelector('form[name="<?php echo e($name); ?>"]'), <?php echo e($name); ?>, '<?php echo e(__('thousands_separator')); ?>', <?php echo e($chart['total']); ?>);
        });
    });
</script>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/admin/trend_card.blade.php ENDPATH**/ ?>