<?php 

// === i decide to use interface class for my code which is similiar to abstract class and to handle polymorphism provision (Class Book , Class Disk for DVD, Class Furniture) === ///

// =========== i am still learning... ========== //

namespace App\Controllers\Stuff;

Interface Stuff
{
    public function getAllProducts($sku,$data,$i);
    public function addProduct($data);
    public function deleteStuff($data);

}
