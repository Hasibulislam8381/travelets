<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label-custom">Name<span style="color:var(--orange)">*</span></label>
        <input type="text" name="travelers[{{ $index }}][name]" class="form-control-custom"
            placeholder="Type full name" required>
    </div>
    <div class="col-md-6">
        <label class="form-label-custom">E-mail<span style="color:var(--orange)">*</span></label>
        <input type="email" name="travelers[{{ $index }}][email]" class="form-control-custom"
            placeholder="Type email" required>
    </div>
    <div class="col-md-6">
        <label class="form-label-custom">Phone Number<span style="color:var(--orange)">*</span></label>
        <input type="tel" name="travelers[{{ $index }}][phone]" class="form-control-custom"
            placeholder="Type phone number" required>
    </div>
    <div class="col-md-6">
        <label class="form-label-custom">Date of Birth<span style="color:var(--orange)">*</span></label>
        <input type="text" name="travelers[{{ $index }}][dob]" class="form-control-custom"
            placeholder="mm/dd/yyyy">
    </div>

    @if ($categoryType !== 'skill_training')
        <div class="col-md-6">
            <label class="form-label-custom">Adult/Baby<span style="color:var(--orange)">*</span></label>
            <div class="select-wrap">
                <select name="travelers[{{ $index }}][type]" class="form-select-custom">
                    <option value="">Select Person</option>
                    <option value="Adult">Adult</option>
                    <option value="Baby">Baby</option>
                    <option value="Child">Child</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label-custom">NID/Passport<span style="color:var(--orange)">*</span></label>
            <input type="text" name="travelers[{{ $index }}][nid]" class="form-control-custom"
                placeholder="ID number">
        </div>
    @endif

    <div class="col-12">
        <label class="form-label-custom">Full Address<span style="color:var(--orange)">*</span></label>
        <input type="text" name="travelers[{{ $index }}][address]" class="form-control-custom"
            placeholder="Type full address">
    </div>
    <div class="col-12">
        <label class="form-label-custom">Instruction</label>
        <textarea name="travelers[{{ $index }}][instruction]" class="form-control-custom" rows="3"
            placeholder="Any special instructions" style="resize:none;"></textarea>
    </div>
</div>
