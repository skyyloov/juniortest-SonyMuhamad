<?php 

namespace App\Controllers\Stuff;
use app\Controllers\stuff\Stuff;
use app\Core\Controller;

class Disk extends Controller Implements Stuff
{
    protected $model;
    protected $description;
    protected $data;
    
    public function __construct()
    {
        $this->model = $this->model('DiskModel');
    }

    public function getAllProducts($sku,$data,$i)
    {
        $this->data = $data;
        $this->description = implode(',',$this->model->getDisk($sku));

        $this->description = "Size: ".$this->description." MB";
        $this->data['product'][$i][2] = $this->data['product'][$i][2];
        $this->data['product'][$i][] = $this->description;
        
        return $this->data;
    }

    public function addProduct($data)
    {
        $this->data = $data;
        $this->model->saveProduct($this->data);
    }

    public function deleteStuff($data)
    {
        $this->data = $data;
        $this->model->deleteStuff($this->data);
    }

}