import json
import datetime
import random
import requests

format="%Y-%m-%d"
begin = "2016-03-10"
begintime = datetime.datetime.strptime(begin,format)
data=[]
print begintime
oneday=datetime.timedelta(days=1)
day = begintime
for i in range(0,10):
    day = day + oneday
    dayStr = str(day)[0:10]
    distance = random.uniform(0, 16)
    distance = round(distance,2)
    if distance>12.3:
        distance = 0
    if distance == 0:
        time = 0
    else:
        thr = random.uniform(-1,1.1)
        time = int(distance*16+thr*36)
    sport={"day": dayStr, "distance": distance, "time": time}
    data.append(sport)
transdata={"userid":"13812341234","password":"123456","data":data}
jsondata = json.dumps(transdata)
print jsondata
headers = {'content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
r=requests.post(url="http://localhost/src/php/sportdata.php",headers = headers,data=jsondata)
print r.text