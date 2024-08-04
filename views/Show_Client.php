<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>name</th>
                <th>vat</th>
                <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($Clients) && is_array($Clients)): ?>
                        <?php foreach ($Clients as $Client): ?>
                            <tr>
                                <td><?php echo $Client['id']; ?></td>
                                <td><?php echo $Client['name']; ?></td>
                                <td><?php echo $Client['vat']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No Clients</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?php echo admin_url('crud/CreateClient'); ?>" class="btn btn-primary mt-3">Create Client</a>
            <a href="<?php echo admin_url('crud/EditClient'); ?>" class="btn btn-primary mt-3">Edit Client</a>
            <a href="<?php echo admin_url('crud/DeleteClient'); ?>" class="btn btn-primary mt-3">Delete Client</a>
        </div>
    </div>
</div>
<?php init_tail(); ?>