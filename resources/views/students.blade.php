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
                            <h3 class="m-0 font-weight-bold text-primary fw-bold">Students</h3>   
                        </div>
                            
                        <div class="card-body relative">
                            
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    
                                
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Grade Level</th>
                                            <th>Email</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="account-list">
                                        @forelse ($students as $student)
                                            <tr>
                                                <td> {{$student->name}} </td>
                                                <td>
                                                    @if($student->grade != null)
                                                        <span>Grade {{$student->grade}}</span>
                                                    @else 
                                                        <span>admin</span>
                                                    @endif
                                                </td>
                                                <td> {{$student->email}} </td>
                                                <td style="width: 30%;">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        @empty 
                                            <td>NO DATA FOUND</td>
                                        @endforelse
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

</x-app-layout>
