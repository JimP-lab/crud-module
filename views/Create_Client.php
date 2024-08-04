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
<h4 class="page-title">Clients</h4>
</div> 
</div>
<!-- PAGE CONTENT HERE -------------------------->
<div class="row mtop10">
<form id="ClientsForm" method="post" action="<?php echo admin_url('crud/ClientCredentials'); ?>">
<input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
<label for="name">name</label>
<input type="text" name="name" id="name">
<label for="vat">vat</label>
<input type="text" vat="vat" id="vat">
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
                                                        
