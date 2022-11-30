@php $editing = isset($rhuBhw) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="completename"
            label="Complete Name"
            :value="old('completename', ($editing ? $rhuBhw->completename : ''))"
            maxlength="255"
            placeholder="Complete Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="profession"
            label="Profession"
            :value="old('profession', ($editing ? $rhuBhw->profession : ''))"
            maxlength="255"
            placeholder="Profession"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="license_no"
            label="License No"
            :value="old('license_no', ($editing ? $rhuBhw->license_no : ''))"
            maxlength="255"
            placeholder="License No"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
