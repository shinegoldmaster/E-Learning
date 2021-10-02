@extends('layouts/instructor-dashboard')
@section('instructor-dashboard')
    <section class="profile">
        <div class="container">
            <div class="section-title">
                <h3>{{trans('instructor.instructor_Dashboard')}}</h3>
            </div>
            <div class="row">
                <!-- sub-main -->
                <div class="col-md-3 col-sm-12">
                    @include('instructor.instructor-leftmenu')
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="student-section-content card hoverable">
                        <div class="tab-content">
                            <!-- Page Content-->
                            <div id="section-9">
                                <div class="send-msg">
                                    <div class="section-title bg-blue">
                                        <h3>{{trans('instructor.Messages')}}</h3>
                                    </div>
                                    @if($errors->any())
                                        <div class="error">{{$errors->first()}}</div>
                                    @endif
                                    <div class="padding-20">
                                        <div class="row">
                                            <form method="POST" action="/instructor/sendmessage" accept-charset="UTF-8" class="form-horizontal bordered">
                                                {{ csrf_field() }}
                                                <div class="col-md-8 col-md-offset-2 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box">
                                                                <select class="wide" id="receiver" name="receiver" required>
                                                                    <option value="" selected>{{trans('instructor.Receiver')}}</option>
                                                                    @foreach($recipienterlist as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <script>
                                                                    $('#receiver').niceSelect();

                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col-md-12">
                                                            <textarea name="msg" id="msg" class="materialize-textarea" required=""></textarea>
                                                            <label for="textarea1">{{trans('instructor.Msg')}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center">
                                                        <button type="submit" class="btn btn-blue waves-effect"><i class="fa fa-send"></i> {{trans('instructor.Send')}}</button>
                                                        <a class="btn bg-danger waves-effect" style="color: #ffffff;" type="cancel" onclick="history.back(-1)"><i class="fa fa-ban" aria-hidden="true"></i> {{trans('instructor.Cancel')}}</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop