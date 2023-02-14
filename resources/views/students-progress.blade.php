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
                                <h3 class="m-0 font-weight-bold text-primary fw-bold"> Student name </h3>
                            </div>

                            <div class="card-body relative">

                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>

                                        <tbody class="account-list">

                                            <tr>
                                                @foreach ($students as $student)
                                                {{ $student->results }}
                                                <td> English </td>
                                                <td style="width: 50%;">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                @endforeach

                                            </tr>


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