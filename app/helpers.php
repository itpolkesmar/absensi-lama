<?php

function getSelectGolongan($id='',$selected='',$id_pegawai='') {
    $pegawai = $id_pegawai!=''?'id_pegawai="'.$id_pegawai.'"':'';

    $data = \DB::table('mst_golongan')->get();
    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%" class="form-control" '.$pegawai.'>';
    $html .= '<option value="">-</option>';
    foreach ($data as $row) {
        $s = ($selected==$row->id)?'selected="selected"':'';
        $html .= '<option '.$s.' value="'.$row->id.'">'.$row->golongan.' - '.$row->pangkat.'</option>';
    }
    $html .= '</select>';
    return $html;
}


function getVerifyMode($id) {
    switch ($id){
        case '1' :
            return 'Fingerprint';
            break;
        case '20' :
            return 'Wajah';
            break;
    }
}
function getBulan($id=1) {
    $bulan = array (1=>'Januari', // array bulan konversi
            2=>'Februari',
            3=>'Maret',
            4=>'April',
            5=>'Mei',
            6=>'Juni',
            7=>'Juli',
            8=>'Agustus',
            9=>'September',
            10=>'Oktober',
            11=>'November',
            12=>'Desember'
    );
    return $bulan[$id];
}

function terbilang($x){
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

  if ($x < 12)

    return " " . $abil[$x];

  elseif ($x < 20)

    return Terbilang($x - 10) . " belas";

  elseif ($x < 100)

    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);

  elseif ($x < 200)

    return " seratus" . Terbilang($x - 100);

  elseif ($x < 1000)

    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);

  elseif ($x < 2000)

    return " seribu" . Terbilang($x - 1000);

  elseif ($x < 1000000)

    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);

  elseif ($x < 1000000000)

    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);

}

function getSelectBulan($id='',$selected='') {
    $selected = $selected==''?date('m'):$selected;
    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%" class="form-control">';
    for($i=1;$i<=12;$i++) {
        $s = ($selected==$i)?'selected="selected"':'';
        $html .= '<option '.$s.' value="'.$i.'">'.getBulan($i).'</option>';
    }
    $html .= '</select>';
    return $html;
}

function getSelectBulanAll($id='',$selected='') {
    $selected = $selected==''?date('m'):$selected;
    $html = '<select id="'.$id.'" name="'.$id.'" style="width:100%" class="form-control">';
    $html .= '<option value="">Semua Bulan</option>';
    for($i=1;$i<=12;$i++) {
        $s = ($selected==$i)?'selected="selected"':'';
        $html .= '<option '.$s.' value="'.$i.'">'.getBulan($i).'</option>';
    }
    $html .= '</select>';
    return $html;
}

function uang($nominal = ''){
    if ($nominal == '' || $nominal == 0){
        return 0;
    } else if($nominal<0) {
        return '('.substr(number_format($nominal,0,',','.'),1).')';
    }else{
        return number_format($nominal,0,',','.');        
    }
}

function debug($s='',$die=true){
    echo '<pre>';
    print_r($s);
    echo '</pre>';
    if($die == true){
        die();
    }
}


function rangesNotOverlapClosed($start_time1,$end_time1,$start_time2,$end_time2){
  $utc = new DateTimeZone('UTC');

  $start1 = new DateTime($start_time1,$utc);
  $end1 = new DateTime($end_time1,$utc);
  if($end1 < $start1)
    throw new Exception('Range is negative.');

  $start2 = new DateTime($start_time2,$utc);
  $end2 = new DateTime($end_time2,$utc);
  if($end2 < $start2)
    throw new Exception('Range is negative.');
  return ($end1 < $start2) || ($end2 < $start1);
}

function rangesNotOverlapOpen($start_time1,$end_time1,$start_time2,$end_time2)
{
  $utc = new DateTimeZone('UTC');

  $start1 = new DateTime($start_time1,$utc);
  $end1 = new DateTime($end_time1,$utc);
  if($end1 < $start1)
    throw new Exception('Range is negative.');

  $start2 = new DateTime($start_time2,$utc);
  $end2 = new DateTime($end_time2,$utc);
  if($end2 < $start2)
    throw new Exception('Range is negative.');

  return ($end1 <= $start2) || ($end2 <= $start1);
}


function spasi($rekursive = 1){
    for($a=1 ; $a <= $rekursive ; $a++){
        echo '&nbsp;';
    }
}

