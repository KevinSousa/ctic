$(document).ready(function()
    {
        $(document).on('click', '.listAJAX',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var url = $(this).attr('url');

            var actualPage = window.location.href;
            var urlPage = actualPage.split("/");
            
            if (url == "/"+urlPage[3]){
                return
            }

            urlPage = urlPage[0] +"/"+ urlPage[1] +"/"+ urlPage[2];

            console.log(urlPage);
            getData(urlPage, url);
        });
  
    });
  
function getData(urlPage, url){

    window.history.pushState("", "", url);

    $.ajax(
    {
        url: urlPage+url,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $(".main-content").empty().html(data);
    
    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });
}