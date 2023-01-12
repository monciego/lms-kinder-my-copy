<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }} !
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg c-container">
                <h3 class="p-6 m-0 font-weight-bold text-primary fw-bold">Activities</h3>
                
                    <div class="row mx-3">

                        <!-- QUIZ -->
                        <a href="{{ route('quizzes.index') }}" class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow-sm h-100 py-6">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md text-center fw-bold font-weight-bold text-primary text-uppercase mb-1">
                                                QUIZ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- END- QUIZ -->

                        <!-- SHAPES -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow-sm h-100 py-6">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md text-center fw-bold font-weight-bold text-primary text-uppercase mb-1">
                                                SHAPES
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END- QUIZ -->

                        <!-- MATH PROBLEMS -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow-sm h-100 py-6">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md text-center fw-bold font-weight-bold text-primary text-uppercase mb-1">
                                                MATH PROBLEMS
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END- MATH PROBLEMS -->
                        
                        <!-- COLOR -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow-sm h-100 py-6">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md text-center fw-bold font-weight-bold text-primary text-uppercase mb-1">
                                                COLOR
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END- COLOR -->
                        
                        <!-- COLOR -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow-sm h-100 py-6">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-md text-center fw-bold font-weight-bold text-primary text-uppercase mb-1">
                                                PUZZLE
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END- COLOR -->
                        
                        
                    </div>
                    
                    
            </div>
        </div>
    </div>
</x-app-layout>
