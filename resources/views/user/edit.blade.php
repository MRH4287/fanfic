@extends('layouts.app')
@section('css')
    <link href="{{ URL::asset('assets/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
          rel="stylesheet"/>

@endsection
@section('content')
    {{ csrf_field() }}
    <div class="wraper container-fluid">
        <form method="POST" action="{{url('/user/edit')}}">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card-box m-t-0">
                    <h4 class="m-t-0 header-title"><b>Basic Information</b></h4>
                    <div class="p-20">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="about-info-p">
                                    <strong>Full Name</strong>
                                    <p class="text-muted">Johnathan Deo</p>
                                </div>
                                <div class="about-info-p">
                                    <strong>Email</strong>
                                    <p class="text-muted">johnathan@ubold.com</p>
                                </div>
                                <div class="about-info-p">
                                    <strong>Password</strong>
                                    <p class="text-muted">(123) 123 1234</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                    <div class="card-box m-t-0">
                        <h4 class="m-t-0 header-title"><b>Social networks</b></h4>
                        <p class="text-muted font-13">
                            Link your accounts so other users can find you there.
                        </p>
                        <div class="row" style="font-size: 36px; text-align: center">
                            <div class="col-md-2 col-md-offset-3"><i class="fa fa-twitter" onclick="toggleNetwork('tw')"></i></div>
                            <div class="col-md-2"><i class="fa fa-tumblr" onclick="toggleNetwork('tlr')"></i></div>
                            <div class="col-md-2"><i class="fa fa-youtube" onclick="toggleNetwork('yt')"></i></div>
                        </div>
                        <div class="p-20">
                            <div class="form-group">
                                <label for="name">Twitter</label>
                                <input type="text" name="tw" placeholder="http://twitter.com/@username" value="{{ Auth::user()->twitter_link }}" class="form-control" id="twitter" >
                            </div>
                            <div class="form-group">
                                <label for="name">Tumblr</label>
                                <input type="text" name="tlr" placeholder="http://username.tumblr.com" value="{{ Auth::user()->tumlr_link }}"" class="form-control" id="tumblr" >
                            </div>
                            <div class="form-group">
                                <label for="name">Youtube</label>
                                <input type="text" name="yt" placeholder="http://youtube.com/username" value="{{ Auth::user()->youtube_link }}"" class="form-control" id="youtube" >
                            </div>
                        </div>
                    </div>


            </div>


            <div class="col-md-4">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>About me</b></h4>

                        <div class="p-20">
                            @if(!empty(Auth::user()->bio))
                            {{ Auth::user()->bio }}
                            @endif
                        </div>
                    </div>
            </div>


        </div>
            {{ csrf_field() }}
        <div class="row">
        <div class="col-md-12" style="text-align: center">
            <div class="form-group text-center m-b-0">
                <a href="{{ url('/user/profile/'.Auth::user()->username) }}" type="reset" class="btn btn-inverse waves-effect waves-light m-l-5">
                    Cancel
                </a>
                <button class="btn btn-default waves-effect waves-light" type="submit">
                    Save
                </button>
            </div>
        </div>
        </div>
            </form>
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