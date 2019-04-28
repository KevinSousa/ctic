$(document).ready(function()
    {
        $(document).on('click', '.listAJAX',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('url');
            // var page=$(this).attr('href').split('page=')[1];
  
            getData(myurl);
        });
  
    });
  
function getData(page){
    var url = window.location.href;

    $.ajax(
    {
        url: url+page,
        type: "get",
        datatype: "html"
    }).done(function(data){
        $(".main-content").empty().html(data);
    
    }).fail(function(jqXHR, ajaxOptions, thrownError){
          alert('No response from server');
    });
}