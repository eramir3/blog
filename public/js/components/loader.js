let loader = function(){

    function hide() 
    {
        $('.loader').css('display', 'none');
        $("button[name='submit']").css('display', 'flex');
    }

    function show() 
    {
        $('.loader').css('display', 'block');
        $("button[name='submit']").css('display', 'none');
    }

    return  {
        hide:hide,
        show:show
    };

}();




