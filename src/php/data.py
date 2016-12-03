import json
import datetime
import random
import requests

def getdata(userid,password):
    format="%Y-%m-%d"
    begin = "2016-07-10"
    begintime = datetime.datetime.strptime(begin,format)
    end = "2016-12-04"
    endtime = datetime.datetime.strptime(end,format)
    data=[]
    oneday=datetime.timedelta(days=1)
    day = begintime
    while day != endtime:
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
    transdata={"userid":userid,"password":password,"data":data}
    jsondata = json.dumps(transdata)
    return jsondata
for i in range(0,14):
    userid = str(13111111111+i)
    password = "123456"
    jsondata = getdata(userid,password)
    headers = {'content-type': 'application/x-www-form-urlencoded; charset=UTF-8'}
    r=requests.post(url="http://localhost/src/php/sportdata.php",headers = headers,data=jsondata)
    print r.text
