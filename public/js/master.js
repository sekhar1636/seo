emptyStr = 'Domain name field can\'t empty!'; oopsStr = 'Oops...'; baseUrl = 'https://script12.prothemes.biz/'; badStr = 'Restricted words found on your domain name'; badWords = ["fuck","porn","asshole","bullshit"]; var trackLink = 'https://script12.prothemes.biz/rainbow/track'; var xdEnabled = false;function parseHost(url) {
    var a=document.createElement('a');
    a.href=url;
    return a.hostname;
}
jQuery(document).ready(function(){
	var screenSize = window.screen.width + 'x' + window.screen.height;
    var myUrl = window.location.href;
    var myHost = window.location.hostname;
    var refUrl = document.referrer;
    var refHost = parseHost(refUrl);
    if(myHost == refHost)
        refUrl = 'Direct';
    jQuery.post(trackLink,{page:myUrl,ref:refUrl,screen:screenSize},function(data){
    });    
    if(xdEnabled){
        var xdBlockEnabled = false;
        var testAd = document.createElement('div');
        testAd.innerHTML = '&nbsp;';
        testAd.className = 'adsbox';
        document.body.appendChild(testAd);
        window.setTimeout(function() {
          if (testAd.offsetHeight === 0) {
            xdBlockEnabled = true;
          }
          testAd.remove();
          if(xdBlockEnabled){
            if(xdOption == 'link'){
               window.location = xdData1;
            }else if(xdOption == 'close'){
               $('#xdTitle').html(xdData1);
               $('#xdContent').html(xdData2);
               $('#xdBox').modal('show');
            }else if(xdOption == 'force'){
               $('#xdClose').hide();
               $('#xdTitle').html(xdData1);
               $('#xdContent').html(xdData2);
               $('#xdBox').modal({
                  backdrop: 'static',
                  keyboard: false
               }); 
               $('#xdBox').modal('show');
            }
          }
        }, 100);
    }
});