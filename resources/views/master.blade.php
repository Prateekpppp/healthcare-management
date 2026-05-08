
    @php
        $permissionData = [
          [
            'index'=>'Dashboard',
            'appointments'=>'Appointment',
            'doctors'=>'Doctor',
            'patients'=>'Patient',
            'employees'=>'Employee',
            'diseases'=>'Disease',
            'services'=>'Service',
            'packages'=>'Package',
            'medicines'=>'Medicine',
            'invoices'=>'Invoice',
          ],
          [
            'index'=>'Dashboard',
            'appointments'=>'Appointment',
            // 'doctors'=>'Doctor',
            'patients'=>'Patient',
            'diseases'=>'Disease',
            'services'=>'Service',
            'packages'=>'Package',
            'medicines'=>'Medicine',
            'invoices'=>'Invoice',
          ],
          [
            'index'=>'Dashboard',
            'appointments'=>'Appointment',
            'patients'=>'Patient',
            'services'=>'Service',
            'packages'=>'Package',
            'medicines'=>'Medicine',
            'invoices'=>'Invoice',
          ]
        ];

        // Role => 0 = admin, 1 = doctor, 2 = receptionist
        $permissions = $permissionData[$currentUser->role_id - 1];
    @endphp
    
    @include('includes.head')

    @yield('body')

    @include('includes.foot')