@foreach ($courseclasses as $key=>$courseclass)
    <tr id="id-{{ $courseclass->id }}">
        <td>{{  $courseclasses->firstItem()+$key }}.</td>
        <td>{!! $courseclass->hasChapter->name??'N/A' !!}</td>
        <td>{!! $courseclass->title !!}</td>
        <td>
            <div class="switch">
                <input id="class_status-{{ $courseclass->id }}" class="cmn-toggle cmn-toggle-round-flat course-class-status-btn" data-class-id="{{ $courseclass->id }}" data-update-action="{{ route('courseclass.update', $courseclass->id) }}" @if($courseclass->status) value="1" checked @endif name="status" type="checkbox">
                <label for="class_status-{{ $courseclass->id }}"></label>
            </div>
        </td>
        <td>
            <div class="switch">
                <input id="is_featured-{{ $courseclass->id }}" class="cmn-toggle cmn-toggle-round-flat course-class-featured-btn" data-class-id="{{ $courseclass->id }}" data-update-action="{{ route('courseclass.update', $courseclass->id) }}" value="1" @if($courseclass->is_featured) checked @endif name="is_featured" type="checkbox">
                <label for="is_featured-{{ $courseclass->id }}"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="{{ route('courseclass.update', $courseclass->id) }}" data-edit-class-url="{{ route('courseclass.edit', $courseclass->id) }}" data-class-id="{{ $courseclass->course_id }}"  data-placement="top" title="Edit Course courseclass" class="btn btn-primary btn-xs edit-course-class-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course courseclass" class="btn btn-danger btn-xs delete-course-chapter" data-slug="{{ $courseclass->id }}" data-del-url="{{ route("courseclass.destroy", $courseclass->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
@endforeach

<script>
    $('.course-chapter-status-btn').on('change', function(){
        var status_update_url = $(this).attr('data-update-action');
        var tr_id = $(this).attr('data-chapter-id');
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
                                'You have changed course chapter status.',
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

    $('.delete-course-chapter').on('click', function(){
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
                            $('#id-'+slug).remove();
                            Swal.fire(
                                'Deleted!',
                                'You have deleted course chapter.',
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