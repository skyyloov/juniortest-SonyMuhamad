<?php 
namespace App\Models;

use app\Core\Database;

class BookModel extends Database
{
    private $table = 'book_type';
    private $db;
    private $query;
    private $sku;
    private $weight;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBook($sku)
    {
        $this->sku = $sku;
        $this->db->query("SELECT weight_stuff FROM $this->table WHERE sku=:sku");
        $this->db->bind('sku',$this->sku);

        return $this->db->resultSingleNum();
    }

    public function saveProduct($data)
    {
        $this->sku = $data['sku'];
        $this->weight = $data['weight'];

        $this->query = "INSERT INTO $this->table VALUES(:sku,:weight_stuff)";

        $this->db->query($this->query);
        $this->db->bind('sku',$this->sku);
        $this->db->bind('weight_stuff',$this->weight);
        
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