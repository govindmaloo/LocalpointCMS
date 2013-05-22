<?php 
/*

function system_time_zones($blank = NULL) {
  $zonelist = timezone_identifiers_list();
  $zones = $blank ? array('' => t('- None selected -')) : array();
  foreach ($zonelist as $zone) {
    // Because many time zones exist in PHP only for backward compatibility
    // reasons and should not be used, the list is filtered by a regular
    // expression.
    if (preg_match('!^((Africa|America|Antarctica|Arctic|Asia|Atlantic|Australia|Europe|Indian|Pacific)/|UTC$)!', $zone)) {
      date_default_timezone_set($zone);
	  $zones[$zone] = str_replace('_', ' ', $zone) . date('l, F j, Y - H:i  O');
    }
  }
  // Sort the translated time zones alphabetically.
  asort($zones);
  return $zones;
}

$timezone = system_time_zones();
print_r($timezone);


if($_REQUEST['loaddata']){
	$file = file_get_contents('http://data.meteomedia.de/details/DetailController.php?customer=homepagebox&code=5177&language=de');	
	print $file;
	exit();
}

if($_REQUEST['data']){
$file= $_REQUEST['data'];
$data = array('document.write', '+',"'","(",")");
$data =  str_replace($data,'',$file);
$pattern = '/<(link|style)(?=.+?(?:type="(text\/css)"|>))(?=.+?(?:media="(.*?)"|>))(?=.+?(?:href="(.*?)"|>))(?=.+?(?:rel="(.*?)"|>))[^>]+?\2[^>]+?(?:\/>|<\/style>)\s*\/is';
print $data = preg_replace($pattern,'',$data);
exit();
}
*/

//print $_SERVER['HTTP_HOST'];

/*

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://data.meteomedia.de:80/details/css/wetterbox.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script>
$.get('test.php?loaddata=ok', function(data0){ //alert(data0); 
											var url = "test.php";
											$.post(url,{data : data0},function(data1){$("#load").html(data1); }); 
											});

</script>


</head>


<body>
<div id="load" style="width:140px"></div>
 */
?>
<?php 


