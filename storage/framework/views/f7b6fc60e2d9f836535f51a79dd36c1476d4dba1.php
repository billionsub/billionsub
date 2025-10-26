<div class="<?php echo e($size); ?>">
    <div class="card border-0 shadow rounded h-100">
        <div class="card-body">
            <form name="<?php echo e($name); ?>" action="<?php echo e(route($route)); ?>" method="get">
                <div class="row">
                    <div class="col-md-8 col-xs-12 mb-0">
                        <div class="text-muted font-weight-bolder fs-5"><?php echo e($title); ?></div>

                        <div class="mt-3 d-none text-muted font-weight-medium" data-card-legend>
                            <div class="row mb-2 d-none" data-legend-placeholder>
                                <div class="col-md-5 mb-2 d-flex align-items-center"><div class="chart-legend mr-3 rounded w-10" style></div><span data-legend-name></span></div>
                                <div class="col-md-7 mb-2"><span class="text-muted ml-3" data-legend-value></span></div>
                            </div>
                        </div>

                        <div class="mb-2 mt-3" data-card-loading>
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>

                        <div class="text-muted font-weight-medium">
                            <span class="d-none text-danger" data-card-status-error></span>
                            <span data-card-status-loading><?php echo e(__('Loading...')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 mb-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <input type="hidden" name="api_token" value="">
                            <input type="hidden" name="function" value="<?php echo e($form['function']); ?>">

                            <div style="height: <?php echo e($chart['size']); ?>px; width: <?php echo e($chart['size']); ?>px" data-card-chart>
                                <canvas id="<?php echo e($name); ?>"></canvas>
                            </div>
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
        const <?php echo e($name); ?> = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    borderWidth: 0
                }]
            },
            options: {
                legend: false,
                cutoutPercentage: 65,
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    },
                    margin: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    }
                },
                tooltips: {
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return data.labels[tooltipItem[0].index];
                        },
                        label: function(tooltipItem, data) {
                            let values = data.datasets[0].data;
                            let value = parseFloat(data.datasets[0].data[tooltipItem.index]);
                            let total = 0;  // Variable to hold your total
                            for(let i = 0, len = values.length; i < len; i++) {
                                total += parseFloat(values[i]);
                            }
                            return data.datasets[0].data[tooltipItem.index] + ' (' + Number.parseFloat(Math.abs(((value/total) * 100)).toFixed(2)).toString() + '%)';
                        }
                    }
                }
            }
        });
        getCardPartition(document.querySelector('form[name="<?php echo e($name); ?>"]'), <?php echo e($name); ?>, '<?php echo e(__('thousands_separator')); ?>', '<?php echo e($chart['color']); ?>');
    });
</script>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/elements/admin/partition_card.blade.php ENDPATH**/ ?>