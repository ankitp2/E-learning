$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.base-container').hide();
    $('.register').click(function(){
        $('.base-container0').hide();
        $(".heading1").text("Register");
        $('.base-container').show();
    })
    $('.login').click(function(){
        $('.base-container').hide();
        $(".heading1").text("Login");
        $('.base-container0').show();
    })

    $('#quiz_cid').change(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var cid = $('#quiz_cid').val();
        try{
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/courses/addCourses/test',
            type: 'POST',
            dataType: 'json',
            data: {
                cid:cid
            },
            success: function(response) {
                let html=`<option disabled selected>Select Lesson</option>`;
                for(var i=0;i<response.length;i++){
                    let lesson_title=response[i].lesson_title;
                     html+=`<option value='`+response[i].id+`'>`+lesson_title+`</option>`;
                    $('#cid').html(html);
                }
            },
            error: function(error) {
                var errors = error.responseJSON;
                console.log(errors);
            }
        });
    }catch(err){
        console.log(err);
    }
    })
    // $('#cid').change(function(){
    //     var i=$('#cid').val();
    //     alert(i);
    // })
})
