@extends('Admin::backend.layouts.default')

{{-- Page Title --}}
@section('title')
Taxonomy Units
@parent
@stop

{{-- Page Content --}}
@section('pageContent')
<div class="container auto-max-width">
    <div class="page-header">
        <h1>
            <span class="glyphicon glyphicon-pushpin reposition"></span>
            Taxonomy
            <small>Units</small>

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>

                <a class="btn btn-small btn-primary" href="#">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Add New
                </a>
            </div>
        </h1>
    </div>
</div>
@stop
