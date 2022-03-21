<?php 

// ============== this class (Product) is the endpoints of the product logic ======================= //

// ======= i decided to create an interface and implementation class in the stuff folder ,
// fyi:stuff folder is inside controllers folder ==========//

// ======== if there are additional endpoints, i can put it inside controllers folder not in the stuff folder and using namespace App\Controllers; === //

// thankyou for checking my code :)) //

// ========================================= peace be upon you all ========================================= //

namespace App\Controllers;

use app\Core\Controller;

class Product extends Controller
{   
    protected $model;
    protected $baseUrl;
    protected $dataProduct;
    protected $skuProduct;
    protected $implementsController;
    protected $instanceClass;
    protected $productType;
    protected $checkRow;

    public function __construct()
    {
        $this->model = $this->model('StuffModel');
        $this->baseUrl = new Controller;
    }
    
  

    public function indexProduct()
    {
      
        $this->dataProduct['product'] = $this->model->getStuff();
        $countData = count($this->dataProduct['product']);

        for ($i=0; $i<$countData ; $i++) {
            $this->productType = $this->dataProduct['product'][$i][3];
            $this->skuProduct = $this->dataProduct['product'][$i][0];
            
            $this->implementsController = "app\\Controllers\\stuff\\".$this->productType;
            
            $this->instanceClass = New $this->implementsController;
            $this->dataProduct = $this->instanceClass->getAllProducts($this->skuProduct,$this->dataProduct,$i);   
        }
        $this->dataProduct['baseurl']=$this->baseUrl->configBaseUrl;
        $this->dataProduct['title']='Home | Product List';
        


        $this->view('templates/header',$this->dataProduct);
        $this->view('product/index',$this->dataProduct);
        $this->view('templates/footer');

    }


    public function addProduct()
    {
        $this->data['title']='Product Add';
        $this->data['baseurl']=$this->baseUrl->configBaseUrl;
        $this->view('templates/header',$this->data);
        $this->view('product/addproduct',$this->data);
        $this->view('templates/footer');
    }


    public function deleteProduct()
    {
        $this->dataProduct = $_POST;
   
        $countArray = count($this->dataProduct); 
        for ($k=0; $k < $countArray ; $k++) { 
            $countData = count($this->dataProduct['delete-checkbox']);
            
        for ($i=0; $i < $countData ; $i++) { 

            $stuff[] = $this->model->getSingleStuff($this->dataProduct['delete-checkbox'][$i]);
            $this->productType[] = $stuff[$i][3];

            $this->model->deleteStuff($this->dataProduct['delete-checkbox'][$i]);
        }
        for ($j=0; $j < $countData ; $j++) { 
            
            $this->implementsController = "app\\Controllers\\stuff\\".$this->productType[$j];
        

            $this->instanceClass = New $this->implementsController;
            $this->instanceClass->deleteStuff($this->dataProduct['delete-checkbox'][$j]);
        }

        }
       
        header('Location: '.$this->baseUrl->configBaseUrl);

    }

    public function saveProduct()
    {
        $this->dataProduct = $_POST;
        $this->skuProduct = $this->dataProduct['sku'];
        $this->checkRow = $this->model->checkRowStuff($this->skuProduct); 
        $countRow = count($this->checkRow);

        for ($k=0; $k<$countRow; $k++) { 
            header('Location: '.$this->baseUrl->configBaseUrl); 
        }
        
        $this->model->saveStuff($this->dataProduct);

        $this->implementsController = "app\\Controllers\\stuff\\".$this->dataProduct['productType'];

        $this->instanceClass = New $this->implementsController;
        $this->instanceClass->addProduct($this->dataProduct);

        header('Location: '.$this->baseUrl->configBaseUrl);
    }

}
