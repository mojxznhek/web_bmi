@php $editing = isset($child) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $child->photo ? \Storage::url($child->photo) : '' }}')"
        >
            <x-inputs.partials.label
                name="photo"
                label="Photo"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="photo"
                    id="photo"
                    @change="fileChosen"
                />
            </div>

            @error('photo') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="completename"
            label="Childs Complete Name"
            :value="old('completename', ($editing ? $child->completename : ''))"
            maxlength="50"
            placeholder="Child's Complete Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.date
            name="dob"
            id="dob"
            onChange="calculateAge()"
            label="Date Of Birth"
            value="{{ old('dob', ($editing ? optional($child->dob)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

        <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="age"
            label="Age"
            max="255"
            required
            disabled
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $child->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="mothersName"
            label="Mothers Full Name"
            :value="old('mothersName', ($editing ? $child->mothersName : ''))"
            maxlength="255"
            placeholder="Mothers Full Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $child->phone : ''))"
            max="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-9">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $child->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-12">
        <x-inputs.text
            name="username"
            label="Username"
            :value="old('username', ($editing ? $child->username : ''))"
            maxlength="255"
            placeholder="Username"
            required
            autocomplete="off"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-12">
        <x-inputs.password
            name="password"
            label="Password"
            :value="old('password', ($editing ? $child->password : ''))"
            maxlength="255"
            placeholder="password"
            required
            autocomplete="off"
        ></x-inputs.password>
    </x-inputs.group>

     <x-inputs.group class="col-sm-12 col-lg-12">
      <x-inputs.password name="confirm-password" label="Confirm Password" :value="old('confirm-password', ($editing ? $child->confirm : ''))"
            maxlength="255" placeholder="Confirm Password" required></x-inputs.password>
    </x-inputs.group>
</div>

<script>
    
    // dobInput.addEventListener('input', calculateAge);
    function calculateAge () {
    var userinput = document.getElementById("dob").value;  
    var dob = new Date(userinput);  
    if(userinput==null || userinput=='') {  
      //document.getElementById("message").innerHTML = "**Choose a date please!";    
      return false;   
    } else {  
      
    //calculate month difference from current date in time  
    var month_diff = Date.now() - dob.getTime();  
      
    //convert the calculated difference in date format  
    var age_dt = new Date(month_diff);   
      
    //extract year from date      
    var year = age_dt.getUTCFullYear();  
      
    //now calculate the age of the user  
    var age = Math.abs(year - 1970);  
      
    //display the calculated age  
    document.getElementById('age').value = age;  
    }
    }
</script>
