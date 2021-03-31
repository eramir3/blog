$("form").submit(function(e) {
    e.preventDefault();

    let form = $(this);
    let url = form.attr('action');

    $.ajax({
        type: "PUT",
        url: url,
        data: form.serialize(),  
    })
    .done(function(data){
        let response = JSON.parse(data.data);
        let tweetBtn = document.querySelector("#tweet_"+response.id);
        let isHidden = response.hidden;
        tweetBtn.textContent = isHidden ? 'Unhide' : 'Hide';
        toastr.success(data.message);
    })
    .fail(function(error) {
        toastr.error(error);
    });
});