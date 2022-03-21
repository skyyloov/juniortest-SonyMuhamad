<?php 

namespace App\Config;

class Config 
{
    protected const DB_HOST = '';
    protected const DB_USER = '';
    protected const DB_PASS = '';
    protected const DB_NAME = '';
    public const BASEURL = 'https://scmganding.site/juniortest-sony/';  

    public function __construct()
    {
        $this->DB_HOST = 'localhost';
        $this->DB_USER = 'n1775814_sony';
        $this->DB_PASS = '918256ccd741';
        $this->DB_NAME = 'n1775814_ganding';
        $this->BASEURL = 'https://scmganding.site/juniortest-sony/'; 

    }
}