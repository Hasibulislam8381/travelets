@extends('layouts.frontend.app')

@section('title', 'Home')

@section('content')
    @include('pages.hero')
    @include('pages.category_home')
    @include('pages.womens_travell')
    @include('pages.skill_trainning')
    @include('pages.become_volunteer')
    @include('pages.dorm')
    @include('pages.testimonial')
    @include('pages.awards')
    @include('pages.souvenirs')
    @include('pages.about')
    @include('pages.team')
@endsection