/*
$content = '<p><iframe frameborder="0" height="220" src="http://www.youtube.com/embed/A9Ma4KvAKh4" style="float: left;" width="375"></iframe></p>
<p>Der Christkindlimärt lud auch dieses Jahr zum Verweilen ein. Ob ein ausgefallenes Weihnachtspräsent oder etwas Schönes für sich - an den unzähligen Ständen war für jeden Geschmack etwas dabei.</p>';

	$regex_pattern = "/<iframe href=\"(.*youtube.*)\">(.*)<\/iframe>/";
	preg_match_all($regex_pattern,$content,$matches);
	print_r($matches);
	echo '</br>';
	print '</br>';
	print '</br>';
//	print$matches[1];
   
 
  
  $content = '<p></p><p></p><p></p><p>
  <a href="http://anzeigervonsaanen.typepad.com/.a/6a00d8341c96c753ef01157158ba6e970b-pi" style="display: inline;"><img  alt="Skifahrer_Klettersteig_0036" class="at-xid-6a00d8341c96c753ef01157158ba6e970b " src="http://anzeigervonsaanen.typepad.com/.a/6a00d8341c96c753ef01157158ba6e970b-450wi" style="width: 440px;" ></a>
  
  <br><em>Wer an einer solchen Steilwand hängt, dem sei nicht geraten, nach unten zu gucken. Ganz schön tief geht es hinab.</em> </p><p>«Es gab drei Stellen, an denen ich mal nach unten schauen musste. Puh, da denkst du schon uiuiui!», verriet Silvan Zurbriggen, der Kombinationssieger von Kitzbühel den 26 Journalisten, die die Sportler auf dem Gletscher begleiteten. Dennoch: «Super isch?s gsy!» Er ist beigeistert vonder Trainingseinheit. Schliesslich gehe es beim Ski fahren nicht nur um starke Beine, sondern auch um Koordination. In den Konditionswochen können sich die Skifahrer gegenseitig motivieren. Im Mai haben sie bereits auf Mallorca geschwitzt. Dort standen vor allem Mountainbike-Touren auf dem Trainingsplan. Auch in Gstaad haben sie zwei Tage lang in die Pedalen getreten. Ausserdem haben sie Stabilisationsübungen, Krafttraining und Nordic-Blading gemacht. Die Beachvolleyballplätze vor der Sporthalle boten den Sportlern dann weitere Abwechslung in ihrem Trainingsprogramm. Bereits zum vierten Mal waren die alpinen Skiasse in Gstaad zu Gast. Für <a href="http://www.live-wintersport.com/details_10924/Ski_alpin_Mauro_Pini_neuer_Trainer_bei_SwissSki.html?PHPSESSID=b3906c6b7d549fc321cba8506ba9bbd6">Mauro Pini</a>, den neuen Gruppentrainer, war es das erste Mal. Der ehemalige Trainer von <a href="http://www.swiss-ski.ch/fan-zone/fotogalerie/portraits/lara-gut.html">Lara Gut</a> hat vor zwei Monaten die Nachfolge von Patrice Morisod angetreten. Eine besondere Bedeutung hat das Trainingslager in Gstaad vor allem für Ralf Kreuzer. Der 26-Jährige aus dem Wallis stürzte Ende November in der Abfahrt von Lake Louise und zog sich eine Meniskusverletzung und einen Innenband-Anriss zu. Schon oft hatte er Verletzungspech. Nun soll es wieder aufwärts gehen. Mit hartem Training. Dass dabei der Spass nicht auf der Strecke bleibt, hat sich Peter Eichberger noch eine lustige Abwechslung für die Skifahrer einfallen lassen. Bevor es zurück ins <a href="http://www.palace.ch">Gstaad Palace</a> ging, wo die Mannschaft residiert, durften sie noch auf dem <a href="http://www.glacier3000.ch/de/Sommer/Aktivitaeten/Alpine-Coaster/">Alpine Coaster</a>, der höchsten Rodelbahn Europas, Gas geben. </p><p></p><div align="left"><div style="padding: 1px; float: left;"><object height="263" width="450"><param name="movie" value="http://www.youtube.com/v/9pfnfZVFVS4&hl=de&fs=1&"><embed src="http://www.youtube.com/v/9pfnfZVFVS4&hl=de&fs=1&" type="application/x-shockwave-flash" wmode="transparent" height="263" width="450"></object></div></div>';
  
  $regex_pattern = "/<img[^>]+>/i";
  preg_match($regex_pattern, $content, $matches);
  print_r($matches);
   $regex_pattern = "/<img[^>]+>/i";
   print preg_replace($regex_pattern, " ", $content);
  
  $regexstr = '~
# Match Youtube link and embed code
(?:				 # Group to match embed codes
   (?:<iframe [^>]*src=")?	 # If iframe match up to first quote of src
   |(?:				 # Group to match if older embed
      (?:<object .*>)?		 # Match opening Object tag
      (?:<param .*</param>)*     # Match all param tags
      (?:<embed [^>]*src=")?     # Match embed tag to the first quote of src
   )?				 # End older embed code group
)?				 # End embed code groups
(?:				 # Group youtube url
   https?:\/\/		         # Either http or https
   (?:[\w]+\.)*		         # Optional subdomains
   (?:               	         # Group host alternatives.
       youtu\.be/      	         # Either youtu.be,
       | youtube\.com		 # or youtube.com 
       | youtube-nocookie\.com	 # or youtube-nocookie.com
   )				 # End Host Group
   (?:\S*[^\w\-\s])?       	 # Extra stuff up to VIDEO_ID
   ([\w\-]{11})		         # $1: VIDEO_ID is numeric
   [^\s]*			 # Not a space
)				 # End group
"?				 # Match end quote if part of src
(?:[^>]*>)?			 # Match any extra stuff up to close brace
(?:				 # Group to match last embed code
   </iframe>		         # Match the end of the iframe	
   |</embed></object>	         # or Match the end of the older embed
)?				 # End Group of last bit of embed code
~ix';
	
	$content = '<object data="http://www.youtube.com/v/kBRyT-kk_X8?fs=1&amp;hl=de_DE" height="263" type="application/x-shockwave-flash" width="375">
<param name="data" value="http://www.youtube.com/v/kBRyT-kk_X8?fs=1&amp;hl=de_DE" />
<param name="src" value="http://www.youtube.com/v/kBRyT-kk_X8?fs=1&amp;hl=de_DE" />
<param name="wmode" value="transparent" />
</object>';
$content1 = $content."rtdokgvjfokdnvkvf johubn n ojhiuhj i";
preg_match($regexstr,$content1,$matches);
print_r($matches);
//print preg_replace($regexstr, " ", $content1);
 //if(!empty($result)) { print_r($result);}
  
  
  $str = "<p>&nbsp;   </p><p>              </p><p></p><p>&nbsp;   </p><p> <br /></p>";
  $str = preg_replace("/&#?[a-z0-9]+;/i","",$str);
 // $str = (html_entity_decode($str, ENT_QUOTES, 'UTF-8'));
  print $str;
 // print html_entity_decode($str, ENT_QUOTES, 'UTF-8');
 print strlen(trim(strip_tags($str)));
  
   $content = '<img typeof="foaf:Image" src="http://www.lagruyere.ch/sites/lagruyere.localpoint-cms.com/files/styles/content_large/public/21%20-%20instinct.jpg" width="375" height="253">';
   
   $regex_pattern = "/<img[^>]+>/i";		
	$result = preg_match($regex_pattern, $content, $matches);
	echo $result;	
	print_r($matches);		
	echo preg_replace($regex_pattern, " ", $content);		
 	//print $content;	
 
 echo $current_time = date('d-m-y H:i:s');
  $current_time ="11-04-12 17:00:00";
  echo "<br>";
 echo strtotime($current_time);
 echo "<br>";
 print date("d-m-y H:i:s", strtotime($current_time));
 echo "<br>";
 
print date("y-m-d H:i:s", 1302611400);
echo "<br>";
print date("d-m-y H:i:s", 1334146498);
print date("d-m-y", 1334818167);
echo "<br>";
print date("d-m-y", 1334899120);
echo "<br>";
print date("d-m-y");

if(date("d-m-y", 1334899120) == date("d-m-y")){echo "yes";}

  
  
  <script src="http://data.meteomedia.de/details/DetailController.php?customer=homepagebox&amp;code=1869&amp;language=de" type="text/javascript"></script>
</body>
</html>*/?>

