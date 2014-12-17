import re
import urllib


def makePage():
  file = open("/Users/Lancasters/Desktop/superweb.html", "wt")
  file.write("""<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 
  Transition//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
  <html>
  <head><title>I made this page with Python!</title>
  </head>
  <body>""")


  f = open(filename,'r')
  words_dict={}
  for i in f.read().split():
    word=i.lower()
    words_dict[word]= words_dict.get(word,0) + 1
    for key in words_dict.keys():
      print str(key)+' = '+str(words_dict[key])
  
  file.write("""</body> for word in dictionary:
      item = '<p style="33FFFF; font-size:50px + wordcount + ';>' + word + '</p>'
  </html>""")
 
   

  file.write("%s" % item)
