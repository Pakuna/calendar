<?php

function getFYear($sYear) {
    $sReturn = "";
    for ($iMonth = 1; $iMonth <= 12; $iMonth++) {
        $sReturn .= "<li>";
        $sReturn .= getFMonth($sYear . "-" . str_pad($iMonth, 2, "0", STR_PAD_LEFT));
        $sReturn .= "</li>";
    }
    return $sReturn;
}

function getFMonth($sMonth) {
    $oNow = new DateTime();
    $oDate = new DateTime($sMonth);
    $oDate->modify("first day of this month");

    $sClass = strtolower($oDate->format("M"));
    $sReturn = "<ul class='month' data-month='{$sClass}'>";
    $sReturn .= str_repeat("<li></li>", $oDate->format("N") - 1);

    for ($iDay = 1; $iDay <= $oDate->format("t"); $iDay++) {
        $sDay = str_pad($iDay, 2, "0", STR_PAD_LEFT);
        $sPast = $sMonth . "-" . $sDay < date("Y-m-d") ? "past" : "";
        $sReturn .= "<li class='{$sPast}'>{$iDay}</li>";
    }

    $sReturn .= "</ul>";

    return $sReturn;
}