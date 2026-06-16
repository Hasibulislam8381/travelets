@extends('frontend.layouts.app')
@section('title', 'Skill Training')
@section('content')

    <section class="section_padding">
        <div class="container-fluid px-4 py-5">

            <div class="listing-header mb-4">
                <h2 class="listing-title">Skill Training Programs*</h2>
                <p class="listing-desc">Empowering women across Bangladesh through safe travel, skill-building, secure stays,
                    and inclusive growth programs — created by women, for women.</p>
            </div>

            <div class="row g-4">
                @forelse($products as $product)
                    @include('frontend.pages.product.travell_box')
                @empty
                    <div class="col-12 text-center py-5">
                        <p style="color:#6b5a4e;font-size:15px;">No training programs found.</p>
                    </div>
                @endforelse
            </div>

            @if ($products->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </section>

@endsection
