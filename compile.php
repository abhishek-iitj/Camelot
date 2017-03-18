<?php
//$initial=A06;
$output=file_get_contents("output.txt");
$pieces = explode(" ", $output);
$initial=$pieces[0];
$final=$pieces[1];
//echo $initial, $final;

$board = file_get_contents("boardFile.txt");
echo $board;
$boardFile=explode(" ",$board);
//echo "\n"+$boardFile[6];

$ids=array(
	"A16", "B16", "C16", "D16", "E16", "F16", "G16", "H16", "I16", "J16", "K16", "L16", "A15", "B15", "C15", "D15", "E15", "F15", "G15", "H15", "I15", "J15", "K15", "L15", "A14", "B14", "C14", "D14", "E14", "F14", "G14", "H14", "I14", "J14", "K14", "L14", "A13", "B13", "C13", "D13", "E13", "F13", "G13", "H13", "I13", "J13", "K13", "L13", "A12", "B12", "C12", "D12", "E12", "F12", "G12", "H12", "I12", "J12", "K12", "L12", "A11", "B11", "C11", "D11", "E11", "F11", "G11", "H11", "I11", "J11", "K11", "L11", "A10", "B10", "C10", "D10", "E10", "F10", "G10", "H10", "I10", "J10", "K10", "L10", "A09", "B09", "C09", "D09", "E09", "F09", "G09", "H09", "I09", "J09", "K09", "L09", "A08", "B08", "C08", "D08", "E08", "F08", "G08", "H08", "I08", "J08", "K08", "L08", "A07", "B07", "C07", "D07", "E07", "F07", "G07", "H07", "I07", "J07", "K07", "L07", "A06", "B06", "C06", "D06", "E06", "F06", "G06", "H06", "I06", "J06", "K06", "L06", "A05", "B05", "C05", "D05", "E05", "F05", "G05", "H05", "I05", "J05", "K05", "L05", "A04", "B04", "C04", "D04", "E04", "F04", "G04", "H04", "I04", "J04", "K04", "L04", "A03", "B03", "C03", "D03", "E03", "F03", "G03", "H03", "I03", "J03", "K03", "L03", "A02", "B02", "C02", "D02", "E02", "F02", "G02", "H02", "I02", "J02", "K02", "L02", "A01", "B01", "C01", "D01", "E01", "F01", "G01", "H01", "I01", "J01", "K01", "L01");

function check($initial, $final, $ids, $boardFile){	
	if($initial==$final) return false;
	
	if (!(in_array($initial, $ids))) return false;

	if (!(in_array($final, $ids))) return false;

	for ($i=0; $i<count($boardFile)-1; $i++){
		$k=$boardFile[$i];
		//echo $k;
		$c=$k[0].$k[1].$k[2];

		//echo $c;
		if($c==$initial){
			//echo $board[$i];
			if ($k[3]=="U") return false;
			else if ($k[3]=="B" && $board[strlen($board)-1]=="1") return false;
			else if ($k[3]=="W" && $board[strlen($board)-1]=="0") return false;
		}
		if($c==$final){
			if($k[3]!="U") return false;
		}	
	}
	return true;

}
echo "\n";
echo "\n";
echo "\n";
if(check($initial, $final, $ids, $boardFile)==true) echo "\nTrue";
else echo "\nFalse";

?>