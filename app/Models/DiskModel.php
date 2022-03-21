<?php 
namespace App\Models;

use app\Core\Database;

class DiskModel extends Database
{
    private $table = 'disk_type';
    private $db;
    private $sku;
    private $query;
    private $size;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDisk($sku)
    {
        $this->sku = $sku;

        $this->db->query("SELECT size_stuff FROM $this->table WHERE sku=:sku");
        $this->db->bind('sku',$this->sku);
        
        return $this->db->resultSingleNum();
    }

    public function saveProduct($data)
    {
        $this->sku = $data['sku'];
        $this->size = $data['size'];

        $this->query = "INSERT INTO $this->table VALUES(:sku,:size_stuff)";
        $this->db->query($this->query);
        $this->db->bind('sku',$this->sku);
        $this->db->bind('size_stuff',$this->size);
        
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