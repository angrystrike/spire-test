<?php
$states = require_once 'states_list.php';
?>

<div class="bg-light vh-100">
  <div class="container">
    <div class="row">
      <div class="mt-5 col-sm-6 mx-auto">
        <div class="bg-white rounded p-3 shadow">
          <h5 class="text-dark">Address Validator</h5>
          <h6 class="text-secondary">Validate / Standardizes addresses using USPS</h6>
          <hr />

          <div class="form-group">
            <label for="address_line_1" class="text-secondary">Address Line 1</label>
            <input type="text" class="form-control" required id="address_line_1" placeholder="Enter address line 1">
          </div>

          <div class="form-group">
            <label for="address_line_2" class="text-secondary">Address Line 2</label>
            <input type="text" class="form-control" id="address_line_2" placeholder="Enter address line 2">
          </div>

          <div class="form-group">
            <label for="city" class="text-secondary">City</label>
            <input type="text" required class="form-control" id="city" placeholder="Enter city">
          </div>

          <div class="form-group">
            <label for="state" class="text-secondary">State</label>
            <select class="form-control" required id="state">
              <?php foreach ($states as $state): ?>
                  <option value="<?= $state ?>"> <?= $state ?> </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="zipcode" class="text-secondary">Zip Code</label>
            <input type="text" class="form-control" id="zipcode" required placeholder="Enter Zip Code">
          </div>

          <button 
            type="submit"
            onclick="addressSubmit()"
            class="btn btn-primary d-flex mx-auto shadow-sm"
          >
            VALIDATE
          </button>

          <div id="error-message" class="mt-3 alert alert-danger d-none" role="alert">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
