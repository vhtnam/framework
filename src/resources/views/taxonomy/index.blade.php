@extends('appshell::layouts.default')

@section('title')
    {{ __('Categorization') }}
@stop

@section('content')

    <div class="card card-accent-secondary">

        <div class="card-header">
            @yield('title')

            <div class="card-actionbar">
                @can('create taxonomies')
                    <a href="{{ route('vanilo.taxonomy.create') }}" class="btn btn-sm btn-outline-success float-right">
                        <i class="zmdi zmdi-plus"></i>
                        {{ __('New Category Tree') }}
                    </a>
                @endcan
            </div>

        </div>

        <div class="card-block">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th style="width: 10%">&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($taxonomies as $taxonomy)
                    <tr>
                        <td>
                            @can('view taxonomies')
                                <a href="{{ route('vanilo.taxonomy.show', $taxonomy) }}">{{ $taxonomy->name }}</a>
                            @else
                                {{ $taxonomy->name }}
                            @endcan
                        </td>
                        <td>{{ $taxonomy->slug }}</td>
                        <td><span title="{{ $taxonomy->created_at }}">{{ $taxonomy->created_at->diffForHumans() }}</span></td>
                        <td>
                            @can('edit taxonomies')
                                <a href="{{ route('vanilo.taxonomy.edit', $taxonomy) }}"
                                   class="btn btn-xs btn-outline-primary btn-show-on-tr-hover float-right">{{ __('Edit') }}</a>
                            @endcan

                            @can('delete taxonomies')
                                <a href="{{ route('vanilo.taxonomy.destroy', $taxonomy) }}"
                                   class="btn btn-xs btn-outline-danger btn-show-on-tr-hover float-right">{{ __('Delete') }}</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

@stop
