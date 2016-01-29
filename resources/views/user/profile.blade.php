@extends('layouts.app')
@section('css')
    <link href="{{ URL::asset('assets/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
          rel="stylesheet"/>

@endsection
@section('content')
    {{ csrf_field() }}
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="sm-picture text-center">
                    <div class="bg-picture-overlay"></div>
                    <div class="profile-info-name">
                        <img
                                @if(!empty($user->photo))
                                src="{{ URL::asset('/assets/images/users/'.Auth::user()->photo.'.png') }}"
                                @else
                                src="{{ URL::asset('/assets/images/users/default.png') }}"
                                @endif
                                class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                        <h4 class="m-b-5"><b>{{ $user->name }}</b></h4>
                        @if(Auth::user()->id != $user->id)
                            @if(Auth::user()->askIsFollowing($user))
                                <button id="follow" class="btn btn-default btn-rounded waves-effect waves-light btn-sm" onclick="togglefollow({{ $user->id }}, 'u')"><i class="fa fa-check m-r-5"></i> Follow</button>
                            @else
                                <button id="follow" class="btn btn-default btn-rounded waves-effect waves-light btn-sm" onclick="togglefollow({{ $user->id }}, 'f')">Follow</button>
                            @endif
                            @if(Auth::user()->askIsFavoriting($user))
                                    <button id="favorite" class="btn btn-danger btn-rounded waves-effect waves-light btn-sm" onclick="togglefavorite({{ $user->id }}, 'u')"><i class="fa fa-check m-r-5"></i> Favorite</button>
                                @else
                                    <button id="favorite" class="btn btn-danger btn-rounded waves-effect waves-light btn-sm" onclick="togglefavorite({{ $user->id }}, 'f')">favorite</button>
                                @endif
                        @endif
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <!-- Personal-Information -->
                <div class="card-box m-t-20">
                    <div style="text-align: center">
                        <h4 class="m-t-0 header-title"><b><i class="fa fa-users text-custom"></i> Follows:</b><span id="numberFollow"> {{ $user->follows }}</span></h4>
                        <h4 class="m-t-15 header-title"><b><i class="fa fa-heart text-danger"></i> Favorites:</b><span id="numberFavorites"> {{ $user->favorites }}</span></h4>
                    </div>
                </div>
                <!-- Personal-Information -->

                <!-- Personal-Information -->
                @if(!empty($user->bio))
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>About me</b></h4>

                    <div class="p-20">
                        {{ $user->bio }}
                    </div>
                </div>
                @endif
                <!-- Personal-Information -->

                <div class="card-box m-t-0">
                    <h4 class="m-t-0 header-title"><b>My other social networks</b></h4>
                    <div class="p-20">
                        <div class="about-info-p">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted">Johnathan Deo</p>
                        </div>
                        <div class="about-info-p">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">(123) 123 1234</p>
                        </div>
                        <div class="about-info-p">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted">johnathan@ubold.com</p>
                        </div>
                        <div class="about-info-p m-b-0">
                            <strong>Location</strong>
                            <br>
                            <p class="text-muted">USA</p>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-md-8">

                <div class="card-box m-t-20">
                    <h4 class="m-t-0 header-title"><b>Activity</b></h4>
                    <div class="p-20">
                        <div class="timeline-2">
                            <div class="time-item">
                                <div class="item-info">
                                    <div class="text-muted">5 minutes ago</div>
                                    <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo
                                        <strong>"DSC000586.jpg"</strong></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <div class="text-muted">30 minutes ago</div>
                                    <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet
                                            tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <div class="text-muted">59 minutes ago</div>
                                    <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#"
                                                                                                        class="text-success">John
                                            Doe</a>.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet
                                            tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <div class="text-muted">5 minutes ago</div>
                                    <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos
                                    </p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <div class="text-muted">30 minutes ago</div>
                                    <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet
                                            tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>

                            <div class="time-item">
                                <div class="item-info">
                                    <div class="text-muted">59 minutes ago</div>
                                    <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#"
                                                                                                        class="text-success">John
                                            Doe</a>.</p>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet
                                            tellus ut tincidunt euismod. "</em></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-box m-t-0">
                    <h4 class="m-t-0 header-title"><b>Works</b></h4>
                    <table id="works-table" class="table m-b-0 toggle-arrow-tiny" data-page-size="10">
                        <thead>
                        <tr>
                            <th data-toggle="true"> First Name</th>
                            <th> Last Name</th>
                            <th data-hide="phone"> Job Title</th>
                            <th data-hide="all"> DOB</th>
                            <th data-hide="all"> Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Isidra</td>
                            <td>Boudreaux</td>
                            <td>Traffic Court Referee</td>
                            <td>22 Jun 1972</td>
                            <td><span class="label label-table label-success">Active</span></td>
                        </tr>
                        <tr>
                            <td>Shona</td>
                            <td>Woldt</td>
                            <td>Airline Transport Pilot</td>
                            <td>3 Oct 1981</td>
                            <td><span class="label label-table label-inverse">Disabled</span></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="text-right">
                                    <ul class="pagination pagination-split m-t-30"></ul>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>


        </div>

        <div class="row">

        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ URL::asset('assets/plugins/footable/js/footable.all.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"
            type="text/javascript"></script>
    <script>
        // Filtering
        // -----------------------------------------------------------------
        $(window).on('load', function () {
            // Pagination
            // -----------------------------------------------------------------
            var $workstable = $('#works-table');
            $workstable.footable();

        });
    </script>
@endsection