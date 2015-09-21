#to='-12-2015'
#for i in range(1,31):
#	if(i<10):
#		print '0'+str(i)+to
#	else:	
#		print str(i)+to
import wget
url="http://flights.makemytrip.com/makemytrip/search/O/O/E/1/0/0/S/V0/IXR_DEL_31-03-2015"
files = wget.download(url,out="myFile.txt")

#filename = wget.download(url)