<?php
//$str = "public://webform/Lighthouse.jpg";
//print strrpos($str, '/');
//print substr($str,0, strrpos($str, '/'));

//$conn = mysql_connect("localhost","lpcms_lagruyere","gru_1234");
//$dbs = mysql_select_db("lpcms_lgru714")or die(mysql_error());


$dbUser = 'lpcms_lagruyere';               // db User  
$dbPass = 'lagruyere_123';               // db User Password  
$dbName = 'lpcms_lgru714';            // db name  
$dest   = '/xml/'; // Path to directory                 

 class MySQLDump { 
     /** 
    * The backup command to execute 
    * @private 
    * @var string 
    */ 
     var $cmd; 
  
     /** 
    * MySQLDump constructor 
   * @param string dbUser (MySQL User Name) 
    * @param string dbPass (MySQL User Password) 
    * @param string dbName (Database to select) 
    * @param string dest (Full destination directory path for backup file) 
    * @access public 
    */ 
     function MySQLDump ($dbUser,$dbPass,$dbName,$dest) { 
             $fname = $dbName.'.xml';  
             $this->cmd='mysql -X -u'.$dbUser.' -p'.$dbPass.' '.$dbName. 
                 ' users -e "select * from users" >'.$dest.'/'.$fname; 
         } 
      
  
     /** 
    * Runs the constructed command 
    * @access public 
    * @return void 
    */ 
     function backup () { 
         system ($this->cmd, $error); 
         if($error) 
             trigger_error ('Backup failed: '.$error); 
     } 
} 

// Instantiate MySQLDump  
$mysqlDump = new MySQLDump($dbUser, $dbPass, $dbName, $dest);  

// Perform the backup  
$mysqlDump->backup();  

 ?>

