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
            <small>Taxons</small>

            <div class="pull-right">
                <a class="btn btn-small btn-info" href="#">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>

                <a class="btn btn-small btn-primary" href="{{ route('administration.taxonomy.taxons.add') }}">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    Add New
                </a>
            </div>
        </h1>
    </div>

    <table class="table table-striped table-condensed">
        <thead>
        <tr>
            <th style="width:30px;">#</th>
            <th>Unit</th>
            <th>Name</th>
            <th>Slug</th>
            <th style="width:30px;">Used</th>
            <th style="width: 100px;">Actions</th>
        </tr>
        </thead>
        <tbody class="table-hover">

        @if ( count( $taxons ) == 0 )
        <tr>
            <td colspan="6">Sorry, there are no records available.</td>
        </tr>
        @else
        @foreach ( $taxons as $taxon )
        <tr>
            <td>{{ $taxon->id }}</td>
            <td>{{ $taxon->name }}</td>
            <td>
                <a href="{{ route( 'administration.taxonomy.taxons.edit', array( 'id' => $taxon->id ) ) }}" class="btn btn-primary btn-xs">Edit</a>
                <a href="route( 'administration.taxonomy.taxons.delete', array( 'id' => $taxon->id ) )" class="btn btn-danger btn-xs">Delete</a>
            </td>
        </tr>
        @endforeach
        @endif

        </tbody>
    </table>

</div>
@stop
