$(document).ready(function()
    {
        $(document).on('click', '.listAJAX',function(event)
        {
            event.preventDefault();
  
            if ($(this).parent('li').hasClass("active")){
                return
            }

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var url = $(this).attr('url');
            
            getData(url);
            return false;
        });    
        // window.addEventListener('popstate', function(e){
        //     if(e.state)
        //         oldUrl = window.location.pathname.split("/");
        //         oldUrl = "/"+oldUrl[1];
                
        //         getData(oldUrl);
        // });
  
    });
  
function getData(url){

    window.history.pushState({ url:url }, "", url);

    $.ajax(
    {
        url: url,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $(".main-content").empty().html(data);
    
    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });
}