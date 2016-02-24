/** Created by newbie on 01/08/2016. một ngày trời nắng :3 */
 function confirm_delete(err){
    if(!window.confirm(err)){
        return false;
    }
}

$(document).ready(function(){
    $("#formadd").hide();
    $("button.add").click(function(){
        $("#formadd").slideToggle();
    });

    $('#addlogo').submit(function(e) {
        e.preventDefault();
        var keyword = $('#txtkeyword');
        $.ajaxFileUpload({
            url         :'addlogo/',
            secureuri   :false,
            fileElementId  :'userfile',
            dataType    : 'json',
            data        : {
                keyword  :  keyword.val()
            },
            success  : function (data){
                if(data.status != 'error'){
                    clearForm();
                    $("#formadd").fadeOut(500);
                    reloadData('logo');
                }
                if(data.msg!=""){
                    alert(data.msg);
                }
            }
        });
        return false;
    });

    $('#addbanner').submit(function(e) {
        e.preventDefault();
        var keyword = $('#txtkeyword');
        $.ajaxFileUpload({
            url         :'addbanner/',
            secureuri   :false,
            fileElementId  :'userfile',
            dataType    : 'json',
            data        : {
                keyword  :  keyword.val()
            },
            success  : function (data){
                if(data.status != 'error'){
                    clearForm();
                    $("#formadd").fadeOut(500);
                    reloadData('banner');
                }
                if(data.msg!=""){
                    alert(data.msg);
                }
            }
        });
        return false;
    });

    $('#addslider').submit(function(e) {
        e.preventDefault();
        var data = new FormData($('#addslider')[0]);
        $.ajax({
            type    :   "POST",
            url     :   'addslider/',
            dataType    : 'json',
            data:data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success  : function (data){
                console.log(data);
                if(data.status != 'error'){
                    $("#formadd").fadeOut(500);
                    clearForm();
                    reloadData('slider');
                }
                if(data.msg!=""){
                    alert(data.msg);
                }
            }
        });
        return false;
    });

    function reloadData(page){
        $("#reloaddata").load(baseUrl+"admin/"+page+"/reload");
    }
    function clearForm(){
        $("#formadd :input").not(":submit").val("");
    }
});


function OnSubmitForm1(url)
{ 
   document.appForm.action = url;
   document.appForm.submit();
   return true;
}
function onSubmitForm(formName,url)
{ 
    var theForm = document.getElementById(formName);
    theForm.action = url;   
    theForm.submit();   
    return true;
  
}

function checkCheckBox(){
    var theForm = document.appForm;
    if (theForm.elements[i].name=='cid[]')
    {
        theForm.elements[i].checked = checked;
        if(theForm.elements[i].checked = true){
            window.alert(this.value);
        }
    }
}

var checked=false;
function checkedAll() {
    var theForm = document.appForm;
    if (checked == false)
    {
        checked = true;
        //theForm.checkValue.value = theForm.elements.length;
    }
    else
    {
        checked = false;
        //theForm.checkValue.value = 0;
    }
    
    var countCheckBox = 0;
    for (i=0; i<theForm.elements.length; i++) {
        if (theForm.elements[i].name=='cid[]'){
            theForm.elements[i].checked = checked;
            countCheckBox++;
        }
    }
    
    if (checked == true)
    {
        theForm.checkValue.value = countCheckBox;
    }
    else
    {       
        theForm.checkValue.value = 0;
    }
}