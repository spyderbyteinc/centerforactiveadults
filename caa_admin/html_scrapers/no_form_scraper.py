# Importing BeautifulSoup and 
# it is in the bs4 module
from bs4 import BeautifulSoup
  
with open("no_forms.html") as fp:
    soup = BeautifulSoup(fp, 'html.parser')

print(soup)
