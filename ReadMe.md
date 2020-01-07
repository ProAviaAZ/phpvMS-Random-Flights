# Random Flights
This module will build a random itinerary of 5,10 or 15 flights in length. Starting from the pilots current location and linking each flight from the arrival airport.

--------------------
NOTICE: This module was originally made by Jeffrey Kobus (www.fs-products.net), it has been updated for phpVMS 5.5.x by Web541 (phpVMS Forums).
I do not own any code from this repository, and all code belongs to Jeffrey Kobus.

--------------------
Version
--------------------
Ver: 1.3 // 3/22/2011
Ver: 1.4 // 6/01/2020

----------------------
Installation
----------------------
Copy all files into the same folders as they are saved in.

    MODULE - core/modules/RandomFlights/RandomFlights.php

    TEMPLATES - core/templates/RandomFlights/randomsearch.php
    TEMPLATES - core/templates/RandomFlights/randomflights.php

To run:
<yoursite>/index.php/randomflights

Random Flights will randomize 5, 10 or 15 flights starting at the current pilot position.  On the display screen the itinerary can be bid on in whole by clicking the button.

----------------------
Options
----------------------
Obviously there are a lot of options that can be added.

Some that are already in.....
* Randomizer will skip over schedules with aircraft that are diabled
* Randomizer will skip over schedules with aircraft of a larger minrank then the user.
Both of these can be commented out  (core/modules/RandomFlights/RandomFlights.php)

----------------------
Updates
----------------------
    v1.4 - Updated for phpVMS 5.5.x
	v1.3 - Fixed Equipment + Addition of Airline selection
	v1.2 - Addition of equipment selection + Addition of hub select on pilots first flight.
