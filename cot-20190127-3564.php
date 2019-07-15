<!DOCTYPE html>
<html>
<?php
require_once __DIR__ . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
if (isset($_GET["id"])) {
	$quotation = $quotationDao->findById($_GET["id"]);
}
?>

<head>
	<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
	<meta name=ProgId content=Excel.Sheet>
	<meta name=Generator content="Microsoft Excel 15">
	<link rel=File-List href="base_archivos/filelist.xml">
	<style id="base_2996_Styles">
		{
			mso-displayed-decimal-separator: "\.";
			mso-displayed-thousand-separator: "\,";
		}

		.font52996 {
			color: black;
			font-size: 12.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
		}

		.xl152996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: bottom;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl652996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: bottom;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-bottom: none;
			border-left: .5pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl662996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: bottom;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl672996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			background: #92D050;
			mso-pattern: black none;
			white-space: nowrap;
		}

		.xl682996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: middle;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl692996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: middle;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: normal;
		}

		.xl702996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: bottom;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-bottom: none;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl712996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			background: #92D050;
			mso-pattern: black none;
			white-space: nowrap;
		}

		.xl722996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: middle;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl732996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: "\0022$\0022\\ \#\,\#\#0\;\[Red\]\\-\0022$\0022\\ \#\,\#\#0";
			text-align: general;
			vertical-align: middle;
			border-top: none;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl742996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: general;
			vertical-align: middle;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: normal;
		}

		.xl752996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: left;
			vertical-align: middle;
			border-top: none;
			border-right: .5pt solid windowtext;
			border-left: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: normal;
		}

		.xl762996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl772996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: .5pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl782996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: .5pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl792996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl802996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl812996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl822996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl832996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: 1.0pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl842996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: 1.0pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl852996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 7.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: 1.0pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl862996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl872996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl882996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: none;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl892996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl902996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 12.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl912996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 12.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl922996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 12.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl932996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 12.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl942996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 18.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl952996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 18.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl962996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 18.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: 1.0pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl972996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 18.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: 1.0pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl982996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 18.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: 1.0pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl992996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 18.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: 1.0pt solid windowtext;
			border-bottom: 1.0pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1002996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1012996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1022996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1032996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1042996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1052996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1062996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			background: #92D050;
			mso-pattern: black none;
			white-space: nowrap;
		}

		.xl1072996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 9.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1082996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 9.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1092996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 9.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1102996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 9.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: 1.0pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1112996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 9.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1122996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 9.0pt;
			font-weight: 700;
			font-style: normal;
			text-decoration: none;
			font-family: Arial, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: middle;
			border-top: none;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1132996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: .5pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: normal;
		}

		.xl1142996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: .5pt solid windowtext;
			border-right: none;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: normal;
		}

		.xl1152996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: .5pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: .5pt solid windowtext;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: normal;
		}

		.xl1162996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: none;
			border-right: none;
			border-bottom: none;
			border-left: .5pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1172996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: none;
			border-right: .5pt solid black;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1182996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: .5pt solid windowtext;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1192996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: 1.0pt solid windowtext;
			border-right: none;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1202996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: 1.0pt solid windowtext;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1212996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}

		.xl1222996 {
			padding: 0px;
			mso-ignore: padding;
			color: black;
			font-size: 11.0pt;
			font-weight: 400;
			font-style: normal;
			text-decoration: none;
			font-family: Calibri, sans-serif;
			mso-font-charset: 0;
			mso-number-format: General;
			text-align: center;
			vertical-align: bottom;
			border-top: none;
			border-right: 1.0pt solid windowtext;
			border-bottom: none;
			border-left: none;
			mso-background-source: auto;
			mso-pattern: auto;
			white-space: nowrap;
		}
	</style>
</head>

<body>
	<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
	<!--La siguiente informaci&oacute;n se gener&oacute; mediante el Asistente para publicar como
p&aacute;gina web de Microsoft Excel.-->
	<!--Si se vuelve a publicar el mismo elemento desde Excel, se reemplazar&aacute; toda
la informaci&oacute;n comprendida entre las etiquetas DIV.-->
	<!----------------------------->
	<!--INICIO DE LOS RESULTADOS DEL ASISTENTE PARA PUBLICAR COMO P&Aacute;GINA WEB DE
