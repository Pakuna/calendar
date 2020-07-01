<?php

$iYear = (int) ($_GET["y"] ?? date("Y"));
$iMonth = @$_GET["m"];
$sMonthName = "";

if ($iMonth) {
    $oActiveDate = DateTime::createFromFormat("Y-m", $iYear . "-" . $iMonth);
    $sMonthName = $oActiveDate->format("F");
}

function getMonthString($iYear, $iMonth) {
    return $iYear . "-" . str_pad($iMonth, 2, "0", STR_PAD_LEFT);
}

function getFYear($iYear) {
    $sReturn = "<ul class='year'>";
    for ($iMonth = 1; $iMonth <= 12; $iMonth++) {
        $sReturn .= "<li onclick='return openMonth({$iYear}, {$iMonth})'>";
        $sReturn .= getFMonth(getMonthString($iYear, $iMonth));
        $sReturn .= "</li>";
    }
    return $sReturn . "</ul>";
}

function getFMonth($sMonth) {
    $oNow = new DateTime();
    $oDate = new DateTime($sMonth);
    $oDate->modify("first day of this month");

    $sDataMonth = $oDate->format("F");
    $sReturn = "<ul class='month' data-month='{$sDataMonth}'>";
    $sReturn .= str_repeat("<li></li>", $oDate->format("N") - 1);

    for ($iDay = 1; $iDay <= $oDate->format("t"); $iDay++) {
        $sDay = str_pad($iDay, 2, "0", STR_PAD_LEFT);
        $sDate = $sMonth . "-" . $sDay;

        $sPast = $sDate < date("Y-m-d") ? "past" : "";
        $sToday = $sDate == date("Y-m-d") ? "today" : "";

        $sReturn .= "<li class='{$sPast} {$sToday}'>{$iDay}</li>";
    }

    $sReturn .= "</ul>";

    return $sReturn;
}

function getPrevLink() {
    global $iYear, $iMonth;

    if ($iMonth) {
        global $oActiveDate;
        $oDate = clone $oActiveDate;
        $oDate->modify("-1 month");
        return "?y=" . $oDate->format("Y") . "&m=" . $oDate->format("n");
    }

    return "?y=" . ($iYear - 1);
}

function getNextLink() {
    global $iYear, $iMonth;

    if ($iMonth) {
        global $oActiveDate;
        $oDate = clone $oActiveDate;
        $oDate->modify("+1 month");
        return "?y=" . $oDate->format("Y") . "&m=" . $oDate->format("n");
    }

    return "?y=" . ($iYear + 1);
}