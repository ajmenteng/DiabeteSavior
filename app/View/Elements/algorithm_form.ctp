<?php echo $this->Form->create('TreatmentRunAlgorithm'); ?>

<div class="form-group">
  <?php echo $this->Form->label('type', 'Type', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
    $typeOptions = array(
        'none' => 'none',
        'lifestyle modification' => 'lifestyle modification',
        'lifestyle + monotherapy' => 'lifestyle + monotherapy',
        'lifestyle + dual therapy' => 'lifestyle + dual therapy',
        'lifestyle + triple therapy' => 'lifestyle + triple therapy');
    ?>
    <?php echo $this->Form->select('type', $typeOptions, array('div' => false, 'label' => false, 'value' => $type)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('medicine_name_one', 'Medicine1', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php
    $medOptions = array(
        'none' => 'none',
        'GLP_1RA' => 'GLP_1RA',
        'DPP4_i' => 'DPP4_i',
        'TZD' => 'TZD',
        'SU_GLN' => 'SU_GLN',
        'BasalInsulin' => 'BasalInsulin',
        'Colesevelam' => 'Colesevelam',
        'Bromocriptine_QR' => 'Bromocriptine_QR');
    ?>
    <?php echo $this->Form->select('medicine_name_one', $medOptions, array('div' => false, 'label' => false, 'value' => $med1)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('medicine_name_two', 'Medicine2', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->select('medicine_name_two', $medOptions, array('div' => false, 'label' => false, 'value' => $med2)); ?>
  </div>
</div>

<div class="form-group">
  <?php echo $this->Form->label('medicine_name_three', 'Medicine3', array('class' => 'col-lg-1 control-label')); ?>
  <div class="col-lg-4">
    <?php echo $this->Form->select('medicine_name_three', $medOptions, array('div' => false, 'label' => false, 'value' => $med3)); ?>
  </div>
</div>

<?php     
    echo $this->Form->input('recommendations');
  echo $this->Form->end('Done');
?>