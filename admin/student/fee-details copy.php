<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<?php
$MERCHANT_KEY="awUp7zBb";
$SALT="T4meBzglbm";
$PAYU_BASE_URL="https://test.payu.in";
$action= '';
$posted= array();
if(!empty($_POST)){

    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}
 $formError = 0;
  if(empty($posted['$txnid'])) {
    $txnid = substr(hash('sha256',mt_rand() . microtime()), 0, 20);
  } else{
    $txnid= $posted['txnid'];

  }
 $hash = '';
 $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
 if(empty($posted['hash']) && sizeof($posted) > 0){
 
    if( empty($posted['key'])
  || empty($posted['txnid'])
  || empty($posted['amount'])
  || empty($posted['firstname'])
  || empty($posted['email'])  
  || empty($posted['phone'])  
  || empty($posted['productinfo'])
  || empty($posted['surl'])  
  || empty($posted['furl'])  
  || empty($posted['service_provider'])
  ){
    $formError = 1;

  } else{
    $hashVarSeq = explode('|',$hashSequence);
      $hash_string = '';
      foreach($hashVarSeq as $hash_var){
        $hash_string .=isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';


      }
      $hash_string .=$SALT;
      $hash = strtolower(hash('sha512',$hash_string));
      $action = $PAYU_BASE_URL . '/_payment';

  }

 } elseif(!empty($posted['hash'])){
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';

 }
 ?>
 
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
       var PayuForm = document.forms.payuForm;
       payuForm.submit();
    }
</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Student Fee Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Student Fee Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php 
            //$std_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
            $usermeta = get_user_metadata($std_id);
            $class = get_post(['id' => $usermeta['class']]);
        ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Detail</h3>
                </div>
                <div class="card-body">
                    <strong>Name: </strong> <?php echo get_users(array('id' => $std_id))[0]->name ?> <br>
                    <strong>Class: </strong> <?php echo $class->title ?>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tution Fee</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Month</th>
                                <th>Fee Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                           
                            $months = array('January', 'Fabruary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                            foreach ($months as $key => $value) {
                                $highlight = '';

                             
                                if (date('f')==ucwords($value)) {
                                 
                                    $highlight = 'class="bg-success"';
                                }
                                //   if(date('F') == ucwords($value))
                                //   {
                                //     $highlight = 'class="bg-success"';
                                //   }
                            ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td><?php echo ucwords($value) ?></td>
                                    <td >
                                    </td>
                                    <td>
                                     
                                      <a href="?action=pay&month=<?php echo $value ?>&std_id=<?php echo $std_id 
                                      ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> View</a>
                                      <a href="#" data-toggle="modal" data-month="<?php echo $value ?>" data-target=#paynow-popup class="btn btn-sm btn-warning paynow-btn"><i class="fa fa-money-check-alt fa-fw"></i> pay Now</a>
                                       
                                       <a href="?action=pay&month=<?php echo $value ?>&std_id=<?php echo $std_id 
                                      ?>" class="btn btn-sm btn-dark"><i class="fa fa-envelope fa-fw"></i>Send message</a>

                                      <a href="?action=pay&month=<?php echo $value ?>&std_id=<?php echo $std_id 
                                      ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>

                                     
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

       
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<?php
$MERCHANT_KEY = "awUp7zBb";
$SALT ="T4meBzglbm";
$PAYU_BASE_URL ="https://secure.payu.in";

$action='';
$action = $PAYU_BASE_URL .'/_payment';
$txnid=substr(hash('sha256',mt_rand().microtime()),0,20);
$hash='';

$posted=array();
if(!empty($_POST)){

foreach($_POST as $key=>$value){
    $posted[$key]=$value;
}
}

$formError =0;

if(empty($posted['txnid'])){
    $txnid=substr(hash('sha256',mt_rand().microtime()),0,20);
}else{
    $txnid=$posted['txnid'];
}
$hash ='';

$hashSequence = "key|txnid|amount|productinfo|firstname|email";
$hashVarSeq =explode('|',$hashSequence);
$hash_string ='';
foreach($hashVarSeq as $hash_var){
    $hash_string .=isset($posted[$hash_var])?$posted[$hash_var]:'';
    $hash_string .='|';
}

$hash_string .= $SALT;

$hash = strtolower(hash('sha512',$hash_string));

?>

 <!-- Modal -->
 <div class="modal fade" id="paynow-popup" tabindex="-1" role="dialog" aria-labelledby="paynow-popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paynow-popupLabel">Paynow</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                        <input type="hidden" name="hash" value="<?php echo $hash ?>" />
                        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                        <input type="hidden" name="amount" readonly="readonly" value="500" />
                        <input type="hidden" name="surl" value="localhost//School-Management-System/actions/success.php" size="64" />
                        <input type="hidden" name="furl" value="localhost//School-Management-System/actions/failure.php" size="64" />
                        <input type="hidden" name="service-provider" value="Payu_pisa" size="64" />
                        <input type="hidden" name="productinfo" value="fee payment" />


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="firstname" readonly class="form-control" value="<?php echo $student->name ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" name="email" readonly class="form-control" value="<?php echo $student->email ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" readonly class="form-control" value="1234567890">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">payment Months</label>
                                    <input type="text" name="month" readonly class="form-control" id="month" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h3><i class="fa fa-rupee-sign"></i> 500.00</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" name="form_submitted" class="btn btn-success">Confirm & Pay</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).on('click', '.paynow-btn', function() {
            var month = jQuery(this).data('month');

            jQuery('#month').val(month);

        });
        jQuery(document).ready(function(){submitPayuForm()})
    </script>

<?php include('footer.php') ?>