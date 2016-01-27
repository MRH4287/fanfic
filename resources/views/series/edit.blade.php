@extends('layouts.app')

@section('css')
    <link href="{{ URL::asset('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Edit Series</b></h4>
                <p class="text-muted font-13 m-b-30">
                    To edit series just edit the name as you wish (don't leave it empty) and add/remove all the characters that you like.
                </p>

                <form method="POST" action="{{url('/series/edit/'.$series->id)}}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="" class="form-control" id="name" value="{{ $series->name }}" >
                    </div>
                    <div class="form-group">
                        <label for="characters">Characters:</label>
                        <div class="m-b-0">
                            <select id="characters" name="characters[]" multiple data-role="tagsinput">
                                @foreach($series->characters as $character)
                                    <option selected="" value="{{ $character->name }}">{{ $character->name }}</option>
                                @endforeach
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
                    <input name="id" value="{{ $series->id }}" hidden>
                    <div class="form-group text-right m-b-0">
                        <button href="{{ url('/series/list') }}" type="reset" class="btn btn-inverse waves-effect waves-light m-l-5">
                            Cancel
                        </button>
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