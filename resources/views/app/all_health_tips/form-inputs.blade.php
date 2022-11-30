@php $editing = isset($healthTips) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="health_category_id"
            label="Health Category"
            required
        >
            @php $selected = old('health_category_id', ($editing ? $healthTips->health_category_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Health Category</option>
            @foreach($healthCategories as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.url
            name="url"
            label="Url"
            :value="old('url', ($editing ? $healthTips->url : ''))"
            maxlength="255"
            placeholder="Url"
            required
        ></x-inputs.url>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Keywords"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $healthTips->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="content"
            label="Content"
            maxlength="255"
            required
            >{{ old('content', ($editing ? $healthTips->content : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="source"
            label="References"
            maxlength="255"
            required
            >{{ old('source', ($editing ? $healthTips->source : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
