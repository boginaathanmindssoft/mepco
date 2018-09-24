var API = new apiBase();
var ACTIVE_ROW = $(".active-row");

function apiBase() {}

// Fields mandatory validation
apiBase.prototype.apiRequest = function(requestData, apiUrl, requestType, callback) {
	var response = '';
	$.ajax({
	type: requestType,
	dataType: "json",
	url: SITE_URL+apiUrl,
	data: requestData,
	success: function(responseData){
		/*console.log(responseData);*/
		callback(responseData);
	}
	});
};
apiBase.prototype.apiRequestHTML = function(requestData, apiUrl, requestType, callback) {
    var response = '';
    $.ajax({
    type: requestType,
    dataType: "html",
    url: SITE_URL+apiUrl,
    data: requestData,
    success: function(responseData){
        /*console.log(responseData);*/
        callback(responseData);
    }
    });
};

function displayMessage(message, type) {
    if ($('#toast-container').css('display') == "none") {
        $('#toast-container').fadeIn(500);
        $('#toast-container .toast-message').text(message);
        if(type == "error")
        {
        	$('#toast-container .toast').removeClass("toast-success");
        	$('#toast-container .toast').addClass("toast-error");
        }
        else if(type == "success"){
        	$('#toast-container .toast').removeClass("toast-error");
        	$('#toast-container .toast').addClass("toast-success");
        }
        setTimeout(function(){
        	$('#toast-container').fadeOut(500);
        }, 1000)
    }
}

function IsCommonInputBulkUpload(inputElm) {
    //allowed => alphanumeric, dot, comma, Hyphen, @, hash
    //return inputElm.val().replace(/[^ 0-9A-Za-z_.,-]/gi, '');
    var start = inputElm.selectionStart, end = inputElm.selectionEnd;
    inputElm.value = $(inputElm).val().replace(/[^ 0-9A-Za-z.@-]/gi, '');
    inputElm.setSelectionRange(start, end);
}


function IOErrorMessage(message_error)
{
    form_error_message(message_error);
}

function gallery_show_hide_fields(gallery_type){
    if(parseInt(gallery_type) == 1){
        $("#video_url_field_box").hide();
        /*$("#image_url_field_box").show();*/
        $("#gallery_id_field_box").show();
        $("#gallery-image-preview-field").show();
    }
    else if(parseInt(gallery_type) == 2){
        $("#video_url_field_box").show();
        /*$("#image_url_field_box").hide();*/
        $("#gallery_id_field_box").hide();
        $("#gallery-image-preview-field").hide();
    }
}
function delete_click(thiz){

    if (confirm("Are you sure that you want to delete this file?")) {
        var dataImgID = $(thiz).attr("data-img");
        requestData = {
            "gID": window.btoa(dataImgID)
        };
        apiUrl = "admin/deleteSelectedGalleryImage";
        requestType = "POST";
        API.apiRequest(requestData, apiUrl, requestType, function(resData){
            $("#delete-ul-li-"+dataImgID).hide("slow");
        });

    } else {
        return false;
    }
}
function loadPriority(priority, dataID, dataCaseID, dataPage, dataDirection, dataSlug){
    if(parseInt(priority) > 0){
         var requestData = {
            "dataID": window.btoa(dataID),
            "priority": priority,
            "caseID": dataCaseID,
            "level" : dataDirection
        };
        apiUrl = "admin/priorityOrder";
        requestType = "POST";
        API.apiRequest(requestData, apiUrl, requestType, function(resData){
            var requestData_2 = {
                "search_text": "Question+1",
                "search_field": "",
                "per_page": $("#per_page").val(),
                "order_by[0]" : "priority",
                "order_by[1]":"asc",
                "page": $("#crud_page").val()
            };
            if(dataSlug != ''){
                dataPage = dataPage+'/'+dataSlug;
            }
            apiUrl_2 = "admin/"+dataPage+"/ajax_list";
            requestType_2 = "POST";

            API.apiRequestHTML(requestData_2, apiUrl_2, requestType_2, function(resData_2){
                /*console.log(resData_2);*/
                $("#flex1").html('');
                $("#flex1").html(resData_2);
                $("#crud_search").click(    );

            });
        });

        }

}

