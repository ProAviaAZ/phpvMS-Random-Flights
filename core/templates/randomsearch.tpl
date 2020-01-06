<?php
/*
* phpVMS Module: Random Itinerary Builder
* Coding by Jeffrey Kobus
* www.fs-products.net
* Verion 1.3
* Dated: 03/22/2011
*/

$pilotid = Auth::$userinfo->pilotid;
$last_location = PIREPData::getLastReports($pilotid, 1);
if(!$last_location) $last_location->arricao = Auth::$userinfo->hub;
$last_name = OperationsData::getAirportInfo($last_location->arricao);
$equipment = OperationsData::GetAllAircraftSearchList(true);
$airlines = OperationsData::getAllAirlines(true);
?>

<table border = "0">
  <tr>
	<th scope="col">Random Itinerary from Current Location</th>
  </tr>
  <tr><form name="randomflights" id="randomflights" action="<?php echo SITE_URL?>/index.php/randomflights/getRandomFlights" method="post">
    <td>Current Location Preselected </td>
      <table>
        <tr>
			<td width ="25%"><b>Current Location:</b></td>
			<td width ="75%"><select id="depicao" name="depicao">
				<option value="<?php echo $last_location->arricao?>"><?php echo $last_location->arricao?> (<?php echo $last_name->name?>)</option>
			</td>		
		</tr>
		<tr>
			<td width ="25%"><b>Airline:</b></td>
            <td width ="75%"><select id="airline" name="airline">               
	            <option value="">Select Airline</option>
            <?php
                if(!$airlines) $airlines = array();
                foreach($airlines as $airline)
                {
                        echo '<option value="'.$airline->code.'">'.$airline->name.'</option>';
                }
            ?>
            </td>
        </tr>
		<tr>
			<td width ="25%"><b>Aircraft:</b></td>
            <td width ="75%"><select id="equipment" name="equipment">               
	            <option value="">Select Equipment</option>
            <?php
                if(!$equipment) $equipment = array();
                foreach($equipment as $equip)
                {
                        echo '<option value="'.$equip->icao.'">'.$equip->name.'</option>';
                }
            ?>
            </td>
        </tr>
		<tr>
			<td width ="25%"><b>Number of Flights:</b></td>
			<td width ="75%"><select id="count" name="count">			  
			  <option value="5">5</option>
			  <option value="10">10</option>
			  <option value="15">15</option>			  		
			</select></td>
			<td><input type="submit" name="submit" value="Find Random Flights"></td>
		</tr>
	  </table>	  	
    </form>
  </tr>
</table>
