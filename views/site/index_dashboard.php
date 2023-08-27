<?php


use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */


$this->title = 'Sistem PBB';



?>


<div class="row">
  <div class="col-lg-2">
      <select class="form-control" id="tahun_pajak">
        <?php for($i=2000;$i<=date('Y');$i++){
          $selected = $i==date('Y') ? "selected='selected'" : ""; 
          echo "<option $selected value=$i>$i</option>";
        } ?>
      </select>
  </div>
  <div class="col-lg-10"> 
    <div class="spinner" style="display:none">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-lg-12" id="dashboard_simpbb">
      
  </div>

</div>
      

<?php
$this->registerJs("
  jQuery(document).ready(function() {
      getDashboard()

      $('#tahun_pajak').change(function(){
          getDashboard()
      })

      function getDashboard(){
        $('#dashboard_simpbb').html('');
        $('.spinner').show()
        $.get('".Url::toRoute('site/dashboard')."',{tahun:$('#tahun_pajak').val()})
        .done(function(data){
          $('.spinner').hide()
          $('#dashboard_simpbb').html(data)
         
        });
      }
      
  });
",View::POS_END)

?>