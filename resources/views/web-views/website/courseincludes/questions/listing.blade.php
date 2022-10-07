@foreach ($coursequestions as $key=>$coursequestion)
    <tr id="id-{{ $coursequestion->id }}">
        <td>{{  $coursequestions->firstItem()+$key }}.</td>
        <td>{!! $coursequestion->question !!}</td>
        <td>
            <div class="switch">
                <input id="question_status-{{ $coursequestion->id }}" class="cmn-toggle cmn-toggle-round-flat course-question-status-btn" data-question-id="{{ $coursequestion->id }}" data-update-action="{{ route('coursequestion.update', $coursequestion->id) }}" @if($coursequestion->status) value="1" checked @endif name="status" type="checkbox">
                <label for="question_status-{{ $coursequestion->id }}"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="{{ route('coursequestion.update', $coursequestion->id) }}" data-course-questions="{{ $coursequestion }}" data-question-id="{{ $coursequestion->course_id }}"  data-placement="top" title="Edit Course coursequestion" class="btn btn-primary btn-xs edit-course-question-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course coursequestion" class="btn btn-danger btn-xs delete-course-question" data-slug="{{ $coursequestion->id }}" data-del-url="{{ route("coursequestion.destroy", $coursequestion->id) }}" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="15">
        Displying {{$coursequestions->firstItem()}} to {{$coursequestions->lastItem()}} of {{$coursequestions->total()}} records
        <div class="d-flex justify-content-center">
            {!! $coursequestions->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>

<script>
    $('.course-question-status-btn').on('change', function(){
        var status_update_url = $(this).attr('data-update-action');
        var tr_id = $(this).attr('data-question-id');
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
                                'You have changed course question status.',
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
                    $('#course-question-body').find('#id-'+tr_id).find('#question_status-'+tr_id).prop('checked',true);
                }else{
                    $('#course-question-body').find('#id-'+tr_id).find('#question_status-'+tr_id).prop('checked',false);
                }
            }
        })
    });

    $('.delete-course-question').on('click', function(){
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
                                'You have deleted course question.',
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