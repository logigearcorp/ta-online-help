function sendMail() {
    window.location = 'mailto:?subject=Interesting information&body=Hi there.%0D%0A%0D%0AI think the following topic might catch your eye: ' + window.location;
}

function fbshareCurrentPage() {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + escape(window.location.href), '',
        'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
}

function tweetCurrentPage() {
    window.open("https://twitter.com/share?url=" + escape(window.location.href) + "&23=" + document.title, '',
        'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
}

function linkedinCurrentPage() {
    window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + escape(window.location.href) + '&title=' + document.title, '',
        'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');

}

function gplusShare() {
    window.open('https://plus.google.com/share?url=' + escape(window.location.href) + '&title=' + document.title, '',
        'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=400');
}

function sharePopUp() {
    var title = document.getElementById('ariaid-title1');
    var desc = document.getElementsByClassName('shortdesc');
    var popUp = document.getElementById('social-button');
    popUp.classList.toggle("show-popup");
    $("#cover").fadeIn(100);
    console.log(title);

    if (title == null || title == 'undefined') {
        var tittle2 = document.getElementById('tit_creating_interface_definitions__tcreating_interface_definitions');
        console.log(tittle2);
        title = tittle2;
    }

    if ($('.conbody > p.shortdesc').text() != '') {
        $("#content-group").empty();
        if($('.conbody > p.shortdesc').text().length >= 250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.conbody > p.shortdesc').text().substr(0, 250)+'...' + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.conbody > p.shortdesc').text()+ ' </div></div>');
    } else if ($('.abstract > span.shortdesc').text() != '') {
        $("#content-group").empty();
        if($('.abstract > span.shortdesc').text().length >= 250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.abstract > span.shortdesc').text().substr(0, 250)+'...'  + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.abstract > span.shortdesc').text()+ ' </div></div>');
     }
     else if ($('.abstract > p.shortdesc').text() != '') {
        $("#content-group").empty();
        if($('.abstract > p.shortdesc').text().length >= 250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.abstract > p.shortdesc').text().substr(0, 250)+'...'  + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.abstract > p.shortdesc').text()+ ' </div></div>');
    } else if ($('.learningBasebody > section.lcIntro').text() != '') {
        $("#content-group").empty();
        if($('.learningBasebody > section.lcIntro').text().length >= 250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.learningBasebody > section.lcIntro').text().substr(0, 250)+'...' + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.learningBasebody > section.lcIntro').text()+ ' </div></div>');
    } else if ($('.taskbody > p.shortdesc').text() != '') {        
        $("#content-group").empty();
        if($('.taskbody > p.shortdesc').text().length >= 250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.taskbody > p.shortdesc').text().substr(0, 250)+'...' + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.taskbody > p.shortdesc').text()+ ' </div></div>');
    }
    else if ($('.refbody > p.shortdesc').text() != '') {
        
        $("#content-group").empty();
        if($('.refbody > p.shortdesc').text().length >=250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.refbody > p.shortdesc').text().substr(0, 250)+'...' + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('.refbody > p.shortdesc').text()+ ' </div></div>');
    }
    else {
       
        $("#content-group").empty();
        if($('article[role=article] > p.shortdesc').text().length >=250)
        $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('article[role=article] > p.shortdesc').text().substr(0, 250)+'...' + ' </div></div>');
        else $("#content-group").append('<div class="row" style="padding:0"><img class="share-thumbnail col-lg-4 col-md-4 col-xs-hidden col-sm-hidden" src="https://www.testarchitect.com/OnlineHelp/TA_Help/Images/ta-logo1.png"/><div class="thumb-content col-lg-8"><div class="content-group-title">' + title.innerText + '</div><div class="content-group-shortdesc">' + $('article[role=article] > p.shortdesc').text()+ ' </div></div>');
    }

}

function turnOffPopUp() {
    var popUp = document.getElementById('social-button');
    popUp.classList.toggle("show-popup");
    $("#cover").fadeOut(100);
}