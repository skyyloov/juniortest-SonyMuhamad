<?php 

namespace App\Controllers\Stuff;
use app\Controllers\stuff\Stuff;
use app\Core\Controller;

class Furniture extends Controller Implements Stuff
{
    protected $model;
    protected $description;
    protected $data;

    public function __construct()
    {
        $this->model = $this->model('FurnitureModel');
    }
    

    public function getAllProducts($sku,$data,$i)
    {
        $this->data = $data;
        $this->description = implode('x',$this->model->getFurniture($sku));

        $this->description = "Dimension: ".$this->description."";
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