<?php 

// ======= i decided to create an model class in the models folder ======================= //
// ========= if there are additional model, i can put it inside models folder and using namespace App\Models ========= //

namespace App\Models;

use app\Core\Database;

class StuffModel extends Database
{
    private $table = 'stuff';
    private $db;
    private $query;
    private $sku;
    private $productType;
    private $price;
    private $name;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getStuff()
    {
        //get All Stuff (Product)

        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultNum();
    }

    public function saveStuff($data)
    {
        //save stuff (product)

        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->productType = $data['productType'];

        $this->query = "INSERT INTO stuff VALUES(:sku,:name,:price,:type)";
        
        $this->db->query($this->query);
        $this->db->bind('sku',$this->sku);
        $this->db->bind('name',$this->name);
        $this->db->bind('price',$this->price);
        $this->db->bind('type',$this->productType);
        
        $this->db->exec();

        return true;
    }

    public function getSingleStuff($sku)
    {
        //get one stuff (product)

        $this->sku = $sku;
        
        $this->db->query("SELECT * FROM $this->table WHERE sku=:sku");
        $this->db->bind('sku',$this->sku);

        return $this->db->resultSingleNum();

    }

    public function deleteStuff($sku)
    {
        // you know what it is :$

        $this->sku = $sku;
        
        $this->query = "DELETE FROM $this->table WHERE sku =:sku";
        $this->db->query($this->query);
        $this->db->bind('sku',$this->sku);
        $this->db->exec();

        return true;
    }
    
    public function checkRowStuff($sku)
    {
        $this->sku = $sku;

         $this->db->query("SELECT * FROM $this->table WHERE sku=:sku");
        $this->db->bind('sku',$this->sku);

        return $this->db->resultAll();

    }
    
}