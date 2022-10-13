@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="state_search_url" value="{{ route('state.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('state.create') }}" data-toggle="tooltip" data-placement="left" title="Add New State" class="btn btn-primary btn-sm">Add New State</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                        <div class="d-flex col-sm-5">
                            <div class="row-fluid">
                                <select class="selectpicker" name="country" id="country" data-show-subtext="true" data-live-search="true">
                                    <option value="All" selected>Search by country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>                                   
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>STATE</th>
                                <th>COUNTRY</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($models as $key=>$model)
                                <tr id="id-{{ $model->id }}">
                                    <td>{{  $models->firstItem()+$key }}.</td>
                                    <td>{{ $model->name }}</td>
                                    <td>{{ $model->hasCountry->name }}</td>
                                    <td width="250px">
                                        <a href="{{ route("state.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show State" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="8">
                                    Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
    <script>
        $(document).on('change','#country',function(e) {
            select = $(this);
            selectedOption = select.find( "option[value=" + select.val() + "]" );
            var country =  selectedOption.val();
            var search = $('#search').val();
            var pageurl = $('#state_search_url').val();
            var page = 1;

            fetchAll(pageurl, page, search, country);
        });
        $('#search').keyup((function(e) {
            var search = $(this).val();
            var country = $('#country').val();
            var pageurl = $('#state_search_url').val();
            var page = 1;
            fetchAll(pageurl, page, search, country);
        }));

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var search = $('#search').val();
            var country = $('#country').val();
            var pageurl = $('#state_search_url').val();
            var page = $(this).attr('href').split('page=')[1];
            fetchAll(pageurl, page, search, country);
        });

        function fetchAll(pageurl, page, search, country){
            $.ajax({
                url:pageurl+'?page='+page+'&search='+search+'&country='+country,
                type: 'get',
                success: function(response){
                    $('#body').html(response);
                }
            });
        }
    </script>
@endpush
