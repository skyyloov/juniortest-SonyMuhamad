<?php 

namespace App\Controllers\Stuff;
use app\Controllers\stuff\Stuff;
use app\Core\Controller;

class Book extends Controller Implements Stuff
{
    protected $model;
    protected $description;
    protected $data;

    public function __construct()
    {
        $this->model = $this->model('BookModel');
    }

    public function getAllProducts($sku,$data,$i)
    {
        $this->data = $data;
        $this->description = implode(',',$this->model->getBook($sku));

        $this->description = "Weight: ".$this->description." KG";
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