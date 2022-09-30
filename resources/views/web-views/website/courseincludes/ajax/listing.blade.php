@foreach ($includes as $key=>$include)
    <tr id="id-{{ $include->id }}">
        <td>{{  $includes->firstItem()+$key }}.</td>
        <td>{!! $include->icon !!}</td>
        <td>{!! $include->detail !!}</td>
        <td>
            <div class="switch">
                <input id="inc_status-{{ $include->id }}" class="cmn-toggle cmn-toggle-round-flat course-include-status-btn" data-include-id="{{ $include->id }}" data-update-action="{{ route('courseinclude.update', $include->id) }}" @if($include->status) value="1" checked @endif name="status" type="checkbox">
                <label for="inc_status-{{ $include->id }}"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="{{ route('courseinclude.update', $include->id) }}" data-course-id="{{ $include->course_id }}" data-course-includes="{{ $include }}" data-placement="top" title="Edit Course include" class="btn btn-primary btn-xs edit-course-include-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course include" class="btn btn-danger btn-xs delete-course-include" data-slug="{{ $include->id }}" data-del-url="{{ route("courseinclude.destroy", $include->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="15">
        Displying {{$includes->firstItem()}} to {{$includes->lastItem()}} of {{$includes->total()}} records
        <div class="d-flex justify-content-center">
            {!! $includes->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>