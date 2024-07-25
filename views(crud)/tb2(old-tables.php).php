<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>VAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($crud) && is_array($crud)): ?>
                        <?php foreach ($crud as $clients): ?>
                            <tr>
                                <td><?php echo $clients['Name']; ?></td>
                                <td><?php echo $clients['VAT']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?php echo admin_url('crud/crudCreateClient'); ?>" class="btn btn-primary mt-3">CREATE</a>
            <a href="<?php echo admin_url('crud/crudDeleteClient'); ?>" class="btn btn-primary mt-3">DELETE</a>
        </div>
    </div>
</div>
