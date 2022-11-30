@php $editing = isset($healthCategory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="cat_name"
            label="Category Name"
            :value="old('cat_name', ($editing ? $healthCategory->cat_name : ''))"
            maxlength="255"
            placeholder="Category Name"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
