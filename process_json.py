import wget
import codecs
import os
import json
fi=codecs.open("../mum-del.csv","r",encoding='utf-8')
f=fi.read()
fi.close()
fi=codecs.open("../mum-deloutput.csv","w",encoding='utf-8')
f=f.split("\n")
import subprocess

for i in f:
	start=i.split(",")[0]
	end=i.split(",")[1]
	trainnumber=i.split(",")[2]
	date=i.split(",")[3]
	url="http://api.railwayapi.com/check_seat/train/"+str(trainnumber)+"/source/"+str(start)+"/dest/"+str(end)+"/date/"+str(date)+"/class/3A/quota/GN/apikey/44538/"
	print url
	#daata= os.system()	
	daata = subprocess.check_output("curl "+url, shell=True)
	#files = wget.download(url,out="dump/myFile.txt")
	#fa=codecs.open("dump/myFile.txt","r",encoding='utf-8')
	#daata=fa.read()
	#fa.close()
	print type(daata)#daata
	a=json.loads(daata)
	#os.remove("dump/myFile.txt")
	for j in range(6):
			
		fi.write(a['availability'][j]['date']+","+a['availability'][j]['status']+"\n")
	#print 


