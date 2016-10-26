<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Functional extends \Codeception\Module
{
    public function seeArray($array)
    {
        $array = json_decode(json_encode($array));
        $res_json = $this->getModule('Laravel5')->_getResponseContent();
        $res_array = json_decode($res_json);
        $this->assertEquals($res_array, $array);
    }
}
