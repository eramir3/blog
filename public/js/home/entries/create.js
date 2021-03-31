$(document).ready(function(){
    radioBtnChange();
    formSubmit();
});

function radioBtnChange(){
    $('input[type=radio]').change(function() {
            
        let entryForm = document.querySelector("#form-entry");
        let tweetForm = document.querySelector("#form-tweet");
    
        if (this.value == 'entry') 
        {
            entryForm.style.display = 'block';
            tweetForm.style.display = 'none';
        }
        else  
        {
            tweetForm.style.display = 'block';
            entryForm.style.display = 'none';
        }
    });
};

function formSubmit(){
    $("form").submit(function(e) {
    
        e.preventDefault();
        let form = $(this);
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
        .done(function(data){
            console.log('aaaa');
            loader.hide();
            toastr.success(data.message);
        })
        .fail(function(error) {
            loader.hide();
            formErrors.highlightErrors(error);
        });
    });
} 