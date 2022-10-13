@extends('layouts.admin.app')
@section('title', $page_title)

@section('content')
<input type="hidden" id="city_search_url" value="{{ route('city.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('city.create') }}" data-toggle="tooltip" data-placement="left" title="Add New City" class="btn btn-primary btn-sm">Add New City</a>
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
                        <div class="d-flex col-sm-4">
                            <input type="text" id="search" class="form-control" placeholder="Type name to search" style="margin-bottom:5px">
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                        <div class="d-flex col-sm-3">
                            <div class="row-fluid">
                                <select class="selectpicker" name="country" id="country" data-show-subtext="true" data-live-search="true">
                                    <option value="All" selected>Search by country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex col-sm-3">
                            <select class="form-control" name="state" id="search_state">
                                <option value="All" selected>Search by state</option>
                            </select>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>NAME</th>
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
                                    <td>{{ $model->hasState->name }}</td>
                                    <td>{{ $model->hasState->hasCountry->name }}</td>
                                    
                                    <td width="250px">
                                        <a href="{{ route("city.show", $model->id) }}" data-toggle="tooltip" data-placement="top" title="Show City" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7">
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
            var state = $('#search_state').val();
            var pageurl = $('#city_search_url').val();
            var page = 1;

            fetchAll(pageurl, page, search, country, state);
            $.ajax({
                url:"{{ route('admin.get_states') }}",
                type: 'get',
                data: {country_id:country},
                success: function(response){
                    var html = '';
                    html += '<option value="All">Search by state</option>';
                    jQuery.each(response.states, function(index, state) {
                        html += '<option value="'+state.id+'">'+state.name+'</option>';
                    });

                    $('#search_state').html(html);
                }
            });
        });
        $(document).on('change','#search_state',function(e) {
            select = $(this);
            selectedOption = select.find( "option[value=" + select.val() + "]" );
            var state =  selectedOption.val();
            var search = $('#search').val();
            var country = $('#country').val();
            var pageurl = $('#city_search_url').val();
            var page = 1;
            fetchAll(pageurl, page, search, country, state);
        });
        $('#search').keyup((function(e) {
            var search = $(this).val();
            var country = $('#country').val();
            var state = $('#search_state').val();
            var pageurl = $('#city_search_url').val();
            var page = 1;
            fetchAll(pageurl, page, search, country, state);
        }));

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var search = $('#search').val();
            var country = $('#country').val();
            var state = $('#search_state').val();
            var pageurl = $('#city_search_url').val();
            var page = $(this).attr('href').split('page=')[1];
            fetchAll(pageurl, page, search, country, state);
        });

        function fetchAll(pageurl, page, search, country, state){
            $.ajax({
                url:pageurl+'?page='+page+'&search='+search+'&country='+country+'&state='+state,
                type: 'get',
                success: function(response){
                    $('#body').html(response);
                }
            });
        }
    </script>
@endpush