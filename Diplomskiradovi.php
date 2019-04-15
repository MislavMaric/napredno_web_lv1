<?php 

interface iRadovi {
    public function create($data);
    public function save();
    public function reda();
}

class DiplomskiRadovi implements iRadovi {
    var $naziv_rada;
    var $tekst_rada;
    var $link_rada;
    var $oib_tvrtke;

    function create($data) {}
    function save() {}
    function reda() {}


    function __construct($data) {
        $this-> naziv_rada =$data['naziv_rada'];
        $this-> tekst_rada =$data['tekst_rada'];
        $this-> link_rada =$data['link_rada'];
        $this-> oib_tvrtke =$data['oib_tvrtke'];
    }
}