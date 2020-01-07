<?php
/*
* phpVMS Module: Random Itinerary Builder
* Coding by Jeffrey Kobus
* www.fs-products.net
* Version 1.4
* Dated: 06/01/2020
*/
?>

<p><a href="<?php echo SITE_URL?>/index.php/RandomFlights">Start New Flight Search</a></p>

<table width="98%" border="0" cellspacing="0">
    <tr>
        <th align = "center" <strong>Airline</strong></th>
        <th align = "center" <strong>Flight #</strong></th>
        <th align = "center" <strong>Aircraft</strong></th>
        <th align = "center" <strong>Departure</strong></th>
        <th align = "center" <strong>Arrival</strong></th>
        <th align = "center" <strong>Duration</strong></th>
        <th align = "center" <strong>Price</strong></th>
    </tr>

    <?php
    $pilotid = Auth::PilotID();
    $user = PilotData::getPilotData($pilotid);

    if (!$schedules)
    {
    ?>
    <tr><td>No Routes Found!</td></tr>
    <?php
    } else {
        foreach($schedules as $result)
        {
            $info = OperationsData::getAircraftByReg($result->registration);
        ?>
        <tr>
            <td><?php echo $result->code;?></td>
            <td><?php echo $result->code.$result->flightnum;?></td>
            <td><?php echo $info->registration;?></td>
            <td><?php echo $result->depicao;?></td>
            <td><?php echo $result->arricao;?></td>
            <td><?php echo $result->flighttime;?></td>
            <td><?php echo $result->price;?></td>
        </tr>
        <?php } } ?>

    <form name="bidAll" id="bidAll" action="<?php echo SITE_URL?>/index.php/RandomFlights/bidAll" method="post">

        <?php
        for($i = 0; $i < count($schedules); $i++)
        {
            ?>
            <input type="hidden" name="schedules[<?php echo $i;?>]" value="<?php echo $schedules[$i]->id;?>">
            <?php
        }
        ?>
        <input type="hidden" name="count" value = "<?php echo count($schedules);?>">
        <input type="hidden" name="pilotid" value="<?php echo $pilotid;?>">
        <input type="submit" name="submit" value="Book Itinerary">
    </form>
</table>
