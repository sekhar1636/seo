var browser=true;

if (browser){

var object=new Array();


object['castnet']= new objectdata(124,28,"../graphics02/cast2.gif","../graphics02/cast1.gif","Casting Network");

object['forum']= new objectdata(124,28,"../graphics02/forum2.gif","../graphics02/forum1.gif","StrawHat Forum");

object['theaters']= new objectdata(124,28,"../graphics02/theaters2.gif","../graphics02/theaters1.gif","Attending Theaters");

object['search']= new objectdata(124,28,"../graphics02/search2.gif","../graphics02/search1.gif","Search the Site");

object['articles']= new objectdata(124,28,"../graphics02/articles2.gif","../graphics02/articles1.gif","Articles");

object['faqs']= new objectdata(124,28,"../graphics02/faq2.gif","../graphics02/faq1.gif","FAQ's");

object['contact']= new objectdata(124,28,"../graphics02/contact2.gif","../graphics02/contact1.gif","Contact");

object['map']= new objectdata(124,28,"../graphics02/map2.gif","../graphics02/map1.gif","Site Map");

object['tech']= new objectdata(124,28,"../graphics02/tech2.gif","../graphics02/tech1.gif","Staff/Tech/Design");

object['member']= new objectdata(124,28,"../graphics02/member2.gif","../graphics02/member1.gif","Members Page");
// add more objects above this line

}


function objectdata(hsize,vsize,replaceimg,restoreimg,mess)

{if(browser) 

{                this.mess=mess;

                        this.simg=new Image(hsize,vsize);

                        this.simg.src=replaceimg;

                        this.rimg=new Image(hsize,vsize);

                  		this.rimg.src=restoreimg;                                                                                        }}

function ReplaceOrig(name)

{if(browser) 

{window.status=object[name].mess;

document[name].src=object[name].simg.src;}} 



function RestoreOrig(name)

{if(browser) 

{window.status="";

document[name].src=object[name].rimg.src;}} 

