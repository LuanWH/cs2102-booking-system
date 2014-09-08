/* Cinema */
        CREATE TABLE cinema (
name VARCHAR(128),
location VARCHAR(128),
PRIMARY KEY(name, location)
);


/* Hall */
        CREATE TABLE hall (
                hallid INTEGER PRIMARY KEY,
                totalseats INTEGER DEFAULT 100,
                nameofcinema VARCHAR(128) NOT NULL ,
                locationofcinema VARCHAR(128) NOT NULL,
                CONSTRAINT fk_cinema
                        FOREIGN KEY(nameofcinema, locationofcinema) REFERENCES 
                        cinema(name, location) ON DELETE CASCADE
        );




/* Timeslot */
        CREATE TABLE timeslot(
                starttime DATE,
                endtime DATE,
                hallid INTEGER,
                PRIMARY KEY(hallid,starttime,endtime),
                CONSTRAINT fk_hall
FOREIGN KEY(hallid) REFERENCES hall(hallid) ON DELETE CASCADE
        );


/* Occupy*/
        CREATE TABLE occupy(
                price NUMERIC,
                movietype VARCHAR(64),
                movietitle VARCHAR(128),
                movieyear INTEGER,
                starttime DATE,
                endtime  DATE,
                hallid INTEGER,
                PRIMARY KEY(movietitle, movieyear, starttime, endtime, hallid),
                CONSTRAINT fk_movie
                FOREIGN KEY(movietitle, movieyear) REFERENCES movie(title,year),
	CONSTRAINT fk_timeslot
		FOREIGN KEY(hallid,starttime,endtime) REFERENCES timeslot(hallid,starttime, endtime) ON DELETE CASCADE
        );


/* Movie*/
        CREATE TABLE movie(
                title VARCHAR(128),
                year INTEGER,
                actors VARCHAR(256),
                director VARCHAR(64),
                description VARCHAR(512),
                producer VARCHAR(128),
                PRIMARY KEY (title, year)
    );


/* User*/
CREATE TABLE subscriber(
	subscriberid CHAR(16) PRIMARY KEY,        
	username VARCHAR(32),
	usertype VARCHAR(32), 
	CONSTRAINT fk_subscriber
		CHECK (usertype = 'STUDENT' OR usertype ='NORMAL' OR usertype = 'VIP' OR usertype= 'SENIOR')        
  );


/* Ticket*/
        CREATE TABLE ticket(
                subscriberid CHAR(16) REFERENCES subscriber(subscriberid),
                starttime DATE,
                endtime  DATE,
                hallid INTEGER,
                PRIMARY KEY(subscriberid, starttime, endtime, hallid),
                CONSTRAINT fk_timeslots
		FOREIGN KEY(starttime, endtime, hallid) REFERENCES timeslot(starttime,endtime, hallid)
);        