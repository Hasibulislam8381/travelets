<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label-custom">Name<span>*</span></label>
        <input type="text" class="form-control-custom" placeholder="Type full name">
    </div>
    <div class="col-md-6">
        <label class="form-label-custom">E-mail<span>*</span></label>
        <input type="email" class="form-control-custom" placeholder="Type email">
    </div>
    <div class="col-md-6">
        <label class="form-label-custom">Phone Number<span>*</span></label>
        <input type="tel" class="form-control-custom" placeholder="Type phone number">
    </div>
    <div class="col-md-6">
        <label class="form-label-custom">Date of Birth<span>*</span></label>
        <div class="input-icon-wrap">
            <input type="text" class="form-control-custom" placeholder="mm/dd/yyyy">
            <span class="icon"><i class="fa fa-calendar"></i></span>
        </div>
    </div>

    @if ($categoryType !== 'skill_training')
        <div class="col-md-6">
            <label class="form-label-custom">Adult/Baby<span>*</span></label>
            <div class="select-wrap">
                <select class="form-select-custom">
                    <option value="">Select Person</option>
                    <option>Adult</option>
                    <option>Baby</option>
                    <option>Child</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label-custom">NID/Birth certificate/Passport<span>*</span></label>
            <div class="input-icon-wrap">
                <input type="text" class="form-control-custom" placeholder="ID number">
                <span class="icon"><i class="fa fa-id-card"></i></span>
            </div>
        </div>
    @endif

    @if ($categoryType === 'souvenirs')
        <div class="col-md-6">
            <label class="form-label-custom">Quantity<span>*</span></label>
            <input type="number" class="form-control-custom" placeholder="1" min="1" value="1">
        </div>
        <div class="col-md-6">
            <label class="form-label-custom">Delivery Area<span>*</span></label>
            <div class="select-wrap">
                <select class="form-select-custom">
                    <option value="">Select Area</option>
                    <option>Inside Dhaka</option>
                    <option>Outside Dhaka</option>
                </select>
            </div>
        </div>
    @endif

    <div class="col-12">
        <label class="form-label-custom">Full Address<span>*</span></label>
        <input type="text" class="form-control-custom" placeholder="Type full address">
    </div>
    <div class="col-12">
        <label class="form-label-custom">Instruction</label>
        <textarea class="form-control-custom" rows="4" placeholder="Any special instructions" style="resize:none;"></textarea>
    </div>
</div>
