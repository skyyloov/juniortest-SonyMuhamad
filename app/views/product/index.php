<!--    cheerss!!!  -->

<div class="container mt-5">
    <div class="row">
        <div class="col">
  <form action="<?= $data['baseurl']; ?>product/deleteproduct" method="POST">
        <div class="card">
  <div class="card-header">
   <Label style="font-size:30px;">Product List</Label>
  <button id="delete-product-btn" type="submit"  style="float:right" class="btn btn-xs mx-4" element="MASS DELETE">MASS DELETE</button>
  <a href="<?= $data['baseurl']; ?>product/addproduct"  style="float:right" class="btn btn-xs mx-4" element="ADD">ADD</a>
  </div>
  <div class="card-body">
    <div class="row">

            <?php foreach($data['product'] as $a): ?>
                <div class="col-md-4">
            <div class="card mb-3" style="width: 18rem;">
            <div class="form-check">
  <input class="delete-checkbox" name="delete-checkbox[]" type="checkbox" value="<?= $a[0]; ?>">
</div>
                <div class="card-body">
                    <h5 style="text-align:center"class="card-title"><?= $a[0]; ?></h5>
                    <ul class="list-group">
  <li class="list-group-item"><?= $a[1]; ?></li>
  <li class="list-group-item">Price: <?=number_format((float)$a[2],2,'.','').' $'; ?></li>
  <li class="list-group-item"><?= $a[4]; ?></li>

</ul>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>
       
</form>
        

        </div>
    </div>
</div>