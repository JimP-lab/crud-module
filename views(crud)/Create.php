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
                            <h2 class="page-title" style="margin-top: 10px; margin-bottom: 20px;"><?php echo _l('Clients'); ?></h2>
                        </div>
                        <div class="row">
                            <form id="crudForm" method="post" action="<?php echo admin_url('crud/crudClientCredentials'); ?>">
                            <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <label for="name">Name</label>
                            <input type="text" name="Name" id="name">
                            <label for="vat">VAT</label>
                            <input type="text" name="VAT" id="vat">
                            <button type="submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
