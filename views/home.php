<?php
$data = $address->data();
?>

<div class="bg-light vh-100">
  <div class="container">
    <div class="row">
      <div class="mt-5 col-sm-6 mx-auto">
        <div class="bg-white rounded p-3 shadow">
          <h5 class="text-dark">Address Validator</h5>
          <h6 class="text-secondary">Validate/Standardizes addresses using USPS</h6>
          <hr />

          <div class="form-group">
            <label for="address_line_1" class="text-secondary">Address Line 1</label>
            <input type="text" class="form-control" id="address_line_1" placeholder="Enter address line 1">
          </div>

          <div class="form-group">
            <label for="address_line_2" class="text-secondary">Address Line 2</label>
            <input type="text" class="form-control" id="address_line_2" placeholder="Enter address line 2">
          </div>

          <div class="form-group">
            <label for="city" class="text-secondary">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter city">
          </div>

          <div class="form-group">
            <label for="state" class="text-secondary">State</label>
            <select class="form-control" id="state">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>

          <div class="form-group">
            <label for="zipcode" class="text-secondary">Zip Code</label>
            <input type="text" class="form-control" id="zipcode" placeholder="Enter Zip Code">
          </div>

          <button type="button" onclick="addressSubmit()" class="btn btn-primary d-flex mx-auto shadow-sm">VALIDATE</button>
        </div>
      </div>
    </div>
  </div>
</div>
