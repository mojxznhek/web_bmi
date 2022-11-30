<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'children' => [
        'name' => 'Children',
        'index_title' => 'Children List',
        'new_title' => 'New Child',
        'create_title' => 'Create Child',
        'edit_title' => 'Edit Child',
        'show_title' => 'Show Child',
        'inputs' => [
            'photo' => 'Photo',
            'completename' => 'Completename',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'mothersName' => 'Mothers Name',
            'phone' => 'Phone',
            'address' => 'Address',
        ],
    ],

    'child_check_up_infos' => [
        'name' => 'Child Check Up Infos',
        'index_title' => 'ChildCheckUpInfos List',
        'new_title' => 'New Child check up info',
        'create_title' => 'Create ChildCheckUpInfo',
        'edit_title' => 'Edit ChildCheckUpInfo',
        'show_title' => 'Show ChildCheckUpInfo',
        'inputs' => [
            'child_id' => 'Complete Name of Child',
            'weight' => 'Weight (kg)',
            'height' => 'Height (cm)',
            'bmi' => 'Body Mass Index',
            'remarks' => 'Remarks',
            'diagnosis' => 'Diagnosis',
            'rhuBhw_id' => 'RHU-BHW Representative',
            'checkup_followup' => 'Checkup Followup Date',
        ],
    ],

    'all_health_tips' => [
        'name' => 'All Health Tips',
        'index_title' => 'AllHealthTips List',
        'new_title' => 'New Health tips',
        'create_title' => 'Create HealthTips',
        'edit_title' => 'Edit HealthTips',
        'show_title' => 'Show HealthTips',
        'inputs' => [
            'health_category_id' => 'Health Category',
            'url' => 'Url',
            'description' => 'Keywords',
            'content' => 'Content',
            'source' => 'References',
        ],
    ],

    'health_categories' => [
        'name' => 'Health Categories',
        'index_title' => 'HealthCategories List',
        'new_title' => 'New Health category',
        'create_title' => 'Create HealthCategory',
        'edit_title' => 'Edit HealthCategory',
        'show_title' => 'Show HealthCategory',
        'inputs' => [
            'cat_name' => 'Category Name',
        ],
    ],

    'rural_health_unit_barangay_health_workers' => [
        'name' => 'Rural Health Unit - Barangay Health Workers',
        'index_title' => 'Rural Health Unit - Barangay Health Workers',
        'new_title' => 'New RHU-BHW',
        'create_title' => 'Create RHU-BHW',
        'edit_title' => 'Edit RHU-BHW',
        'show_title' => 'Show RHU-BHW',
        'inputs' => [
            'completename' => 'Complete Name',
            'profession' => 'Profession',
            'license_no' => 'License No',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'photo' => 'Photo',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],
];
