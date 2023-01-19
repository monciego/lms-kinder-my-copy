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
                                                    
                    <div class="p-4 question d-flex flex-column gap-6 relative">
                        <div class="card mh-10 heading">
                        
                            <input type="hidden" name="quiz_id" id="quiz_id" value="{{ $id }}">

                            <div class="card-body d-flex flex-column justify-content-center">
                                <h5 class="card-title pb-3 border-b quiz-name"></h5>
                                <p class="card-text fs-6 mb-0 quiz-instruction"></p>
                                <p class="card-text fs-6 mb-0 date-uploaded pt-2"></p>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text fs-6 mb-0 quiz-deadline"></p>
                                    <p class="card-text fs-6 mb-0 score"></p>
                                </div>
                                <button type="button" class="add-question-trigger mt-2 btn btn-primary rounded-1 px-5" style="width: fit-content; float: right" data-bs-toggle="modal" data-bs-target="#questionModal"> Add </button>
                            </div>
                     
                        </div>
                        
                        
                        <!-- display question -->
                       
                        <div class="display_questions">
                           
                        </div>
                           
                        <!-- end- display questions -->
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- create modal -->
    <div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Add Question </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                
                        <!-- question -->
                        <div class="card border-0 mh-10 questions-wrapper">
                            <div class="card-body d-flex flex-column justify-content-center">
                                
                                <ul id="save_errlist"></ul>
                                <!-- input fields -->
                                <div class="input-fields">
                                    
                                    <!-- question -->
                                    <div class="field__input relative mt-2">
                                        <input type="text" name="question" id="question" class="w-full input" placeholder="Type your question...">
                                    </div>
                                    <!-- end- question -->
                                    
                                    <!-- choices -->
                                    <div class="choices-wrapper pt-3">
                                    
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_1" id="option_1" class="w-full input" placeholder="Option 1">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_2" id="option_2" class="w-full input" placeholder="Option 2">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_3" id="option_3" class="w-full input" placeholder="Option 3">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_4" id="option_4" class="w-full input" placeholder="Option 4">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <select name="key_answer" id="key_answer" class="w-full input">
                                                <option value="" id="selected" selected>--Select Answer--</option>
                                                <option id="key_answer_1"></option>
                                                <option id="key_answer_2"></option>
                                                <option id="key_answer_3"></option>
                                                <option id="key_answer_4"></option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <!-- end- choices -->
                                    
                                </div>
                                <!-- end- input-fields -->
                                
                            </div>
                        </div>
                        <!-- end- question -->
        
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-question">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end- create modal -->
    
    <!-- edit modal -->
    <div class="modal fade" id="questionEditModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Edit Question </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                                                
                        <input type="hidden" id="edit_question_id"> 

                        <!-- question -->
                        <div class="card border-0 mh-10 questions-wrapper">
                            <div class="card-body d-flex flex-column justify-content-center">
                           
                                <ul id="edit_errlist"></ul>
                                <!-- input fields -->
                                <div class="input-fields">
                                    
                                    <!-- question -->
                                    <div class="field__input relative mt-2">
                                        <input type="text" name="question" id="edit_question" class="w-full input" placeholder="Type your question...">
                                    </div>
                                    <!-- end- question -->
                                    
                                    <!-- choices -->
                                    <div class="choices-wrapper pt-3">
                                    
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_1" id="edit_option_1" class="w-full input" placeholder="Option 1">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_2" id="edit_option_2" class="w-full input" placeholder="Option 2">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_3" id="edit_option_3" class="w-full input" placeholder="Option 3">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <div class="circle"> </div>
                                            <input type="text" name="option_4" id="edit_option_4" class="w-full input" placeholder="Option 4">
                                        </div>
                                        
                                        <div class="field__input relative d-flex items-center">
                                            <select name="key_answer" id="edit_key_answer" class="w-full input edit_key_answer">
                                                <option selected="selected">--Select Answer--</option>
                                                <option class="edit_key_answer_1" id="edit_key_answer_1"></option>
                                                <option class="edit_key_answer_2" id="edit_key_answer_2"></option>
                                                <option class="edit_key_answer_3" id="edit_key_answer_3"></option>
                                                <option class="edit_key_answer_4" id="edit_key_answer_4"></option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <!-- end- choices -->
                                    
                                </div>
                                <!-- end- input-fields -->
                                
                            </div>
                        </div>
                        <!-- end- question -->
        
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update-question">Save</button>
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
                    <button type="button" class="btn btn-danger delete-quiz-btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end- delete confirmation modal -->
    
