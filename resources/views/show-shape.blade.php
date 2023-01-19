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
                            <h3 class="m-0 font-weight-bold text-primary fw-bold">Shapes </h3>
                        </div>
                            
                        <div id="success_message"> </div>
                        <div class="card-body relative shape">
                            
                            <input type="hidden" name="shape_id" id="shape-id" value="{{$id}}">
                            
                            <div class="container mx-auto mt-4">
                              
                                <div class="card" style="width: fit-content; max-width: 100%; margin: auto;">
                                    <div class="card-body" >
                                        <div class="display-contents"></div>
                                        <canvas class="shape-board" width="600" height="400"></canvas>
                                    </div>
                                    
                                    <!-- <button class="btn btn-danger clear  mx-4"> Clear </button> -->
                                    <button class="btn btn-primary my-2  mx-4"> Submit </button>
                                </div>
                                
                            </div>
                                
                            
                        </div>
                    </div>
                    <!-- /table -->
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- create modal -->
    <div class="modal fade" id="shapeModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Add Shape</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    
                    <!-- input fields -->
                
                        <ul id="save_errlist"></ul>
                                                    
            
                        <!-- Image -->
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image')" />
                            <x-input id="image" class="block mt-1 w-full border-0 shadow-none" type="file" name="image" :value="old('image')" />
                        </div>
                        
                        <!-- Instruction -->
                        <div class="mt-4">
                            <x-label for="instruction" :value="__('Instruction')" />
                            <x-input id="instruction" class="block mt-1 w-full" type="text" name="instruction" :value="old('instruction')" />
                        </div>
            
                        <!-- Deadline -->
                        <div class="mt-4">
                                <x-label for="deadline" :value="__('Deadline')" />
                                <x-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline')" />
                        </div>
        
                    <!-- end- input fields -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-shape">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end- create modal -->

    <!-- edit modal -->
    <div class="modal fade" id="quizEditModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Edit Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <!-- input fields -->
                    
                    <ul id="edit_errlist"></ul>
                                                    
                    <!-- Quiz id -->
                    
                    <input type="hidden" id="edit_quiz_id"> 
                    
                                                    
                    <!-- Quiz Name -->
                    <div>
                        <x-label for="quiz_name" :value="__('Quiz Name')" />
                        <x-input id="edit_quiz_name" class="block mt-1 w-full" type="text" name="quiz_name" :value="old('quiz_name')" required autofocus />
                    </div>
        
                    <!-- Instruction -->
                    <div class="mt-4">
                        <x-label for="instruction" :value="__('Instruction')" />
                        <x-input id="edit_instruction" class="block mt-1 w-full" type="text" name="instruction" :value="old('instruction')" />
                    </div>
        
                    <!-- Deadline -->
                    <div class="mt-4">
                            <x-label for="deadline" :value="__('Deadline')" />
                            <x-input id="edit_deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline')" />
                    </div>
                
                    <!-- end- input fields -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update-quiz">Update</button>
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
    
    $(document).ready(function () {
           
        // show  
        fetchShape();
        function fetchShape() { 
        
            var shape_id = $('#shape-id').val();
            var url = '{{ route("shapes.show", ":id") }}';
            url = url.replace(':id', shape_id);
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    var count = 1; 
                    $('.display-contents').html("");
                    
                         
                    console.log(response.shapes);
                
                    var created_at = new Date(response.shapes.created_at);
                    var created_at_formated = created_at.toString('dd-MMM-yyyy');
                    var deadline = new Date(response.shapes.deadline); 
                    var deadline_formated = deadline.toString('dd-MMM-yyyy');
                    
                    $('.display-contents').append(
                        '<div style="margin: 1rem;">' +
                            '<h5>'+ response.shapes.instruction + '</h5>' + 
                            '<p class="mb-0"> Date uploaded: '+ created_at_formated + '</p>' + 
                            '<p class="mb-0"> Deadline: '+ deadline_formated + '</p>' + 
                            '<img class="card-img" src="">'+
                        '</div>'
                    );
                    
                    var img_src = '{{ asset("uploads/shape/:data") }}'
                    img_src = img_src.replace(':data', response.shapes.image);
                    $(".card-img").attr('src', img_src );
                    
                    
                    if (response.role == 'teacher') {
                        $('.edit-shape').show(); 
                        $('.delete-shape').show(); 
                        $('.show-shape').hide(); 
                    }
                    else { 
                        $('.edit-shape').hide(); 
                        $('.delete-shape').hide(); 
                        $('.show-shape').show(); 
                    }
                    
                    
                }
            });
        }
        
        // store
        // $(document).on('click','.save-shape', function(e) { 
        //     e.preventDefault();
            
        //     var data = {
        //     'instruction': $('#instruction').val(),
        //     'deadline': $('#deadline').val(),
        //     'image': $('#image').val(),
        //     }
            
        //     console.log(data);
            
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
            
        //     var url = '{{ route("shapes.store") }}';
        //     $.ajax({
        //         type: "POST",
        //         url: url, 
        //         data: data,
        //         dataType: "json",
        //         success: function (response) {
        //             console.log(response);
        //             if(response.status == 400) { 
        //                 $('#save_errlist').html("");
        //                 $('#save_errlist').addClass("alert alert-danger");
        //                 $.each(response.errors, function (key, error_values) { 
        //                     $('#save_errlist').append('<li>'+ error_values +'</li>')
        //                 });
        //             } else { 
        //                 $('#save_errlist').html("");
        //                 $('#save_errlist').removeClass("alert alert-danger");
        //                 $('#shapeModal').modal('hide');
        //                 $('#shapeModal').find('input').val("");
                        
        //                 // fetchShape();
        //                 Swal.fire(
        //                     'Good job!',
        //                     response.message,
        //                     'success'
        //                 )
        //             }
        //         }
        //     });
            
        // });
        
    });
 
    var color = 'red';
    var $canvas = $('.shape-board');

    var context = $canvas[0].getContext('2d');
    var mouseDown = false;
    var lastEvent;
    
    /*===========---FUNCTION---==============
    When a mouse event occurs on the canvas.
    ======================================*/
    $canvas.mousedown(function(e){
    lastEvent = e;
    mouseDown = true;
    }).mousemove(function(e){
    //Draw lines.
    if(mouseDown) {
        context.beginPath();
        context.strokeStyle = color;
        context.moveTo(lastEvent.offsetX, lastEvent.offsetY);
        context.lineTo(e.offsetX, e.offsetY);
        context.stroke();
        lastEvent = e;
        }
    }).mouseup(function(){
        mouseDown = false;
    }).mouseleave(function(){
        $canvas.mouseup();
    });
    
</script>

@endsection
</x-app-layout>

