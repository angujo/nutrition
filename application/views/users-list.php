<div class="row">
    <div class="col-xs-12">
        <h2>Users
            <small>All registrations are done on the app.</small>
        </h2>
        <hr/>
    </div>
    <div class="col-xs-12 users-list">
        <ul class="list-group">
            <?php if ($users) {
                foreach ($users as $user) { ?>
                    <li class="list-group-item horizontal-flex-start">
                        <i class="fa fa-user fa-3x"></i>
                        <div>
                            <ul class="list-unstyled">
                                <li><b><?= $user->first_name, ' ', $user->last_name; ?></b></li>
                                <li class="small text-muted"><em><?= date('F j, Y, g:i a', strtotime($user->created)); ?></em> &middot; <?= $user->email; ?></li>
                                <li>
                                    <label><input data-checker="<?= base_url('admin/set-admin/' . $user->id . '/'); ?>" type="checkbox" <?= $user->is_admin ? 'checked' : ''; ?>> Admin</label> &middot;
                                    <label><input data-checker="<?= base_url('admin/set-enabled/' . $user->id . '/'); ?>" type="checkbox" <?= $user->is_enabled ? 'checked' : ''; ?>> Enabled</label>
                                </li>
                                <li class="notify"></li>
                            </ul>
                        </div>
                    </li>
                <?php }
            } ?>
        </ul>
    </div>
</div>