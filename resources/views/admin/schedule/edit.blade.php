@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Update an event</strong></div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('/admin/schedule', $schedule->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field("PUT") }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $schedule->title }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <input type="text" name="date" class="form-control" placeholder="Date" value="{{ $schedule->date }}">
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('organizer') ? ' has-error' : '' }}">
                                <input type="text" name="organizer" class="form-control" placeholder="Organizer" value="{{ $schedule->organizer }}">
                                @if ($errors->has('organizer'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('organizer') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('organizer_website') ? ' has-error' : '' }}">
                                <input type="text" name="organizer_website" class="form-control" placeholder="Organizer Website (https://www.example.com)" value="{{ $schedule->organizer_website }}">
                                @if ($errors->has('organizer_website'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('organizer_website') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <textarea name="address" class="form-control" placeholder="Address and other info" rows=2>{{ $schedule->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                        @if($schedule->photo == null)
                                            <input type="file" id="photo" name="photo">
                                            @if ($errors->has('photo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                            @else
                                                <p class="help-block">Upload a photo. (Make sure it's 640x480 px)</p>
                                            @endif

                                        @else
                                            <img src="{{ asset($schedule->photo) }}" alt="" width="100px">

                                            <a href="{{ route('schedule_delete_photo', $schedule->id) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('deletephoto').submit();">
                                                Delete Photo <i class="fa fa-trash"></i>
                                            </a>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkbox pull-right">
                                        <label>
                                            <input type="checkbox" name="visible"> Visible
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                            <a href="/admin/schedule" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="deletephoto" action="{{ route('schedule_delete_photo', $schedule->id) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
