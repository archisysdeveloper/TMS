<?php 
$ca_account = $this->account_model->get_account_cookie("admin");

$type = "";
if($data->leave_type == 1) {$type = "Medical";}
if($data->leave_type == 2) {$type = "Personal";}
if($data->leave_type == 3) {$type = "Family";}
if($data->leave_type == 4) {$type = "Festival";}
if($data->leave_type == 5) {$type = "Unknown";}

$status = "";
if($data->leave_status == 1) {$status = "Requested";}
if($data->leave_status == 2) {$status = "Approved";}
if($data->leave_status == 3) {$status = "Rejected";}
if($data->leave_status == 4) {$status = "UnApproved - Penalised";}

?>

<strong>Name </strong> : <?php echo $data->account_username;?> <br/>
<strong>Type</strong> : <?php echo $type;?> <br/>
<strong>Description</strong> : <?php echo $data->leave_reason;?> <br/>
<strong>leave_date </strong> : <?php echo $data->leave_date;?> <br/>
<strong>leave_reqdate </strong> : <?php echo $data->leave_reqdate;?> <br/>
<strong>leave_duration </strong> : <?php echo $data->leave_duration;?> <br/> <br/>

<h2><strong>Status</strong> : <?php echo $status;?></h2>
<br/>

<strong>Edited By </strong> : <?php echo $ca_account['username'];?> <br/>
<strong>Edited By </strong> : <?php echo date("Y-m-d H:i:s");?> <br/>

