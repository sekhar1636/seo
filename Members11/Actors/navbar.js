var browser=true;

if (browser){

var object=new Array();


object['facebook']= new objectdata(124,28,"../../graphics03/facebook_button2.gif","../../graphics03/facebook_button1.gif","Facebook");

object['theaters']= new objectdata(124,28,"../../graphics03/theaters2.gif","../../graphics03/theaters1.gif","Attending Theaters");

object['search']= new objectdata(124,28,"../../graphics03/search2.gif","../../graphics03/search1.gif","Search the Site");

object['articles']= new objectdata(124,28,"../../graphics03/articles2.gif","../../graphics03/articles1.gif","Articles");

object['faqs']= new objectdata(124,28,"../../graphics03/faq2.gif","../../graphics03/faq1.gif","FAQ's");

object['contact']= new objectdata(124,28,"../../graphics03/contact2.gif","../../graphics03/contact1.gif","Contact");

object['tech']= new objectdata(124,28,"../../graphics03/tech2.gif","../../graphics03/tech1.gif","StaffTechDesign");

object['member']= new objectdata(124,28,"../../graphics03/member2.gif","../../graphics03/member1.gif","Members Page");

object['home']= new objectdata(124,28,"../../graphics03/home2.gif","../../graphics03/home1.gif","Logout");

object['actor']= new objectdata(124,28,"../../graphics03/actor2.gif","../../graphics03/actor1.gif","Actor Search");
// add more objects above this line

}


function objectdata(hsize,vsize,replaceimg,restoreimg,mess)

{if(browser) 

{                this.mess=mess;

                        this.simg=new Image(hsize,vsize);

                        this.simg.src=replaceimg;

                        this.rimg=new Image(hsize,vsize);

                  		this.rimg.src=restoreimg;  
}}
                  		
                  		
                  		
function ReplaceOrig(name)

{if(browser) 

{window.status=object[name].mess;

document[name].src=object[name].simg.src;}} 



function RestoreOrig(name)

{
	if(browser) 

{window.status="";

document[name].src=object[name].rimg.src;}
} 

