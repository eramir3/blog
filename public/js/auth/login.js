$("input[name='email']").keyup(function () {
    $(this).css('border-color', '#ccc');
    $(this).next().remove('div');
});

$("input[name='password']").keyup(function () {
    $(this).css('border-color', '#ccc');
    $(this).next().remove('div');
});


$("form").submit(function(e) {
    e.preventDefault();

    let form = $(this);
    let url = form.attr('action');

    $('#label-success').css('display', 'none');
    $('#label-failed').css('display', 'none');

    $("input[name='email']").next().remove('div');
    $("input[name='email']").css('border-color', '#ccc');

    $("input[name='password']").next().remove('div');
    $("input[name='password']").css('border-color', '#ccc');

    

    // $('.loader').css('display', 'block');
    // $("input[name='submit']").css('display', 'none');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
    })
    .done(function(data){
        $('#label-success').css('display', 'block');
        $('.loader').css('display', 'none');
        $("input[name='submit']").css('display', 'flex');
        window.location.href = '/entries'; 
    })
    .fail(function(error) {
        const errors = error.responseJSON.errors;
        const fieldNames = Object.keys(errors);

        $('#label-failed').css('display', 'block');
        $('.loader').css('display', 'none');
        $("input[name='submit']").css('display', 'block');
        
        for(index in fieldNames) {

            const fieldName = Object.keys(errors)[index];
            let field =  null;
            
            field = document.querySelector("input[name='"+fieldName+"']");

            const fieldErrorMessage = errors[fieldName];
            field.insertAdjacentHTML('afterend', `<div class="error">${fieldErrorMessage}</div>`);
            field.style.borderColor = 'red';

            toastr.error(fieldErrorMessage, "Login Failed");
        }
    });
});