
|---------------------------------------------------------------------------<br/>
| Task Details <br/>
| Task ID : <?php echo $data->cid; ?> <br/>
| -----------------------------------------------------------------------<br/>
| Date : <?php echo $data->cr_date; ?> <br/>
| User : <?php echo $team[$data->cr_user][0]; ?> <br/>
| -----------------------------------------------------------------------<br/><br/>
Description : <br/> <?php echo $data->description; ?> <br/><br/>
| -----------------------------------------------------------------------<br/>
| Priority :<b><?php echo $data->priority; ?></b> <br/>
| Type : <b><?php echo $data->state; ?> </b> <br/>
| -----------------------------------------------------------------------<br/>
| <b style="color: blue">Status : <?php echo $data->status; ?> </b> <br/>
| -----------------------------------------------------------------------<br/>
| <?php if($data->man_on > 0) {?> man_on : <?php echo $team[$data->man_on][0]; ?> <br/>
| ----------------------------------------------------------------------- <?php } ?><br/>
| APES System <br/>
|---------------------------------------------------------------------------