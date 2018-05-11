#!/bin/bash

searchVal=$1 

pipe=$(curl "https://api.discogs.com/database/search?q=${searchVal}&token=kfxuDYDlKQHgThMykjaEwfMIdcOExpyWqLeAzuMB" | sed 's/\,/\n/g' | grep -w "pages" | cut -c11- | tr -d '}')

destdir=/var/www/html/tempData.txt

if [ -f "$destdir" ]
then 
	echo "$pipe" > "$destdir"

fi



