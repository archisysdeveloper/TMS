<div class="wrapper">
 <!-- Pickers -->
        <form class="form" method="post">
            <div class="widget">
                <div class="title"><h6>Daily Report</h6></div>
                
                
                <div class="formRow">
                    <div class="formLeft">
                            <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck" id="checkAll">
              <thead>
                  <tr>
                      <td>Date</td>
                      <td>Milestone</td>
					  <td>in/out</td>
                      <td>Detail</td>
                      <td>Hrs</td>                      
                  </tr>
              </thead>
              <tbody>
              <?php 
              foreach($data as $d)
                    { ?>
                    <tr>
                        <td><?php echo $d->inout_date; ?></td>
						<td><?php echo $d->in_time; ?> / <?php echo $d->out_time; ?></td>
                        <td><?php echo $d->milestone_id; ?></td>
                        <td><?php echo $d->note; ?></td>
                        <td><?php echo $d->total_hr/60; ?></td>                        
                    </tr>                        
                   <?php }
              ?>
                  <tr>
                  </tr>
                
              </tbody>
          </table>
          
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <div class="formRight">
                        <a href="javascript:history.back()" class="button redB">Back</a>
                    </div>
                    <div class="clear"></div>
                </div>
                
            </div>
        </form>
    </div>     
    </div> 
