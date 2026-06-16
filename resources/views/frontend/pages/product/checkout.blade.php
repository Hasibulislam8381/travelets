@extends('frontend.layouts.app')
@section('title', 'Complete Your Booking - ' . $product->title)

@section('content')
    <div class="container-fluid checkout-page">

        <h1 class="page-title">Complete Your Booking</h1>

        <div class="row g-4">

            <!-- Left -->
            <div class="col-lg-8">

                <!-- Tour Info -->
                <div class="tour-info-card">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <div class="tour-info-title">{{ $product->title }}</div>
                            @if ($product->location)
                                <div class="tour-info-meta">
                                    <i class="fa fa-map-marker-alt"></i> {{ $product->location }}
                                </div>
                            @endif
                            @if (!empty($product->meta['duration']))
                                <div class="tour-info-meta">
                                    <i class="fa fa-calendar"></i> {{ $product->meta['duration'] }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-column gap-1 text-end">
                            @if (!empty($product->meta['duration']))
                                <div class="tour-info-right">
                                    <i class="fa fa-clock"></i> {{ $product->meta['duration'] }}
                                </div>
                            @endif
                            @if (!empty($product->meta['group_size']))
                                <div class="tour-info-right">
                                    <i class="fa fa-users"></i> {{ $product->meta['group_size'] }}
                                </div>
                            @endif
                            @if ($product->badge)
                                <span class="product-badge-inline">{{ $product->badge }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Traveler / Booking Form -->
                <div class="traveler-card">

                    @php $categoryType = $product->category->type; @endphp

                    <div class="traveler-card-title">
                        @if ($categoryType === 'womens_journey')
                            Traveler Information
                        @elseif($categoryType === 'skill_training')
                            Registration Information
                        @elseif($categoryType === 'souvenirs')
                            Order Information
                        @else
                            Booking Information
                        @endif
                    </div>

                    <div id="travelers-container">
                        <div class="traveler-block" data-index="1">
                            <div class="traveler-number">
                                @if ($categoryType === 'souvenirs')
                                    Customer 1
                                @elseif($categoryType === 'skill_training')
                                    Participant 1
                                @else
                                    Traveler 1
                                @endif
                            </div>
                            @include('frontend.pages.partials.checkout-fields', [
                                'categoryType' => $categoryType,
                                'product' => $product,
                                'index' => 1,
                            ])
                        </div>
                    </div>

                    @if ($categoryType !== 'souvenirs')
                        <hr class="traveler-divider mt-4">
                        <button class="btn-add-traveler" onclick="addTraveler()">
                            @if ($categoryType === 'skill_training')
                                Add Participant <i class="fa fa-plus"></i>
                            @else
                                Add Traveler <i class="fa fa-plus"></i>
                            @endif
                        </button>
                    @endif

                </div>
            </div>

            <!-- Right: Summary -->
            <div class="col-lg-4">
                <div class="summary-card">
                    <div class="summary-title">
                        @if ($categoryType === 'souvenirs')
                            Order Summary
                        @elseif($categoryType === 'skill_training')
                            Registration Summary
                        @else
                            Booking Summary
                        @endif
                    </div>

                    <div class="summary-row" id="person-row">
                        <span><i class="fa fa-user"></i>
                            @if ($categoryType === 'souvenirs')
                                Items x 1
                            @elseif($categoryType === 'skill_training')
                                Participants x 1
                            @else
                                Adults x 1
                            @endif
                        </span>
                        <span id="person-price">৳{{ number_format($product->price) }}</span>
                    </div>

                    <hr style="border-color:var(--border);margin:12px 0;">

                    <label class="form-label-custom mb-2">Promo Code</label>
                    <div class="promo-wrap">
                        <input type="text" class="promo-input" id="promoInput" placeholder="Enter promo code">
                        <button class="btn-apply" onclick="applyPromo()">Apply</button>
                    </div>
                    <div id="promo-message" style="font-size:12px;margin-top:4px;"></div>

                    <hr style="border-color:var(--border);margin:12px 0;">

                    <div class="summary-row">
                        <span id="count-label">1 person</span>
                        <span id="subtotal-val">৳{{ number_format($product->price) }}</span>
                    </div>
                    <div class="summary-row" id="discount-row" style="display:none;">
                        <span>Discount</span>
                        <span id="discount-val" style="color:#2d8a4e;">-৳0</span>
                    </div>
                    <div class="summary-row total">
                        <span>
                            @if ($categoryType === 'souvenirs')
                                Order Total
                            @elseif($categoryType === 'skill_training')
                                Registration Total
                            @else
                                Package Total
                            @endif
                        </span>
                        <span id="total-val">৳{{ number_format($product->price) }}</span>
                    </div>

                    <div class="refund-notice mt-3">
                        <i class="fa fa-info-circle"></i>
                        @if ($categoryType === 'souvenirs')
                            Orders are non-refundable after dispatch
                        @else
                            Booking money is non-refundable
                        @endif
                    </div>

                    <div class="terms-check">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            I accept the <a href="#">Refund Policy</a> &amp;
                            <a href="#">Terms &amp; Conditions</a>
                        </label>
                    </div>

                    <button class="btn-book-now" id="bookBtn" onclick="submitBooking()">
                        @if ($categoryType === 'souvenirs')
                            Buy Now - Pay ৳{{ number_format($product->price) }}
                        @elseif($categoryType === 'skill_training')
                            Register Now - Pay ৳{{ number_format($product->price) }}
                        @else
                            Book Now - Pay ৳{{ number_format($product->price) }}
                        @endif
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script>
        const basePrice = {{ $product->price }};
        const categoryType = '{{ $product->category->type }}';
        let travelerCount = 1;
        let discountAmount = 0;

        function getLabel() {
            if (categoryType === 'souvenirs') return 'Item';
            if (categoryType === 'skill_training') return 'Participant';
            return 'Traveler';
        }

        function getActionLabel() {
            if (categoryType === 'souvenirs') return 'Buy Now';
            if (categoryType === 'skill_training') return 'Register Now';
            return 'Book Now';
        }

        function updateSummary() {
            const count = document.querySelectorAll('.traveler-block').length;
            const subtotal = count * basePrice;
            const total = subtotal - discountAmount;

            document.getElementById('person-row').querySelector('span:first-child').innerHTML =
                `<i class="fa fa-user"></i> ${getLabel()}s x ${count}`;
            document.getElementById('person-price').textContent = '৳' + subtotal.toLocaleString();
            document.getElementById('count-label').textContent = `${count} person`;
            document.getElementById('subtotal-val').textContent = '৳' + subtotal.toLocaleString();
            document.getElementById('total-val').textContent = '৳' + Math.max(0, total).toLocaleString();
            document.getElementById('bookBtn').textContent =
                `${getActionLabel()} - Pay ৳${Math.max(0, total).toLocaleString()}`;
        }

        function addTraveler() {
            travelerCount++;
            const container = document.getElementById('travelers-container');
            const block = document.createElement('div');
            block.className = 'traveler-block';
            block.dataset.index = travelerCount;
            block.innerHTML = `
            <hr class="traveler-divider">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="traveler-number mb-0">${getLabel()} ${travelerCount}</div>
                <button class="btn-remove-traveler" onclick="removeTraveler(this)">
                    <i class="fa fa-times"></i> Remove
                </button>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label-custom">Name<span style="color:var(--orange)">*</span></label>
                    <input type="text" class="form-control-custom" placeholder="Type full name">
                </div>
                <div class="col-md-6">
                    <label class="form-label-custom">E-mail<span style="color:var(--orange)">*</span></label>
                    <input type="email" class="form-control-custom" placeholder="Type email">
                </div>
                <div class="col-md-6">
                    <label class="form-label-custom">Phone Number<span style="color:var(--orange)">*</span></label>
                    <input type="tel" class="form-control-custom" placeholder="Type phone number">
                </div>
                <div class="col-md-6">
                    <label class="form-label-custom">Date of Birth<span style="color:var(--orange)">*</span></label>
                    <input type="text" class="form-control-custom" placeholder="mm/dd/yyyy">
                </div>
                ${categoryType !== 'skill_training' ? `
                                    <div class="col-md-6">
                                        <label class="form-label-custom">Adult/Baby<span style="color:var(--orange)">*</span></label>
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
                                        <label class="form-label-custom">NID/Passport<span style="color:var(--orange)">*</span></label>
                                        <input type="text" class="form-control-custom" placeholder="ID number">
                                    </div>` : ''}
                <div class="col-12">
                    <label class="form-label-custom">Full Address<span style="color:var(--orange)">*</span></label>
                    <input type="text" class="form-control-custom" placeholder="Type full address">
                </div>
                <div class="col-12">
                    <label class="form-label-custom">Instruction</label>
                    <textarea class="form-control-custom" rows="3" placeholder="Any special instructions" style="resize:none;"></textarea>
                </div>
            </div>
        `;
            container.appendChild(block);
            updateSummary();
        }

        function removeTraveler(btn) {
            btn.closest('.traveler-block').remove();
            travelerCount--;
            updateSummary();
        }

        function applyPromo() {
            const code = document.getElementById('promoInput').value.trim().toUpperCase();
            const msg = document.getElementById('promo-message');
            const row = document.getElementById('discount-row');

            if (code === 'VROMON10') {
                discountAmount = basePrice * 0.10 * travelerCount;
                msg.style.color = '#2d8a4e';
                msg.textContent = '✓ 10% discount applied!';
                row.style.display = 'flex';
                document.getElementById('discount-val').textContent =
                    '-৳' + discountAmount.toLocaleString();
            } else if (code === '') {
                msg.textContent = '';
            } else {
                discountAmount = 0;
                msg.style.color = '#c0392b';
                msg.textContent = '✗ Invalid promo code.';
                row.style.display = 'none';
            }
            updateSummary();
        }

        function submitBooking() {
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                alert('Please accept the Terms & Conditions to proceed.');
                return;
            }
            alert('Booking submitted! (Implement payment gateway here)');
        }
    </script>
@endsection
