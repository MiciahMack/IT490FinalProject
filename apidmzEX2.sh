#!/bin/bash

searchVal=$1

pipe=$(curl "https://api.discogs.com/database/search?q=${searchVal}&token=kfxuDYDlKQHgThMykjaEwfMIdcOExpyWqLeAzuMB" | sed 's/\,/\n/g' | grep -w "title" | sort --unique | cut -c11-) 


destdir=/var/www/html/tempData2.txt

if [ -f "$destdir" ]
then 
	echo "$pipe" > "$destdir"

fi
