@extends('layouts.master')
@section('title')
    لوحة التحكم -فواتير
@endsection

@section('title_page')
    لوحة التحكم -فواتير
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Inputs</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xl-4 col-md-6 col-12 mb-1">
            <div class="form-group">
              <label for="basicInput">Basic Input</label>
              <input type="text" class="form-control" id="basicInput" placeholder="Enter email">
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-12 mb-1">
            <div class="form-group">
              <label for="helpInputTop">Input text with help</label>
              <small class="text-muted">eg.<i>someone@example.com</i></small>
              <input type="text" class="form-control" id="helpInputTop">
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-12 mb-1">
            <div class="form-group">
              <label for="disabledInput">Disabled Input</label>
              <input type="text" class="form-control" id="disabledInput" disabled="">
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-12">
            <div class="form-group">
              <label for="helperText">With Helper Text</label>
              <input type="text" id="helperText" class="form-control" placeholder="Name">
              <p><small class="text-muted">Find helper text here for given textbox.</small></p>
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-12">
            <div class="form-group">
              <label for="disabledInput">Readonly Input</label>
              <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="You can't update me :P">
            </div>
          </div>
          <div class="col-xl-4 col-md-6 col-12">
            <div class="form-group">
              <label for="disabledInput">Readonly Static Text</label>
              <p class="form-control-static" id="staticInput">email@pixinvent.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="col-md-6 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Card title</h4>
        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
      </div>
      <img class="img-fluid" src="../../../app-assets/images/slider/03.jpg" alt="Card image cap">
      <div class="card-body">
        <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
        <a href="javascript:void(0);" class="card-link">Card link</a>
        <a href="javascript:void(0);" class="card-link">Another link</a>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
 
@endsection
