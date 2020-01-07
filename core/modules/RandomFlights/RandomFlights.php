<?php
/*
* phpVMS Module: Random Itinerary Builder
* Coding by Jeffrey Kobus
* www.fs-products.net
* Version 1.4
* Dated: 06/01/2020
*/


class RandomFlights extends CodonModule
{
	public function index()
	{
		$this->show('RandomFlights/randomsearch');
	}

	public function getRandomFlights()
	{
		$dep 		= $this->post->depicao;
		$equip 		= $this->post->equipment;
		$code	 	= $this->post->airline;
		$count 		= $this->post->count;

		for($i = 0; $i < $count; $i++)
		{
			$params = array(
				's.depicao' => $dep,
				's.enabled' => 1
			);

			if($equip != "") $params['a.icao'] = $equip;
			if($code != "") $params['code'] = $code;

			$flights = SchedulesData::findSchedules($params);
			if($flights)
			{
				foreach ($flights as $row)
				{
					$r = rand(0, count($flights));
					$airline = OperationsData::getAirlineByCode($flights[$r]->code);
					if($airline->enabled == 0) continue;
					if ($flights[$r]->aircraftlevel > Auth::$userinfo->ranklevel)
					{
						continue;
					}
					else
					{
						$schedules[$i] = $flights[$r];
						$dep = $flights[$r]->arricao;
						break;
					}
				}
			}

		}

		$this->set('schedules', $schedules);
		$this->set('count', $count);
		$this->show('RandomFlights/randomflights');
	}

	public function bidAll()
	{
		$count = $this->post->count;

		for ($i = 0; $i < $count; $i++)
		{
			$ret = SchedulesData::addBid($this->post->pilotid, $this->post->schedules[$i]);
			$flight = SchedulesData::getSchedule($this->post->schedules[$i]);
			if($ret) echo 'Flight - '.$flight->code.$flight->flightnum.' added <br/>';
		}
		echo 'Finished';
	}
}
?>
