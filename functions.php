<?php
function checkisbn13($isbn_13){
	$isbn_13 = trim($isbn_13);
	if(strlen($isbn_13)==13){
		return true;
	}
//	else if($isbn_13=""){
//		return 
//	}
	else{
		return false;
	}
}
function checkisbn10($isbn_10){
	$isbn_10 = trim($isbn_10);
	if(strlen($isbn_10)==10){
		return true;
	}
	else{
		return false;
	}
}
function isbn13to10($isbn_13) {
/*
ISBN 13 TO ISBN 10 
isbn 13 check - will do later
*/
//first nine letters of isbn 10
$temp_isbn_10 = substr($isbn_13,3,9);
//string of first 9 letters of isbn 10 coverted to array objects
$temp_array = str_split($temp_isbn_10, 1);
//check digit (last digit in ISBN 10) calculation. Link : https://en.wikipedia.org/wiki/International_Standard_Book_Number#ISBN-13_check_digit_calculation
$temp_calc = 10*$temp_array[0]+9*$temp_array[1]+8*$temp_array[2]+7*$temp_array[3]+6*$temp_array[4]+5*$temp_array[5]+4*$temp_array[6]+3*$temp_array[7]+2*$temp_array[8];
$check_digit = (11-($temp_calc%11))%11;
if($check_digit==10){$check_digit=X;}
// isbn 10 
$isbn_10 = $temp_isbn_10.$check_digit;
// return
return $isbn_10;
}
function isbn10to13($isbn_10) {
/*
ISBN 10 TO ISBN 13 
isbn 10 check - will do later
*/
//first twelve letters of isbn 13
$temp_isbn_13 = "978".substr($isbn_10,0,9);
//string of first 12 letters of isbn 13 coverted to array objects
$temp_array = str_split($temp_isbn_13, 1);
//check digit (last digit in ISBN 13) calculation. Link : https://en.wikipedia.org/wiki/International_Standard_Book_Number#ISBN-13_check_digit_calculation
$temp_calc = 1*$temp_array[0]+3*$temp_array[1]+1*$temp_array[2]+3*$temp_array[3]+1*$temp_array[4]+3*$temp_array[5]+1*$temp_array[6]+3*$temp_array[7]+1*$temp_array[8]+3*$temp_array[9]+1*$temp_array[10]+3*$temp_array[11];
$check_digit = 10-($temp_calc%10);
if($check_digit==10){$check_digit=0;}
// isbn 13
$isbn_13 = $temp_isbn_13.$check_digit;
// return
return $isbn_13;
}
?>
