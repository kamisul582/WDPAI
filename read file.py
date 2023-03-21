import os
import string
print(os.getcwd())
f = open("gps_track1.txt")
a =f.read()
b = a.replace("},{","}\n{")
s = open("gps_track_modified.txt","a")
s.write(b)
s.close()
#print(b)