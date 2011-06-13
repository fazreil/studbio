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
  $insertSQL = sprintf("INSERT INTO bio_main (course_name, course_start, course_end, ic_no, rank, name, unit_from) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['course_name'], "text"),
                       GetSQLValueString($_POST['course_start'], "text"),
                       GetSQLValueString($_POST['course_end'], "text"),
                       GetSQLValueString($_POST['ic_no'], "int"),
                       GetSQLValueString($_POST['rank'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['unit_from'], "text"));

  mysql_select_db($database_bio_db, $bio_db);
  $Result1 = mysql_query($insertSQL, $bio_db) or die(mysql_error());

  $insertGoTo = "test.txt";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO bio_main (course_name) VALUES (%s)",
                       GetSQLValueString($_POST['course_name'], "text"));
					   

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
<p align="center"><strong>PUSAT  LATIHAN KAWAL KOMUNIKASI DAN LAPOR</strong><br />
  <strong>TENTERA  UDARA DIRAJA MALAYSIA</strong></p>
<p align="center"> <img src="login_clip_image002_0000.jpg" alt="" width="204" height="216" /><br clear="all" />
</p>
<p align="center"><strong>BUTIR  BUTIR PERIBADI</strong><br />
  <strong>(AHLI  UDARA)</strong></p>
<p align=""><strong>NAMA  KURSUS</strong><strong>: </strong>
  <label for="textfield"></label>
  <input type="text" name="textfield" id="textfield" />
</p>
<p align=""><strong>MULA  KURSUS: </strong> 
  <input type="text" name="textfield2" id="textfield2" />
</p>
<p align=""><strong>TAMAT  KURSUS </strong><strong>: </strong>
  <input type="text" name="textfield3" id="textfield3" />
</p>
<p align=""><strong>NO. TENTERA : </strong> 
  <input type="text" name="textfield4" id="textfield4" />
</p>
<p align=""><strong>PANGKAT   : </strong> 
  <input type="text" name="textfield5" id="textfield5" />
</p>
<p align=""><strong>NAMA : </strong> 
  <input type="text" name="textfield6" id="textfield6" />
</p>
<p align=""><strong>UNIT  ASAL: </strong> 
  <input type="text" name="textfield7" id="textfield7" />
</p>
<p align="">&nbsp;</p>
<p align="">&nbsp;</p>
<p align="">&nbsp;</p>
<p><strong><em>BUTIR-BUTIR PERIBADI – LLP</em></strong></p>
<p>No  Tentera: 
  <input type="text" name="textfield8" id="textfield8" />	
				   Pasukan:  
				   <input type="text" name="textfield9" id="textfield9" />
</p>
<p>Pangkat: 
  
  <label for="select"></label>
  <select name="select" id="select">
  </select>
</p>
<p>Nama:
  <input type="text" name="textfield11" id="textfield11" />
</p>
<p>Tarikh  Masuk Berkhidmat: 
  <input type="text" name="textfield12" id="textfield12" />
</p>
<p> Jenis  Khidmat:
  
  <label for="select2"></label>
  <select name="select2" id="select2">
  </select>
</p>
<p>Tarikh  Tamat Perkhidmatan:
  <input type="text" name="textfield14" id="textfield14" />
</p>
<p>Tarikh  Lahir : 
  <input type="text" name="textfield15" id="textfield15" />
</p>
<p>Taraf  Perkahwinan:
  <label for="select3"></label>
  <select name="select3" id="select3">
  </select>
</p>
<p>&nbsp;</p>
<p>Waris  Pertama</p>
<p>Nama:
  <input type="text" name="textfield10" id="textfield10" />
</p>
<p>Persaudaraan:
  <input type="text" name="textfield13" id="textfield13" />
</p>
<p>Alamat:
  <input type="text" name="textfield16" id="textfield16" />
</p>
<p>Telefon :
  <input type="text" name="textfield17" id="textfield17" />
</p>
<p>Balai Polis/Kem Tentera terhampir dengan  waris:
  <input type="text" name="textfield18" id="textfield18" />
</p>
<p>&nbsp;</p>
<p>Waris Kedua:</p>
<p>Nama:
  <input type="text" name="textfield19" id="textfield19" />
</p>
<p>Persaudaraan: 
  <input type="text" name="textfield20" id="textfield20" />
</p>
<p>Alamat: 
  <input type="text" name="textfield21" id="textfield21" />
                                                </p>
