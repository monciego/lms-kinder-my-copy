<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }} !
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg c-container">
                <div class="bg-white">
                                                    
                     <!-- table -->                                
                     <div class="mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h3 class="m-0 font-weight-bold text-primary fw-bold">Reading</h3>
                            <button type="button" class="add-quiz-trigger btn btn-primary rounded-1 px-5" data-bs-toggle="modal" data-bs-target="#quizModal"> New </button>
                        </div>
                            
                        <div id="success_message"> </div>
                        <div class="card-body relative">
                            
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    
                                
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Quiz</th>
                                            <th>Instruction</th>
                                            <th>Uploaded</th>
                                            <th>Deadline</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="quiz-list">
                                        
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
    
    
    <!-- create modal -->
    <div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Reading</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    
                    <!-- input fields -->
                
                        <ul id="save_errlist"></ul>
                                                    
                        <!-- Quiz Name -->
                        <div>
                            <p><label for="text"> Text </label></p>
                            <textarea id="text" name="text" rows="4" cols="42">
                            </textarea>
                        </div>
                    
                    <!-- end- input fields -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-quiz">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end- create modal -->
    
</x-app-layout>