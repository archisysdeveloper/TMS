<?php 

$worked = 0;
$planned = 0;
$extra = 0;

$nonJira = 0;
foreach($data as $d)
{    

    if($d->mid != null) {

        $worked = $worked + $d->hrs;     

        if($d->jira_worklog_id == null)
        {
            $nonJira = $nonJira + $d->hrs;
        }   
        
        else if($d->jira_estimated > $d->jira_spent && $d->jira_estimated > 0)
        {
            $planned = $planned + $d->hrs;
        }
        else if($d->jira_estimated <= $d->jira_spent )
        {
            $extra = $extra + $d->hrs;
        }
        
       
    }
    
}
?>

<div class="wrapper">
    <br/>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable">    
        <thead>
            <tr>
                <td class="sortCol"><div>Total Hours<span></span></div></td>                                        
                <td class="sortCol"><div>In Progress<span></span></div></td>
                <td class="sortCol"><div>Completion<span></span></div></td>
                <td class="sortCol"><div>Non Jira<span></span></div></td>
            </tr>
        </thead>

        <tbody>
            <tr style="font-weight: bold">
                <td style="background-color: lightgrey "><?php echo round($worked/60,2);?></td>
                <td style="background-color: lightgreen "><?php echo round($planned/60,2);?></td>
                <td style="background-color: lightblue "><?php echo round($extra/60,2);?></td>                
                <td style="background-color: lightyellow "><?php echo round($nonJira/60,2);?></td>
            </tr>
        </tbody>
    </table>
<br/>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable">
                <thead>
                    <tr>
						<td class="sortCol"><div>Purpose<span></span></div></td>						
                        <td class="sortCol"><div>Hrs<span></span></div></td>                        
                        <td class="sortCol"><div>Estimates<span></span></div></td>
                        <td class="sortCol"><div>Note<span></span></div></td>
                    </tr>
                </thead>
                <tbody>
                
<?php 

foreach($data as $d)
{ ?>
<tr style="<?php 

        if(!$d->jira_worklog_id > 0 && $d->milestone_id > 0) 
            { 
                echo "background-color: lightyellow"; 
            }
        else if($d->mid == null) 
        {
            echo ""; 
        }
        else if($d->jira_estimated > $d->jira_spent)
        {
            echo "background-color: lightgreen"; 
        }
        else if($d->jira_estimated <= $d->jira_spent)
        {
            echo "background-color: lightblue"; 
        }
        
?>" >
	<td><?php echo $d->project_name." - ".$d->milestone_name;?></td>
    <td><?php echo round($d->hrs/60,2);?> [<?php echo $d->hrs;?>] </td>    
    <td style="<?php if($d->jira_estimated == $d->jira_spent && $d->jira_worklog_id > 0)
        {
            echo "background-color: lightpink"; 
        }
        ?>" >
        <?php if ($d->jira_worklog_id > 0) {?>
            <?php echo round($d->jira_estimated / 60,2);?> / <?php echo round($d->jira_spent/60,2);?> 
        <?php } ?>
    </td>    

    <td>
        <?php 
            $url = "#";
            if($d->jira_worklog_id > 0) { $url = "http://jira.archisys.co/browse/".$d->jira_ticket_id."?focusedWorklogId=".$d->jira_worklog_id; }?>                     
         <a href="<?php echo $url; ?>" target="_blank">
            <?php echo $d->note;?>
        </a>
    </td>
</tr>
 
    
<?php }

?>
    </tbody>
            </table>
        </div>
</div>