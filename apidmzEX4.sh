#!/bin/bash

username=root
password=it490password

myvariable=$(mysql mydatabase -u $username -p $password -se "SELECT * FROM Playlists")
destdir=/var/www/html/playlist1.txt

echo "$myvariable"
echo "$destdir"

if [ -f $destdir  ]
then

echo "$myvariable" > "$destdir"

fi
