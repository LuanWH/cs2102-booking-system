# query = open('query.sql', 'w')
# for hall in range(0, 6):
# 	for day in range(1, 30):
# 		for sTimeHour in range(0, 23):
# 			eTimeHour= sTimeHour+1
# 			query.write("INSERT INTO TIMESLOT(STARTTIME, ENDTIME, HALLID) VALUES(TO_DATE(\'2014-11-"+str(day)+" "+str(sTimeHour)+":00:00\', \'YYYY-MM-DD HH24:Mi:SS\'), TO_DATE(\'2014-11-" +str(day)+ " "+str(eTimeHour)+":00:00\', \'YYYY-MM-DD HH24:Mi:SS\'), "+str(hall)+");\n")
# query.close()
import random
title = ["Gone Girl",
		"Blue Mountain",
		"Hello World",
		"Bye and Hi",
		"King Kong",
		"Farewell",
		"Fighter",
		"I love U",
		"007",
		"Blue Dream"]
query = open('query2.sql', 'w')
for hall in range(0, 6):
	for day in range(1, 30):
		for sTimeHour in range(0, 23):
			eTimeHour= sTimeHour+1
			price = random.randint(1,99)
			mType = "IMAX" if price <= 50 else "3D"
			mTitle = title[price/10]
			year = "2014";
			query.write("INSERT INTO OCCUPY(PRICE, MOVIETYPE, MOVIETITLE, MOVIEYEAR, STARTTIME, ENDTIME, HALLID) VALUES("+str(price)+",\'"+mType+"\',\'"+mTitle+"\',"+year+",TO_DATE(\'2014-11-"+str(day)+" "+str(sTimeHour)+":00:00\', \'YYYY-MM-DD HH24:Mi:SS\'), TO_DATE(\'2014-11-" +str(day)+ " "+str(eTimeHour)+":00:00\', \'YYYY-MM-DD HH24:Mi:SS\'), "+str(hall)+");\n")
query.close()			