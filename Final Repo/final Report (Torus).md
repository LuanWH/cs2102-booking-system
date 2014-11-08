

####Objectives
---
In this project, we aim to design a online movie tickets booking application to facilitate convenient searching and booking for users.
User will be allowed to search catalogue of movie based on the **movie title**,**movies attributes**(such as actors, director and movie descriptions),**time slots**,**cinema name**,**cinema location**, and **ticket price range**. In addition,after logging in, users are able to book movie tickets, and modify or cancel their booking afterwards. 
<br><br><br>


####Implementation
---
The structure of our web application can be categorised into two major part including front end components and back end components. 
The frond ends, basically user interface, is responsible for directly interacting with users including taking in issued commands and displaying feedback results.
The back ends, which is hidden from users' aspects, processes issued command passed by UI and returns feedback.

#####Components
***
###### User Interface
In order to construct an effective user interface for our web applications, we have applied a right mix of a variety of web development languages, tools and platforms including *HTML*, *CSS*, *Javascript* and *AJAX*. We aim to implement a well-thought-out interaction design that reflects the perspective of our users and curtail to their needs.

###### Web Server
We use the SoC sub-zone to host our website. The interaction medium between the user interface and the server with our database is PHP language which will query or manipulate the database according to input from the user interface using `POST` method. With the information from users and the database, our PHP scripts will generate HTML codes that will later serve as part of the user interface.

###### Database 
We stay with Oracle SQL which is discussed in the module lectures. We try to apply the knowledge we learnt from the course to this website project and it is also good for us to reflect on what we have learnt with this hands-on practice.

#####Database Schema


#####Functionalities & SQL implementation
***

#####Browsing

- **Display Movie list**

	Users are able to view all the movies by simply click the All Movie button in the navi bar, the page will display the whole list of movies:
	<br><br><br>
	<img src="bMovie.png"  style="width: 800px;"/>
	<br><br>

		SELECT DISTINCT name FROM MOVIE;


#####Searching

---
- **Search for Movie**

- **Search for Booked Ticket**

	User can search for their booked ticket by simply enter their unique user ID.
	<br><br><br>
	<img src="sT0.png"  style="width: 800px;"/>
	<br><br>
	
	
	- When user click submit button with input field blank:
		 
	
	<br><br><br>
	<img src="sT1.png"  style="width: 800px;"/>
	<br><br>
	
	- When the issued User ID has no corresponding entry in ticket database situation, the page will prompt: 
		
	<br><br><br>
	<img src="sT2.png"  style="width: 800px;"/>
	<br><br>
		
	- For successful search, the result will be displayed as:
	<br><br><br>
	<img src="sT3.png"  style="width: 800px;"/>
	<br><br>

	To facilitate this search,we have implemented the SQL query code as follows:
		
		
		
		SELECT
		T.SUBSCRIBERID,S.USERNAME,
		O.MOVIETITLE,Cn.NAME,
		Cn.LOCATION,H.HALLID,
		T.STARTTIME,T.ENDTIME	
		FROM
		Ticket T, Occupy O, Subscriber S,
		Cinema Cn,Hall H
		WHERE 
		(T.STARTTIME = O.STARTTIME AND T.ENDTIME = 
		O.ENDTIME AND T.HALLID = O.HALLID)
		AND (H.NAMEOFCINEMA  = 
		Cn.NAME AND H.LOCATIONOFCINEMA = Cn.LOCATION)
		AND T.SUBSCRIBERID = S.SUBSCRIBERID
		AND S.SUBSCRIBERID = $USER_ID;

	
		

#####Booking


- **Book Ticket**


#####Screenshots
***


