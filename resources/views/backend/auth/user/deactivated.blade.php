@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.deactivated'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.users.management') }}
        <small class="text-muted">{{ __('labels.backend.access.users.deactivated') }}</small>
    </h5>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('labels.backend.access.users.deactivated') }}

            @include('backend.auth.user.includes.header-buttons')
        </div><!-- box-header -->

        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                    <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                    <th>{{ __('labels.backend.access.users.table.email') }}</th>
                    <th>{{ __('labels.backend.access.users.table.confirmed') }}</th>
                    <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                    <th>Other Permissions</th>
                    <th>{{ __('labels.backend.access.users.table.social') }}</th>
                    <th>{{ __('labels.backend.access.users.table.created') }}</th>
                    <th>{{ __('labels.backend.access.users.table.last_updated') }}</th>
                    <th>{{ __('labels.general.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                    @if ($users->count())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->confirmed_label !!}</td>
                                <td>{!! $user->roles_label !!}</td>
                                <td>{!! $user->permissions_label !!}</td>
                                <td>{!! $user->social_buttons !!}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9">There are no deactivated users.</td></tr>
                    @endif
                </tbody>
            </table>

            <div class="pull-left">
                {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
            </div>

            <div class="pull-right">
                {!! $users->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- card-body -->
    </div><!--card-->
@endsection
