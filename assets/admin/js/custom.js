// It will call after window load and after ajax complete
function image_after_window_ajax_load(){
    if ($('.simpleFilePreview_multiUI').hasClass('edit_image_available')) {
        image_clone = $('.simpleFilePreview_multi li:last').clone(true);
        class_id = $('.simpleFilePreview_multi li:last').attr('id');
        id_data = Number(class_id.split('_')[1]) + 1;
        image_clone.find('.edit_after_save,.editpost_image_change,.simpleFilePreview_input').remove();
        image_clone.find('.simpleFilePreview_formInput').removeClass('product_default_field').removeClass('image_update').attr('name','product_image[]');
        image_clone.find('.product_upload_image_id').val("");
        $('.simpleFilePreview_multi').append("<li id='simpleFilePreview_" + id_data + "' class='simpleFilePreview' data-sfpallowmultiple='1'>\
                                          <a class='simpleFilePreview_input'>\
                                          <span class='simpleFilePreview_inputButtonText'>\
                                          <i class='fa fa-plus-circle fa_small'></i>\
                                          </span></a>" + image_clone.html() + "</li>");
    }
}

$(document).ready(function() {
    $("#add_area").validate({
        showErrors: function(errorMap, errorList) {
            $(".form-errors").html("All fields must be completed before you submit the form.");
        }
    });

    $(document).delegate(".attribute_status",'change',function () {
    	if($(this).is(":checked")){
    		$('.attribute_main_block').show();
            $('.price_group,.items_group').hide();
            $('#product_price,#product_totalitems').removeClass('product_default_field');
            $('.attribute_check_status').val('1');
        }
    	else{
    		$('.attribute_main_block').hide();
            $('.price_group,.items_group').show();
            $('#product_price,#product_totalitems').addClass('product_default_field');
            $('.attribute_check_status').val('0');
        }
    });

    $(document).delegate(".category_act",'change',function () {
        selected_category = $.trim($('option:selected',this).text());
        selected_category_id = $('option:selected',this).val();
        form_data = {'category_name':selected_category,'category_id':selected_category_id};
        // alert(JSON.stringify(form_data));
        var subcategory_options = '<option value="">Select SubCategory</option>'; 
        var recipient_options = '<option value="">Select Recipient</option>';  
        if(selected_category != 'Select Category'){
	         $.ajax({
	               type: "POST",
	               url: baseurl+"index.php/admin/adminindex/loadcategory_reference",
	               data: form_data,
	               dataType: 'json',  
	               cache: false,
	                success: function(data) {  
	                // alert(JSON.stringify(data)); 
	                data_subcategory = data['subcategory_category'];
	                data_recipient = data['recipient_category'];
	                if(data_subcategory!=0){ 
	                  $.each(data_subcategory, function(i){
	                    subcategory_options += '<option value="'+data_subcategory[i].subcategory_id+'">'+data_subcategory[i].subcategory_name+'</option>';
	                  });  
	                }   
	                else{
	                    alert('No SubCategory added for '+selected_category);    
	                }  
	                if(data_recipient!=0){ 
	                  $.each(data_recipient, function(i){
	                    recipient_options += '<option value="'+data_recipient[i].recipient_id+'">'+data_recipient[i].recipient_type+'</option>';
	                  });  
	                }   
	                else{
	                    alert('No Recipient added for '+selected_category);    
	                }    
	                $('.subcategory_act').html(subcategory_options); 
	    			$('.recipient_act').html(recipient_options);          
	               }
	        });
	    }     
    });
    // Functionality code for product attribute group in add product form
    // ********* Start *********
    var cloneCount = 1;
    $(document).delegate('.attibute_add_btn','click',function (e) {
        $error = false;
        $(this).parents('.clone_attribute_group').find('.attribute_option_validate').each(function(){
            if($(this).val() == '')
            {        
                $error = true;    
                $(this).addClass('attribute_error');           
            }
            else{
                $(this).removeClass('attribute_error');
            }
        });
        if(!$error){
            cloneCount = cloneCount +1;
            cloneelement = $(this).parents('.clone_attribute_group').find('.clone_attribute:last').clone();
            //After clone the element, assign one unique id and append to particular parent class
            cloneelement.attr('id', 'clone_attribute'+cloneCount).appendTo($(this).parents('.clone_attribute_group'));
            //To clear the label of attribute after cloned
            cloneelement.find('.attribute_label').text('');
            // cloneelement.find('.attibute_remove_btn').removeClass('attribute_btn_disabled');
            //To remove add button from previous clone attribute
            cloneelement.siblings('#clone_attribute'+(cloneCount-1)).find('.attibute_add_btn').remove();
            cloneelement.siblings('#clone_attribute'+(cloneCount-1)).find('.attibute_remove_btn').removeClass('attribute_btn_disabled');
        }
    });
    var cloneCount_att = 1;
    $(document).delegate('.attibute_add','click',function () {
    	$error = false;
        $(this).parents('.attribute_group').find('.attribute_validate').each(function(){
            if($(this).val() == '')
            {        
                $error = true;    
                $(this).addClass('attribute_error');
                // e.preventDefault();             
            }
            else{
                $(this).removeClass('attribute_error');
            }
        });
        if(!$error){
            var equal_check_array = [];
            $(this).parents('.attribute_group').find('.att_equal').each(function(){
                if($('option:selected',this).val() != ''){
                    equal_check_array.push($('option:selected',this).val());
                }
            });
            var hasDups = !equal_check_array.every(function(v,i) {
              return equal_check_array.indexOf(v) == i;
            });
            if (hasDups){
                $("html, body").animate({ scrollTop: 800 }, "slow");
                $('.attribute_group_message').hide();
                $('.attribute_duplicate_message').show();
            }
            else{
                $('.attribute_duplicate_message').hide();
                cloneCount_att = cloneCount_att +1;
                attclone = $(this).parents('.attribute_main_block').find('.attribute_group:last').clone();
                attclone.attr('id', 'attribute_group'+cloneCount_att).appendTo('.attribute_main_block');
                
                attclone.siblings('#attribute_group'+(cloneCount_att-1)).find('.attibute_add').remove();
                attclone.siblings('#attribute_group'+(cloneCount_att-1)).find('.attibute_remove').removeClass('attribute_btn_disabled');

                //Functionality used to increment the value of attribute group by attribute value add when add button click      
                increment_val = parseInt($('.group_values').val()) + 1;
                $('.group_values').val(increment_val);
            }
        }       
    });    
    $(document).delegate('.attibute_remove_btn','click',function () {
        if($(this).parents('.clone_attribute').index() == 0){
            $(this).parents('.clone_attribute').next().find('.attribute_label').text('Attribute Option');
        }
        $(this).parents('.clone_attribute').remove();
    });
    $(document).delegate('.attibute_remove','click',function () {
        $(this).parents('.attribute_group').remove();
    });
    // Commented for future use
    // $("#add_giftproduct").submit(function(){ 
    //     attribute_length = [];
    //     alert($('.attribute_group').length);
    //     if($('.attribute_group').length > 1){
    //         $('.clone_attribute_group').each(function(){
    //             attribute_length.push($(this).find('.clone_attribute').length);
    //         });
    //         var hasDups = !attribute_length.every(function(v,i) {
    //           return attribute_length.indexOf(v) == i;
    //         });
    //         if (hasDups){
    //             $('.attribute_group_message').hide();
    //             return true;
    //         }
    //         else{
    //             $("html, body").animate({ scrollTop: 800 }, "slow");
    //             $('.attribute_duplicate_message').hide();
    //             $('.attribute_group_message').show();
    //             return false;
    //         }
    //     }  
    //     var sum = 0;
    //     if($('.attribute_status').is(":checked")){  
    //         $("#product_price_hidden").val($('#attribute_group1').find('#price').val());
    //         $("[name='product_attribute_totalitems[]']").each(function(){
    //             sum += parseFloat(this.value);
    //         });
    //         $("#product_totalitems_hidden").val(sum);
    //         return false;
    //     }   
    //     // return false;   
    // });

    $('body').delegate("#add_giftproduct,#edit_giftproduct",'submit',function(e){ 
    // $("#add_giftproduct").submit(function(){ 
        // e.preventDefault();
        if($(this).is('#add_giftproduct'))
            $('.selectall_status').val($('.ms-list li.ms-selected').length);
        else
            $('.selectall_status').val($('.ms-list li:not(.ms-selected)').length);
        
        var attribute_length = [];
        var sum = 0;
        var $error = false;
        var return_value = false;
        if($('.photo_labelError').hasClass('error_input_field')){
            $error = true;
        }
        else{
            $('.product_default_field').each(function(){
                if($(this).val() == ""){
                    $error = true;     
                    if($(this).attr('type') == "file")
                        $('.product_error').text($(this).parents('.form-group').children('.product_error_message').text()).show();    
                    else
                        $('.product_error').text($(this).siblings('.product_error_message').text()).show(); 
                    $('.product_error').addClass('error_input_field');
                return false;
                }   
                else{
                    $('.product_error').removeClass('error_input_field');
                }    
            });
        } 
        if($('.attribute_status').is(":checked") && !($error)){
            //To Check any empty values passing in attributes block
            $('.product_error,.photo_labelError').hide();
            $(this).find('.attribute_group').find('.attribute_validate').each(function(){
                if($(this).val() == '')
                {        
                    $error = true;    
                    $(this).addClass('attribute_error');
                    $('.error_msg_reg').hide();
                    // e.preventDefault();             
                }
                else{
                    $(this).removeClass('attribute_error');
                }
            });
            if(!$error){
                //To assign the first attribute price value as default product price
                $("#product_price_hidden").val($('#attribute_group1').find('#product_attribute_price').val());
                //To calculate the total no. of items in the product
                $("[name='product_attribute_totalitems[]']").each(function(){
                    sum += parseFloat(this.value);
                });
                $("#product_totalitems_hidden").val(sum);

                attribute_group_length = $('.attribute_group').length;
                // alert(attribute_group_length);
                // To show error when same attribute group contains same attributes while click submit button
                // This same logic checked for group add attribute button
                for(i=1;i<=attribute_group_length;i++){
                    // alert("#attribute_group"+i);
                    var equal_check_array = [];
                    $(this).find('#attribute_group'+i).find('.att_equal').each(function(){
                        if($('option:selected',this).val() != ''){
                            equal_check_array.push($('option:selected',this).val());
                        }
                    });
                    var hasDups = !equal_check_array.every(function(v,i) {
                      return equal_check_array.indexOf(v) == i;
                    });
                    // alert(JSON.stringify(equal_check_array));
                    if (hasDups){
                        // alert("dupicate");
                        $("html, body").animate({ scrollTop: 800 }, "slow");
                        $('.attribute_group_message').hide();
                        $('.attribute_duplicate_message').show();
                        return_value = false;
                    }
                    else{
                        return_value = true;
                    }
                }     
            }
            if($('.attribute_group').length > 1){
                $('.clone_attribute_group').each(function(){
                    attribute_length.push($(this).find('.clone_attribute').length);
                });
                var hasDups = !attribute_length.every(function(v,i) {
                  return attribute_length.indexOf(v) == i;
                });
                if (hasDups){
                    $('.attribute_group_message').hide();
                    return_value = true;
                }
                else{
                    $("html, body").animate({ scrollTop: 800 }, "slow");
                    $('.attribute_duplicate_message').hide();
                    $('.attribute_group_message').show();
                    return_value = false;
                }
            }  
            // alert(return_value);
            return return_value;
        }  
        if($('.product_error').hasClass('error_input_field') || $('.photo_labelError').hasClass('error_input_field'))
            return false;
        // alert("return");
    });
    $(document).delegate("[name='select_attribute[]']",'change',function(){
        var new_selection = $(this).find('option:selected');
        $('option',this).not(new_selection).removeAttr('selected');
        new_selection.attr("selected",true);
    });
    $(document).delegate("#product_price",'change',function(){
        $('#product_price_hidden').val($(this).val());
    });
    $(document).delegate("#product_totalitems",'change',function(){
        $('#product_totalitems_hidden').val($(this).val());
    });
    // ********* End *********

    //**********add to muthukrishnan ***********
    $(document).delegate('#mobile,#userid,.totalitem,#orderid,#quantity,#size','keypress',function(e){
     //if the letter is not digit then display error 
     if (e.which != 8 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        return false;
     }
    });
    $(document).delegate("#deliverycharge,#totalamount,.price,#wight",'keypress',function(e){
     //if the letter is not digit then display error 
     if (e.which != 8 && e.which !=46 &&  e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
     }
    });
    $(".description").text(function(index, currentText) {
        if (currentText.length>60) {
            return currentText.substr(0, 60)+'.....';
        }
    });
    // var passVal = $('.password').val();
    // if(passVal!='') {
    //     var pass_restriction = new RegExp("^(?=.*[A-Za-z])(?=.*\\d)(?=.*[$@$!)=%*#(? &])[A-Za-z\\d$@)$!%(*#= ?&]{3,}$");
    //     if(!pass_restriction.test(passVal)) {
    //         $('#password').addClass("error_input_field");
    //         $('#error_pass_rest').slideDown();
    //     }
    //     else if(passVal != $('#repassword').val()) 
    //         {
    //             $('#error_pass_rest').slideUp();
    //             $('#password').removeClass("error_input_field");
    //             $('#repassword').addClass("error_input_field");
    //         }else {$('#error_pass_rest').slideUp();
    //         $('#password').removeClass("error_input_field");
    //         $('#repassword').removeClass("error_input_field");
    //     }}
    //************End *****************

    //************ Start ***********
    $(document).delegate('.form_submit','submit',function(e){
        // test code
        // form_data = $(this).serializeArray();
        // alert(JSON.stringify(form_data));

        //disable the default form submission
        e.preventDefault();
        //grab all form data  
        var form_data = new FormData($(this)[0]);
        $.ajax({
           type: "POST",
           url: $(this).attr('action'),
           data: form_data,
           async: false,
           // cache: false,
           contentType: false,
           processData: false,
           // dataType: 'json',  
           context: this, 
           success: function(data) {  
            $('.box-content').html(data);
            simplefilepreview_function();
            if($(this).attr('id') == "edit_giftproduct"){
                image_after_window_ajax_load();
            }
            if($('.attribute_check_status').val() == '1'){
                $('.attribute_main_block').show();
                $('.price_group,.items_group').hide();
                $('.attribute_status').attr("checked",true);
            }
            multiselect();
           }
        });
        // return false;
    });
    //************ End *************

    // Bind checkbox and span for multiselect dropdown
    //************ Start ***********
    $(document).delegate('.multiple_checkbox','click',function(){
        if($(this).hasClass('multiple_checkbox_inactive')) {
          $(this).removeClass('multiple_checkbox_inactive').addClass('multiple_checkbox_active')
          if($(this).siblings('input[type=checkbox]').is(':checked') == false) {
            $(this).siblings('input[type=checkbox]').trigger('click');
          }
 
        } else {
          $(this).removeClass('multiple_checkbox_active').addClass('multiple_checkbox_inactive');
          if($(this).siblings('input[type=checkbox]').is(':checked') == true) {
            $(this).siblings('input[type=checkbox]').trigger('click');
          }
        }
    });
    //************ End ***********

    //Code to store removed checkbox data in array for multiple checkbox only on edit
    //************ Start ***********
    checkbox_array = [];
    $(document).delegate('.edit_multiple_checkbox','click',function(){
        if($(this). prop("checked") == false && $.inArray($(this).val(), checkbox_array) == -1)
            checkbox_array.push($(this).val());
        else if($(this). prop("checked") == true && $.inArray($(this).val(), checkbox_array) !== -1)
            checkbox_array.splice( $.inArray($(this).val(), checkbox_array), 1 );
        $('.checkbox_array_hidden').val(checkbox_array);
    });
    //************ End ***********

    //Code to delete record using ajax
    //************ Start ***********
    $(document).on("click", ".delete", function () {
        var myId = $(this).data('id');
        $(".modal-body #vId").val( myId );
    });

    $(document).on("click", ".yes_btn_act", function () {
        var myId = $(".modal-body #vId").val();
        form_data = {'table_name':$('.table_name').val(),'field_name':$('.field_name').val(),'id':myId};
        // alert(JSON.stringify(form_data));
        $.ajax({
           type: "POST",
           url: $('.action').val(),
           data: form_data,
           dataType: 'json',  
           cache: false,
           success: function(data) {    
                if(data == 1){ 
                    $('a[data-id*='+myId+']').parents('tr').remove();
                    $('#myModal1,.modal,.modal-backdrop,.fade').hide();
                    $('.error_msg_del').text("Record Deleted Successfully").show();
                    window.setTimeout(function(){location.reload()},1000);
                }
           }
        });        
    });
    //************ End *************

    // Menu Events code to add active class and set slidetoggle
    //*********** Start ************
    $('.nav-stacked li').on('click',function(){
        $('.nav-stacked li').not(this).removeClass('active');
    });
    var list_section = $('.main-menu');
    list_section.find('li').click(function() {
        $(this).children('.sub-menu').slideDown();
        $(this).siblings().children('.sub-menu').slideUp("slow");
    });
    //*********** End ************

    if (window.File && window.FileList && window.FileReader) {
        $("#category_image").on("change", function(e) {
            old_image = parseInt($('.product-cat-images').length);
            new_image = parseInt($(this)[0].files.length);
            length = old_image + new_image;
            if(length <=8){
                var files = e.target.files,
                filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                  var file = e.target;
                  // $("<span class=\"pip\">" +
                  //   "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                  //   "<br/><span class=\"remove\">Remove image</span>" +
                  //   "</span>").insertAfter("#category_image");
                  $("<div class=\"product-cat-images\">" +
                    "<img class=\"edit_category_image\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "<span class=\"close-icon2\"><a><i class=\"glyphicon glyphicon-remove\"></i></a></span>" +
                    "</div>").appendTo(".preview_part");
                  $('.preview_part').show();
                  $(".close-icon2").click(function(){
                    $(this).parent(".product-cat-images").remove();
                    if($(".product-cat-images").length == 0)
                        $('.preview_part').hide();
                  });
                });
                fileReader.readAsDataURL(f);
              }
            }  
            else{
                $(this).val('');
                alert("8 files only allowed to upload");
            } 
        });
      } else {
        alert("Your browser doesn't support to File API")
      }
      simplefilepreview_function();
      function simplefilepreview_function(){
        $('.image_file_input').simpleFilePreview({
            'buttonContent': '<i class="fa fa-plus-circle fa_small"></i>',
            'shiftLeft': '',
            'shiftRight': '',
            'removeContent': 'Remove'
        });
      }  

      $(".select_multiple_option a").on('click', function() {
          $(".mutliSelect ul").slideToggle('fast');
      });

      $('.mutliSelect input[type="checkbox"]').on('click', function() {
              var title =  $(this).next('span').text();
              if ($(this).is(':checked')) {
                if($('.select_content').length) {
                    var html_comma = '<span class="module_comma"> , </span>';
                    var html_content = '<span class="select_content" title="' + title + '">' + title + '</span>';
                    var html = html_comma + html_content;
                }
                else
                    var html = '<span class="select_content" title="' + title + '">' + title + '</span>';
                $('.multiSel').append(html);
                $(".hida").hide();
              } else {
                if($('span[title="' + title + '"]').index()==0) {
                    $('span[title="' + title + '"]').next('.module_comma').remove();
                    $('span[title="' + title + '"]').remove();
                }
                else {
                    $('span[title="' + title + '"]').prev('.module_comma').remove();
                    $('span[title="' + title + '"]').remove();
                }

              }
        });
});

$(window).load(function() {
    image_after_window_ajax_load();
});