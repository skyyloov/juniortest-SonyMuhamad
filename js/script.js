
function isNumberKey(evt) {
  let charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31
    && (charCode < 48 || charCode > 57)) {
    $("#massage").html("Please, provide the data of indicated type").show().fadeOut("slow");
    return false;
  }
  return true;
}
let events = [];
events[0] = [`  <div class="mb-3 row">
<label for="height" class="col-sm-4 col-form-label">Height</label>
<div class="col-sm-5">
    <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)"  required oninvalid="this.setCustomValidity('Please provide height')" oninput="setCustomValidity('')" name="height" class="form-control" id="height">
    
  </div>
</div>
<div class="mb-3 row">
<label for="width" class="col-sm-4 col-form-label">Width</label>
<div class="col-sm-5">
    <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)"  required oninvalid="this.setCustomValidity('Please provide width')" oninput="setCustomValidity('')" name="width" class="form-control" id="width">
    
  </div>
</div>
<div class="mb-3 row">
<label for="lenght" class="col-sm-4 col-form-label">Lenght</label>
<div class="col-sm-5">
    <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)"  required oninvalid="this.setCustomValidity('Please provide lenght')" oninput="setCustomValidity('')" name="lenght" class="form-control" id="lenght">
    
  </div>
</div><br><span>Please, provide dimension</span>`];
events[1] = [`  <div class="mb-3 row">
<label for="weight" class="col-sm-4 col-form-label">Weight</label>
<div class="col-sm-5">
    <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)"  required oninvalid="this.setCustomValidity('Please provide weight')" oninput="setCustomValidity('')" name="weight" class="form-control" id="weight">
    
  </div>
</div><br><span>Please, provide weight</span>
`];
events[2] = [`  <div class="mb-3 row">
<label for="size" class="col-sm-4 col-form-label">Size</label>
<div class="col-sm-5">
    <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)"  required oninvalid="this.setCustomValidity('Please provide size')" oninput="setCustomValidity('')" name="size" class="form-control" id="size">
    
  </div><br><span>Please, provide size</span>
</div>
`];
events[3] = [`<span>Please select product type</span>`];

$('#productType').on('change', function () {
  $('#description').html((events[$('#productType option:selected').attr("data-id")][0]));

});

