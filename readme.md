Code for Watatrip - A startup idea I was working on as CTO for some time. The project is in cold at this moment.

During the course of the project:
	1. We needed a data dump of real-time fares across different air routes in India. Obtaining such a service otherwise costs Rs. 80,000 which we definitely didn't have. I then wrote a parser which automates requests to MakeMyTrip's server and dumps the fare data (including name of the airline, flight number, along with other information) for every day in the coming month.
	flight_dump_data.py

	2. We also needed a data dump for Indian Railways seat availability data for the above routes for one month as a proof of concept for our hypothesis. We got an API key for Rs. 500 and automated the request to hit the server 10,000's of times. :D
	process_json.py