function get_client_ip() {
	$ipaddress = '';
        if($_SERVER['REMOTE_ADDR']){
		$ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
		$ipaddress = 'UNKNOWN';
        }

	return $ipaddress;
}

    function formatTanggalPanjang($tanggal) {
        $aBulan = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        list($thn,$bln,$tgl)=explode("-",$tanggal);
        $bln = (($bln >0 ) && ($bln < 10))? substr($bln,1,1): $bln ;
        return $tgl." ".$aBulan[$bln]." ".$thn;
    }

    function formatBulanTahun($tanggal) {
        $aBulan = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        list($thn,$bln,$tgl)=explode("-",$tanggal);
        $bln = (($bln >0 ) && ($bln < 10))? substr($bln,1,1): $bln ;
        return $aBulan[$bln]." ".$thn;
    }



function tanggal($date = 1){
    date_default_timezone_set('Asia/Jakarta'); // your reference timezone here
    $date = date('Y-m-d', strtotime($date)); // ubah sesuai format penanggalan standart
    $bulan = array ('01'=>'Januari', // array bulan konversi
            '02'=>'Februari',
            '03'=>'Maret',
            '04'=>'April',
            '05'=>'Mei',
            '06'=>'Juni',
            '07'=>'Juli',
            '08'=>'Agustus',
            '09'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember'
    );
    $date = explode ('-',$date); // ubah string menjadi array dengan paramere '-'

    return @$date[2] . ' ' . @$bulan[$date[1]] . ' ' . @$date[0]; // hasil yang di kembalikan}
}


function waktu($date=1) {
    $date = substr($date,11,8); 
    return $date;
}

function waktusingkat($date=1) {
    $detik = intval(substr($date,17,2));
    $output = '';
    if($detik>0) {
        $menit = str_pad(intval(substr($date,14,2))+1,2,0,STR_PAD_LEFT);
        if($menit>59) {
            $jam = str_pad(intval(substr($date,11,2))+1,2,0,STR_PAD_LEFT);
            $menit = str_pad($menit-60,2,0,STR_PAD_LEFT);
        } else {
            $menit = substr($date,14,2);
            $jam = substr($date,11,2);
        }
        $output = $jam.':'.$menit;
    } else {
        $menit = substr($date,14,2);
        $jam = substr($date,11,2);
        $output = $jam.':'.$menit;
    }
    return $output;
}

function romawi($n = '1'){
    $hasil = '';
    $iromawi = array('','I','II','III','IV','V','VI','VII','VIII','IX','X',
        20=>'XX',30=>'XXX',40=>'XL',50=>'L',60=>'LX',70=>'LXX',80=>'LXXX',
        90=>'XC',100=>'C',200=>'CC',300=>'CCC',400=>'CD',500=>'D',
        600=>'DC',700=>'DCC',800=>'DCCC',900=>'CM',1000=>'M',
        2000=>'MM',3000=>'MMM');
    
    if(array_key_exists($n,$iromawi)){
        $hasil = $iromawi[$n];
    }elseif($n >= 11 && $n <= 99){
        $i = $n % 10;
        $hasil = $iromawi[$n-$i] . Romawi($n % 10);
    }elseif($n >= 101 && $n <= 999){
        $i = $n % 100;
        $hasil = $iromawi[$n-$i] . Romawi($n % 100);
    }else{
        $i = $n % 1000;
        $hasil = $iromawi[$n-$i] . Romawi($n % 1000);
    }
    return $hasil;
}


function combo_jnskelamin($id ='',$selected=""){
    $h = "<select id='$id' name='$id' style='width:100%'>";    
    $h .= '<option value="">Pilih Jenis Kelamin</option>';
    $h .= '<option '.(($selected == '1')?'selected':'').' value="1">Pria</option>';
    $h .= '<option '.(($selected == '2')?'selected':'').' value="2">Wanita</option>';
    $h .= '</select>';
    return $h;
}


