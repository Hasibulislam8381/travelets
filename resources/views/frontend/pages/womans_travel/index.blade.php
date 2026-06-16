@extends('frontend.layouts.app')
@section('title', 'Travels')
@section('content')

    <section class="section_padding">
        <div class="container-fluid px-4 py-5">

            <div class="listing-header mb-4">
                <h2 class="listing-title">Global Women Journeys*</h2>
                <p class="listing-desc">Empowering women across Bangladesh through safe travel, skill-building, secure stays,
                    and inclusive growth programs — created by women, for women.</p>
            </div>

            {{-- Filter Tabs --}}
            <div class="filter-tabs mb-4">
                <a href="{{ route('travels.index') }}" class="filter-tab {{ $currentType === 'all' ? 'active' : '' }}">All</a>
                <a href="{{ route('travels.index') }}?type=bangladesh"
                    class="filter-tab {{ $currentType === 'bangladesh' ? 'active' : '' }}">Bangladesh</a>
                <a href="{{ route('travels.index') }}?type=abroad"
                    class="filter-tab {{ $currentType === 'abroad' ? 'active' : '' }}">Abroad</a>
                <a href="{{ route('travels.index') }}?type=adventure"
                    class="filter-tab {{ $currentType === 'adventure' ? 'active' : '' }}">Adventure</a>
                <a href="{{ route('travels.index') }}?type=international-tour"
                    class="filter-tab {{ $currentType === 'international-tour' ? 'active' : '' }}">International Tour</a>
            </div>

            {{-- Product Grid --}}
            <div class="row g-4">
                @forelse($products as $product)
                    @include('frontend.pages.product.travell_box')
                @empty
                    <div class="col-12 text-center py-5">
                        <p style="color:#6b5a4e;font-size:15px;">No tours found.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if ($products->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </section>

@endsection