<p>Telefon : 
  <input type="text" name="textfield22" id="textfield22" />
</p>
<p>Balai Polis/Kem Tentera terhampir dengan  waris: 
  <input type="text" name="textfield23" id="textfield23" />
</p>
<p>&nbsp;</p>
<p>Anak-anak dalam tanggungan</p>
<table width="390" border="1">
  <tr>
    <td width="74">Bilangan</td>
    <td width="45">1</td>
    <td width="45">2</td>
    <td width="45">3</td>
    <td width="45">4</td>
    <td width="45">5</td>
    <td width="45">6</td>
  </tr>
  <tr>
    <td>Jantina</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Umur</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>Kelulusan  Akedemik</p>
<p>Sekolah:</p>
<p>Kelulusan :
  <label for="select4"></label>
  <select name="select4" id="select4">
  </select> 
  Tahun: 
  <label for="select5"></label>
  <select name="select5" id="select5">
  </select> 
  Gred:
  <input type="text" name="textfield24" id="textfield24" />
</p>
<p>Kelulusan :
  <label for="select4"></label>
  <select name="select6" id="select4">
  </select>
Tahun:
<label for="select5"></label>
<select name="select6" id="select5">
</select>
 
  Gred:
  <input type="text" name="textfield25" id="textfield25" />
</p>
<p>Kelulusan :
  <label for="select4"></label>
  <select name="select7" id="select4">
  </select>
Tahun:
<label for="select5"></label>
<select name="select7" id="select5">
</select>
 
  Gred:
  <input type="text" name="textfield26" id="textfield26" />
</p>
<table width="630" border="1">
  <tr>
    <td>SUBJEK</td>
    <td>PMR</td>
    <td>SPM</td>
    <td>STPM</td>
  </tr>
  <tr>
    <td>Bahasa Malaysia</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Bahasa Inggeris</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Matematik</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Sains</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Sejarah</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Geografi</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Pendidikan Islam</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>Bahasa Pengantaraan</p>
<p>Bahasa
  <label for="select6"></label>
  <select name="select8" id="select6">
  </select>
  Penulisan
  <label for="select7"></label>
  <select name="select9" id="select7">
  </select> 
  Lisan
  <label for="select8"></label>
  <select name="select10" id="select8">
  </select>
</p>
<p>Bahasa
  <label for="select6"></label>
  <select name="select11" id="select6">
  </select>
Penulisan
<label for="select7"></label>
<select name="select11" id="select7">
</select>
Lisan
<label for="select8"></label>
<select name="select11" id="select8">
</select>
</p>
<p>Bahasa
  <label for="select6"></label>
  <select name="select12" id="select6">
  </select>
Penulisan
<label for="select7"></label>
<select name="select12" id="select7">
</select>
Lisan
<label for="select8"></label>
<select name="select12" id="select8">
</select>
</p>
<p>&nbsp;</p>
<p>Insurans</p>
<p>No Insurans:
  <label for="textfield27"></label>
  <input type="text" name="textfield27" id="textfield27" />
  Nama:
  <input type="text" name="textfield28" id="textfield28" />
  Jumlah: 
  <input type="text" name="textfield29" id="textfield29" />
</p>
<p>&nbsp;</p>
<p>Pekerjaan Sebelum Memasuki TUDM</p>
<p>Jawatan
  <input type="text" name="textfield30" id="textfield30" />
Jabatan
<input type="text" name="textfield31" id="textfield31" />
</p>
<p>Jawatan
  <input type="text" name="textfield32" id="textfield32" />
Jabatan
<input type="text" name="textfield32" id="textfield33" />
</p>
<p>Jawatan
  <input type="text" name="textfield33" id="textfield34" />
Jabatan
<input type="text" name="textfield33" id="textfield35" />
</p>
<p>&nbsp;</p>
<p>Kursus Yang Telah Dihadiri</p>
<p>Kursus
  <input type="text" name="textfield34" id="textfield36" />
  Tempat 
  <input type="text" name="textfield35" id="textfield37" />
  Tarikh 
  
  Tamat
  <input type="text" name="textfield37" id="textfield39" />
</p>
<p>Kursus
  <input type="text" name="textfield36" id="textfield38" />
Tempat
<input type="text" name="textfield36" id="textfield40" />
Tarikh 
  
  Tamat
