@extends('Admin::backend.layouts.default')

{{-- Page Title --}}
@section('title')
Create New Record &ndash; Taxonomy Taxons
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
                <a class="btn btn-small btn-primary" href="{{ route('administration.taxonomy.taxons.index') }}">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                    Back
                </a>
            </div>
        </h1>
    </div>

    <?php echo Form::open( array( 'url' => route('administration.taxonomy.taxons.create'), 'role' => 'form' ) ); ?>

    <div class="form-group<?php if( $errors->has('name') ){ ?> has-error<?php } ?>">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Taxon name" value="{{ Input::old('name') }}" />
        @if ($errors->has('name') )
        <span class="help-block text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group<?php if( $errors->has('description') ){ ?> has-error<?php } ?>">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Taxon description"></textarea>
        @if ($errors->has('description') )
        <span class="help-block text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <div class="form-group<?php if( $errors->has('taxonomic_unit_id') ){ ?> has-error<?php } ?>">
        <label for="taxonomic_unit_id">Unit</label>
        <select class="form-control" id="taxonomic_unit_id" name="taxonomic_unit_id">
            @foreach($taxonomyUnits as $taxonomyUnit)
            <option value="{{ $taxonomyUnit->id }}">{{ $taxonomyUnit->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('taxonomic_unit_id') )
        <span class="help-block text-danger">{{ $errors->first('taxonomic_unit_id') }}</span>
        @endif
    </div>

    <div class="form-group<?php if( $errors->has('parent_id') ){ ?> has-error<?php } ?>">
        <label for="taxonomic_unit_id">Parent</label>
        <select class="form-control" id="parent_id" name="parent_id">
            <option value="0">None</option>
            @foreach($taxons as $taxon)
            <option value="{{ $taxon->id }}">{{ $taxon->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('parent_id') )
        <span class="help-block text-danger">{{ $errors->first('parent_id') }}</span>
        @endif
    </div>

    <div class="form-group pull-right">
        <a class="btn btn-small btn-link" href="{{ route('administration.taxonomy.taxons.index') }}">
            Cancel
        </a>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
    <?php echo Form::close(); ?>

</div>
@stop
