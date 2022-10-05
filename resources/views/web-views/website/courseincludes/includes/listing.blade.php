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

<script>
    $('.course-include-status-btn').on('change', function(){
        var status_update_url = $(this).attr('data-update-action');
        var tr_id = $(this).attr('data-include-id');
        var change_status = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to change status!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : status_update_url,
                    type : 'PUT',
                    data : {change_status:change_status},
                    success : function(response){
                        if(response){
                            Swal.fire(
                                'Changed!',
                                'You have changed course include status.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Not Changed!',
                                'Sorry! Something went wrong.',
                                'danger'
                            )
                        }
                    }
                });
            }else{
                if(change_status==1){
                    $('#id-'+tr_id).find('#inc_status-'+tr_id).prop('checked',true);
                }else{
                    $('#id-'+tr_id).find('#inc_status-'+tr_id).prop('checked',false);
                }
            }
        })
    });

    $('.delete-course-include').on('click', function(){
        var slug = $(this).attr('data-slug');
        var delete_url = $(this).attr('data-del-url');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : delete_url,
                    type : 'DELETE',
                    success : function(response){
                        if(response){
                            $('#id-'+slug).hide();
                            Swal.fire(
                                'Deleted!',
                                'You have deleted course include.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Not Deleted!',
                                'Sorry! Something went wrong.',
                                'danger'
                            )
                        }
                    }
                });
            }
        })
    });
</script>