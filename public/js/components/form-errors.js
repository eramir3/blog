let formErrors = function() {

    function highlightErrors(error)
    {
        const errors = error.responseJSON.errors;
        const fieldNames = Object.keys(errors);

        for(index in fieldNames) 
        {
            const fieldName = Object.keys(errors)[index];
            let field = $("[name='"+fieldName+"']:visible")[0];
            const fieldErrorMessage = errors[fieldName];
            field.insertAdjacentHTML('afterend', `<div class="error">${fieldErrorMessage}</div>`);
            field.style.borderColor = 'red';
            toastr.error(fieldErrorMessage);
        }
    }

    function clearErrorsHightlight()
    {
        $(".form__group-field").each(function() {
            let input = $( this );
            input.keyup(function(){
                input.next().remove('div');
                input.css('border-color', '#ccc');
            })
        });
    }

    return {
        clearErrorsHightlight:clearErrorsHightlight,
        highlightErrors:highlightErrors
    }
    
}();   