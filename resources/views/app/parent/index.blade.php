@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.users.index_title')</h4>
                <div class="col-md-6 text-right">
                    <!-- <a href="{{ route('parent.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">

                    <thead>
                        <tr>
                            <th class="text-left">
                                <label>Parent-Mother's Name</label>
                            </th>
                            <th class="text-left">
                                <label>Username</label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($parents as $parent)
                        <tr>

                            <td>{{ $parent->completename ?? '-' }}</td>
                            <td>{{ $parent->username?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">{!! $parents->links() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection