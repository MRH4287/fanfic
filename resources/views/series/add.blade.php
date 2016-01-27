@extends('layouts.app')

@section('css')
    <link href="{{ URL::asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endsection
@section('content')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>Add Series</b></h4>
                    <p class="text-muted font-13 m-b-30">
                        To add a new series just complete the name and add all the characters that you like.
                    </p>

                    <form method="POST" action="{{url('/series/add')}}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="" class="form-control" id="name" >
                        </div>
                        <div class="form-group">
                            <label for="characters">Characters:</label>
                            <div class="m-b-0">
                                <select id="characters" name="characters[]" multiple data-role="tagsinput">
                                </select>
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group text-right m-b-0">
                            <a href="{{ url('/series/list') }}" type="reset" class="btn btn-inverse waves-effect waves-light m-l-5">
                                Cancel
                            </a>
                            <button class="btn btn-default waves-effect waves-light" type="submit">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
@endsection