@extends('profiles.layout.master')
@section('title','Xabarlar')
@section('content')
    <br>
    <div class="card">
{{--        <div class="card-header">--}}
{{--            <h3 class="card-title">Projects Detail</h3>--}}

{{--            <div class="card-tools">--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">--}}
{{--                    <i class="fas fa-minus"></i>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="">
                            <h4>Recent Activity</h4>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                                    <span class="description">Shared publicly - 7:45 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
