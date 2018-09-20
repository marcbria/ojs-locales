# OJS locale convert

This parser converts a native OJS locale XML file to XLIFF.

Run as:
$ php parser.php path/to/destination/file.xml

A bash helper is included to run the parser against every file in a folder
and save the results with xlf extension.

The bash needs to be called as:
$ ./convertFolder.sh path/to/folder

Example:
$ ./convertFolder.sh en_US 
