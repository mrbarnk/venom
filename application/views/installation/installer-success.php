<div class="card mb-3">
  <div class="card-header bg-success text-white text-center">
  <h5>HURRAY! INSTALLATION WAS SUCCESSFULL!</h5>
   </div>

<div class="card-body">
Tables required by <i class='btn btn-sm btn-success'>Venom</i> have been ticked (<i class='fa fa-check text-success'></i>)
  <div class="table-responsive">

<?php

$template = array (
 'table_open' =>  '<table class="table table-bordered" width="100%" cellspacing="0">'
);

$this->table->set_template($template);

$this->table->set_heading('Table Name', 'Status', 'Remark');

foreach ( $all_tables as $table ):

$this->table->add_row( $table, in_array($table, $required_tables) ? '<i class="fa fa-check"></i>' : '', 'perfect!');

endforeach;

echo $this->table->generate();
?>

</div>
</div>
<div class='text-right'><button class='badge badge-sm badge-warning btn-primary text-secondary'>Current Version: 1.0 Penza</button></div> 
<div class="card-footer text-left">Next up, you need to create your admin authentication data <?php echo anchor('admin/create', "LET'S PROCEED!", array('class' => 'btn btn-success text-white')); ?></div>
          </div>