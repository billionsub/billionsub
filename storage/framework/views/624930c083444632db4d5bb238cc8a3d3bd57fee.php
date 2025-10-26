<?php if($data): ?>
    <?php
                // need to recreate object because policy might depend on record data
                $class = get_class($action);
                $action = new $class($dataType, $data);
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($action->getPolicy(), $data)): ?>
        <?php if($action->shouldActionDisplayOnRow($data)): ?>
            <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'invoices' and isset($data->id)): ?>
                <a target="_blank" href="<?php echo e(route('invoices.get', ['id' => $data->id])); ?>" title="<?php echo e($action->getTitle()); ?>" <?php echo $action->convertAttributesToHtml(); ?>>
                    <i class="<?php echo e($action->getIcon()); ?>"></i> <span class="hidden-xs hidden-sm"><?php echo e($action->getTitle()); ?></span>
                </a>
            <?php else: ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'users' and isset($data->id) && Auth::user()->role_id === 1): ?>
                    <a class="impersonate btn btn-sm btn-danger pull-right view" target="_blank" href="<?php echo e(route('admin.impersonate', ['id' => $data->id])); ?>" title="<?php echo e(__("Impersonate")); ?>">
                        <i class="voyager-person"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Login')); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'user_verifies' and isset($data->id) && Auth::user()->role_id === 1): ?>
                    <a class="impersonate btn btn-sm btn-danger pull-right view" target="_blank" href="<?php echo e(route('profile',['username'=>\App\User::where('id', $data->user_id)->first()->username])); ?>" title="<?php echo e(__("Profile")); ?>">
                        <i class="voyager-person"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Profile')); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'posts' and isset($data->id) && Auth::user()->role_id === 1): ?>
                    <a class="impersonate btn btn-sm btn-danger pull-right view" target="_blank" href="<?php echo e(route('posts.get', ['post_id' => $data->id, 'username' => $data->user->username])); ?>" title="<?php echo e(__("Link")); ?>">
                        <i class="voyager-world"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Link')); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'public_pages' and isset($data->id)): ?>
                    <a class="impersonate btn btn-sm btn-danger pull-right view" target="_blank" href="<?php echo e(route('pages.get',['slug' => $data->slug])); ?>" title="<?php echo e(__("Link")); ?>">
                        <i class="voyager-world"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Link')); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'streams' and isset($data->id)): ?>
                    <a class="impersonate btn btn-sm btn-danger pull-right view" target="_blank" href="<?php echo e(route('public.stream.get',['streamID'=>$data->id,'slug'=>$data->slug])); ?>" title="<?php echo e(__("Link")); ?>">
                        <i class="voyager-world"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Link')); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'user_reports' and isset($data->id)): ?>
                    <div class="btn-group pull-right ml-half-1">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="voyager-world"></i> <span class="hidden-xs hidden-sm"><?php echo e(__("Link")); ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                                try {
                                    if ($data->stream_id) {
                                        $type = 'stream';
                                        $internalUrl = rtrim(getSetting('site.app_url'), '/') . '/admin/streams/' . $data->stream_id;
                                        $frontEndUrl = route('public.stream.get', ['streamID' => $data->reportedStream->id, 'slug' => $data->reportedStream->slug]);
                                    } elseif ($data->message_id) {
                                        $type = 'message';
                                        $internalUrl = rtrim(getSetting('site.app_url'), '/') . '/admin/user-messages/' . $data->message_id;
                                    } elseif ($data->post_id) {
                                        $type = 'post';
                                        $internalUrl = rtrim(getSetting('site.app_url'), '/') . '/admin/user-posts/' . $data->post_id;
                                        $frontEndUrl = route('posts.get', ['post_id' => $data->post_id, 'username' => $data->reportedUser->username]);
                                    } else {
                                        $type = 'user';
                                        $internalUrl = rtrim(getSetting('site.app_url'), '/') . '/admin/users/' . $data->receiver_id;
                                        $frontEndUrl = route('profile', ['username' => $data->reportedUser->username]);
                                    }
                                } catch (\Exception $e) {
                                    $type = 'unknown';
                                    $internalUrl = '#';
                                    $frontEndUrl = '#';
                                }
                            ?>
                            <li><a href="<?php echo e($internalUrl); ?>" target="_blank">Admin side</a></li>
                            <?php if($type !== 'message'): ?>
                                <li><a href="<?php echo e($frontEndUrl); ?>" target="_blank">User side</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if($action instanceof \TCG\Voyager\Actions\ViewAction and $dataType->name === 'withdrawals' and isset($data->id) && Auth::user()->role_id === 1 && $data->status === \App\Model\Withdrawal::REQUESTED_STATUS): ?>
                    <div class="btn-group pull-right ml-half-1">
                        <button type="button" class="btn btn-success manage-button-dropdown dropdown-toggle-<?php echo e($data->id); ?>" data-toggle="dropdown"><i class="voyager-world"></i> <span class="hidden-xs hidden-sm"><?php echo e(__("Manage")); ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="impersonate btn btn-sm btn-danger pull-right view approve-withdrawal-button approve-button-<?php echo e($data->id); ?>" href="#" data-toggle="modal" data-target="#approve-withdrawal" data-value="<?php echo e($data->id); ?>">
                                    <i class="voyager-wallet"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Approve')); ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="reject-withdrawal btn btn-sm btn-danger pull-right view reject-button-<?php echo e($data->id); ?>" target="_blank" href="#" title="<?php echo e(__("Reject")); ?>" onclick="event.preventDefault(); Admin.rejectWithdrawal(<?php echo e($data->id); ?>)">
                                    <i class="voyager-power"></i> <span class="hidden-xs hidden-sm"><?php echo e(__('Reject')); ?></span>
                                </a>
                            </li>
                        </ul>
                        <div class="modal fade" id="approve-withdrawal" tabindex="-1" role="dialog" aria-labelledby="approveWithdrawalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h3><?php echo e(__('Approve withdrawal')); ?></h3>
                                    </div>
                                    <div class="modal-body text-center">
                                        <?php echo e(__('By approving the withdrawal you accept sending the money to the user. If this withdrawal payment method is Stripe Connect then the money are sent to the user bank account linked with the Stripe connected account.')); ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__("Cancel")); ?></button>
                                        <a class="approve-withdrawal btn btn-danger btn-ok" href="#" data-dismiss="modal" onclick="event.preventDefault(); Admin.approveWithdrawal()">
                                            <?php echo e(__('Approve')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <a href="<?php echo e($action->getRoute($dataType->name)); ?>" title="<?php echo e($action->getTitle()); ?>" <?php echo $action->convertAttributesToHtml(); ?>>
                    <i class="<?php echo e($action->getIcon()); ?>"></i> <span class="hidden-xs hidden-sm"><?php echo e($action->getTitle()); ?></span>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php elseif(method_exists($action, 'massAction')): ?>
    <form method="post" action="<?php echo e(route('voyager.'.$dataType->slug.'.action')); ?>" class="display-inline">
        <?php echo e(csrf_field()); ?>

        <button type="submit" <?php echo $action->convertAttributesToHtml(); ?>><i class="<?php echo e($action->getIcon()); ?>"></i>  <?php echo e($action->getTitle()); ?></button>
        <input type="hidden" name="action" value="<?php echo e(get_class($action)); ?>">
        <input type="hidden" name="ids" value="" class="selected_ids">
    </form>
<?php endif; ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/vendor/voyager/bread/partials/actions.blade.php ENDPATH**/ ?>