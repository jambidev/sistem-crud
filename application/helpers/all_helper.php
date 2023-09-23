<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function umur($usia) {     
    $year = date("Y", strtotime($usia));
    $month = date("m", strtotime($usia));
    $day = date("d", strtotime($usia));
    $birthday = strtotime($year.'-'.$month.'-'.$day);
    $current_time = time();
    $curr['month'] = date('n', $current_time);
    $curr['lastmonth'] = $curr['month'] - 1;
    $curr['year'] = date('Y', $current_time);
    $curr['lastyear'] = $curr['year'] - 1;
    $curr['day'] = date('j', $current_time);

    $diff = $current_time - $birthday;
    $age['years'] = intval($diff/31556926);
    $diff = $diff - (31556926 * $age['years']);
    if($curr['month'] > $month) {
    	$age['months'] = $curr['month'] - $month;
    if($curr['day'] < $day) {
    	$age['months']--;
    	$month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    } else {
    	$month_temp = strtotime($curr['year'].'-'.$curr['month'].'-'.$day);
    }
    	$diff = $current_time - $month_temp;
    } elseif($curr['month'] == $month) {
    if($curr['day'] >= $day) {
    	$age['months'] = 0;
    } else {
    	$age['months'] = 11;
    	$month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    	$diff = $current_time - $month_temp;
    }
    } else {
    	$age['months'] = $curr['month'] - $month + 12;
    if($curr['day'] < $day) {
    	$age['months']--;
    	$month_temp = strtotime($curr['year'].'-'.$curr['lastmonth'].'-'.$day);
    } else {
    	$month_temp = strtotime($curr['year'].'-'.$curr['month'].'-'.$day);
    }
    	$diff = $current_time - $month_temp;
    }

    $age['days'] = intval($diff/86400);
    $diff = $diff - (86400 * $age['days']);

    $age['hours'] = intval($diff/3600);
    $diff = $diff - (3600 * $age['hours']);

    $age['minutes'] = intval($diff/60);
    $diff = $diff - (60 * $age['minutes']);

    $age['seconds'] = $diff;

    return $age['years'];

}

