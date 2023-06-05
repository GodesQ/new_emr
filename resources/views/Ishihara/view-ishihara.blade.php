<div class="row my-1">
    <div class="col-6">
        <a href="edit_ishihara?id={{$exam_ishihara->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_ishihara_print?id={{$exam_ishihara->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" cellpadding="2"
    cellspacing="2" class="table no-border">
    <tbody>
        <tr>
            <td align="center" width="17%">
                <b>RESULT</b>
            </td>
            <td align="center" width="83%">
                {{$exam_ishihara->result}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>REMARKS</b>
            </td>
            <td align="center">
                {{$exam_ishihara->remarks}}</td>
        </tr>
    </tbody>
</table>