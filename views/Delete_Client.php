<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<?php init_head();?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">
                <h4 class="page-title">Delete Clients</h4>
              </div> 
            </div>
			<!-- PAGE CONTENT HERE -------------------------->
            <div class="row mtop10">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>name</th>
                <th>vat</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($Clients as $Client): ?>
                    <tr>
                        <td><?php echo $Client['id']; ?></td>
                        <td><?php echo $Client['name']; ?></td>
                        <td><?php echo $Client['vat']; ?></td>
                        <td>
                        <td>
                        <form id="ClientsForm" method="post" action="<?php echo admin_url('crud/DeleteClient'); ?>">
                        <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="id" value="<?php echo $Client['id']; ?>">
                        <button type="Delete" class="btn btn-primary mt-3">Delete Client</button>
                        </form>
                        <a href="<?php echo admin_url('crud/CreateClient'); ?>" class="btn btn-primary mt-3">Create Client</a>
                        <a href="<?php echo admin_url('crud/DeleteClient'); ?>" class="btn btn-primary mt-3">Delete Client</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php init_tail(); ?>