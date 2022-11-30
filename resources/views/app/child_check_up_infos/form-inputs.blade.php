@php $editing = isset($childCheckUpInfo) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="child_id" label="Child" required>
            @php $selected = old('child_id', ($editing ? $childCheckUpInfo->child_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Child</option>
            @foreach($children as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="weight"
            label="Weight (kg)"
            :value="old('weight', ($editing ? $childCheckUpInfo->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Weight (kg)"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="height"
            label="Height (cm)"
            :value="old('height', ($editing ? $childCheckUpInfo->height : ''))"
            max="255"
            step="0.01"
            placeholder="Height (cm)"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="bmi"
            label="Body Mass Index"
            :value="old('bmi', ($editing ? $childCheckUpInfo->bmi : ''))"
            max="255"
            step="0.01"
            placeholder="BMI"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="remarks"
            label="Remarks"
            :value="old('remarks', ($editing ? $childCheckUpInfo->remarks : ''))"
            maxlength="255"
            placeholder="Remarks"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="diagnosis"
            label="Diagnosis"
            :value="old('diagnosis', ($editing ? $childCheckUpInfo->diagnosis : ''))"
            maxlength="255"
            placeholder="Diagnosis"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="bario_physician_id"
            label="RHU Representative - Midwifie - BHU - Physician"
            required
        >
            @php $selected = old('bario_physician_id', ($editing ? $childCheckUpInfo->bario_physician_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Rural Health UnitPhysician</option>
            @foreach($barioPhysicians as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="checkup_followup"
            label="Checkup Followup"
            value="{{ old('checkup_followup', ($editing ? optional($childCheckUpInfo->checkup_followup)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