function select_hari($id = 0,$selected=''){
    // $hari = array("-", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu","Minggu");
    // return Form::select($id,$hari,$selected,array('style' => 'width:100%','class'=>'form-control'));

    $h = "<select id='$id' name='$id' style='width:100%'>";    
    $h .= '<option value="">Pilih Hari</option>';
    $h .= '<option '.(($selected == 'Mon')?'selected':'').' value="Mon">Senin</option>';
    $h .= '<option '.(($selected == 'Tue')?'selected':'').' value="Tue">Selasa</option>';
    $h .= '<option '.(($selected == 'Wed')?'selected':'').' value="Wed">Rabu</option>';
    $h .= '<option '.(($selected == 'Thu')?'selected':'').' value="Thu">Kamis</option>';
    $h .= '<option '.(($selected == 'Fri')?'selected':'').' value="Fri">Jumat</option>';
    $h .= '<option '.(($selected == 'Sat')?'selected':'').' value="Sat">Sabtu</option>';
    $h .= '<option '.(($selected == 'Sun')?'selected':'').' value="Sun">Minggu</option>';
    $h .= '</select>';
    return $h;
}

function array_hari($id = 0,$selected=''){
    $hari = array("-", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu","Minggu");
    return $hari;
}

function date_picker($id = 'asa',$value=""){
    echo '<script>'
    .'$(document).ready(function(){'
    .'$(".tgl").datetimepicker({format: "YYYY-MM-DD"});'
    .'})</script>'
    .'<input type="text" class="form-control tgl" value="'.$value.'" id="'.$id.'" name="'.$id.'"  placeholder="Masukkan Tanggal">';
}

function tanggal_indonesia(){
    $bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); 
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"); 
//    $cetak_date = $hari[(int)date("w")] .', '. date("j ") . $bulan[(int)date('m')] . date(" Y"); 
    $cetak_date = date("j ") . $bulan[(int)date('m')] . date(" Y"); 
    return $cetak_date ;
}

function sekarang(){
    return date("Y-m-d H:i:s");
}


function combo_agama($id = '',$selected = false){
    $a = '<select id="'.$id.'" name="'.$id.'" style="width:100%;">';
    $a .= '<option value="">Pilih Agama</option>';
    
    $agama = \DB::table('ref_agama')->orderBy('kode','asc')->get();
    foreach ($agama as $row) {
        $s = ($selected == $row->id)?'selected="selected"':'';
        $a .= '<option '.$s.'value="'.$row->id.'">'.$row->uraian.'</option>';
    }
    $a .= '</select>';
    return $a;
}

function modal($sempit = false,$name = 'modal2',$body = 'Modal2',$minus=false){
    $class = ($sempit == false)?'modal-dialog-wide':'modal-dialog';
    $js = '<script>var duplicateChk = {};'
            .'$("div#modal2[class]").each (function (a) {'
            .'if (duplicateChk.hasOwnProperty(this.class)) {'
            .'alert("kembar");$(this).remove();'
            .'} else { duplicateChk[this.class] = "true";}});</script>';
    
    $min = ($minus == true)?'':'';
    $html =  '<div class="modal fade" id="'.$name.'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="'.$class.'">
        <div class="modal-content" id="wadah_modal">
        <div class="modal-header bg-primary">
        <button onclick="claravel_modal_close('."'$name'".')" type="button" aria-hidden="true" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-remove" ></i></button>
            '.$min.'
        <h4 class="modal-title"><b id="judulmodal"></b></h4>
      </div>
      <div class="modal-body">
        <div id="konten'.$body.'"></div>
      </div>
      <div class="modal-footer">
        <div id="footermodal"></div>
      </div>
    </div>
  </div>
</div>';
	return $html;
}

function catat_log($aksi = '',$modul=''){
    $simpan = array(
        'aksi' => $aksi,
        'module' => $modul,
        'user' => \Session::get('user_id'),
        'url' => \Request::url(),
        'waktu' => date("Y-m-d H:i:s")
    );
    $save = \DB::table('application_log')->insert($simpan);
}
function header_dokumen(){
    return '<link rel="stylesheet" href="'.getBaseURL(true).'/packages/tugumuda/claravel/assets/css/bootstrap.css" />'.
            '<link rel="stylesheet" href="'.getBaseURL(true).'/packages/tugumuda/claravel/assets/css/bootstrap-theme.css" />'.
            '<link rel="stylesheet" href="'.getBaseURL(true).'/packages/tugumuda/claravel/assets/css/bootstrap-icons.css" />';
}
function hari($hari){
    switch ($hari){
        case '0' :
            return '';
            break;
        case '1' :
            return 'Senin';
            break;
        case '2' :
            return 'Selasa';
            break;
        case '3' :
            return 'Rabu';
            break;
        case '4' :
            return 'Kamis';
            break;
        case '5' :
            return "Jum'at";
            break;
        case '6' :
            return 'Sabtu';
            break;
        case '7' :
            return 'Minggu';
            break;
    }
    
}
function konversi_hari($hari){
    // $hari = date("l", strtotime($hari));
        switch ($hari){
        case 'Mon' :
            return 'Senin';
            break;
        case 'Tue' :
            return 'Selasa';
            break;
        case 'Wed' :
            return 'Rabu';
            break;
        case 'Thu' :
            return 'Kamis';
            break;
        case 'Fri' :
            return "Jum'at";
            break;
        case 'Sat' :
            return 'Sabtu';
            break;
        case 'Sun' :
            return 'Minggu';
            break;
    }
};	

  
function cekLogin(){
    $user = \Session::get('user_id');
    $role = \Session::get('role_id');
    return (!$user || !$role)?false:TRUE;
    //if (!$user || !$role){die('Invalid Access :: You must sign in first !!<br><br><i>With Love :: Developer</i>');}
}

