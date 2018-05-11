#!/bin/bash

searchVal=$1

pipe=$(curl "https://api.discogs.com/database/search?q=${searchVal}&token=kfxuDYDlKQHgThMykjaEwfMIdcOExpyWqLeAzuMB" | sed 's/\,/\n/g' | grep -w "title\|label\|style\|year\|cover_image\|country" | tail -n +15)

destdir=/var/www/html/tempData2.txt

if [ -f "$destdir" ]
then

	echo "$pipe" > "$destdir"

fi
