
<div class="wrapper">
 <!-- Pickers -->
        <form class="form" method="post">
            <div class="widget">
                <div class="title"><h6>Daily Report</h6></div>
                <?php if(!isset($data)) {?>
                <div class="formRow">
                    <label>Start Date:</label>
                    <div class="formRight">
                        <input type="text" class="datepicker" name="startDt"/>
                    </div>
                    <div class="clear"></div>
                </div>
                
                 <div class="formRow">
                    <label>End Date:</label>
                    <div class="formRight">
                        <input type="text" class="datepicker" name="endDt"/>
                    </div>
                    <div class="clear"></div>
                </div>
                
                 <div class="formRow">
                    <div class="formRight">
                        <input type="submit" class="button redB" value="Show"/>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <?php }
                if(isset($data)) {?>
                <div class="formRow">
                    <div class="formLeft">
                            <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck" id="checkAll">
              <thead>
                  <tr>
                      <td></td>
                      <td>Name</td>
                      <td>Start Date</td>
                      <td>End Date</td>
                      <td>Default</td>
                      <td>Hours</td>
                      <td>U/L</td>
                      <td>Pay</td>
                  </tr>
              </thead>
              <tbody>
                <?php 
                 $total = 0;
                foreach($data as $d)
                {
                    $pe = 0;
                    if(isset($penelty[$d->account_id])) { 
                        $pe =  $penelty[$d->account_id] * $d->rate * 8.5;
                        }
                    ?>
                  <tr>
                      <td><input type="checkbox" id="titleCheck2" name="checkRow" /></td>
                      <td><a href="<?php echo site_url();?>hr/site-admin/hr/detail_rep/?stdt=<?php echo $startDt; ?>&enddt=<?php echo $endDt; ?>&account_id=<?php echo $d->account_id;?>">
                      <?php echo $d->team_name; ?></a></td>
                      <td><?php echo $startDt; ?></td>
                      <td><?php echo $endDt; ?></td>
                      <td><?php echo $d->team_hours.' @ '.$d->rate; ?></td>
                      <td><?php echo $d->hrs; ?></td>
                      <td><?php if( isset($penelty[$d->account_id]) ) { echo $penelty[$d->account_id].' @ 8.5 = '.round($pe,2); }?></td>
                      <td><?php echo ($d->pay - $pe); ?></td>
                  </tr>
                  <?php
                    $total = $total + ($d->pay - $pe);
                } ?>
                
                <tr>
                      <td></td> 
                      <td colspan="6">Total</td>                      
                      <td><?php echo $total; ?></td>
                  </tr>
                  
              </tbody>
          </table>
          
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <div class="formRight">
                        <a href="<?php echo site_url();?>/hr/site-admin/hr/month_rpt" class="button redB">Back</a>
                    </div>
                    <div class="clear"></div>
                </div>
                
          <?php } ?>
                
                
            </div>
        </form>
    </div>     
    </div> 
    