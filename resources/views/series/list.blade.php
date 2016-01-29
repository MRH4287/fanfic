@extends('layouts.app')

@section('css')
    <link href="{{ URL::asset('assets/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" />

@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-9">
                    <h4 class="m-t-0 header-title"><b>Series manager</b></h4>
                        <p class="text-muted m-b-30 font-13">
                        Here you can add, edit and delete series.
                        </p>

                    </div>
                    <div class=" col-sm-3 text-xs-center text-right">
                        <div class="form-group">
                            <input id="search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
                        </div>
                    </div>
                </div>
                <table id="list-series" class="table m-b-0 toggle-arrow-tiny">
                    <thead>
                    <tr>
                        <th data-toggle="true"> Name </th>
                        <th data-hide="phone"> Number of Characters </th>
                        <th data-hide="phone"> Number of works </th>
                        <th style="text-align: right"> Tools </th>
                        <th data-hide="all"> Characters </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($series as $s)
                        <tr>
                            <td>{{ $s->name }}</td>
                        <td>{{ $s->ncharacters }}</td>
                        <td>0</td>
                        <td><a href="{{ url('/series/edit/'.$s->id) }}"><i class="fa fa-pencil text-inverse pull-right"></i></a></td>
                        <td>
                            <?php $cnt = 0; ?>
                            @foreach($s->characters as $c)
                                @if($cnt > 0) , @endif
                                    <?php $cnt++; ?>
                                    {{$c->name}}
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/plugins/footable/js/footable.all.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script>
        var table = $('#list-series');
        // Filtering
        // -----------------------------------------------------------------
        $(window).on('load', function() {
            // Accordion
            // -----------------------------------------------------------------
            table.footable().on('footable_row_expanded', function(e) {
                $('#list-series tbody tr.footable-detail-show').not(e.row).each(function() {
                    table.data('footable').toggleDetail(this);
                });
            });
            // Search input
            $('#search').on('input', function (e) {
                e.preventDefault();
                table.trigger('footable_filter', {filter: $(this).val()});
            });
        });

    </script>
@endsection