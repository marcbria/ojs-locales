# ojs-locales

It parser outputs a XLIFF version of a ojs native XML file.

Run as:
$ php parser.php path/to/destination/file.xml

A bash helper is included to run the parser against every file in a folder
and save the results with xlf extension.

The bash need to be called as:
$ ./convertFolder.sh path/to/folder

Example:
$ ./convertFolder.sh en_US 
