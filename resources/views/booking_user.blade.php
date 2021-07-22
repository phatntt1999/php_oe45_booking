@extends('layouts.app_body')
@section('header')
@include('header.header_user')
<!-- end:header-top -->
<div class="fh5co-hero-review" style="height: 400px;">
    <div class="profile-header">
        <div class="profile-header-cover"></div>
            <div class="profile-header-content">
                <div class="profile-header-img">
                    @if (!empty($avatar))
                        <img src="{{ asset("$avatar->url") }}" alt="" />
                    @else
                        <img src="{{ asset('/assets/images/service/default-avatar.png') }}" alt="" />
                    @endif
                </div>
                <div class="profile-header-info">
                    <h4 class="m-t-sm">{{ $user->name }}</h4>
                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-xs btn-primary mb-3">{{ trans('messages.edit_proflie') }}</a>
                </div>
            </div>

        <ul class="profile-header-tab nav nav-tabs">
            <li class="nav-item"><a href="{{ route('profile.show', $user->id) }}" class="nav-link">{{ trans('messages.review') }}</a></li>
            <li class="nav-item"><a href="{{ route('profile.index') }}" class="nav-link">{{ trans('messages.about') }}</a></li>
            <li class="nav-item"><a href="#" class="nav-link active show">BOOKING</a></li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="list-group">
        <div href="#" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h3 class="mb-1">Tour Ha Long 3 Ngay 2 Dem
                <i id="icon_accept" class="fas fa-check"></i>
            </h3>
            <small>2021-07-19</small>
          </div>
            <div class="mb-3">
                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Date:</span>
                <span class="bg-light-blue">02.03.2020</span>
            </div>
            <div class="mb-3">
                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Booking Details:</span>
                <span class="bg-light-blue">2 Adults</span>
            </div>
            <div class="mb-3">
                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Price:</span>
                <span class="bg-light-blue">$147</span>
            </div>
            <div class="mb-5">
                <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">User:</span>
                <span class="border-right pr-2 mr-2">john@example.com</span>
            </div>
        </div>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h3 class="mb-1">List group item heading
                <i id="icon_process" class="fas fa-spinner"></i>
            </h3>
            <small class="text-muted">3 days ago</small>
          </div>
          <p class="mb-1">Some placeholder content in a paragraph.</p>
          <small class="text-muted">Your booking is processing.</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h3 class="mb-1">List group item heading
                <i id="icon_reject" class="fas fa-times"></i>
            </h3>
            <small class="text-muted">3 days ago</small>
          </div>
          <p class="mb-1">Some placeholder content in a paragraph.</p>
          <form action="">
            <button type="button" class="btn btn-danger">Cancel</button>
        </form>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Some placeholder content in a paragraph.</p>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">List group item heading</h5>
              <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Some placeholder content in a paragraph.</p>
          </a>
      </div>
</div>
@endsection
