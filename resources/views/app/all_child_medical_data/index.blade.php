@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\ChildMedicalData::class)
                <a
                    href="{{ route('all-child-medical-data.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.child_check_up_infos.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.child_check_up_infos.inputs.child_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.child_check_up_infos.inputs.weight')
                            </th>
                            <th class="text-right">
                                @lang('crud.child_check_up_infos.inputs.height')
                            </th>
                            <th class="text-right">
                                @lang('crud.child_check_up_infos.inputs.bmi')
                            </th>
                            <th class="text-left">
                                @lang('crud.child_check_up_infos.inputs.remarks')
                            </th>
                            <th class="text-left">
                                @lang('crud.child_check_up_infos.inputs.diagnosis')
                            </th>
                            <th class="text-left">
                                @lang('crud.child_check_up_infos.inputs.rhuBhw_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.child_check_up_infos.inputs.checkup_followup')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allChildMedicalData as $childMedicalData)
                        <tr>
                            <td>
                                {{
                                optional($childMedicalData->child)->completename
                                ?? '-' }}
                            </td>
                            <td>{{ $childMedicalData->weight ?? '-' }}</td>
                            <td>{{ $childMedicalData->height ?? '-' }}</td>
                            <td>{{ $childMedicalData->bmi ?? '-' }}</td>
                            <td>{{ $childMedicalData->remarks ?? '-' }}</td>
                            <td>{{ $childMedicalData->diagnosis ?? '-' }}</td>
                            <td>
                                {{
                                optional($childMedicalData->rhuBhw)->completename
                                ?? '-' }}
                            </td>
                            <td>
                                {{ $childMedicalData->checkup_followup ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $childMedicalData)
                                    <a
                                        href="{{ route('all-child-medical-data.edit', $childMedicalData) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan 

                                    
                                    @can('view', $childMedicalData)
                                    <a
                                        href="{{ route('all-child-medical-data.show', $childMedicalData) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    
                                    @endcan 



                                    
                                    @can('delete', $childMedicalData)
                                    <form
                                        action="{{ route('all-child-medical-data.destroy', $childMedicalData) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan



                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                {!! $allChildMedicalData->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