function to_pdf($html, $filename='', $stream=TRUE) 
{
    require_once(APPPATH."libraries/dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}

function cetak_report($html,$out)
{
	if ($out=='pdf')
		to_pdf($html,'Report'.rand(100,1000));
	else
		echo $html;

}

function nomor_pasien($id)
{
	return sprintf("%05d",$id); 
}

function nama_bulan($i)
{
	$bulan = array(
		'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
	);

	return $bulan[$i-1];
}

function tanggal($tanggal)
{
return date('d',strtotime($tanggal)).'  '.nama_bulan(date('m',strtotime($tanggal))).' '.date('Y',strtotime($tanggal));
	  			
}

function t($v)
{
    if ((int)$v==0)
        return "-";
    return (int)$v;

}

function tahun_akademik($str){
	$r = substr($str, -1);
	$t = substr($str,0, -1);
	if($r==1)
		return $t.' - GANJIL';
	else
		return $t.' - GENAP';

}

function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;  
}
    
function getBulan($bln){
            switch ($bln){
                    case 1: 
                        return "Januari";
                        break;
                    case 2:
                        return "Februari";
                        break;
                    case 3:
                        return "Maret";
                        break;
                    case 4:
                        return "April";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Juni";
                        break;
                    case 7:
                        return "Juli";
                        break;
                    case 8:
                        return "Agustus";
                        break;
                    case 9:
                        return "September";
                        break;
                    case 10:
                        return "Oktober";
                        break;
                    case 11:
                        return "November";
                        break;
                    case 12:
                        return "Desember";
                        break;
                }
} 
function nama_hari($tgl,$bulan,$tahun){
        $nama = date("l", mktime(0,0,0,$bulan,$tgl,$tahun));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari;
}
function relativeTime($dt,$precision=2){
        $times=array(   365*24*60*60    => "year",
                    30*24*60*60     => "month",
                    7*24*60*60      => "week",
                    24*60*60        => "day",
                    60*60           => "hour",
                    60              => "minute",
                    1               => "second");
    
        $passed=strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$dt;
        
        if($passed<5)
        {
            $output='less than 5 seconds ago';
        }
        else
        {
            $output=array();
            $exit=0;
            
            foreach($times as $period=>$name)
            {
                if($exit>=2 || ($exit>0 && $period<60)) break;
                
                $result = floor($passed/$period);
                if($result>0)
                {
                    $output[]=$result.' '.$name.($result==1?'':'s');
                    $passed-=$result*$period;
                    $exit++;
                }
                else if($exit>0) $exit++;
            }
                    
            $output=implode(' and ',$output).' ago';
        }
        
        return $output;
}
function loginTime($dt,$precision=2){
        $times=array(   365*24*60*60    => "year",
                    30*24*60*60     => "month",
                    7*24*60*60      => "week",
                    24*60*60        => "day",
                    60*60           => "hour",
                    60              => "minute",
                    1               => "second");
    
        $passed=time()-$dt-10;
        
        if($passed<5)
        {
            $output='less than 5 seconds ago';
        }
        else
        {
            $output=array();
            $exit=0;
            
            foreach($times as $period=>$name)
            {
                if($exit>=2 || ($exit>0 && $period<60)) break;
                
                $result = floor($passed/$period);
                if($result>0)
                {
                    $output[]=$result.' '.$name.($result==1?'':'s');
                    $passed-=$result*$period;
                    $exit++;
                }
                else if($exit>0) $exit++;
            }
                    
            $output=implode(' and ',$output).' ago';
        }
        
        return $output;
}
function rupiah($str){
    return "Rp. ".number_format($str, 0, ",", ".");
}
function salam()
    {
          $pesan = "";
          if(gmdate("H", time()+60*60*7)<03)
          {
            $pesan = "malam";
          }
          else if(gmdate("H", time()+60*60*7)<10)
          {
            $pesan = "pagi";
          }
          else if(gmdate("H", time()+60*60*7)<16)
          {
            $pesan = "siang";
          }
          else if(gmdate("H", time()+60*60*7)<19)
          {
            $pesan = "sore";
          }
          if(gmdate("H", time()+60*60*7)>18)
          {
            $pesan = "malam";
          }
          return $pesan;
    }
function bilangRatusan($x)
        {
           // function untuk membilang bilangan pada setiap kelompok
         
           $kata = array('', 'satu ', 'dua ', 'tiga ' , 'empat ', 'lima ', 'enam ', 'tujuh ', 'delapan ', 'sembilan ');
         
           $string = '';
         
           $ratusan = floor($x/100);
           $x = $x % 100;
           if ($ratusan > 1) $string .= $kata[$ratusan]."ratus "; // membentuk kata '... ratus'
           else if ($ratusan == 1) $string .= "seratus "; // membentuk kata khusus 'seratus '
         
           $puluhan = floor($x/10);
           $x = $x % 10;
           if ($puluhan > 1)
           {
                  $string .= $kata[$puluhan]."puluh "; // membentuk kata '... puluh'
                  $string .= $kata[$x]; // membentuk kata untuk satuan
           }
           else if (($puluhan == 1) && ($x == 1)) $string .= "sebelas ";
           else if (($puluhan == 1) && ($x > 0)) $string .= $kata[$x]."belas "; // kejadian khusus untuk bilangan yang berbentuk kata '... belas'
           
           else if (($puluhan == 1) && ($x == 0)) $string .= $kata[$x]."sepuluh "; // kejadian khusus untuk bilangan 10 
           else if ($puluhan == 0) $string .= $kata[$x];         // membentuk kata untuk satuan        
         
           return $string;
        }
         
        function terbilang($x,$digit = 0,$curr = 'rupiah')
        {
                // membentuk format bilangan XXX.XXX.XXX.XXX.XXX
                $x = number_format($x, $digit);
                 
                // memecah kelompok ribuan berdasarkan tanda ','
                $pecah = explode(",", $x);
                
                // memecah kelompok ribuan berdasarkan tanda '.'
                $desimal = explode(".", $x);
                 
                $string = "";
                 
                // membentuk format terbilang '... trilyun ... milyar ... juta ... ribu ...'
                //for($sel = 0; $sel <= 1; $sel++){
                //if ($sel == 0) {
                $set = $pecah;
                //}
                //else {$set = $desimal[1];}
                
                for($i = 0; $i <= count($set)-1; $i++)
                {
                   if ((count($set) - $i == 5) && ($set[$i] != 0)) $string .= bilangRatusan($set[$i])."triliyun "; // membentuk kata '... trilyun'
                   else if ((count($set) - $i == 4) && ($set[$i] != 0)) $string .= bilangRatusan($set[$i])."milyar "; // membentuk kata '... milyar'
                   else if ((count($set) - $i == 3) && ($set[$i] != 0)) $string .= bilangRatusan($set[$i])."juta "; // membentuk kata '... juta'
                   else if ((count($set) - $i == 2) && ($set[$i] == 1)) $string .= "seribu "; // kejadian khusus untuk bilangan dalam format 1XXX (yang mengandung kata 'seribu')
                   else if ((count($set) - $i == 2) && ($set[$i] != 0)) $string .= bilangRatusan($set[$i])."ribu "; // membentuk kata '... ribu'
                   else if ((count($set) - $i == 1) && ($set[$i] != 0)) $string .= bilangRatusan($set[$i]); 
                }
                
                $string .= ' '.$curr;
                
                //}
                return $string;
        }
function sessions($name)
{
        $CI =& get_instance();
        if ($CI->session)
                return $CI->session->userdata($name);
}
function config($name)
{
        $CI =& get_instance();
        return $CI->config->item($name);
}

if ( ! function_exists('number_to_words'))
{
    function number_to_words($number)
    {
        $before_comma = trim(to_word($number));
        $after_comma = trim(comma($number));
        return ucwords($results = $before_comma.' koma '.$after_comma);
    }

    function to_word($number)
    {
        $words = "";
        $arr_number = array(
        "",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan",
        "sepuluh",
        "sebelas");

        if($number<12)
        {
            $words = " ".$arr_number[$number];
        }
        else if($number<20)
        {
            $words = to_word($number-10)." belas";
        }
        else if($number<100)
        {
            $words = to_word($number/10)." puluh ".to_word($number%10);
        }
        else if($number<200)
        {
            $words = "seratus ".to_word($number-100);
        }
        else if($number<1000)
        {
            $words = to_word($number/100)." ratus ".to_word($number%100);
        }
        else if($number<2000)
        {
            $words = "seribu ".to_word($number-1000);
        }
        else if($number<1000000)
        {
            $words = to_word($number/1000)." ribu ".to_word($number%1000);
        }
        else if($number<1000000000)
        {
            $words = to_word($number/1000000)." juta ".to_word($number%1000000);
        }
        else
        {
            $words = "undefined";
        }
        return $words;
    }

    function comma($number)
    {
        $after_comma = stristr($number,',');
        $arr_number = array(
        "nol",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan");

        $results = "";
        $length = strlen($after_comma);
        $i = 1;
        while($i<$length)
        {
            $get = substr($after_comma,$i,1);
            $results .= " ".$arr_number[$get];
            $i++;
        }
        return $results;
    }
}
function selisih_tanggah($awal,$akhir)
    {
        $datetime1 = date_create($awal);
        $datetime2 = date_create($akhir);
        $interval = date_diff($datetime1, $datetime2);
        $h = $interval->format('%a');
        $tahun = floor($h/365);
        $bulan = floor(($h%365)/30);
        return $tahun.'_'.$bulan;
    }  

function pecahString($string, $n)
    {

        $jumSub = ceil(strlen($string)/$n);

    $hasil = array();
for ($i=0; $i<=$jumSub-1; $i++)
{

$hasil[$i] = substr($string, $i*$n, $n);

}
 

return $hasil;

}          