@section('scripts')

<script>     
    
     // add modal fields select
    $(document).on('focusout', '#option_1' , function (e) {
        e.preventDefault();
        var option_1 = $('#option_1').val();
        $('#key_answer_1').val('');
        $('#key_answer_1').html('');
        $('#key_answer_1').val(option_1);
        $('#key_answer_1').append(option_1);
    });
    
    $(document).on('focusout', '#option_2' , function (e) {
        e.preventDefault();
        var option_2 = $('#option_2').val();
        $('#key_answer_2').val('');
        $('#key_answer_2').html('');
        $('#key_answer_2').val(option_2);
        $('#key_answer_2').append(option_2);
    });
    
    $(document).on('focusout', '#option_3' , function (e) {
        e.preventDefault();
        var option_3 = $('#option_3').val();
        $('#key_answer_3').val('');
        $('#key_answer_3').html('');
        $('#key_answer_3').val(option_3);
        $('#key_answer_3').append(option_3);
    });
    
    $(document).on('focusout', '#option_4' , function (e) {
        e.preventDefault();
        var option_4 = $('#option_4').val();
        $('#key_answer_4').val('');
        $('#key_answer_4').html('');
        $('#key_answer_4').val(option_4);
        $('#key_answer_4').append(option_4);
    });
    
    
    
    // edit modal fields select
    $(document).on('focusout', '#edit_option_1' , function (e) {
        e.preventDefault();
        var edit_option_1 = $('#edit_option_1').val();
        $('#edit_key_answer_1').val('');
        $('#edit_key_answer_1').html('');
        $('#edit_key_answer_1').val(edit_option_1);
        $('#edit_key_answer_1').append(edit_option_1);
    });
    
    $(document).on('focusout', '#edit_option_2' , function (e) {
        e.preventDefault();
        var edit_option_2 = $('#edit_option_2').val();
        $('#edit_key_answer_2').val('');
        $('#edit_key_answer_2').html('');
        $('#edit_key_answer_2').val(edit_option_2);
        $('#edit_key_answer_2').append(edit_option_2);
    });
    
    $(document).on('focusout', '#edit_option_3' , function (e) {
        e.preventDefault();
        var edit_option_3 = $('#edit_option_3').val();
        $('#edit_key_answer_3').val('');
        $('#edit_key_answer_3').html('');
        $('#edit_key_answer_3').val(edit_option_3);
        $('#edit_key_answer_3').append(edit_option_3);
    });
    
    $(document).on('focusout', '#edit_option_4' , function (e) {
        e.preventDefault();
        var edit_option_4 = $('#edit_option_4').val();
        $('#edit_key_answer_4').val('');
        $('#edit_key_answer_4').html('');
        $('#edit_key_answer_4').val(edit_option_4);
        $('#edit_key_answer_4').append(edit_option_4);
    });
    
    
    // show 
    fetchQuestion();
    
    function fetchQuestion() { 
    
        var url = '{{ route("questions.index") }}';
        var data = {
            'quiz_id': $('#quiz_id').val(),
        }
        
        $.ajax({
            type: "GET",
            url: url,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
                
                $('.display_questions').html("");
                if (response.questions.length > 0) {
                    $.each(response.questions, function (key, question) { 
                                                                 
                        $('.display_questions').append(
                            '<div class="card mh-10 questions-wrapper">'+
                            '<div class="card-body d-flex flex-column justify-content-center">'+
                            '<div class="input-fields">'+
                                
                                // '<ul id="save_errlist"> </ul>'+
                                
                                '<div class="field__input relative question_content">'+
                                    
                                    '<div class="w-full">'+ question.question +'</div>'+
                                    
                                    '<div>'+
                                        '<button class="btn btn-primary mx-2 edit-question" value="'+ question.id +'"> Edit </button>'+
                                        '<button class="btn btn-danger delete-question" value="'+ question.id +'"> Delete </button>'+
                                    '</div>'+
                                '</div>'+
                
                                                            
                                '<!-- choices teacher-->'+
                                '<div class="choices-display__wrapper pt-4">'+
                                
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ question.option_1 +'" type="radio" name="'+ question.id +'" id="option_1_display" class="option_1_display option_display mr-2" placeholder="Option 1">'+
                                            '<label for="'+ question.id +'"> '+ question.option_1 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ question.option_2 +'" type="radio" name="'+ question.id +'" id="option_2_display" class="option_2_display option_display mr-2" placeholder="Option 2">'+
                                            '<label for="'+ question.id +'"> '+ question.option_2 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ question.option_3 +'" type="radio" name="'+ question.id +'" id="option_3_display" class="option_3_display option_display mr-2" placeholder="Option 3">'+
                                            '<label for="'+ question.id +'"> '+ question.option_3 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ question.option_4 +'" type="radio" name="'+ question.id +'" id="option_4_display" class="option_4_display option_display mr-2" placeholder="Option 4">'+
                                            '<label for="'+ question.id +'"> '+ question.option_4 +' </label>'+
                                        '</div>'+
                                        
                                        '<button type="submit" class="btn btn-primary mt-2 submit-answer" data-id="'+ question.id +'"> Submit </button>' +
                                        
                                        '<div class="relative d-flex items-center justify-between">'+
                                            '<p class="pt-4 mb-0 key_answer_t">Key answer: '+ question.key_answer +'</p>'+
                                        '</div>'+
                                '</div>'+
                                '<!-- end- choices teacher -->'+
                                
                                
                                
                                
                            '</div>'+
                            '</div>'+
                            '</div>'
                        );
                    
                        if (response.role == 'student') {
                            $('.add-question-trigger').hide();                            
                            $('.key_answer_t').hide();                            
                            $('.edit-question').hide();                            
                            $('.delete-question').hide();      
                            $('.option_1_display').removeAttr("disabled");     
                            $('.option_2_display').removeAttr("disabled");     
                            $('.option_3_display').removeAttr("disabled");     
                            $('.option_4_display').removeAttr("disabled");     
                        }
                        else { 
                            $('.key_answer_t').show();                        
                            $('.edit-question').show();                            
                            $('.delete-question').show();                            
                            $('.submit-response').hide();     
                            $('.submit-answer').hide();
                        }
                        
                    });
      
                } 
                else if (response.answered_questions.length > 0) {        
                    var i = 0; 
                    var score = 0; 
                    $.each(response.answered_questions, function (key, answered_question) {
                        $('.display_questions').append(
                            '<div class="card mh-10 questions-wrapper">'+
                            '<div class="card-body d-flex flex-column justify-content-center">'+
                            '<div class="input-fields">'+
                                
                                // '<ul id="save_errlist"> </ul>'+
                                
                                '<div class="field__input relative question_content">'+
                                    
                                    '<div class="w-full">'+ answered_question.question +'</div>'+
                                    
                                    '<div>'+
                                        '<button class="btn btn-primary mx-2 edit-question" value="'+ answered_question.id +'"> Edit </button>'+
                                        '<button class="btn btn-danger delete-question" value="'+ answered_question.id +'"> Delete </button>'+
                                    '</div>'+
                                '</div>'+
                
                                                            
                                '<!-- choices teacher-->'+
                                '<div class="choices-display__wrapper pt-4">'+
                                
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ answered_question.option_1 +'" type="radio" name="'+ answered_question.id +'" id="option_1_display" class="option_1_display option_display mr-2" placeholder="Option 1">'+
                                            '<label for="'+ answered_question.id +'"> '+ answered_question.option_1 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ answered_question.option_2 +'" type="radio" name="'+ answered_question.id +'" id="option_2_display" class="option_2_display option_display mr-2" placeholder="Option 2">'+
                                            '<label for="'+ answered_question.id +'"> '+ answered_question.option_2 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ answered_question.option_3 +'" type="radio" name="'+ answered_question.id +'" id="option_3_display" class="option_3_display option_display mr-2" placeholder="Option 3">'+
                                            '<label for="'+ answered_question.id +'"> '+ answered_question.option_3 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="field__input relative d-flex items-center">'+
                                            '<input disabled value="'+ answered_question.option_4 +'" type="radio" name="'+ answered_question.id +'" id="option_4_display" class="option_4_display option_display mr-2" placeholder="Option 4">'+
                                            '<label for="'+ answered_question.id +'"> '+ answered_question.option_4 +' </label>'+
                                        '</div>'+
                                        
                                        '<div class="relative d-flex items-center justify-between">'+
                                            '<p class="pt-4 mb-0">Answer: '+ answered_question.responses[0].answer +'</p>'+
                                            '<p class="pt-4 mb-0">Key answer: '+ answered_question.key_answer +'</p>'+
                                        '</div>'+
                                        
                                '</div>'+
                                '<!-- end- choices teacher -->'+
                                
                            '</div>'+
                            '</div>'+
                            '</div>'
                        );
                        
                        if (response.role == 'student') {
                            $('.add-question-trigger').hide();                            
                            $('.key_answer_display').hide();                            
                            $('.edit-question').hide();                            
                            $('.delete-question').hide();      
                            $('.key_answer_t').hide();      
                        }
                        else { 
                            $('.key_answer_display').show();                        
                            $('.edit-question').show();                            
                            $('.delete-question').show();                            
                            $('.key_answer_t').show();      
                            $('.submit-response').hide();     
                            $('.submit-answer').hide();
                        }
                        
                        if(answered_question.responses[0].answer === answered_question.key_answer) { 
                            score++; 
                        }
                        
                    });
                    
                    $('.score').html('Score: '+score+ ' / ' +response.count_total_question);
                    if (response.count == 0 && response.result_existance == 0) {
                    // here
                        var data = {
                            'score': score,
                            'quiz_id': $('#quiz_id').val(),
                        }
                        console.log('score: ', score, 'data', data);  
                        var url = '{{ route("store-result") }}';
                
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                        $.ajax({
                            type: "POST",
                            url: url, 
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
                                
                                    fetchQuestion();
                                }
                            }
                        });
                    }
                                        
                }
                else { 
                    
                    $('.quiz-list').append('<div class="no-data"> No data Found </div>');
                    
                }
                
                
                if (response.role == 'student') { 
                    $('.add-question-trigger').hide();
                }
                
                $('.quiz-name').html("");
                $('.quiz-instruction').html("");
                $('.quiz-deadline').html("");
                $('.date-uploaded').html("");
                
                $.each(response.quiz, function (key, quiz) { 
                    var created_at = new Date(quiz.created_at);
                    var created_at_formated = created_at.toString('dd-MMM-yyyy');
                    var deadline = new Date(quiz.deadline); 
                    var deadline_formated = deadline.toString('dd-MMM-yyyy');
                
                    $('.quiz-name').append(quiz.quiz_name);
                    $('.quiz-instruction').append(quiz.instruction);
                    $('.quiz-deadline').append("Deadline: ",deadline_formated);
                    $('.date-uploaded').append("Date Uploaded: ",created_at_formated);
                });
                
            }
        });
    }
    
    
    // submit response
    $(document).on('click', '.submit-answer', function (e) {
        e.preventDefault();
        
        var data = {
            'answer': $('input[name="'+$(this).attr('data-id')+'"]:checked').val(),
            'question_id': $(this).attr('data-id'),
        }
        
        var url = '{{ route("responses.store") }}';
                
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: url, 
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
                
                    fetchQuestion();
                }
            }
        });
    });
    
    // store
    $(document).on('click','.save-question', function(e) { 
        e.preventDefault();
        var data = {
            'question': $('#question').val(),
            'option_1': $('#option_1').val(),
            'option_2': $('#option_2').val(),
            'option_3': $('#option_3').val(),
            'option_4': $('#option_4').val(),
            'key_answer': $('#key_answer').val(),
            'quiz_id': $('#quiz_id').val(),
        }
        
        var url = '{{ route("questions.store") }}';
                
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: url, 
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status == 400) { 
                
                    $('#save_errlist').html("");
                    $('#save_errlist').addClass("alert alert-danger");
                    $.each(response.errors, function (key, error_values) { 
                        $('#save_errlist').append('<li>'+ error_values +'</li>')
                    });
                    
                } else { 
                    $('#questionModal').modal('hide');
                    clearFields();
                    fetchQuestion();
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
    $(document).on('click', '.edit-question', function (e) {
        e.preventDefault();
    
        var question_id = $(this).val();
        var url = '{{ route("questions.edit", ":id") }}';
        url = url.replace(':id', question_id);
        
        $('#questionEditModal').modal('show');
    
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (response.status == 404) {
                
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    });
                    
                } else { 
                    
                    $('#edit_question').val(response.question.question);
                    $('#edit_option_1').val(response.question.option_1);
                    $('#edit_option_2').val(response.question.option_2);
                    $('#edit_option_3').val(response.question.option_3);
                    $('#edit_option_4').val(response.question.option_4);
                    $('#edit_question_id').val(response.question.id);     
                    
                    
                    $('#edit_key_answer_1').val('');
                    $('#edit_key_answer_2').val('');
                    $('#edit_key_answer_3').val('');
                    $('#edit_key_answer_4').val('');
                    
                    $('#edit_key_answer_1').html('');
                    $('#edit_key_answer_2').html('');
                    $('#edit_key_answer_3').html('');
                    $('#edit_key_answer_4').html('');
                    
                    $('#edit_key_answer_1').val(response.question.option_1);
                    $('#edit_key_answer_2').val(response.question.option_2);
                    $('#edit_key_answer_3').val(response.question.option_3);
                    $('#edit_key_answer_4').val(response.question.option_4);
                    
                    $('#edit_key_answer_1').append(response.question.option_1);
                    $('#edit_key_answer_2').append(response.question.option_2);
                    $('#edit_key_answer_3').append(response.question.option_3);
                    $('#edit_key_answer_4').append(response.question.option_4);
                    
                    
                }
                
            }
        });
        
    });
    
    // update
    $(document).on('click', '.update-question', function (e) {
        e.preventDefault();
        
        
        var question_id = $('#edit_question_id').val();
        var url = '{{ route("questions.update", ":id") }}';
        url = url.replace(':id', question_id);
        
        var data = {
            'question': $('#edit_question').val(),
            'option_1': $('#edit_option_1').val(),
            'option_2': $('#edit_option_2').val(),
            'option_3': $('#edit_option_3').val(),
            'option_4': $('#edit_option_4').val(),
            'key_answer': $('#edit_key_answer').val(),
            'quiz_id': $('#quiz_id').val(),
        }
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "PUT",
            url: url,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
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
                    $('#questionEditModal').modal('hide');
                    $('#questionEditModal').find('input').val("");
                    
                    fetchQuestion();
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
    var question_id;
    $(document).on('click', '.delete-question', function (e) {
        e.preventDefault();
        question_id = $(this).val(); 
        $('#deleteModal').modal('show');
    });
    
    
    // destroy
     $(document).on('click', '.delete-quiz-btn', function (e) {
        e.preventDefault();
                
        var url = '{{ route("questions.destroy", ":id") }}';
        url = url.replace(':id', question_id);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            
            type: "DELETE",
            url: url,
            
            success: function (response) {
    
                $('#deleteModal').modal('hide');
                fetchQuestion();
                Swal.fire(
                    'Deleted!',
                    response.message,
                    'success'
                )
            }
        });
    });
    
    
    // other function
    function clearFields() { 
        $('#questionModal').find('input').val("");
        $('#save_errlist').html("");
        $('#save_errlist').removeClass("alert alert-danger");
        $('#key_answer_1').val('');
        $('#key_answer_1').html('');
        $('#key_answer_2').val('');
        $('#key_answer_2').html('');
        $('#key_answer_3').val('');
        $('#key_answer_3').html('');
        $('#key_answer_4').val('');
        $('#key_answer_4').html('');
        $('#selected').attr('selected');
        
        
        $('#edit_key_answer_1').val('');
        $('#edit_key_answer_1').html('');
        $('#edit_key_answer_2').val('');
        $('#edit_key_answer_2').html('');
        $('#edit_key_answer_3').val('');
        $('#edit_key_answer_3').html('');
        $('#edit_key_answer_4').val('');
        $('#edit_key_answer_4').html('');
    }

    $(document).on('click', '.btn-close', function (e) {
        e.preventDefault();
        clearFields();
    });
    
    $(document).on('click', '.close-modal', function (e) {
        e.preventDefault();
        clearFields();
    });
    
    
</script>

@endsection
</x-app-layout>