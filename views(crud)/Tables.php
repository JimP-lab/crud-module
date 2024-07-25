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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($crud) && is_array($crud)): ?>
                        <?php foreach ($crud as $clients): ?>
                            <tr>
                                <td><?php echo $clients['Name']; ?></td>
                                <td><?php echo $clients['VAT']; ?></td>
                                <td>
                                    <!-- Delete Form -->
                                    <form method="post" action="<?php echo admin_url('crud/crudDeleteClient'); ?>" style="display:inline;">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                        <input type="hidden" name="clients" value="clients">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this.form)">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?php echo admin_url('crud/crudCreateClient'); ?>" class="btn btn-primary mt-3">CREATE</a>
        </div>
    </div>
</div>
<?php init_tail(); ?>

<script>
function confirmDelete(form) {
    var confirmAction = confirm("Do you want to delete this client?");
    
    if (confirmAction) {
        form.submit();
        alert("Client has been deleted.");
    } else {
        alert("Client deletion cancelled.");
    }
}
</script>
