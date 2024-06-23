<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


<?php
$success_msg =  false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
if (isset($_POST['form_submitted'])) {

    $status = isset($_POST["status"]) ? $_POST["status"] : 'success';
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $amount = isset($_POST["amount"]) ? $_POST["amount"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $month = isset($_POST["month"]) ? $_POST["month"] : '';



    $title = $month . ' - Fee';

    $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `type`,`description`, `status`, `author`,`parent`) VALUES ('$title', 'payment','','$status', $user_id,0)");

    if ($query) {
        $item_id = mysqli_insert_id($db_conn);
    }

    $payment_data = array(
        'amount' => $amount,
        'status' => $status,
        'student_id' => $user_id,
        'month' => $month
    );

    foreach ($payment_data as $key => $value) {
        mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
    }

    $success_msg = true;
}






if (isset($_GET['action']) && $_GET['action'] == 'view-invoice') { ?>

<style>


*,
*::after,
*::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

:root{
    --blue-color: #0c2f54;
    --dark-color: #535b61;
    --white-color: #fff;
}

ul{
    list-style-type: none;
}
ul li{
    margin: 2px 0;
}

/* text colors */
.text-dark{
    color: var(--dark-color);
}
.text-blue{
    color: var(--blue-color);
}
.text-end{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-start{
    text-align: left;
}
.text-bold{
    font-weight: 700;
}
/* hr line */
.hr{
    height: 1px;
    background-color: rgba(0, 0, 0, 0.1);
}
/* border-bottom */
.border-bottom{
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

body{
    font-family: 'Poppins', sans-serif;
    color: var(--dark-color);
    font-size: 14px;
}
.invoice-wrapper{
    min-height: 100vh;
    background-color: rgba(0, 0, 0, 0.1);
    padding-top: 20px;
    padding-bottom: 20px;
}
.invoice{
    max-width: 850px;
    margin-right: auto;
    margin-left: auto;
    background-color: var(--white-color);
    padding: 70px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    min-height: 920px;
}
.invoice-head-top-left img{
    width: 130px;
}
.invoice-head-top-right h3{
    font-weight: 500;
    font-size: 27px;
    color: var(--blue-color);
}
.invoice-head-middle, .invoice-head-bottom{
    padding: 16px 0;
}
.invoice-body{
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    overflow: hidden;
}
.invoice-body table{
    border-collapse: collapse;
    border-radius: 4px;
    width: 100%;
}
.invoice-body table td, .invoice-body table th{
    padding: 12px;
}
.invoice-body table tr{
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.invoice-body table thead{
    background-color: rgba(0, 0, 0, 0.02);
}
.invoice-body-info-item{
    display: grid;
    grid-template-columns: 80% 20%;
}
.invoice-body-info-item .info-item-td{
    padding: 12px;
    background-color: rgba(0, 0, 0, 0.02);
}
.invoice-foot{
    padding: 30px 0;
}
.invoice-foot p{
    font-size: 12px;
}
.invoice-btns{
    margin-top: 20px;
    display: flex;
    justify-content: center;
}
.invoice-btn{
    padding: 3px 9px;
    color: var(--dark-color);
    font-family: inherit;
    border: 1px solid rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    padding-bottom: 10px;
}

@media screen and (max-width: 992px){
    .invoice{
        padding: 40px;
    }
}

@media screen and (max-width: 576px){
    .invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
        grid-template-columns: repeat(1, 1fr);
    }
    .invoice-head-bottom-right{
        margin-top: 12px;
        margin-bottom: 12px;
    }
    .invoice *{
        text-align: left;
    }
    .invoice{
        padding: 28px;
    }
}

.overflow-view{
    overflow-x: scroll;
}
.invoice-body{
    min-width: 600px;
}

@media print{
    .print-area{
        visibility: visible;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
    }

    .overflow-view{
        overflow-x: hidden;
    }

    .invoice-btns{
        display: none;
    }
}

</style>
  
<div class = "invoice-wrapper" id = "print-area">
            <div class = "invoice">
                <div class = "invoice-container">
                    <div class = "invoice-head">
                        <div class = "invoice-head-top">
                            <div class = "invoice-head-top-left text-start">
                           <h1><i class="fas fa-school"></i> SMS</h1>  
                            </div>
                            <div class = "invoice-head-top-right text-end">
                                <h3>Invoice</h3>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-middle">
                            <div class = "invoice-head-middle-left text-start">
                                <p><span class = "text-bold">Date</span>: 23/6/2024</p>
                            </div>
                            <div class = "invoice-head-middle-right text-end">
                                <p><spanf class = "text-bold">Invoice No:</span>16789</p>
                            </div>
                        </div>
                        <div class = "hr"></div>
                        <div class = "invoice-head-bottom">
                            <div class = "invoice-head-bottom-left">
                               
                                <ul>
                                <h4>   <li class = 'text-bold'>Invoiced To:</li></h4> 
                                  <h3> <li>Ali Adel</li></h3> 
                                  <h5> <li>aliadel@std.com</li></h5> 
                                  
                                </ul>
                            </div>
                            <div class = "invoice-head-bottom-right">
                                <ul class = "text-end">
                                <h4>  <li class = 'text-bold'>Pay To:</li></h4> 
                                <h3><li>SMS</li></h3>  
                                <h5><li>SMS@edu.eg</li></h5>    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "overflow-view">
                        <div class = "invoice-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td class = "text-bold">Service</td>
                                        <td class = "text-bold">Description</td>
                                        <td class = "text-bold">Amount</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>School fees</td>
                                        <td>Monthly installment</td>
                                        <td class = "text-end">$500.00</td>
                                    </tr>
                                
                                </tbody>
                            </table>
                          
                                <div class = "invoice-body-info-item border-bottom">
                                    <div class = "info-item-td text-end text-bold">Tax:</div>
                                    <div class = "info-item-td text-end">$1.00</div>
                                </div>
                                <div class = "invoice-body-info-item">
                                    <div class = "info-item-td text-end text-bold">Total:</div>
                                    <div class = "info-item-td text-end">$500.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "invoice-foot text-center">
                        <p><span class = "text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and does not require physical signature.</p>

                        <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary w-md">Send</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

      
<?php


} else {

?>



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

            <?php if ($success_msg) { ?>
                <div class="alert alert-success" role="alert">
                    Payment has been completed, Thank You!
                </div>
            <?php } ?>

            <?php
            $usermeta = get_user_metadata($std_id);

            $class = get_post(['id' => $usermeta['class']]);
            ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Detail</h3>
                </div>
                <div class="card-body">
                    <strong>Name: </strong> <?php echo get_users(array('id' => $std_id))[0]->name ?> <br>
                    <strong>Class:  </strong> <?php echo $class->title ?>

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

                            $sql = "SELECT m.meta_value as `month` FROM `posts` as p JOIN `metadata` as m ON p.id = m.item_id WHERE p.type = 'payment' AND p.author = $user_id AND m.meta_key = 'month' AND year(p.publish_date) = 2024";

                            $query = mysqli_query($db_conn, $sql);
                            $paid_fees = [];
                            while ($row = mysqli_fetch_object($query)) {

                                $paid_fees[] = strtolower($row->month);
                            }
                            //  echo '<pre>';

                            //                    print_r($paid_fees);
                            //                    echo '</pre>'; 
                            $months = array('january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                            foreach ($months as $key => $value) {
                                $highlight = '';

                                $paid = false;
                                if (in_array($value, $paid_fees)) {
                                    $paid = true;
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
                                    <td <?php echo $highlight ?>>
                                        <?php

                                        echo ($paid) ? "Paid" : "Pending";

                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($paid) { ?>
                                            <a href="?action=view-invoice&month=<?php echo $value ?>&std_id=<?php echo $std_id ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> View</a>
                                        <?php } else { ?>
                                            <a href="#" data-toggle="modal" data-month="<?php echo ucwords($value) ?>" data-target="#paynow-popup" class="btn btn-sm btn-warning paynow-btn"><i class="fa fa-money-check-alt fa-fw"></i> Pay Now</a>
                                        <?php } ?>


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
                        <input type="hidden" name="amount" readonly="readonly" value="500" />
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
                                    <label for="">Months</label>
                                    <input type="text" name="month" readonly class="form-control" id="month" value="<?php echo $student->name ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <h3><i class="fas fa-dollar-sign"></i> 500.00</h3>
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

            jQuery('#month').val(month)
        })
    </script>

<?php
}
include('footer.php') ?>