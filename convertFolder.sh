#/bin/bash

for file in $1/*
do
  echo "php parser.php \"$file\" >> $file.xlf \n"
  php parser.php "$file" >> $file.xlf
done

// find /some/directory -maxdepth 1 -type f -exec cmd option {} \; > results.out
