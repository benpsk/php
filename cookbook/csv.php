<?php

//$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
//    array('Northwest','2005-01-01','2005-02-01',546.33),
//    array('Southeast','2005-01-01','2005-02-01',93.26),
//    array('Southwest','2005-01-01','2005-02-01',945.21),
//    array('All Regions','--','--',1597.34) );
//$fh = fopen('php://output','w');
//foreach ($sales as $sales_line) {
//    if (fputcsv($fh, $sales_line) === false) {
//        die("Can't write CSV line");
//    }
//}
//fclose($fh);


//$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
//    array('Northwest','2005-01-01','2005-02-01',546.33),
//    array('Southeast','2005-01-01','2005-02-01',93.26),
//    array('Southwest','2005-01-01','2005-02-01',945.21),
//    array('All Regions','--','--',1597.34) );
//$filename = './sales.csv';
//$fh = fopen($filename,'w') or die("Can't open $filename");
//foreach ($sales as $sales_line) {
//    if (fputcsv($fh, $sales_line) === false) {
//        die("Can't write CSV line");
//    }
//}
//
//$ar = ['a', 'b'];
//
//fclose($fh) or die("Can't close $filename");


// get host name from URL
preg_match('@^(?:http://)?([^/]+)@i',
    "http://www.php.net/index.html", $matches);
$host = $matches[1];

var_dump($matches);

// get last two segments of host name
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo "domain name is: {$matches[0]}\n";