<input type="text" name="textfield36" id="textfield41" />
</p>
<p>Kursus
  <input type="text" name="textfield38" id="textfield42" />
Tempat
<input type="text" name="textfield38" id="textfield43" />
Tarikh 
  
  Tamat
<input type="text" name="textfield38" id="textfield44" />
</p>
<p>Kursus
  <input type="text" name="textfield39" id="textfield45" />
Tempat
<input type="text" name="textfield39" id="textfield46" />
Tarikh 
  
  Tamat
<input type="text" name="textfield39" id="textfield47" />
</p>
<p>&nbsp;</p>
<p>Unit-unit berkhidmat:</p>
<table width="711" border="1">
  <tr>
    <td width="117">Dari</td>
    <td width="117">Hingga</td>
    <td width="137">Pangkat</td>
    <td width="142">Jawatan </td>
    <td width="164">Unit </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>Pilihan  pertukaran akan datang (pangkah 2 tempat sahaja)</p>
<p>Pilihan Pertama
  <label for="select9"></label>
  <select name="select13" id="select9">
  </select>
 Pilihan Kedua
  <label for="select9"></label>
  <select name="select14" id="select9">
  </select>
</p>
<p>&nbsp;</p>
<p>Sukan
  <label for="select10"></label>
  <select name="select16" id="select11">
  </select>
  <select name="select15" id="select10">
  </select>
  <select name="select17" id="select12">
  </select>
</p>
<p>&nbsp;</p>
<p>Kegemaran/hobi:
  <input type="text" name="textfield40" id="textfield48" />
</p>
<p>&nbsp;</p>
<p>Tarikh:  _______________________                                   Tandatangan:  ______________________</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Keputusan  Ujian:</p>
<table width="584" border="1">
  <tr>
    <td>Jenis Ujian</td>
    <td>Perkara</td>
    <td>Tarikh</td>
    <td>Keputusan</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="747" border="1">
  <tr>
    <td colspan="2">Tarikh</td>
    <td rowspan="2">Sebab</td>
    <td rowspan="2">Jumlah Hari Tidak Hadir</td>
  </tr>
  <tr>
    <td>Dari</td>
    <td>Hingga</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="584" border="1">
  <tr>
    <td>Tarikh</td>
    <td>Kejadian/Ulasan</td>
    <td>Jurulatih</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>Catatan  Penyelia Kursus:</p>
<p>&nbsp;</p>
<p>Tarikh:  __________________                                 Tandatangan: _____________________</p>
<p>&nbsp;</p>
<p>Catatan Oleh Ketua Sekolah:</p>
<p>&nbsp;</p>
<p>Tarikh:  __________________                                 Tandatangan: _____________________</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">TEMUDUGA  RASMI</p>
<p>&nbsp;</p>
<p>Tarikh:_________________</p>
<p>&nbsp;</p>
<p>...............................................................................................................................................................</p>
<p>................................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Catatan  Oleh Penyelia Kursus:</p>
<p>...............................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>Tandatangan: _____________________</p>
<p>Jawatan:  _________________________</p>
<p>&nbsp;</p>
<p>Catatan  Oleh Ketua Sekolah:</p>
<p>...............................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>Tandatangan: _____________________</p>
<p>Jawatan:  _________________________</p>
<p>&nbsp;</p>
<p>KESELURUHAN PERTUGASAN
  <select name="select18" id="select13">
  </select>
</p>
<p>&nbsp;</p>
<p>Unit disokong untuk bertugas
  <select name="select19" id="select14">
  </select>
</p>
<p>&nbsp;</p>
<p>Catatan</p>
<p>...............................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>...............................................................................................................................................................</p>
<p>&nbsp;</p>
<p>Tandatangan Ketua Sekolah:____________________
  <label for="select13"></label>
</p>
<p>Ditukarkan ke unit: ___________________________</p>
<p>Tarikh Pertukaran: ___________________________</p>
<p align="">&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NAMA KURSUS:</td>
      <td><input type="text" name="course_name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">MULA KURSUS:</td>
      <td><input type="text" name="course_start" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TAMAT KURSUS:</td>
      <td><input type="text" name="course_end" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NO. TENTERA:</td>
      <td><input type="text" name="ic_no" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">PANGKAT:</td>
      <td><input type="text" name="rank" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NAMA:</td>
      <td><input type="text" name="name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">UNIT ASAL:</td>
      <td><input type="text" name="unit_from" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