function active_disable(thiz){
    var sno = $(thiz).attr("data-sno");
    var dataCase = $(thiz).attr("data-case");
    var dataKey = $(thiz).attr("data-key");
    var dataSno = $(thiz).attr("data-sno");
    var dataStatus = $(thiz).attr("data-status");
    var confirm_msg = "";
    $("#list-report-success").hide();
    $("#list-report-success").html('');
    if(dataStatus == 1){
        confirm_msg = "Are you sure that you want to disable?";
    }
    else
    {
        confirm_msg = "Are you sure that you want to active?";
    }


    if (confirm(confirm_msg)) {
        if(dataSno == sno){
            if(dataStatus == 1)
            {
                dataStatus = 2;
            }
            else{
                dataStatus = 1;
            }
        requestData = {
            "dataKey": parseInt(dataKey),
            "dataCase": parseInt(dataCase),
            "dataStatus": parseInt(dataStatus),

        };
        apiUrl = "admin/update_data_status";
        requestType = "POST";
        API.apiRequest(requestData, apiUrl, requestType, function(resData){

            if(dataStatus == 1)
            {
                $("#fa_status_"+sno+" .fa-close-fa-check").removeClass("text-danger");
                $("#fa_status_"+sno+" .fa-close-fa-check").removeClass("fa-close");
                $("#fa_status_"+sno+" .fa-close-fa-check").addClass("fa-check");
                $("#fa_status_"+sno+" .fa-close-fa-check").addClass("text-success");
                $("#fa_status_"+sno).attr("data-status", 1);
                $("#fa_status_"+sno+" .fa-close-fa-check").attr("title", "Active");

                $("#list-report-success").html('Active status updated successfully!.');
                $("#list-report-success").slideDown(500);
            }
            else
            {
                $("#fa_status_"+sno+" .fa-close-fa-check").removeClass("text-success");
                $("#fa_status_"+sno+" .fa-close-fa-check").removeClass("fa-check");
                $("#fa_status_"+sno+" .fa-close-fa-check").addClass("fa-close");
                $("#fa_status_"+sno+" .fa-close-fa-check").addClass("text-danger");
                $("#fa_status_"+sno).attr("data-status", 2);
                $("#fa_status_"+sno+" .fa-close-fa-check").attr("title", "Disable");
                $("#list-report-success").html('Disable status updated successfully!.');
                $("#list-report-success").slideDown(500);

            }
        });
        }
        else{
            alert("Error - cannot update the status");
        }


    } else {
        return false;
    }
}

function onchangeGalleryType(thiz){

    var gallery_type = $("#field-gallery_type").val();
    gallery_show_hide_fields(gallery_type);

}
if(active_page == "Gallery"){
    var gallery_type = $("#field-gallery_type").val();
    gallery_show_hide_fields(gallery_type);
    var edit_id = validation_url.split("/").pop(-1);
    requestData = {
            "g_list": window.btoa(edit_id)
    };
    apiUrl = "admin/showGallery";
    requestType = "POST";
    API.apiRequest(requestData, apiUrl, requestType, function(resData){
        var liRowClone = $('#clone_image_preview .cloneLi');
        /*var cloneLi = '';*/

        $(resData).each(function(key, value){
            var cloneLi = liRowClone.clone();
            $(cloneLi).attr("id", "delete-ul-li-"+value[1]);
            $(".cloneImg", cloneLi).attr("src", SITE_URL+"/"+value[0]);
            $(".data_img_id", cloneLi).attr("data-img", value[1]);

            $('#data_image_preview').append(cloneLi);
        });
        $('#data_image_preview li').show();
    });

    $("#uploadFile").change(function(event) {
        $("#report-error").hide();
        $('#image_preview').html("");
         var total_file=document.getElementById("uploadFile").files.length;
         var err_msg = '';
         for(var i=0;i<total_file;i++) {
            /*console.log(event.target.files[i]);*/
            if(event.target.files[i].type == "image/jpeg" ||
                event.target.files[i].type == "image/jpg" ||
                event.target.files[i].type == "image/png" ||
                event.target.files[i].type == "image/gif"){
                $('#image_preview').append("<li><img src='"+URL.createObjectURL(event.target.files[i])+"'></li>");
            }
            else {
                err_msg += event.target.files[i].name+"<br/>";
            }
         }
         if(err_msg != ''){
            err_msg = "Invalid Uploaded File :<br/>"+err_msg;
            IOErrorMessage(err_msg);
            return false;
         }
     });
}

$(".toast").click(function() {
    $('#toast-container').css('display', "none");
});



    $(".priority-up, .priority-down").click(function() {
        var priority = $(this).attr("data-priority");
        var dataID = $(this).attr("data-id");
        var dataCaseID = $(this).attr("data-case-id");
        var dataPage = $(this).attr("data-page");
        var dataDirection = $(this).attr("data-direction");
        var dataSlug = $(this).attr("data-slug");
        loadPriority(priority, dataID, dataCaseID, dataPage, dataDirection, dataSlug);
    });

    /*ACTIVE_ROW.click(function() {

    });*/





