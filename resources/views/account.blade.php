<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }} !
        </h2>
    </x-slot>

<div class="account">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <!-- table -->                                
                    <div class="mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h3 class="m-0 font-weight-bold text-primary fw-bold">Accounts</h3>
                            <button type="button" class="btn btn-primary rounded-1 px-5" data-bs-toggle="modal" data-bs-target="#accountModal"> New </button>
                        </div>
                            
                        <div id="success_message"> </div>
                        <div class="card-body relative">
                            
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    
                                
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Account Type</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="account-list">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /table -->
                </div>
            </div>
        </div>
    </div>
    
</div>
    
    
<!-- create modal -->
<div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountModalLabel">New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <!-- input fields -->
                
                <ul id="save_errlist"></ul>
                                                
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
                </div>
    
                <!-- Select Option Rol type -->
                <div class="mt-4">
                    <x-label for="role_id" value="{{ __('Register as:') }}" />
                    <select name="role_id" id="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
    
                <!-- end- input fields -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-account">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end- create modal -->

<!-- edit modal -->
<div class="modal fade" id="accountEditModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountModalLabel">Edit Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <!-- input fields -->
                
                <ul id="edit_errlist"></ul>
                                                
                <!-- account id -->
                
                <input type="hidden" id="edit_account_id"> 
                
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="edit_name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="edit_email" class="block mt-1 w-full" type="email" name="email" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="edit_password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
                    <x-input id="edit_password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
                </div>
               
                <!-- end- input fields -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update-account">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- end- edit modal -->

<!-- delete confirmation modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
                
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger delete-account-btn">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- end- delete confirmation modal -->


@section('scripts')
<script>
      
$(document).ready(function () {
   
    // show 
    fetchAccount();
    
    function fetchAccount() { 
        $.ajax({
            type: "GET",
            url: "/accounts/show-accounts",
            dataType: "json",
            success: function (response) {
                var count = 1; 
                $('.account-list').html("");
                
                if (response.users.length > 0) {
                    $.each(response.users, function (key, user) { 
                       
                        $('.account-list').append(
                            '<tr>'+
                                '<td class="text-center">'+ count++ +'</td>'+
                                '<td>'+ user.name +'</td>'+
                                '<td>'+ user.roles +'</td>'+
                                '<td>'+ user.email +'</td>'+
                                '<td>' +
                                    '<button type"button" value="'+ user.id +'" class="edit-account btn btn-primary"> Edit </button> '+
                                    '<button type="button" value="'+ user.id +'" class="delete-account btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"> Delete </button> '+
                                '</td>'+
                            '</tr>'
                        );
                        
                    });
                } else { 
                    $('.account-list').append('<div class="no-data"> No data Found </div>')
                }
            }
        });
    }
    
    
    // store
    $(document).on('click','.save-account', function(e) { 
        e.preventDefault();
        
        var data = {
        'name': $('#name').val(),
        'email': $('#email').val(),
        'password': $('#password').val(),
        'password_confirmation': $('#password_confirmation').val(),
        'role_id': $('#role_id').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "accounts",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if(response.status == 400) { 
                    $('#save_errlist').html("");
                    $('#save_errlist').addClass("alert alert-danger");
                    $.each(response.errors, function (key, error_values) { 
                        $('#save_errlist').append('<li>'+ error_values +'</li>')
                    });
                } else { 
                    $('#save_errlist').html("");
                    $('#save_errlist').removeClass("alert alert-danger");
                    $('#accountModal').modal('hide');
                    $('#accountModal').find('input').val("");
                    
                    fetchAccount();
                    Swal.fire(
                        'Good job!',
                        response.message,
                        'success'
                    )
                }
            }
        });
    });
    

    // edit 
    $(document).on('click', '.edit-account', function (e) {
        e.preventDefault();
        
        var account_id = $(this).val();
        $('#accountEditModal').modal('show');
        
        $.ajax({
            type: "GET",
            url: "accounts/"+account_id+"/edit",
            success: function (response) {
                console.log(response);
                if (response.status == 404) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    });
                } else { 
                    $('#edit_name').val(response.user.name);
                    $('#edit_email').val(response.user.email);
                    $('#edit_password').val("");
                    $('#edit_account_id').val(account_id);
                }
                
            }
        });
    });
    
    // update 
    $(document).on('click', '.update-account', function (e) {
        
        e.preventDefault();
        var account_id = $('#edit_account_id').val();
        var data = { 
            'name': $('#edit_name').val(),
            'email': $('#edit_email').val(),
            'password': $('#edit_password').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "PUT",
            url: "accounts/"+account_id,
            data: data,
            dataType: "json",
            success: function (response) {
                
                if(response.status == 400) { 
                
                    $('#edit_errlist').html("");
                    $('#edit_errlist').addClass("alert alert-danger");
                    $.each(response.errors, function (key, error_values) { 
                        $('#edit_errlist').append('<li>'+ error_values +'</li>')
                    });
                    
                } 
                else if(response.status == 404) { 
                
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    });
                    
                }
                else { 
                
                    $('#edit_errlist').html("");
                    $('#edit_errlist').removeClass("alert alert-danger");
                    $('#accountEditModal').modal('hide');
                    $('#accountEditModal').find('input').val("");
                    
                    fetchAccount();
                    Swal.fire(
                        'Good job!',
                        response.message,
                        'success'
                    );
                    
                }
                
            }
        });
    });

     // display delete modal
    var account_id;
    $(document).on('click', '.delete-account', function (e) {
        e.preventDefault();
        account_id = $(this).val(); 
        $('#deleteModal').modal('show');
    });


    // destroy
    $(document).on('click', '.delete-account-btn', function (e) {
        e.preventDefault();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            
            type: "DELETE",
            url: "accounts/"+account_id,
            
            success: function (response) {
    
                $('#deleteModal').modal('hide');
                fetchAccount();
                Swal.fire(
                    'Deleted!',
                    response.message,
                    'success'
                )
            }
        });
    });
    

});
    
</script>

@endsection
</x-app-layout>
