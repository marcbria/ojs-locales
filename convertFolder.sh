#/bin/bash

for file in $1/*
do
  echo "php parser.php \"$file\" >> $file.xlf \n"
  php parser.php "$file" >> $file.xlf
done
