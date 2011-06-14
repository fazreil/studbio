<?php require_once('Connections/bio_db.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO bio_main (
course_name,course_start,course_end,ic_no,rank,name,unit_from,
squadron,service_start,service_type,service_end,birth_date,marital_status,
first_parent_name,first_relate_type,first_address,first_phone,first_near_cop,sec_parent_name,
sec_relate,sec_address,sec_phone,sec_near_cop,first_age,sec_age,
third_age,forth_age,fifth_age,sixth_age,first_sex,sec_sex,
third_sex,fourth_sex,fifth_sex,sixth_sex,school,old_srp_year,
old_spm_year,old_stpm_year,first_srp_grade,sec_srp_grade,third_srp_grade,fourth_srp_grade,
first_spm_grade,sec_spm_grade,third_spm_grade,forth_spm_grade,first_stpm_grade,sec_stpm_grade,
third_stpm_grade,forth_stpm_grade,new_srp_year,new_spm_year,new_stpm_year,bm_srp,bm_spm,
bm_stpm,bi_srp,bi_spm,bi_stpm,math_srp,math_spm,math_stpm,sci_srp,
sci_spm,sci_stpm,hist_srp,hist_spm,hist_stpm,geo_srp,
geo_spm,geo_stpm,pi_srp,pi_spm,pi_stpm,draw_srp,
draw_spm,draw_stpm,lite_srp,lite_spm,lite_stpm,eco_srp,
eco_spm,eco_stpm,wri_bm,spe_bm,wri_eng,spe_eng,
first_ins_no,first_ins_name,first_unit_amount,sec_ins_no,sec_ins_name,sec_unit_amout,
third_ins_no,third_ins_name,third_ins_amount,first_job_post,first_job_dept,sec_job_post,
sec_job_dept,first_course_name,first_course_place,first_course_end,sec_course_name,sec_course_place,
sec_course_end,third_course_name,third_course_place,third_course_end,fourth_course_name,fourth_course_place,
fourth_course_end,fifth_course_name,fifth_course_place,fifth_course_end,first_unit_from,first_unit_till,
first_unit_rank,first_unit_post,first_unit_unit,sec_unit_from,sec_unit_till,sec_unit_rank,
sec_unit_post,sec_unit_unit,third_unit_from,third_unit_till,third_unit_rank,third_unit_post,
third_unit_unit,fourth_unit_from,fourth_unit_till,fourth_unit_rank,fourth_unit_post,fourth_unit_unit,
fifth_unit_from,fifth_unit_till,fifth_unit_rank,fifth_unit_post,fifth_unit_unit,first_place_choose,
sec_place_choose,sport,hobby,confirm_date) 
VALUES 
( %s, %s, %s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
 %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s,
 %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s,
 %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
 %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
 %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
 %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
 %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,
 %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s,
 %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
GetSQLValueString($_POST['course_name'], "text"),
GetSQLValueString($_POST['course_start'], "text"),
GetSQLValueString($_POST['course_end'], "text"),
GetSQLValueString($_POST['ic_no'], "int"),
GetSQLValueString($_POST['rank'], "text"),
GetSQLValueString($_POST['name'], "text"),
GetSQLValueString($_POST['unit_from'], "text"),
GetSQLValueString($_POST['squadron'], "text"),
GetSQLValueString($_POST['service_start'], "date"),
GetSQLValueString($_POST['service_type'], "text"),
GetSQLValueString($_POST['service_end'], "date"),
GetSQLValueString($_POST['birth_date'], "date"),
GetSQLValueString($_POST['marital_status'], "text"),
GetSQLValueString($_POST['first_parent_name'], "text"),
GetSQLValueString($_POST['first_relate_type'], "text"),
GetSQLValueString($_POST['first_address'], "text"),
GetSQLValueString($_POST['first_phone'], "int"),
GetSQLValueString($_POST['first_near_cop'], "text"),
GetSQLValueString($_POST['sec_parent_name'], "text"),
GetSQLValueString($_POST['sec_relate'], "text"),
GetSQLValueString($_POST['sec_address'], "text"),
GetSQLValueString($_POST['sec_phone'], "int"),
GetSQLValueString($_POST['sec_near_cop'], "text"),
GetSQLValueString($_POST['first_age'], "text"),
GetSQLValueString($_POST['sec_age'], "text"),
GetSQLValueString($_POST['third_age'], "text"),
GetSQLValueString($_POST['forth_age'], "text"),
GetSQLValueString($_POST['fifth_age'], "text"),
GetSQLValueString($_POST['sixth_age'], "text"),
GetSQLValueString($_POST['first_sex'], "text"),
GetSQLValueString($_POST['sec_sex'], "text"),
GetSQLValueString($_POST['third_sex'], "text"),
GetSQLValueString($_POST['fourth_sex'], "text"),
GetSQLValueString($_POST['fifth_sex'], "text"),
GetSQLValueString($_POST['sixth_sex'], "text"),
GetSQLValueString($_POST['school'], "text"),
GetSQLValueString($_POST['old_srp_year'], "int"),
GetSQLValueString($_POST['old_spm_year'], "int"),
GetSQLValueString($_POST['old_stpm_year'], "int"),
GetSQLValueString($_POST['first_srp_grade'], "text"),
GetSQLValueString($_POST['sec_srp_grade'], "text"),
GetSQLValueString($_POST['third_srp_grade'], "text"),
GetSQLValueString($_POST['fourth_srp_grade'], "text"),
GetSQLValueString($_POST['first_spm_grade'], "text"),
GetSQLValueString($_POST['sec_spm_grade'], "text"),
GetSQLValueString($_POST['third_spm_grade'], "text"),
GetSQLValueString($_POST['forth_spm_grade'], "text"),
GetSQLValueString($_POST['first_stpm_grade'], "text"),
GetSQLValueString($_POST['sec_stpm_grade'], "text"),
GetSQLValueString($_POST['third_stpm_grade'], "text"),
GetSQLValueString($_POST['forth_stpm_grade'], "text"),
GetSQLValueString($_POST['new_srp_year'], "int"),
GetSQLValueString($_POST['new_spm_year'], "int"),
GetSQLValueString($_POST['new_stpm_year'], "int"),
GetSQLValueString($_POST['bm_srp'], "text"),
GetSQLValueString($_POST['bm_spm'], "text"),
GetSQLValueString($_POST['bm_stpm'], "text"),
GetSQLValueString($_POST['bi_srp'], "text"),
GetSQLValueString($_POST['bi_spm'], "text"),
GetSQLValueString($_POST['bi_stpm'], "text"),
GetSQLValueString($_POST['math_srp'], "text"),
GetSQLValueString($_POST['math_spm'], "text"),
GetSQLValueString($_POST['math_stpm'], "text"),
GetSQLValueString($_POST['sci_srp'], "text"),
GetSQLValueString($_POST['sci_spm'], "text"),
GetSQLValueString($_POST['sci_stpm'], "text"),
GetSQLValueString($_POST['hist_srp'], "text"),
GetSQLValueString($_POST['hist_spm'], "text"),
GetSQLValueString($_POST['hist_stpm'], "text"),
GetSQLValueString($_POST['geo_srp'], "text"),
GetSQLValueString($_POST['geo_spm'], "text"),
GetSQLValueString($_POST['geo_stpm'], "text"),
GetSQLValueString($_POST['pi_srp'], "text"),
GetSQLValueString($_POST['pi_spm'], "text"),
GetSQLValueString($_POST['pi_stpm'], "text"),
GetSQLValueString($_POST['draw_srp'], "text"),
GetSQLValueString($_POST['draw_spm'], "text"),
GetSQLValueString($_POST['draw_stpm'], "text"),
GetSQLValueString($_POST['lite_srp'], "text"),
GetSQLValueString($_POST['lite_spm'], "text"),
GetSQLValueString($_POST['lite_stpm'], "text"),
GetSQLValueString($_POST['eco_srp'], "text"),
GetSQLValueString($_POST['eco_spm'], "text"),
GetSQLValueString($_POST['eco_stpm'], "text"),
GetSQLValueString($_POST['wri_bm'], "text"),
GetSQLValueString($_POST['spe_bm'], "text"),
GetSQLValueString($_POST['wri_eng'], "text"),
GetSQLValueString($_POST['spe_eng'], "text"),
GetSQLValueString($_POST['first_ins_no'], "text"),
GetSQLValueString($_POST['first_ins_name'], "text"),
GetSQLValueString($_POST['first_unit_amount'], "int"),
GetSQLValueString($_POST['sec_ins_no'], "text"),
GetSQLValueString($_POST['sec_ins_name'], "text"),
GetSQLValueString($_POST['sec_unit_amout'], "int"),
GetSQLValueString($_POST['third_ins_no'], "text"),
GetSQLValueString($_POST['third_ins_name'], "text"),
GetSQLValueString($_POST['third_ins_amount'], "int"),
GetSQLValueString($_POST['first_job_post'], "text"),
GetSQLValueString($_POST['first_job_dept'], "text"),
GetSQLValueString($_POST['sec_job_post'], "text"),
GetSQLValueString($_POST['sec_job_dept'], "text"),
GetSQLValueString($_POST['first_course_name'], "text"),
GetSQLValueString($_POST['first_course_place'], "text"),
GetSQLValueString($_POST['first_course_end'], "date"),
GetSQLValueString($_POST['sec_course_name'], "text"),
GetSQLValueString($_POST['sec_course_place'], "text"),
GetSQLValueString($_POST['sec_course_end'], "date"),
GetSQLValueString($_POST['third_course_name'], "text"),
GetSQLValueString($_POST['third_course_place'], "text"),   
GetSQLValueString($_POST['third_course_end'], "date"),
GetSQLValueString($_POST['fourth_course_name'], "text"),
GetSQLValueString($_POST['fourth_course_place'], "text"),
GetSQLValueString($_POST['fourth_course_end'], "end"),
GetSQLValueString($_POST['fifth_course_name'], "text"),
GetSQLValueString($_POST['fifth_course_place'], "text"),
GetSQLValueString($_POST['fifth_course_end'], "date"),
GetSQLValueString($_POST['first_unit_from'], "date"),
GetSQLValueString($_POST['first_unit_till'], "date"),
GetSQLValueString($_POST['first_unit_rank'], "text"),
GetSQLValueString($_POST['first_unit_post'], "text"),
GetSQLValueString($_POST['first_unit_unit'], "text"),
GetSQLValueString($_POST['sec_unit_from'], "date"),
GetSQLValueString($_POST['sec_unit_till'], "date"),
GetSQLValueString($_POST['sec_unit_rank'], "text"),
GetSQLValueString($_POST['sec_unit_post'], "text"),
GetSQLValueString($_POST['sec_unit_unit'], "text"),
GetSQLValueString($_POST['third_unit_from'], "date"),
GetSQLValueString($_POST['third_unit_till'], "date"),
GetSQLValueString($_POST['third_unit_rank'], "text"),
GetSQLValueString($_POST['third_unit_post'], "text"),
GetSQLValueString($_POST['third_unit_unit'], "text"),
GetSQLValueString($_POST['fourth_unit_from'], "date"),
GetSQLValueString($_POST['fourth_unit_till'], "date"),
GetSQLValueString($_POST['fourth_unit_rank'], "text"),
GetSQLValueString($_POST['fourth_unit_post'], "text"),
GetSQLValueString($_POST['fourth_unit_unit'], "text"),
GetSQLValueString($_POST['fifth_unit_from'], "date"),
GetSQLValueString($_POST['fifth_unit_till'], "date"),
GetSQLValueString($_POST['fifth_unit_rank'], "text"),
GetSQLValueString($_POST['fifth_unit_post'], "text"),
GetSQLValueString($_POST['fifth_unit_unit'], "text"),
GetSQLValueString($_POST['first_place_choose'], "text"),
GetSQLValueString($_POST['sec_place_choose'], "text"),
GetSQLValueString($_POST['sport'], "text"),
GetSQLValueString($_POST['hobby'], "text"),
GetSQLValueString($_POST['confirm_date'], "date"));
  
  echo $insertSQL;

  mysql_select_db($database_bio_db, $bio_db);
  $Result1 = mysql_query($insertSQL, $bio_db) or die(mysql_error());

  $insertGoTo = "test.txt";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
  <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">BUTIR-BUTIR PERIBADI</strong></td>
      <td colspan="6" bgcolor="#8F8F8F">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">NAMA KURSUS:</td>
      <td colspan="6"><input type="text" name="course_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">MULA KURSUS:</td>
      <td colspan="6"><input type="text" name="course_start" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">TAMAT KURSUS:</td>
      <td colspan="6"><input type="text" name="course_end" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">NO. TENTERA:</td>
      <td colspan="6"><input type="text" name="ic_no" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">PANGKAT:</td>
      <td colspan="6"><input type="text" name="rank" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">NAMA:</td>
      <td colspan="6"><input type="text" name="name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">UNIT ASAL:</td>
      <td colspan="6"><input type="text" name="unit_from" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">PASUKAN:</td>
      <td colspan="6"><input type="text" name="squadron" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">TARIKH MULA BERKHIDMAT:</td>
      <td colspan="6"><input type="text" name="service_start" value="" size="32" /></td>
    </tr>
   <tr valign="baseline">
      <td nowrap="nowrap" align="left">JENIS KHIDMAT:</td>
      <td colspan="6"><label for="select"></label>
        <select name="service_type" id="select">
          <option value="plh" selected="selected">PILIH</option>
          <option value="tigabelas">10+2+1</option>
          <option value="limabelas">15</option>
          <option value="lapanbelas">18</option>
          <option value="duapuluhsatu">21</option>
      </select></td>
    </tr>
   <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">TARIKH TAMAT PERKHIDMATAN:</td>
      <td colspan="6"><input type="text" name="service_end" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">TARIKH LAHIR:</td>
      <td colspan="6"><input type="text" name="birth_date" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">TARAF PERKAHWINAN:</td>
      <td colspan="6"><select name="marital_status" id="select4">
        <option value="pl" selected="selected">PILIH</option>
        <option value="bj">BUJANG</option>
        <option value="bk">BERKAHWIN</option>
        <option value="dd">DUDA</option>
        <option value="jd">JANDA</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">WARIS PERTAMA</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">NAMA:</td>
      <td colspan="6"><input type="text" name="first_parent_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">PERSAUDARAAN:</td>
      <td colspan="6"><input type="text" name="first_relate_type" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">ALAMAT:</td>
      <td colspan="6"><input type="text" name="first_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">TELEFON:</td>
      <td colspan="6"><input type="text" name="first_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">BALAI POLIS/KEM TENTERA TERHAMPIR DENGAN WARIS:</td>
      <td colspan="6"><input type="text" name="first_near_cop" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">WARIS KEDUA</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">NAMA:</td>
      <td colspan="6"><input type="text" name="sec_parent_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">PERSAUDARAAN:</td>
      <td colspan="6"><input type="text" name="sec_relate" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">ALAMAT:</td>
      <td colspan="6"><input type="text" name="sec_address" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">TELEFON:</td>
      <td colspan="6"><input type="text" name="sec_phone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">BALAI POLIS/KEM TENTERA TERHAMPIR DENGAN WARIS:</td>
      <td colspan="6"><input type="text" name="sec_near_cop" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">ANAK-ANAK DALAM TANGGUNGAN</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">BILANGAN:</td>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
      <td align="center">6</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">JANTINA:</td>
      <td><select name="first_sex" id="select5">
        <option selected="selected">PILIH</option>
        <option>LELAKI</option>
        <option>PEREMPUAN</option>
      </select></td>
      <td><select name="sec_sex" id="select6">
        <option selected="selected">PILIH</option>
        <option>LELAKI</option>
        <option>PEREMPUAN</option>
      </select></td>
      <td><select name="third_sex" id="select7">
        <option selected="selected">PILIH</option>
        <option>LELAKI</option>
        <option>PEREMPUAN</option>
      </select></td>
      <td><select name="fourth_sex" id="select8">
        <option selected="selected">PILIH</option>
        <option>LELAKI</option>
        <option>PEREMPUAN</option>
      </select></td>
      <td><select name="fifth_sex" id="select9">
        <option selected="selected">PILIH</option>
        <option>LELAKI</option>
        <option>PEREMPUAN</option>
      </select></td>
      <td><select name="sixth_sex" id="select10">
        <option selected="selected">PILIH</option>
        <option>LELAKI</option>
        <option>PEREMPUAN</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">UMUR:</td>
      <td><input type="text" name="first_age" value="" size="5" /></td>
      <td><input type="text" name="sec_age" value="" size="5" /></td>
      <td><input type="text" name="third_age" value="" size="5" /></td>
      <td><input type="text" name="forth_age" value="" size="5" /></td>
      <td><input type="text" name="fifth_age" value="" size="5" /></td>
      <td><input type="text" name="sixth_age" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">KELULUSAN AKADEMIK</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">SEKOLAH:</td>
      <td colspan="6"><input type="text" name="school" value="" size="32" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">KELULUSAN:</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">SRP</td>
      <td align="center">TAHUN: 
      <input type="text" name="old_srp_year" value="" size="5" /></td>
      <td align="center">GRED</td>
      <td align="center"><input type="text" name="first_srp_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="sec_srp_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="third_srp_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="fourth_srp_grade" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">SPM/SPVM</td>
      <td align="center">TAHUN: 
      <input type="text" name="old_spm_year" value="" size="5" /></td>
      <td align="center">GRED</td>
      <td align="center"><input type="text" name="first_spm_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="sec_spm_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="third_spm_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="forth_spm_grade" value="" size="5" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">STPM</td>
      <td align="center">TAHUN: 
      <input type="text" name="old_stpm_year" value="" size="5" /></td>
      <td align="center">GRED</td>
      <td align="center"><input type="text" name="first_stpm_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="sec_stpm_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="third_stpm_grade" value="" size="5" /></td>
      <td align="center"><input type="text" name="forth_stpm_grade" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">PERKARA</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td rowspan="2" align="left" nowrap="nowrap">SIJIL/TAHUN</td>
      <td colspan="2" align="center">SRP</td>
      <td colspan="2" align="center">SPM/SPMV</td>
      <td colspan="2" align="center">STPM</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" bgcolor="#D6D6D6">TAHUN: 
      <input type="text" name="new_srp_year" value="" size="5" /></td>
      <td colspan="2" align="center" bgcolor="#D6D6D6">TAHUN: 
      <input type="text" name="new_spm_year" value="" size="5" /></td>
      <td colspan="2" align="center" bgcolor="#D6D6D6">TAHUN: 
      <input type="text" name="new_stpm_year" value="" size="5" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">B.MALAYSIA:</td>
      <td colspan="2" align="center"><input type="text" name="bm_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="bm_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="bm_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">B.INGGERIS</td>
      <td colspan="2" align="center"><input type="text" name="bi_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="bi_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="bi_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">MATEMATIK</td>
      <td colspan="2" align="center"><input type="text" name="math_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="math_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="math_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">SAINS</td>
      <td colspan="2" align="center"><input type="text" name="sci_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="sci_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="sci_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">SEJARAH</td>
      <td colspan="2" align="center"><input type="text" name="hist_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="hist_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="hist_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">GEOGRAFI</td>
      <td colspan="2" align="center"><input type="text" name="geo_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="geo_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="geo_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">PENDIDIKAN ISLAM</td>
      <td colspan="2" align="center"><input type="text" name="pi_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="pi_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="pi_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">LUKISAN</td>
      <td colspan="2" align="center"><input type="text" name="draw_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="draw_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="draw_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">SASTERA</td>
      <td colspan="2" align="center"><input type="text" name="lite_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="lite_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="lite_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">EKONOMI</td>
      <td colspan="2" align="center"><input type="text" name="eco_srp" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="eco_spm" value="" size="5" /></td>
      <td colspan="2" align="center"><input type="text" name="eco_stpm" value="" size="5" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">BAHASA</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
   <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">BAHASA</td>
      <td colspan="3" align="center">TULISAN</td>
      <td colspan="3" align="center">LISAN</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">MALAYSIA</td>
      <td colspan="3" align="center"><select name="wri_bm" id="select11">
        <option selected="selected">PILIH</option>
        <option>BAIK</option>
        <option>MENCUKUPI</option>
        <option>SEDERHANA</option>
      </select></td>
      <td colspan="3" align="center"><select name="spe_bm" id="select13">
        <option selected="selected">PILIH</option>
        <option>FASIH</option>
        <option>MENCUKUPI</option>
        <option>LEMAH</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">INGGERIS</td>
      <td colspan="3" align="center"><select name="wri_eng" id="select12">
        <option selected="selected">PILIH</option>
        <option>BAIK</option>
        <option>MENCUKUPI</option>
        <option>SEDERHANA</option>
      </select></td>
      <td colspan="3" align="center"><select name="spe_eng" id="select14">
        <option selected="selected">PILIH</option>
        <option>FASIH</option>
        <option>MENCUKUPI</option>
        <option>LEMAH</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">INSURANS</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center">NO. INSURANS</td>
      <td colspan="2" align="center">NAMA INSURANS</td>
      <td colspan="2" align="center">JUMLAH UNIT/PERLINDUNGAN</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="first_ins_no" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="first_ins_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="first_unit_amount" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="sec_ins_no" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="sec_ins_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="sec_unit_amout" value="" size="10" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="third_ins_no" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="third_ins_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="third_ins_amount" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">PEKERJAAN (SEBELUM MEMASUKI TUDM)</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="3" align="center">JAWATAN</td>
      <td colspan="3" align="center">JABATAN/FIRMA</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="3" align="center"><input type="text" name="first_job_post" value="" size="32" /></td>
      <td colspan="3" align="center"><input type="text" name="first_job_dept" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="3" align="center"><input type="text" name="sec_job_post" value="" size="32" /></td>
      <td colspan="3" align="center"><input type="text" name="sec_job_dept" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">KURSUS YANG TELAH DIHADIRI</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center">KURSUS</td>
      <td colspan="2" align="center">TEMPAT</td>
      <td colspan="2" align="center">TARIKH TAMAT</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="first_course_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="first_course_place" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="first_course_end" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="sec_course_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="sec_course_place" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="sec_course_end" value="" size="10" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="third_course_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="third_course_place" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="third_course_end" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="fourth_course_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="fourth_course_place" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="fourth_course_end" value="" size="10" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      
      <td colspan="2" align="center"><input type="text" name="fifth_course_name" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="fifth_course_place" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="fifth_course_end" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">UNIT - UNIT BERKHIDMAT</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#D6D6D6">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td align="center">DARI</td>
      <td align="center">HINGGA</td>
      <td colspan="2" align="center">PANGKAT</td>
      <td align="center">JAWATAN</td>
      <td align="center">UNIT</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td align="center"><input type="text" name="first_unit_from" value="" size="10" /></td>
      <td align="center"><input type="text" name="first_unit_till" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="first_unit_rank" value="" size="10" /></td>
      <td align="center"><input type="text" name="first_unit_post" value="" size="10" /></td>
      <td align="center"><input type="text" name="first_unit_unit" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td align="center"><input type="text" name="sec_unit_from" value="" size="10" /></td>
      <td align="center"><input type="text" name="sec_unit_till" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="sec_unit_rank" value="" size="10" /></td>
      <td align="center"><input type="text" name="sec_unit_post" value="" size="10" /></td>
      <td align="center"><input type="text" name="sec_unit_unit" value="" size="10" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td align="center"><input type="text" name="third_unit_from" value="" size="10" /></td>
      <td align="center"><input type="text" name="third_unit_till" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="third_unit_rank" value="" size="10" /></td>
      <td align="center"><input type="text" name="third_unit_post" value="" size="10" /></td>
      <td align="center"><input type="text" name="third_unit_unit" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td align="center"><input type="text" name="fourth_unit_from" value="" size="10" /></td>
      <td align="center"><input type="text" name="fourth_unit_till" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="fourth_unit_rank" value="" size="10" /></td>
      <td align="center"><input type="text" name="fourth_unit_post" value="" size="10" /></td>
      <td align="center"><input type="text" name="fourth_unit_unit" value="" size="10" /></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td align="center"><input type="text" name="fifth_unit_from" value="" size="10" /></td>
      <td align="center"><input type="text" name="fifth_unit_till" value="" size="10" /></td>
      <td colspan="2" align="center"><input type="text" name="fifth_unit_rank" value="" size="10" /></td>
      <td align="center"><input type="text" name="fifth_unit_post" value="" size="10" /></td>
      <td align="center"><input type="text" name="fifth_unit_unit" value="" size="10" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#8F8F8F">
      <td align="left" nowrap="nowrap"><strong><font color="#FFFFFF">PILIHAN PERTUKARAN AKAN DATANG</strong></td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">PILIHAN PERTAMA:</td>
      <td colspan="6"><select name="first_place_choose" id="select2">
        <option selected="selected">PILIH</option>
        <option>TUDM GONG KEDAK</option>
        <option>SKN 321 BUKIT PETERI</option>
        <option>JATCC SUBANG/TUDM SUBANG</option>
        <option>TUDM ALOR STAR</option>
        <option>TUDM BUTTERWORTH</option>
        <option>SKN 322 BUKIT IBAM</option>
        <option>SKN 320 KUANTAN</option>
        <option>TUDM KLUANG</option>
        <option>TUDM KUALA LUMPUR</option>
        <option>TUDM KUANTAN</option>
        <option>TUDM KUCHING</option>
        <option>TUDM LABUAN</option>
        <option>SKN 310 BUTTERWORTH</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">PILIHAN KEDUA:</td>
      <td colspan="6"><select name="sec_place_choose" id="select3">
        <option selected="selected">PILIH</option>
        <option>TUDM GONG KEDAK</option>
        <option>SKN 321 BUKIT PETERI</option>
        <option>JATCC SUBANG/TUDM SUBANG</option>
        <option>TUDM ALOR STAR</option>
        <option>TUDM BUTTERWORTH</option>
        <option>SKN 322 BUKIT IBAM</option>
        <option>SKN 320 KUANTAN</option>
        <option>TUDM KLUANG</option>
        <option>TUDM KUALA LUMPUR</option>
        <option>TUDM KUANTAN</option>
        <option>TUDM KUCHING</option>
        <option>TUDM LABUAN</option>
        <option>SKN 310 BUTTERWORTH</option>
      </select></td>
    </tr>
    <tr valign="baseline" bgcolor="#BFCDDB">
      <td align="left" nowrap="nowrap">SUKAN:</td>
      <td colspan="6"><input type="text" name="sport" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">KEGEMARAN/HOBI:</td>
      <td colspan="6"><input type="text" name="hobby" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="left" nowrap="nowrap">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline" bgcolor="#FF0000">
      <td align="left" nowrap="nowrap"><font color="#FFFFFF">TARIKH: 
      <input type="text" name="confirm_date" value="" size="32" /></td>
      <td colspan="6"><font color="#FFFFFF">TANDATANGAN: 
      <input type="text" name="unit_from20" value="" size="32" /></td>
    </tr>   
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6"><input type="submit" value="Insert record" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">&nbsp;</td>
      <td colspan="6">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
