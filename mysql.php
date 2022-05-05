<?php
// connect to the database
function connect($host=DB_HOST,$user=DB_USER,$pwd=DB_PASSWORD,$base=DB_DATABASE){
	$link = @sqlsrv_connect($host,array("UID"=>$user,"PWD"=>$pwd,"Database"=>$base));

	if($link == false ){ 
		exit(sqlsrv_errors()); 
	}
	return $link;
}

// execute SQl sentences
function execute($link,$query){
	$result = sqlsrv_query($link,$query);
	if($result == false){
		exit(sqlsrv_errors($link));
	}
	return $result;
}


function escape($data){
    $data = str_replace("'","\\'",$data);
    return str_replace("\"","\\\"",$data);
}