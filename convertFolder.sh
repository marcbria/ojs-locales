#/bin/bash

echo "Syntax:  ./convertFolder folderName languageCode"
echo "Example: ./convertFolder en_US en"

for file in $1/*
do
  if [ ${file: -4} == ".xml" ]
  then
    echo "Parsing: $file"
    php parser.php "$file" "$2" >> $file.xlf
  else
    echo "Ignoring: $file is not a OJS-XML"
  fi
done
