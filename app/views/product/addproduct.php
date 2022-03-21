
<div class="container mt-5">


<form action="<?= $data['baseurl']; ?>product/saveproduct" method="POST" id="product_form">

        <div class="card">

  <div class="card-header">
   <Label style="font-size:30px;">Product Add</Label>
    <a href="<?= $data['baseurl']; ?>" style="float:right" class="btn d-inline btn-xs btn-secondary mx-3">Cancel</a>
    <button type="submit" style="float:right" class="btn d-inline btn-xs btn-secondary">Save</button>
  </div>

  <div class="card-body">

    
      <div class="mb-3 row">
          <label for="sku" class="col-sm-2 col-form-label">SKU</label>
          <div class="col-sm-4">
              <input type="text" autocomplete="off" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="setCustomValidity('')" name="sku" class="form-control" id="sku">
            </div>
        </div>

      <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-4">
              <input type="text" autocomplete="off" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="setCustomValidity('')" name="name" class="form-control" id="name">
            </div>
        </div>

      <div class="mb-3 row">
          <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
          <div class="col-sm-4">
              <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="setCustomValidity('')" name="price" class="form-control" id="price">
            </div>
        </div>

      <div class="mb-3 row">
          <label for="price" class="col-sm-2 col-form-label">Type Switcher</label>
          <div class="col-sm-4">
              <select name="productType" required oninvalid="this.setCustomValidity('Please, submit required data')" oninput="setCustomValidity('')" id="productType">
                  <option value="" data-id="3" id="none"></option>
                  <option value="Disk" data-id="2" id="DVD">DVD</option>
                  <option value="Furniture" data-id="0" id="Furniture">Furniture</option>
                  <option value="Book" data-id="1" id="Book">Book</option>
              </select>
            </div>
        </div>

    <div class="mb-3 mx-3 row">
        <div class="card" id="" style="width: 26rem;">
            <div class="card-body" id="description">
            <span>Please select product type</span>
             </div>
        </div>
    </div>

  
   <span style="text-align:center;" id="massage"></span>

    

</div>

</div>
</form>


        
</div>