function cekAjax(){
    if (!\Request::ajax()){die('Invalid URL Request<br><br><i>With Love :: Developer</i>');}
}


function get_role(){
    return \Session::get('role_id');
}

function get_username(){
    $role = \Session::get('role_id');
    if ($role == '2' || $role == '3' || $role == '4' || $role == '6'){
            $user = explode('-', \Session::get('user_name'));
            $user = $user[1];
            return $user;
    }
}


function inputWarna($id='',$nama="",$selected=""){
    $a1 = ($selected == 'bg-color-blue')?' selected ':' ';
    $a2 = ($selected == 'bg-color-blueDark')?' selected ':' ';
    $a3 = ($selected == 'bg-color-darken')?' selected ':' ';
    $a4 = ($selected == 'bg-color-green')?' selected ':' ';
    $a5 = ($selected == 'bg-color-greenDark')?' selected ':' ';
    $a6 = ($selected == 'bg-color-orange')?' selected ':' ';
    $a7 = ($selected == 'bg-color-pink')?' selected ':' ';
    $a8 = ($selected == 'bg-color-purple')?' selected ':' ';
    $a9 = ($selected == 'bg-color-yellow')?' selected ':' ';
    $a10 = ($selected == 'bg-color-red')?' selected ':' ';
    $html = '<select id="'.$id.'" name="'.$nama.'">
            <option '.$a1.'value="bg-color-blue">Biru</option>
            <option '.$a2.'value="bg-color-blueDark">Biru Gelap</option>
            <option '.$a3.'value="bg-color-darken">Gelap</option>
            <option '.$a4.'value="bg-color-green">Hijau</option>
            <option '.$a5.'value="bg-color-greenDark">Hijau Gelap</option>
            <option '.$a6.'value="bg-color-orange">Jingga</option>
            <option '.$a7.'value="bg-color-pink">Merah Muda</option>
            <option '.$a8.'value="bg-color-purple">Ungu</option>
            <option '.$a9.'value="bg-color-red">Merah</option>
            <option '.$a10.'value="bg-color-yellow">Kuning</option>
            </select>';
    return $html;
}


function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}

function getBaseURL($with_http = false){
    return url();
}

function force_download($filename = '', $data = '')
{
        if ($filename == '' OR $data == '')
        {
                return FALSE;
        }

        // Try to determine if the filename includes a file extension.
        // We need it in order to set the MIME type
        if (FALSE === strpos($filename, '.'))
        {
                return FALSE;
        }

        // Grab the file extension
        $x = explode('.', $filename);
        $extension = end($x);

        // Load the mime types
        if (defined('ENVIRONMENT') AND is_file('app/'.ENVIRONMENT.'/mimes.php'))
        {
                include('app/'.ENVIRONMENT.'/mimes.php');
        }
        elseif (is_file('app/mimes.php'))
        {
                include('app/mimes.php');
        }

        // Set a default mime if we can't find it
        if ( ! isset($mimes[$extension]))
        {
                $mime = 'application/octet-stream';
        }
        else
        {
                $mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
        }

        // Generate the server headers
        if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
        {
                header('Content-Type: "'.$mime.'"');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header("Content-Transfer-Encoding: binary");
                header('Pragma: public');
                header("Content-Length: ".strlen($data));
        }
        else
        {
                header('Content-Type: "'.$mime.'"');
                header('Content-Disposition: attachment; filename="'.$filename.'"');
                header("Content-Transfer-Encoding: binary");
                header('Expires: 0');
                header('Pragma: no-cache');
                header("Content-Length: ".strlen($data));
        }

        exit($data);
}
