@extends('layouts.admin-layout')

@section('content')
    <div class="app-content content bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Edit Ultrasound</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}"
                                            class="btn btn-primary">Back to Patient</a>
                                        <button
                                            onclick='window.open("/exam_ultrasound_print?id={{ $exam->admission_id }}", "width=800,height=650").print()'
                                            class="btn btn-dark btn-solid" title="Print">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/update_ultrasound" role="form">
                                @if (Session::get('status'))
                                    @push('scripts')
                                        <script>
                                            toastr.success('{{ Session::get('status') }}', 'Success');
                                        </script>
                                    @endpush
                                @endif
                                @csrf
                                <input type="hidden" name="id" value="{{ $exam->id }}">
                                <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
                                                value="{{ $admission->trans_date }}" class="form-control"
                                                style="padding: .4rem;" readonly />
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}" class="form-control" input-sm
                                                    pull-left placeholder="Admission No." readonly />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control" style="padding: .4rem;"
                                                readonly /></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" style="padding: .4rem;" readonly />
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control"
                                                style="padding: .4rem;" readonly /></td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellpadding="4" cellspacing="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td><b>TYPE OF EXAM</b></td>
                                        <td><select name="exam_type" id="exam_type" class="form-control"
                                                style="width:200px">
                                                <option value="">--SELECT--</option>
                                                <option value="KUB"
                                                    @php echo $exam->exam_type == "KUB" ? "selected=''" : "" @endphp>KUB
                                                </option>
                                                <option value="HBT"
                                                    @php echo $exam->exam_type == "HBT" ? "selected=''" : "" @endphp>HBT
                                                </option>
                                                <option value="THYROID"
                                                    @php echo $exam->exam_type == "THYROID" ?
                                                "selected=''" : "" @endphp>
                                                    THYROID</option>
                                                <option value="BREAST"
                                                    @php echo $exam->exam_type == "BREAST" ?
                                                "selected=''" : "" @endphp>
                                                    BREAST</option>
                                                <option value="WHOLE ABDOMEN"
                                                    @php echo $exam->exam_type == "WHOLE ABDOMEN"
                                                ? "selected=''" : "" @endphp>
                                                    WHOLE ABDOMEN</option>
                                                <option value="GENITALS"
                                                    @php echo $exam->exam_type == "GENITALS" ?
                                                "selected=''" : "" @endphp>
                                                    GENITALS</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">&nbsp;</td>
                                        <td width="80%"><b>RESULT </b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div id="divKUB">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top">
                                                            <b>KIDNEY</b> <br>
                                                            <div class="form-group">
                                                                <input name="kidney_status" type="radio" class="m-1"
                                                                    id="kidney_status_0" value="normal"
                                                                    {{ $exam->kidney_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="kidney_status" type="radio" class="m-1"
                                                                    id="kidney_status_1" value="findings"
                                                                    {{ $exam->kidney_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="kidney" id="kidney" cols="50" rows="5" class="form-control">{{ $exam->kidney }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>URETER/URINARY BLADDER</b> <br>
                                                            <div class="form-group">
                                                                <input name="urinary_bladder_status" type="radio"
                                                                    class="m-1" id="urinary_bladder_status_0"
                                                                    value="normal"
                                                                    {{ $exam->urinary_bladder_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="urinary_bladder_status" type="radio"
                                                                    class="m-1" id="urinary_bladder_status_1"
                                                                    value="findings"
                                                                    {{ $exam->urinary_bladder_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <textarea name="urinary_bladder" id="urinary_bladder" cols="50" rows="5" class="form-control">{{ $exam->urinary_bladder }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divHBT">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top"><b>LIVER</b> <br>
                                                            <div class="form-group">
                                                                <input name="liver_status" type="radio" class="m-1"
                                                                    id="liver_status_0" value="normal"
                                                                    {{ $exam->liver_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="liver_status" type="radio" class="m-1"
                                                                    id="liver_status_1" value="findings"
                                                                    {{ $exam->liver_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="liver" id="liver" cols="50" rows="5" class="form-control">{{ $exam->liver }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><b>GALLBLADDER</b> <br>
                                                            <div class="form-group">
                                                                <input name="gall_bladder_status" type="radio"
                                                                    class="m-1" id="gall_bladder_status_0"
                                                                    value="normal"
                                                                    {{ $exam->gall_bladder_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="gall_bladder_status" type="radio"
                                                                    class="m-1" id="gall_bladder_status_1"
                                                                    value="findings"
                                                                    {{ $exam->gall_bladder_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <textarea name="gall_bladder" id="gall_bladder" cols="50" rows="5" class="form-control">{{ $exam->gall_bladder }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="20%" valign="top"><b>PANCREAS</b> <br>
                                                            <div class="form-group">
                                                                <input name="pancreas_status" type="radio"
                                                                    class="m-1" id="pancreas_status_0" value="normal"
                                                                    {{ $exam->pancreas_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="pancreas_status" type="radio"
                                                                    class="m-1" id="pancreas_status_1"
                                                                    value="findings"
                                                                    {{ $exam->pancreas_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="pancreas" id="pancreas" cols="50" rows="5" class="form-control">{{ $exam->pancreas }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divTHYROID">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top"><b>THYROID</b> <br>
                                                            <div class="form-group">
                                                                <input name="thyroid_status" type="radio"
                                                                    class="m-1" id="thyroid_status_0" value="normal"
                                                                    {{ $exam->thyroid_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="thyroid_status" type="radio"
                                                                    class="m-1" id="thyroid_status_1" value="findings"
                                                                    {{ $exam->thyroid_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="thyroid" id="thyroid" cols="50" rows="5" class="form-control">{{ $exam->thyroid }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divBREAST">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top"><b>BREAST</b> <br>
                                                            <div class="form-group">
                                                                <input name="breast_status" type="radio" class="m-1"
                                                                    id="breast_status_0" value="normal"
                                                                    {{ $exam->breast_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="breast_status" type="radio" class="m-1"
                                                                    id="breast_status_1" value="findings"
                                                                    {{ $exam->breast_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="breast" id="breast" cols="50" rows="5" class="form-control">{{ $exam->breast }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divABDOMEN">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top"><b>WHOLE ABDOMEN</b> <br>
                                                            <div class="form-group">
                                                                <input name="abdomen_status" type="radio"
                                                                    class="m-1" id="abdomen_status_0" value="normal"
                                                                    {{ $exam->abdomen_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="abdomen_status" type="radio"
                                                                    class="m-1" id="abdomen_status_1" value="findings"
                                                                    {{ $exam->abdomen_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="abdomen" id="abdomen" cols="50" rows="5" class="form-control">{{ $exam->abdomen }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divGENITALS">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top"><b>GENITALS</b> <br>
                                                            <div class="form-group">
                                                                <input name="genitals_status" type="radio"
                                                                    class="m-1" id="genitals_status_0" value="normal"
                                                                    {{ $exam->genitals_status == 'normal' ? 'checked' : null }} />
                                                                Normal
                                                                <input name="genitals_status" type="radio"
                                                                    class="m-1" id="genitals_status_1"
                                                                    value="findings"
                                                                    {{ $exam->genitals_status == 'findings' ? 'checked' : null }} />
                                                                With Findings
                                                            </div>
                                                        </td>
                                                        <td width="80%">
                                                            <textarea name="genitals" id="genitals" cols="50" rows="5" class="form-control">{{ $exam->genitals }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div id="divIMPRESSION">
                                                <table width="100%">
                                                    <tr>
                                                        <td width="20%" valign="top"><b>IMPRESSION</b></td>
                                                        <td width="80%">
                                                            <textarea name="impression" id="impression" cols="50" rows="5" class="form-control">{{ $exam->impression }}</textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr id="kub_group">
                                                        <td colspan="4">
                                                            <div class="form-group">
                                                                <label for=""><b>KUB Remarks Status</b></label>
                                                                <br>
                                                                <input name="kub_exam_status" type="radio"
                                                                    class="m-1" id="kub_exam_status_0" value="normal"
                                                                    {{ $exam->kub_exam_status == 'normal' ? 'checked' : null }}>Normal
                                                                <input name="kub_exam_status" type="radio"
                                                                    class="m-1" id="kub_exam_status_1"
                                                                    value="findings"
                                                                    {{ $exam->kub_exam_status == 'findings' ? 'checked' : null }}>With
                                                                Findings
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">KUB Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="kub_exam_findings" id="" cols="30"
                                                                    rows="6"><?php echo nl2br($exam->kub_exam_findings); ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">KUB Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="kub_exam_recommendation" id=""
                                                                    cols="30" rows="6"><?php echo nl2br($exam->kub_exam_recommendation); ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="hbt_group">
                                                        <td colspan="4">
                                                            <div class="form-group">
                                                                <label for=""><b>HBT Remarks Status</b></label>
                                                                <br>
                                                                <input name="hbt_exam_status" type="radio"
                                                                    class="m-1" id="hbt_exam_status_0" value="normal"
                                                                    {{ $exam->hbt_exam_status == 'normal' ? 'checked' : null }}>Normal
                                                                <input name="hbt_exam_status" type="radio"
                                                                    class="m-1" id="hbt_exam_status_1"
                                                                    value="findings"
                                                                    {{ $exam->hbt_exam_status == 'findings' ? 'checked' : null }}>With
                                                                Findings
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">HBT Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="hbt_exam_findings" id="" cols="30"
                                                                    rows="6"><?php echo nl2br($exam->hbt_exam_findings); ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">HBT Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="hbt_exam_recommendation" id=""
                                                                    cols="30" rows="6"><?php echo nl2br($exam->hbt_exam_recommendation); ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="thyroid_group">
                                                        <td colspan="4">
                                                            <div class="form-group">
                                                                <label for=""><b>THYROID Remarks Status</b></label>
                                                                <br>
                                                                <input name="thyroid_exam_status" type="radio"
                                                                    class="m-1" id="thyroid_exam_status_0"
                                                                    value="normal"
                                                                    {{ $exam->thyroid_exam_status == 'normal' ? 'checked' : null }}>Normal
                                                                <input name="thyroid_exam_status" type="radio"
                                                                    class="m-1" id="thyroid_exam_status_1"
                                                                    value="findings"
                                                                    {{ $exam->thyroid_exam_status == 'findings' ? 'checked' : null }}>With
                                                                Findings
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">THYROID Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="thyroid_exam_findings" id="" cols="30"
                                                                    rows="6"><?php echo nl2br($exam->thyroid_exam_findings); ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">THYROID
                                                                    Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="thyroid_exam_recommendation" id=""
                                                                    cols="30" rows="6"><?php echo nl2br($exam->thyroid_exam_recommendation); ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="breast_group">
                                                        <td colspan="4">
                                                            <div class="form-group">
                                                                <label for=""><b>BREAST Remarks Status</b></label>
                                                                <br>
                                                                <input name="breast_exam_status" type="radio"
                                                                    class="m-1" id="breast_exam_status_0"
                                                                    value="normal"
                                                                    {{ $exam->breast_exam_status == 'normal' ? 'checked' : null }}>Normal
                                                                <input name="breast_exam_status" type="radio"
                                                                    class="m-1" id="breast_exam_status_1"
                                                                    value="findings"
                                                                    {{ $exam->breast_exam_status == 'findings' ? 'checked' : null }}>With
                                                                Findings
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">BREAST Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="breast_exam_findings" id="" cols="30"
                                                                    rows="6"><?php echo nl2br($exam->breast_exam_findings); ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">BREAST
                                                                    Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="breast_exam_recommendation" id=""
                                                                    cols="30" rows="6"><?php echo nl2br($exam->breast_exam_recommendation); ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="whole_abdomen_group">
                                                        <td colspan="4">
                                                            <div class="form-group">
                                                                <label for=""><b>WHOLE ABDOMEN Remarks
                                                                        Status</b></label> <br>
                                                                <input name="whole_abdomen_status" type="radio"
                                                                    class="m-1" id="whole_abdomen_status_0"
                                                                    value="normal"
                                                                    {{ $exam->whole_abdomen_status == 'normal' ? 'checked' : null }}>Normal
                                                                <input name="whole_abdomen_status" type="radio"
                                                                    class="m-1" id="whole_abdomen_status_1"
                                                                    value="findings"
                                                                    {{ $exam->whole_abdomen_status == 'findings' ? 'checked' : null }}>With
                                                                Findings
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">WHOLE ABDOMEN
                                                                    Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="whole_abdomen_findings" id="" cols="30"
                                                                    rows="6"><?php echo nl2br($exam->whole_abdomen_findings); ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">WHOLE ABDOMEN
                                                                    Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="whole_abdomen_recommendation" id=""
                                                                    cols="30" rows="6"><?php echo nl2br($exam->whole_abdomen_recommendation); ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="genitals_group">
                                                        <td colspan="4">
                                                            <div class="form-group">
                                                                <label for=""><b>GENITALS Remarks
                                                                        Status</b></label> <br>
                                                                <input name="genitals_exam_status" type="radio"
                                                                    class="m-1" id="genitals_exam_status_0"
                                                                    value="normal"
                                                                    {{ $exam->genitals_exam_status == 'normal' ? 'checked' : null }}>Normal
                                                                <input name="genitals_exam_status" type="radio"
                                                                    class="m-1" id="genitals_exam_status_1"
                                                                    value="findings"
                                                                    {{ $exam->genitals_exam_status == 'findings' ? 'checked' : null }}>With
                                                                Findings
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">GENITALS Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="genitals_exam_findings" id="" cols="30"
                                                                    rows="6"><?php echo nl2br($exam->genitals_exam_findings); ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">GENITALS
                                                                    Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="genitals_exam_recommendation" id=""
                                                                    cols="30" rows="6"><?php echo nl2br($exam->genitals_exam_recommendation); ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="18%"><b>Sonologist: </b></td>
                                        <td width="82%">
                                            <div class="col-md-8">
                                                <select name="technician_id" id="technician_id" class="form-control">
                                                    @foreach ($sonologists as $sonologist)
                                                        <option value={{ $sonologist->id }}
                                                            {{ $sonologist->id == $exam->technician_id ? 'selected' : null }}>
                                                            {{ $sonologist->firstname }} {{ $sonologist->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="box-footer">
                                    <button name="action" id="btnSave" value="save" type="submit"
                                        class="btn btn-primary" onclick="return chkAdmission();">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            dispExam($('#exam_type').val());
        });

        $('#exam_type').change(function() {
            dispExam($('#exam_type').val());
        });

        function dispExam(exam) {
            uid = $('#uid').val();
            $('#divKUB').hide();
            $('#divHBT').hide();
            $('#divTHYROID').hide();
            $('#divBREAST').hide();
            $('#divABDOMEN').hide();
            $('#divGENITALS').hide();
            $('#kub_group').hide();
            $('#hbt_group').hide();
            $('#thyroid_group').hide();
            $('#breast_group').hide();
            $('#whole_abdomen_group').hide();
            $('#genitals_group').hide();

            if (exam == "KUB") {
                $('#divKUB').show();
                $('#kub_group').show();
            }
            if (exam == "HBT") {
                $('#divHBT').show();
                $('#hbt_group').show();
            }
            if (exam == "GALLBLADDER") {
                $('#divHBT').show();
            }

            if (exam == "THYROID") {
                $('#divTHYROID').show();
                $('#thyroid_group').show();
            }
            if (exam == "BREAST") {
                $('#divBREAST').show();
                $('#breast_group').show();
            }
            if (exam == "WHOLE ABDOMEN") {
                $('#divABDOMEN').show();
                $('#whole_abdomen_group').show();
            }

            if (exam == "GENITALS") {
                $('#divGENITALS').show();
                $('#genitals_group').show();
            }
        }
    </script>
@endpush
