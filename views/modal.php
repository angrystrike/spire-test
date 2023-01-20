<div class="modal fade" id="checkAddressModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Save Address</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Which address format do you want to save?</p>
        <ul class="modal-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
              ORIGINAL
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
              STANDARDIZED (USPS)
            </a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <textarea class="form-control bg-white font-monospace" id="originalAddress" rows="5" readonly></textarea>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <textarea class="form-control bg-white font-monospace" id="modifiedAddress" rows="5" readonly>321</textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="saveAddress()" class="btn btn-primary shadow-sm">Save</button>
      </div>
    </div>
  </div>
</div>