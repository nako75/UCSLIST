<?

$gelme = array ('yoneticiler', 'pwd', 'hex', 'union', 'select', 'insert', 'delete', 'update', 'drop table', 'union', 'null');
	for ($i = 0; $i < sizeof ($_GET); ++$i)
	{
		for ($j = 0; $j < sizeof ($gelme); ++$j)
		{
			if (preg_match ('/' . strtolower($gelme[$j]) . '/', strtolower($_GET[key ($_GET)])))
			{
			    $temp = key ($_GET);
			    $_GET[$temp] = '';
			    exit("<br /><center><big><b><h1>No Ýnjection Sie go PLS.</h1></b></big></center>");
			    continue;
			}
		}
	}

?>
