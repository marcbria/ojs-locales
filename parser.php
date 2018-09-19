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
    <file source-language="en" target-language="en" datatype="plaintext" original="file.ext">
        <body>
            <trans-unit id="title_post_list">
                <source>title.post_list</source>
                <target>Post List</target>
            </trans-unit>
        </body>
    </file>
</xliff>
 */

/* Usage: php parser.php path/file.xml */

$xml=simplexml_load_file("$argv[1]") or die("Error: Cannot create object");

$trans="<?xml version=\"1.0\"?>\n";
$trans.="<xliff version=\"1.2\" xmlns=\"urn:oasis:names:tc:xliff:document:1.2\">\n";
$trans.="<file source-language=\"en\" target-language=\"en\" datatype=\"plaintext\" original=\"admin.xml\">\n";
$trans.="  <body>\n";

foreach($xml->children() as $message) {
	$trans.="    <trans-unit id=\"".$message['key']."\">\n";
	$trans.="      <source>".$message."</source>\n";
//	$trans.="      <target>".$message."</target>\n";
	$trans.="    </trans-unit>\n";
}

$trans.="  </body>\n";
$trans.="</file>\n";
$trans.="</xliff>\n";

print_r($trans);
?> 
