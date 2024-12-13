@extends('admin.layouts.app')
@section('title', 'Calculator')
@section('content')

<div class="dataOverviewSection mt-3">
                    <div class="section-title">
                        <h6 class="fw-bold m-0">Calculators</h6>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="dataOverview">
                                <div class="mb-3">
                                    <h6 class="m-0">Curtain Calculator</h6>
                                    <p class="m-0 text-muted">Please enter the required Curtain size in meters.</p>
                                </div>
                                <div class="w-100 mb-3">
                                    <label for="Height" class="form-label mb-1">Height (m)</label>
                                    <input type="number" id="curtain_height" name="curtain_height" class="form-control w-100">
                                </div>
                                <div class="w-100 mb-3">
                                    <label for="Width" class="form-label mb-1">Width (m)</label>
                                    <input type="number" id="curtain_width" name="curtain_width" class="form-control w-100">
                                </div>
                                <button class="primary-btn addedBtn" name="curtain_calculator" id="curtain_calculator">Calculate</button>
                                <div class="resultView mt-4 border-top border-bottom py-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <p class="m-0 fw-normal">Total Pannel requirement: </p>
                                        <p class="m-0 fw-bold"><span id="curtain_panel"></span> Pannels</p>
                                    </div>
                                    <div class="d-flex justify-content-between m-0">
                                        <p class="m-0 fw-normal">Total fabric requirement: </p>
                                        <p class="m-0 fw-bold"><span id="curtain_fabric"></span> meters</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dataOverview">
                                <div class="mb-3">
                                    <h6 class="m-0">Blind Calculator</h6>
                                    <p class="m-0 text-muted">Please enter the required blind size in meters.</p>
                                </div>
                                <div class="w-100 mb-3">
                                    <label for="Height" class="form-label mb-1">Height (m)</label>
                                    <input type="number" name="blind_height" id="blind_height" class="form-control w-100">
                                </div>
                                <div class="w-100 mb-3">
                                    <label for="Width" class="form-label mb-1">Width (m)</label>
                                    <input type="number" name="blind_width" id="blind_width" class="form-control w-100">
                                </div>
                                <button class="primary-btn addedBtn" name="blind_calculator" id="blind_calculator">Calculate</button>
                                <div class="resultView mt-4 border-top border-bottom py-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <p class="m-0 fw-normal">Total Pannel requirement: </p>
                                        <p class="m-0 fw-bold"><span id="blind_panel"></span> Pannels</p>
                                    </div>
                                    <div class="d-flex justify-content-between m-0">
                                        <p class="m-0 fw-normal">Total fabric requirement: </p>
                                        <p class="m-0 fw-bold"><span id="blind_fabric"></span> meters</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
@section('script')
<script>

$('#curtain_calculator').click(function() {
    // Get the curtain height and width values from the input fields
    const height = parseFloat($('#curtain_height').val());
    const width = parseFloat($('#curtain_width').val());

    // Check if the input values are valid numbers
    if (isNaN(height) || isNaN(width)) {
        alert("Please enter valid numbers for height and width.");
        return;
    }

    // Calculate panel and fabric
    const panel = height + 0.4;
    const fabric = width / 0.5;

    let curtainPanel = panel;
    if (curtainPanel > height) {
        curtainPanel = height + 1;  // Adjust if panel exceeds height
    } else {
        curtainPanel = height;  // If panel is less than or equal to height, use height
    }
    // Update the result fields with calculated values
    $('#curtain_panel').text(curtainPanel);
    $('#curtain_fabric').text(fabric * panel);

    // Optional: log the values for debugging (remove in production)
    // console.log(`Height: ${height}, Width: ${width}`);
});


$('#blind_calculator').click(function() {
    // Get the curtain height and width values from the input fields
    const height = parseFloat($('#blind_height').val());
    const width = parseFloat($('#blind_width').val());

    // Check if the input values are valid numbers
    if (isNaN(height) || isNaN(width)) {
        alert("Please enter valid numbers for height and width.");
        return;
    }

    // Calculate panel and fabric
    const panel = height + 0.4;
    const fabric = width / 0.3;

    let curtainPanel = panel;
    if (curtainPanel > height) {
        curtainPanel = height + 1;  // Adjust if panel exceeds height
    } else {
        curtainPanel = height;  // If panel is less than or equal to height, use height
    }
    // Update the result fields with calculated values
    $('#blind_panel').text(curtainPanel);
    $('#blind_fabric').text(Math.round(fabric * panel));

    // Optional: log the values for debugging (remove in production)
    // console.log(`Height: ${height}, Width: ${width}`);
});

</script>

@endsection