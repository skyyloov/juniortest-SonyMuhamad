<?php 

// This class is used to configure your database and base url.
// Note : there is manual configuration for local directory for bootstraps and javascript,,  please replace it with your own directory so that the javascript function on the addproduct page and index can run

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