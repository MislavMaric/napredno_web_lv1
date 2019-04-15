<?php

include($_SERVER['DOCUMENT_ROOT'] . "/napr_web_lv1/simple_html_dom.php");
include($_SERVER['DOCUMENT_ROOT'] . "/napr_web_lv1/Diplomskiradovi.php");

for($i = 2; $i <= 6; $i++) {
    $url = "http://stup.ferit.hr/index.php/zavrsni-radovi/page/" . $i . "/";


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


    $result = curl_exec($ch);
    $dom_object = new simple_html_dom();
    $dom_object -> load($result);


    foreach($dom_object -> find('article') as $element){
        $naziv_rada = $element ->find('div.fusion-post-content.post-content a', 0) -> plaintext;
        $tekst_rada = $element ->find('div.fusion-post-content.post-content p', 0) -> plaintext;

        $link_rada = $element ->find('div.fusion-post-content.post-content a', 0) -> href;
        $oib_tvrtke = $element-> find('img', 0)-> src;

        $oibLength = strlen($oib_tvrtke);
        $startPosition = $oibLength - 15;
        $oib = substr($oib_tvrtke, $startPosition, 11);

        $dataObject = array("naziv_rada" => $naziv_rada, "tekst_rada"=> $tekst_rada, "link_rada" => $link_rada, "oib_tvrtke"=> $oib);
        $ListOfRadovi[] = new DiplomskiRadovi($dataObject);
        print_r($ListOfRadovi);
    }



}

echo ($result);
curl_close($ch);
?>






