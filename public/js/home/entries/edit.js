$(document).ready(function(){
    formSubmit();
});

function formSubmit(){
    $("form").submit(function(e) {
    
        e.preventDefault();
        let form = $(this);
        console.log(form.attr('action'));
        let url = form.attr('action');
        formErrors.clearErrorsHightlight();
        loader.show();

        $("input[name='title']").next().remove('div');
        $("textarea[name='content']").next().remove('div');
    
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),  
        })
        .done(function(data) {
            loader.hide();
            toastr.success("Entry Updated Succesfully");
        })
        .fail(function(error) {
            loader.hide();
            formErrors.highlightErrors(error);
        });
    });
} 