<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\BookingRepository;
use App\Services\SslCommerzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function __construct(
        protected SslCommerzService $sslService,
        protected BookingRepository $bookingRepo,
    ) {
    }

    public function checkout(Product $product)
    {
        // Login না থাকলে login page এ পাঠাও
        if (!Auth::check()) {
            return redirect()->route('user.login')
                ->with('error', 'Please login to book this package.');
        }

        return view('frontend.pages.checkout', compact('product'));
    }

    public function initiatePayment(Request $request, Product $product)
    {

        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $request->validate([
            'travelers'   => 'required|array|min:1',
            'travelers.*.name'  => 'required|string',
            'travelers.*.email' => 'required|email',
            'travelers.*.phone' => 'required|string',
        ]);

        $user      = Auth::user();
        $quantity  = count($request->travelers);
        $subtotal  = $product->price * $quantity;

        // Promo code check
        $discount  = 0;
        $promoCode = null;
        if ($request->promo_code === 'VROMON10') {
            $discount  = $subtotal * 0.10;
            $promoCode = $request->promo_code;
        }

        $total  = $subtotal - $discount;
        $tranId = 'TXN-' . strtoupper(Str::random(12));

        // Booking create (pending)
        $booking = $this->bookingRepo->create([
            'user_id'    => $user->id,
            'product_id' => $product->id,
            'tran_id'    => $tranId,
            'amount'     => $total,
            'quantity'   => $quantity,
            'travelers'  => $request->travelers,
            'promo_code' => $promoCode,
            'discount'   => $discount,
            'status'     => 'pending',
        ]);

        // SSLCommerz initiate
        $response = $this->sslService->initiatePayment([
            'amount'           => $total,
            'tran_id'          => $tranId,
            'customer_name'    => $user->name,
            'customer_email'   => $user->email,
            'customer_phone'   => $user->phone ?? '01700000000',
            'customer_address' => $user->address ?? 'N/A',
            'product_name'     => $product->title,
            'product_category' => $product->category->type ?? 'General',
            'quantity'         => $quantity,
        ]);

        if (isset($response['GatewayPageURL'])) {
            return redirect()->away($response['GatewayPageURL']);
        }

        return back()->with('error', 'Payment gateway error. Please try again.');
    }

    public function paymentSuccess(Request $request)
    {
        dd($request->all());
        $validation = $this->sslService->validatePayment($request->val_id);

        if (
            isset($validation['status']) &&
            $validation['status'] === 'VALID' &&
            $validation['tran_id']
        ) {
            $this->bookingRepo->updateStatus(
                $validation['tran_id'],
                'paid',
                ['val_id' => $request->val_id]
            );

            return redirect()->route('home')
                ->with('success', 'Payment successful! Your booking is confirmed.');
        }

        return redirect()->route('home')
            ->with('error', 'Payment validation failed. Contact support.');
    }

    public function paymentFail(Request $request)
    {
        if ($request->tran_id) {
            $this->bookingRepo->updateStatus($request->tran_id, 'failed');
        }

        return redirect()->route('home')
            ->with('error', 'Payment failed. Please try again.');
    }

    public function paymentCancel(Request $request)
    {
        if ($request->tran_id) {
            $this->bookingRepo->updateStatus($request->tran_id, 'cancelled');
        }

        return redirect()->route('home')
            ->with('error', 'Payment cancelled.');
    }

    public function paymentIpn(Request $request)
    {
        // IPN — background notification from SSLCommerz
        if ($request->status === 'VALID' && $request->tran_id) {
            $this->bookingRepo->updateStatus(
                $request->tran_id,
                'paid',
                ['val_id' => $request->val_id ?? null]
            );
        }

        return response()->json(['status' => 'ok']);
    }
}
