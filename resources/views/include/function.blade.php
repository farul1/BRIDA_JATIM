<?php

$arrbul=array("","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
$arrbulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

$key = "progstyle2020";

$arrbul = array("", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
$arrbulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

if(!function_exists("tgl_indo") ) {  
	function tgl_indo($tanggal)
	{
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
	 	if(!empty($tanggal)){
			$pecahkan = explode('-', $tanggal); 
			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	 	} else {
	 		return '';
	 	}
	}
	function saleh_encrypt($string, $key = '%key&')
	{
	    $result = '';
	    for ($i = 0; $i < strlen($string); $i++) {
	        $char = substr($string, $i, 1);
	        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
	        $ordChar = ord($char);
	        $ordKeychar = ord($keychar);
	        $sum = $ordChar + $ordKeychar;
	        $char = chr($sum);
	        $result .= $char;
	    }
	    $temp = base64_encode($result);
	    $temp = str_replace("+", "$$@$$", $temp);
	    return $temp;
	}

	function saleh_decrypt($string, $key = '%key&')
	{
	    $result = '';
	    $string = str_replace("$$@$$", "+", $string);
	    $string = base64_decode($string);
	    for ($i = 0; $i < strlen($string); $i++) {
	        $char = substr($string, $i, 1);
	        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
	        $ordChar = ord($char);
	        $ordKeychar = ord($keychar);
	        $sum = $ordChar - $ordKeychar;
	        $char = chr($sum);
	        $result .= $char;
	    }
	    return $result;
	}
	function does_url_exists($url)
	{
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_NOBODY, true);
	    curl_exec($ch);
	    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	    if ($code == 200) {
	        $status = true;
	    } else {
	        $status = false;
	    }
	    curl_close($ch);
	    return $status;
	}
}
?>