EXCEL -->
	<!----------------------------->

	<div id="base_2996" align=center x:publishsource="Excel">

		<table border=0 cellpadding=0 cellspacing=0 width=586 style='border-collapse:
 collapse;table-layout:fixed;width:441pt'>
			<col width=78 style='mso-width-source:userset;mso-width-alt:2852;width:59pt'>
			<col width=108 style='mso-width-source:userset;mso-width-alt:3949;width:81pt'>
			<col width=85 style='mso-width-source:userset;mso-width-alt:3108;width:64pt'>
			<col width=77 style='mso-width-source:userset;mso-width-alt:2816;width:58pt'>
			<col width=86 style='mso-width-source:userset;mso-width-alt:3145;width:65pt'>
			<col width=76 span=2 style='mso-width-source:userset;mso-width-alt:2779;
 width:57pt'>
			<tr height=64 style='mso-height-source:userset;height:48.0pt'>
				<td colspan=3 rowspan=2 height=84 width=271 style='height:63.0pt;width:204pt' align=left valign=top>
					<span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:10px;margin-top:7px;width:247px;
  height:76px'><img width=247 height=76 src="http://greenpack.com.co/wp-content/themes/greenpack/images/logo-greenpack.png" alt="http://greenpack.com.co/wp-content/themes/greenpack/images/logo-greenpack.png" v:shapes="Picture_x0020_1"></span>
					<![endif]><span style='mso-ignore:vglayout2'>
						<table cellpadding=0 cellspacing=0>
							<tr>
								<td colspan=3 rowspan=2 height=84 class=xl862996 width=271 style='height:63.0pt;width:204pt'>&nbsp;</td>
							</tr>
						</table>
					</span></td>
				<td colspan=4 rowspan=2 class=xl902996 width=315 style='border-right:1.0pt solid black;
  width:237pt'>Cotizacion No.<font class="font52996">2701192258</font>
				</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
			</tr>
			<tr height=21 style='mso-height-source:userset;height:15.75pt'>
				<td colspan=7 rowspan=2 height=41 class=xl942996 style='border-right:1.0pt solid black;
  border-bottom:1.0pt solid black;height:30.75pt'>Datos Cotizaci&oacute;n</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td height=20 class=xl702996 style='height:15.0pt;border-top: 1.0pt solid windowtext;'>Nombre:</td>
				<td colspan=2 class=xl1162996 style='border-top: 1.0pt solid windowtext;border-right:.5pt solid black;
  border-left:none'>Maria</td>
				<td class=xl652996 style='border-left:none;border-top: 1.0pt solid windowtext;'>Apellido:</td>
				<td colspan=3 class=xl1182996 style='border-right:1.0pt solid black;
  border-left:none'>Diaz</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td height=20 class=xl702996 style='height:15.0pt'>Empresa:</td>
				<td colspan=2 class=xl1162996 style='border-right:.5pt solid black;
  border-left:none'>Ninguna</td>
				<td class=xl652996 style='border-left:none'>Email:</td>
				<td colspan=3 class=xl1162996 style='border-right:1.0pt solid black;
  border-left:none'>mariadiazlopera@gmail.com</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td height=20 class=xl702996 style='height:15.0pt'>Ciudad:</td>
				<td colspan=2 class=xl1162996 style='border-right:.5pt solid black;
  border-left:none'>Cartagena</td>
				<td class=xl652996 style='border-left:none'>Direcci&oacute;n:</td>
				<td colspan=3 class=xl1162996 style='border-right:1.0pt solid black;
  border-left:none'>Escallon Villa Calle 30G #55-36</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td height=20 class=xl702996 style='height:15.0pt'>Tel&eacute;fono:</td>
				<td colspan=2 class=xl1162996 style='border-right:.5pt solid black;
  border-left:none'>000000</td>
				<td class=xl652996 style='border-left:none'>Celular:</td>
				<td colspan=3 class=xl1162996 style='border-right:1.0pt solid black;
  border-left:none'>3152248875</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td colspan=7 rowspan=2 height=40 class=xl1002996 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;height:30.0pt'>&iexcl;Cordial Saludo! Con agrado nos
					permitimos entregarle la siguiente cotizaci&oacute;n</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
			</tr>
			<tr class="xl662996" height="20" style="mso-height-source:userset;height:15.0pt">
				<td colspan="2" height="20" class="xl1062996" style="border-right:.5pt solid black; height:15.0pt">
					Producto</td>
				<td class="xl672996" style="border-top: .5pt solid windowtext;">Comprar</td>
				<td class="xl672996" style="border-top: .5pt solid windowtext;">Material</td>
				<td class="xl672996" style="border-top: .5pt solid windowtext;">Medidas</td>
				<td class="xl672996" style="border-top: .5pt solid windowtext;">Cantidad</td>
				<td class="xl712996" style="border-top: .5pt solid windowtext;">$UNIDAD</td>
			</tr>
			<?php foreach ($quotation->getItems() as $item) { ?>
				<!-- producto inidividual -->
				<tr style="mso-height-source:userset;">
					<td align="left" valign="top" style="border-right: .5pt solid windowtext;
    		border-left: .5pt solid windowtext;border-bottom: .5pt solid windowtext;height:64px;"><span style="mso-ignore:vglayout;
  		z-index:2;margin-left:6px;margin-top:26px;width:70px;
  		height:51px"><img width="70" height="51" src="<?php echo $item->getProduct()->getImages()[0]->getUrl() ?>" alt="<?php echo $item->getProduct()->getImages()[0]->getUrl() ?>" v:shapes="Picture_x0020_2"></span></td>
					<td class="xl752996" width="108" style="width:81pt"><?php echo $item->getProduct()->getRef() ?></td>
					<td class="xl682996">Al detal</td>
					<td class="xl692996" width="77" style="width:58pt"><?php echo $item->getMaterial()->getName() ?></td>
					<td class="xl682996"><?php echo $item->getMeasurement()->getWidth(); ?>*<?php echo $item->getMeasurement()->getHeight() ?>*<?php echo $item->getMeasurement()->getLength() ?></td>
					<td class="xl742996" width="76" style="width:57pt"><?php echo $item->getQuantity() ?></td>
					<td class="xl732996" align="right">$ <?php echo $item->getPrice() ?></td>
				</tr>
				<!-- producto individual -->
			<?php } ?>

			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td colspan=7 rowspan=2 height=40 class=xl1072996 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black;height:30.0pt'>CONDICIONES COMERCIALES</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td colspan=2 height=20 class=xl762996 style='border-right:.5pt solid black;
  height:15.0pt'>FORMA DE PAGO</td>
				<td colspan=5 class=xl782996 style='border-right:1.0pt solid black;
  border-left:none'>50% contra pedido - 50% contra facturacion para entrega</td>
			</tr>
			<tr height=39 style='mso-height-source:userset;height:29.25pt'>
				<td colspan=2 height=39 class=xl762996 style='border-right:.5pt solid black;
  height:29.25pt'>TIEMPOS DE ENTREGA</td>
				<td colspan=5 class=xl1132996 width=400 style='border-right:1.0pt solid black;
  border-left:none;width:301pt'>15 DIAS HABILES DESPUES DE APROBACION MUESTRAS
					PARA IMPRESOS Y 8 DIAS PARA GENERICOS</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td colspan=2 height=20 class=xl762996 style='border-right:.5pt solid black;
  height:15.0pt'>VALIDEZ DE LA OFERTA</td>
				<td colspan=5 class=xl782996 style='border-right:1.0pt solid black;
  border-left:none'>3 meses</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td colspan=7 height=20 class=xl762996 style='border-right:1.0pt solid black;
  height:15.0pt'>PARA PRODUCTO IMPRESO EN EL PRIMER PEDIDO SE COBRARA EL VALOR
					DE LOS FOTOPOLIMEROS</td>
			</tr>
			<tr height=20 style='mso-height-source:userset;height:15.0pt'>
				<td colspan=7 height=20 class=xl832996 style='border-right:1.0pt solid black;
  height:15.0pt'>el precio no incluye IVA ni fletes fuera del perimetro Urbano.</td>
			</tr>
			<![if supportMisalignedColumns]>
			<tr height=0 style='display:none'>
				<td width=78 style='width:59pt'></td>
				<td width=108 style='width:81pt'></td>
				<td width=85 style='width:64pt'></td>
				<td width=77 style='width:58pt'></td>
				<td width=86 style='width:65pt'></td>
				<td width=76 style='width:57pt'></td>
				<td width=76 style='width:57pt'></td>
			</tr>
			<![endif]>
		</table>

	</div>


	<!----------------------------->
	<!--FINAL DE LOS RESULTADOS DEL ASISTENTE PARA PUBLICAR COMO P&Aacute;GINA WEB DE
EXCEL-->
	<!----------------------------->
</body>

</html>