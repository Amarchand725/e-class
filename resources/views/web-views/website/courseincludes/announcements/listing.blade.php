@foreach ($courseannouncements as $key=>$courseannouncement)
    <tr id="id-{{ $courseannouncement->id }}">
        <td>{{  $courseannouncements->firstItem()+$key }}.</td>
        <td>{!! $courseannouncement->announcement !!}</td>
        <td>
            <div class="switch">
                <input id="announcement_status-{{ $courseannouncement->id }}" class="cmn-toggle cmn-toggle-round-flat course-announcement-status-btn" data-announcement-id="{{ $courseannouncement->id }}" data-update-action="{{ route('courseannouncement.update', $courseannouncement->id) }}" @if($courseannouncement->status) value="1" checked @endif name="status" type="checkbox">
                <label for="announcement_status-{{ $courseannouncement->id }}"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="{{ route('courseannouncement.update', $courseannouncement->id) }}" data-course-announcements="{{ $courseannouncement }}" data-announcement-id="{{ $courseannouncement->course_id }}"  data-placement="top" title="Edit Course courseannouncement" class="btn btn-primary btn-xs edit-course-announcement-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course courseannouncement" class="btn btn-danger btn-xs delete-course-announcement" data-slug="{{ $courseannouncement->id }}" data-del-url="{{ route("courseannouncement.destroy", $courseannouncement->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="15">
        Displying {{$courseannouncements->firstItem()}} to {{$courseannouncements->lastItem()}} of {{$courseannouncements->total()}} records
        <div class="d-flex justify-content-center">
            {!! $courseannouncements->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>

<script>
    $('.course-announcement-status-btn').on('change', function(){
        var status_update_url = $(this).attr('data-update-action');
        var tr_id = $(this).attr('data-announcement-id');
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
                                'You have changed course announcement status.',
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
                    $('#course-announcement-body').find('#id-'+tr_id).find('#announcement_status-'+tr_id).prop('checked',true);
                }else{
                    $('#course-announcement-body').find('#id-'+tr_id).find('#announcement_status-'+tr_id).prop('checked',false);
                }
            }
        })
    });

    $('.delete-course-announcement').on('click', function(){
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
                            $('#course-announcement-body').find('#id-'+slug).remove();
                            Swal.fire(
                                'Deleted!',
                                'You have deleted course announcement.',
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