<?PHP
require_once("./include/FnFSite.php");

$FnFSite = new FnFSite();	

$FnFSite->SetWebsiteName('myfnf.com');

$FnFSite->InitDB(/*hostname*/'localhost',
                      /*username*/'MyFnF',
                      /*password*/'wit123',
                      /*database name*/'accounts',
                      /*table name*/'users');

?>