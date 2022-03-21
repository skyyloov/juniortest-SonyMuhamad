<?php
namespace App\Models;

use app\Core\Database;

class FurnitureModel extends Database
{
    private $table = 'furniture_type';
    private $db;
    private $query;
    private $height;
    private $width;
    private $lenght;
    private $sku;
    
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getFurniture($sku)
    {
        $this->sku = $sku;

        $this->db->query("SELECT height_stuff,width_stuff,lenght_stuff FROM $this->table WHERE sku=:sku");
        $this->db->bind('sku',$this->sku);
        return $this->db->resultSingleNum();
    }

    public function saveProduct($data)
    {
        $this->sku = $data['sku'];
        $this->height = $data['height'];
        $this->width = $data['width'];
        $this->lenght = $data['lenght'];

        $this->query = "INSERT INTO $this->table VALUES(:sku,:height_stuff,:width_stuff,:lenght_stuff)";
        
        $this->db->query($this->query);

        $this->db->bind('sku',$this->sku);
        $this->db->bind('height_stuff',$this->height);
        $this->db->bind('width_stuff',$this->width);
        $this->db->bind('lenght_stuff',$this->lenght);
        
        $this->db->exec();

        return true;
    }

    public function deleteStuff($sku)
    {   
        $this->sku = $sku;

        $this->query = "DELETE FROM $this->table WHERE sku =:sku";
        $this->db->query($this->query);
        $this->db->bind('sku',$this->sku);
        $this->db->exec();

        return true;
    }

}
