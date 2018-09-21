<?php

/* XML SOURCE SAMPLE:
<locale name="en_US" full_name="U.S. English">
	<message key="admin.hostedJournals">Hosted Journals</message>
	<message key="admin.settings.journalRedirect">Journal redirect</message>
	<message key="admin.settings.options">Options</message>
 */

/* XLIFF SAMPLE:
<?xml version="1.0"?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
    <file source-language="en" target-language="es" datatype="plaintext" original="file.ext">
        <body>
            <trans-unit id="title_post_list">
                <source>Post List</source>
                <target>Lista de posts</target>
            </trans-unit>
        </body>
    </file>
</xliff>
 */

/* <?xml version="1.0" encoding="UTF-8"?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
  <file original="SoyMsgBundle" datatype="x-soy-msg-bundle" xml:space="preserve" source-language="en" target-language="x-zz">
    <body>
      <trans-unit id="135956960462609535" datatype="html">
        <source>The set of <x id="SET_NAME"/> is {<x id="XXX"/>, ...}.</source>
        <target>Zthe zset zof <x id="SET_NAME"/> zis {<x id="XXX"/>, ...}.</target>
        <note priority="1" from="description">Example: The set of prime numbers is {2, 3, 5, 7, 11, 13, ...}.</note>
      </trans-unit>
    </body>
  </file>
</xliff>
*/



/* Usage: php parser.php path/file.xml */

$file=$argv[1];
$lang=$argv[2];

$xml=simplexml_load_file("$file") or die("Error: Unable to parse the xml. Cannot create object");

$trans = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<xliff version="1.2" xmlns="urn:oasis:names:tc:xliff:document:1.2">
  <file original="$file" datatype="xml" xml:space="preserve" source-language="$lang" target-language="$lang">
    <body>

EOT;

foreach($xml->children() as $message) {
	$trans.="    <trans-unit id=\"".$message['key']."\">\n";
	$trans.="      <source>".$message."</source>\n";
	$trans.="      <target>".$message."</target>\n";
	$trans.="    </trans-unit>\n";
}

$trans.="  </body>\n";
$trans.="</file>\n";
$trans.="</xliff>\n";

print_r($trans);
?> 
