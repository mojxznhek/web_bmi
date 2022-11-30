@php $editing = isset($barioPhysician) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="completename"
            label="Completename"
            :value="old('completename', ($editing ? $barioPhysician->completename : ''))"
            maxlength="255"
            placeholder="Completename"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="profession"
            label="Profession"
            :value="old('profession', ($editing ? $barioPhysician->profession : ''))"
            maxlength="255"
            placeholder="Profession"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="license_no"
            label="License No"
            :value="old('license_no', ($editing ? $barioPhysician->license_no : ''))"
            maxlength="255"
            placeholder="License No"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
