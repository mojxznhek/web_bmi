@php $editing = isset($childMedicalData) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="child_id"
            label="Complete Name of Child"
            required
        >
            @php $selected = old('child_id', ($editing ? $childMedicalData->child_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Child</option>
            @foreach($children as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="weight"
            label="Weight (kg)"
            id="weight"
            :value="old('weight', ($editing ? $childMedicalData->weight : ''))"
            max="255"
            step="0.01"
            placeholder="Weight (kg)"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="height"
            id="height"
            label="Height (cm)"
            :value="old('height', ($editing ? $childMedicalData->height : ''))"
            max="255"
            step="0.01"
            placeholder="Height (cm)"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="bmi"
            id="bmi"
            label="Body Mass Index"
            :value="old('bmi', ($editing ? $childMedicalData->bmi : ''))"
            max="255"
            step="0.01"
            placeholder="BMI"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="remarks"
            label="Remarks"
            id="remarks"
            :value="old('remarks', ($editing ? $childMedicalData->remarks : ''))"
            maxlength="255"
            placeholder="Remarks"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="diagnosis"
            label="Diagnosis"
            :value="old('diagnosis', ($editing ? $childMedicalData->diagnosis : ''))"
            maxlength="255"
            placeholder="Diagnosis"
            required
        ></x-inputs.textarea>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="rhuBhw_id"
            label="RHU-BHW Representative"
            required
        >
            @php $selected = old('rhuBhw_id', ($editing ? $childMedicalData->rhuBhw_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the RHU-BHW Representative</option>
            @foreach($rhuBhws as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="checkup_followup"
            label="Checkup Followup Date"
            value="{{ old('checkup_followup', ($editing ? optional($childMedicalData->checkup_followup)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
<script>
    const heightInput = document.getElementById('height');
    const weightInput = document.getElementById('weight');

    heightInput.addEventListener('input', calculateBMI);
    weightInput.addEventListener('input', calculateBMI);

    function calculateBMI () {
        const height = parseFloat(heightInput.value);
        const weight = parseFloat(weightInput.value);
        const bmi = weight /height/height*10000;
        bmi.value = bmi.toFixed(2);
        document.getElementById('bmi').value = bmi;
        if(bmi < 18.5){
             document.getElementById('remarks').value = "Underweight";
        }else if (bmi < 25){
             document.getElementById('remarks').value = "Normal";
        }else if (bmi < 30){
             document.getElementById('remarks').value = "Overweight";
        }else{
             document.getElementById('remarks').value = "Obese";
        }
    }
</script>
