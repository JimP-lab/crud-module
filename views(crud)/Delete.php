<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <!-- Page Title -->
                        <div class="row">
                            <h2 class="page-title" style="margin-top: 10px; margin-bottom: 20px;"><?php echo _l('Delete Client'); ?></h2>
                        </div>
                        <div class="row">
                            <form id="deleteForm" method="post" action="<?php echo admin_url('crud/crudDeleteClient'); ?>">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                
                                <!-- If client data is available, pre-fill the form -->
                                <?php if ($client): ?>
                                    <input type="hidden" name="client_id" value="<?php echo $client->id; ?>">
                                    <p><strong>Name:</strong> <?php echo $client->Name; ?></p>
                                    <p><strong>VAT:</strong> <?php echo $client->VAT; ?></p>
                                <?php else: ?>
                                    <p>No client selected for deletion.</p>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>

<script>
function confirmDelete() {
    var confirmAction = confirm("Do you want to delete this client?");
    
    if (confirmAction) {
        document.getElementById('deleteForm').submit();
        alert("Client has been deleted.");
    } else {
        alert("Client deletion cancelled.");
    }
}
</script>
