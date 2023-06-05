@extends('layouts.agency-layout')

@section('name')
{{$data['agencyName']}}
@endsection

@section('content')

<div class="app-content content">
    <div class="main-loader">
        <div class="loader">
            <span class="loader-span"><img src="../../../app-assets/images/icons/output-onlinegiftools.gif"
                    alt="Loading"></span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-1">
                <div class="card">
                    <div class="alert alert-danger alert-dismissible mb-2 d-none" id="error" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="error-message"></span>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Referral Slip</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" method="POST" id="store_refferal">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="employer">Name of Employer <span class="danger">*</span></label>
                                            <input type="text" id="employer" class="form-control"
                                                placeholder="Name of Employer" name="employer" readonly
                                                value="@php echo session()->get('agencyName') @endphp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agency_address">Address of Agency <span
                                                    class="danger">*</span></label>
                                            <input type="text" id="agency_address" class="form-control"
                                                placeholder="Name of Employer" name="agency_address" readonly
                                                value="@php echo session()->get('address') @endphp">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput2">Country of Destination <span
                                                    class="danger">*</span></label>
                                            <input type="text" id="projectinput2" class="form-control" value="{{$referral->country_destination}}"
                                                placeholder="Country of Destination" name="country_destination">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput3">Lastname <span class="danger">*</span></label>
                                            <input type="text" id="projectinput3" class="form-control lastname" value="{{$referral->lastname}}"
                                                placeholder="Lastname" name="lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput4">Firstname <span class="danger">*</span></label>
                                            <input type="text" id="projectinput4" class="form-control" value="{{$referral->firstname}}"
                                                placeholder="Firstname" name="firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput4">Middlename</label>
                                            <input type="text" id="projectinput4" class="form-control" value="{{$referral->middlename}}"
                                                placeholder="Middlename" name="middlename">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Medical Package <span
                                                    class="danger">*</span></label>
                                            <select required name="package_id" id="" class="select2">
                                                <option value=" ">-- SELECT PACKAGE --</option>
                                                @foreach ($packages as $package)
                                                <option {{$package->id == $referral->package_id ? "selected" : null }} value="{{$package->id}}"> {{$package->packagename}} ({{$package->agencyname}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Email of Employee <span
                                                    class="danger">*</span></label>
                                            <input type="email" id="projectinput2" class="form-control"
                                                placeholder="Email of Employee" name="email_employee" value="{{$referral->email_employee}}">
                                            @error('email_employee'){{$message}}@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Position Applied For <span
                                                    class="danger">*</span></label>
                                            <input type="text" id="projectinput4" class="form-control" value="{{$referral->position_applied}}"
                                                placeholder="Position Applied" name="position_applied">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Vessel <span class="danger">*</span></label>
                                            <input type="text" id="projectinput4" class="form-control" value="{{$referral->vessel}}"
                                                placeholder="Vessel" name="vessel">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-bold-600" for="projectinput2">Admission
                                                Type</label>
                                            <div class="container-fluid ">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input" {{$referral->admission_type == "Normal" ? "checked" : null}}
                                                        id="admission_type1" name="admission_type" value="Normal" >
                                                    <label class="custom-control-label" for="admission_type1">Regular
                                                        Patient</label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input" {{$referral->admission_type == "Rush" ? "checked" : null}}
                                                        id="admission_type2" name="admission_type" value="Rush">
                                                    <label class="custom-control-label" for="admission_type2">Rush
                                                        Patient</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-bold-600" for="projectinput2">Payment
                                                Type <span class="danger">*</span></label>
                                            <div class="container-fluid ">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input" name="payment_type"
                                                        id="payment_type1" value="Applicant Paid" {{$referral->payment_type == "Applicant Paid" ? "checked" : null}}>
                                                    <label class="custom-control-label" for="payment_type1">Applicant
                                                        Paid
                                                    </label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="custom-control-input" id="payment_type2"
                                                        name="payment_type" value="Billed" {{$referral->payment_type == "Billed" ? "checked" : null}}>
                                                    <label class="custom-control-label" for="payment_type2">Billed to
                                                        Agency</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Custom Request</label>
                                            <textarea name="custom_request" class="form-control" cols="30"
                                                rows="7">@php echo nl2br($referral->custom_request) @endphp</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group my-1">
                                                <label for="projectinput4">Name of Requestor <span
                                                        class="danger">*</span></label><br>
                                                <input type="text" class="form-control" name="requestor" value="{{$referral->requestor}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput4">Date</label>
                                            <input type="text" id="projectinput4" class="form-control"
                                                placeholder="Agency / Company" name="updated_date"
                                                value="@php echo date(" Y-m-d") @endphp" readonly>
                                        </div>
                                        <div class="form-group d-none">
                                            <label for="projectinput4">Agency</label>
                                            <input required type="text" id="projectinput4" class="form-control"
                                                placeholder="Agency / Company"
                                                value="@php echo session()->get('agencyName') @endphp" readonly>
                                            <input type="hidden" id="projectinput4" class="form-control"
                                                placeholder="Agency / Company" name="agency_id"
                                                value="@php echo session()->get('agencyId') @endphp" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Certficates</label>
                                        <div class="row">
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="SKULD" id="skuld">
                                                    <label class="custom-control-label" for="skuld">SKULD</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="skuld_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Skuld Quantity" name="skuld_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="WEST OF ENGLAND" id="woe">
                                                    <label class="custom-control-label" for="woe">WEST OF
                                                        ENGLAND</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="woe_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="West of England Quantity" name="woe_qty">
                                                </div>
                                            </fieldset>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="CAYMAN" id="cayman">
                                                    <label class="custom-control-label" for="cayman">Cayman</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="cayman_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Cayman Quantity" name="cayman_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="LIBERIAN" id="liberian">
                                                    <label class="custom-control-label" for="liberian">Liberian</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="liberian_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Liberian Quantity" name="liberian_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="CROATIAN" id="croatian">
                                                    <label class="custom-control-label" for="croatian">Croatian</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="croatian_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Croatian Quantity" name="croatian_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="DANISH" id="danish">
                                                    <label class="custom-control-label" for="danish">Danish</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="danish_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Danish Quantity" name="danish_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="DIAMLEMOS" id="diamlemos">
                                                    <label class="custom-control-label"
                                                        for="diamlemos">Diamlemos</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="diamlemos_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Diamlemos Quantity" name="diamlemos_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="MARSHALL" id="marshall">
                                                    <label class="custom-control-label" for="marshall">Marshall</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="marshall_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Marshall Quantity" name="marshall_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="MALTA" id="malta">
                                                    <label class="custom-control-label" for="malta">Malta</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="malta_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Malta Quantity" name="malta_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="DOMINICAN" id="dominican">
                                                    <label class="custom-control-label"
                                                        for="dominican">Dominican</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="dominican_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Dominican Quantity" name="dominican_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="BAHAMAS" id="bahamas">
                                                    <label class="custom-control-label" for="bahamas">Bahamas</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="bahamas_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Bahamas Quantity" name="bahamas_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="BERMUDA" id="bermuda">
                                                    <label class="custom-control-label" for="bermuda">Bermuda</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="bermuda_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="Bermuda Quantity" name="bermuda_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="MLC" id="mlc">
                                                    <label class="custom-control-label" for="mlc">MLC</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="mlc_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="MLC Quantity" name="mlc_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="MER" id="mer">
                                                    <label class="custom-control-label" for="mer">MER</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="mer_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="MER Quantity" name="mer_qty">
                                                </div>
                                            </fieldset>
                                            <fieldset class="col-md-6 my-50">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        name="certificate[]" value="BAHIA" id="bahia">
                                                    <label class="custom-control-label" for="bahia">BAHIA</label>
                                                </div>
                                                <div class="input-group mt-50 d-none" id="bahia_qty">
                                                    <input type="number" min="1" max="5" class="form-control"
                                                        placeholder="BAHIA Quantity" name="bahia_qty">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Signature of Requestor <span
                                                    class="danger">*</span></label><br>
                                            <div class=" my-2">
                                                <canvas class="signature" width="490px" height="150px"></canvas> <br>
                                                <button type='button' class="btn btn-solid btn-primary clear-signature">Clear</button>
                                            </div>
                                            <input type="hidden" name="signature" class="signature-data">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="/agency_dashboard" type="reset" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../../app-assets/js/scripts/signature_pad-master/js/signature_pad.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

<script>
const canvas = document.querySelector(".signature");
const signaturePad = new SignaturePad(canvas, {
    penColour: '#fff',
    penWidth: 2,
});

document.querySelector('.clear-signature').addEventListener('click', () => {
    signaturePad.clear();
});

document.querySelector('.lastname').onchange = function() {
    let signatureData = signaturePad.toDataURL();
    let signatureInput = document.querySelector('.signature-data');
    signatureInput.value = signatureData;
}

$("#store_refferal").submit(function(e) {
    e.preventDefault();
    if (signaturePad._isEmpty) {
        Swal.fire(
            'Warning!',
            'Signature is required!',
            'warning'
        )
    } else {
        let signatureData = signaturePad.toDataURL();
        let signatureInput = document.querySelector('.signature-data');
        signatureInput.value = signatureData;
        if (signatureInput != "") {
            const fd = new FormData(this);
            $(".main-loader").css("display", "block");
            $.ajax({
                url: '/store_refferal',
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'Refferal Slip Added Successfully!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.href = '/refferal_slips';
                            }
                        })
                    } else {
                        console.log(response)
                    }
                },
                error: function(response) {
                    $(".main-loader").css("display", "none");
                    $("#error").removeClass("d-none");
                    $("#error").addClass("d-block");
                    $(".error-message").text(response.responseJSON.errors.email_employee)
                    toastr.error(response.responseJSON.errors.email_employee, 'Fail');
                }
            }).done(function(data) {
                $(".main-loader").css("display", "none");
            });
        }
    }
});

function getAge(e) {
    var today = new Date();
    var birthDate = new Date(e.value);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    const ageInput = document.querySelector("#age");
    ageInput.value = age;
}

// show quantity if certificate has check
let certificateButtons = document.querySelectorAll("input[name='certificate[]']");
console.log(certificateButtons);
for (let index = 0; index < certificateButtons.length; index++) {
    const element = certificateButtons[index];
    element.addEventListener("change", (e) => {
        showQuantity(element.id);
    })
}

function showQuantity(id) {
    if (document.querySelector(`#${id}`).checked) {
        $(`#${id}_qty`).removeClass("d-none");
    } else {
        $(`#${id}_qty`).addClass("d-none");
    }
}
</script>

@endpush