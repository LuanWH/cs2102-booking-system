cs2102-booking-system
=====================

CS2102 Term Project "Online Booking System". 

Project Team
-----------
Team 32
* Lu Yuehan
* Hu Wenyan
* Luan Wenhao

Project Deliverables
-----------
1. Two brief reports (2%+4%).
  * The first report is due at the end of Week 6 and should contain the ER diagram for the application and the relational schema (in SQL DDL code).
  * The second report is due at the end of Week 12 and should contain implementation details of the application (indication of the user interface, the web server, server page language and database management system used, whether you use the zone or else); sample and representative SQL code of the functions it helps to implement; 5 representative screen dumps of the Web interface.
All reports must include team members’ names and matric numbers on the front page.
2. A demonstration of your system (9%). The system should include, but is not limited to, the following features:
  * User browsing and searching of items. Items can be searched using multiple attributes.
  * Functions to rank and group items based on multiple attributes if there is more than one item satisfying the search condition (e.g., hotel results can be ranked and grouped by their star rating).
  * User can create, delete, and modify his/her own booking when allowed, while administrators can create, delete and modify all the bookings.
  * Error messages shown to users whenever data constraints are violated. For examples, when creating a booking, the date must be valid (e.g., the departure date should be later than the arrival date, the departure date cannot be later than the actual date). When modifying a booking, make sure there is no conflict; otherwise, the modification cannot be processed.
