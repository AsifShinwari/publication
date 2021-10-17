/*global jQuery:false */
jQuery(document).ready(function($) {
"use strict";
		
		//User defined CUSTOM functions ---------------------------------------------
		<!-- ./logout function-->
		$("#logout").click(function(e) {
			e.preventDefault();					
			$.ajax({ 
			type: "POST", 
			url: "logout.php", 
				success: function(msg){
					if(msg == 'OK'){
					 //alert ("success");
						alert("Logged Out Successfully");
						location.reload();
					} else {
						alert ("Error in Logout");
					   
				   }
				}
			});
		
		});
		<!-- END: ./logout function -->
		
		<!-- ./validating email availability-->
		$("#emailval").change(function() {
		var usr = $("#emailval").val();
		if(usr.length >= 1){
			$("#emailstatus").html('&nbsp;Checking availability...');
			$.ajax({ 
			type: "POST", 
			url: "emailcheck.php", 
			data: "email="+ usr,
			dataType: 'text',
				success: function(msg){
					if(msg == 'OK'){
					 //alert ("success");
						$("#emailval").removeClass('object_error'); // if necessary
						$("#emailval").addClass("object_ok");
						$("#emailstatus").html('<span style="color:green">Available</span>');
					} else {
						//alert ("error");
					   $("#emailval").removeClass('object_ok'); // if necessary
					   $("#emailval").addClass("object_error");
					   $("#emailstatus").html(msg);
					   $(':input[type="submit"]').attr('disabled' , true);
				   }
				}
	
			});
		} else {
			$("#status").html('<font color="red">' + 'Enter Valid Data</font>');
			$("#volumename").removeClass('object_ok'); // if necessary
			$("#volumename").addClass("object_error");
		}
		});
		<!-- END: ./validating email availability -->
		
		<!-- ./check password matching-->
		$('#password, #confirmpassword').on('keyup', function () {
		  if ($('#password').val() == $('#confirmpassword').val()) {
			$('#passmessage').html('Password Matches').css('color', 'green');
			$(':input[type="submit"]').attr('disabled' , false);
		  } else {
			$('#passmessage').html('Password Not Matching').css('color', 'red');
			$(':input[type="submit"]').attr('disabled' , true);
		  }
		});
		<!-- ./END: check password matching-->
				
		
		
		<!-- ./Login-->
		$("#loginform").submit(function() {
			event.preventDefault();
			//alert("Submitted");
			var usr = $("#loginemail").val();
			var password = $("#loginpassword").val();
			var refurl = $("#refurl").val();
			if(usr.length >= 1){
				$.ajax({ 
				url: $(this).attr('action'),
				type: "POST",
				data: $("#loginform").serialize()
				}).done(function(data){
				if(data == 'Error'){
					 //alert ("success");
					 alert("Invalid Email or Password ! Please try again.");
						
					} else if (data != 'Error') {
						alert("Logged in Successfully");
						//$("#errortitle").html("Login");
			//$("#error").html("Logged in Successfully !<br><br><a href='login.php' target='_blank' class='btn btn-primary'>Continue</a> ");
      		//$('#myModal').modal("show");
			//window.location.reload(data);
			location.replace(data);
					   
				   }
				//form_status.html('<p class="text-success" style="text-align:center";><br><br>Thank you for sending your requirements/query. EPF representative will contact you shortly.<br><br></p>').delay(5000).fadeOut();
				});
				
	
			} else {
				$("#errortitle").html("Login");
				$("#error").html("Invalid Email or Password ! Please try again.");
				$('#myModal').modal("show");
			}
		});
		<!-- END: ./Login -->   
		
		<!-- ./Forget Password-->
		$("#forgetpassform").submit(function() {
			event.preventDefault();
			//alert("Submitted");
			var usr = $("#loginemail").val();
			var form_status = $('<div class="form_status"></div>');
			if(usr.length >= 1){
				$.ajax({ 
				url: $(this).attr('action'),
				type: "POST",
				data: $("#forgetpassform").serialize(),
				beforeSend: function(){
					$("#forgetpassform").append( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Processing...</p>').fadeIn() );
				}
				}).done(function(data){
				if(data == 'Error'){
					 //alert ("success");
					 alert("Please enter registered Email address.");
					 $("#forgetpassform").append( form_status.html('').fadeIn() );
						
					} else if (data == 'Success') {
						form_status.html('<p class="text-success"> </p>').delay(3000).fadeOut();
						alert("New password generated and sent to your email. Please check your email.");
						window.location="login.php";
					   
				   }
				//form_status.html('<p class="text-success" style="text-align:center";><br><br>Thank you for sending your requirements/query. EPF representative will contact you shortly.<br><br></p>').delay(5000).fadeOut();
				});
				
	
			} else {
				$("#errortitle").html("Login");
				$("#error").html("Invalid Email or Password ! Please try again.");
				$('#myModal').modal("show");
			}
		});
		<!-- END: ./Forget Password --> 
		// Contact form
		var form = $('#contactForm');
		form.submit(function(event){
			event.preventDefault();
			var form_status = $('<div class="form_status"></div>');
			$.ajax({
				   
				url: $(this).attr('action'),
				type: "POST",
				data: form.serialize(),
				beforeSend: function(){
					form.append( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
				}
			}).done(function(data){
				form_status.html('<p class="text-success">Thank you for sending your message. We will reply as early as possible.</p>').delay(3000).fadeOut();
				form[0].reset();
			});
		});
		// End: Contact form
		<!-- ./enable edit profile button-->
		$('#editprofileenable').click(function (e) {
			e.preventDefault();
			//$(':input[type="submit"]').attr("disabled", false);
			//$("#editprofilesubmit").hide();
			$("#editprofilesubmit").removeClass("hidden");
			$("#editprofileenable").addClass("hidden");
			$('#name').attr("readonly", false);
			$('#phone').attr("readonly", false);
			$('#institution').attr("readonly", false);
			$('#country').attr("readonly", false);
		  
		});
		<!-- End: ./enable edit profile button-->
		
		<!-- ./check phone length -->
		$('#phonelengthvalid').on('keyup', function () {
		  if ($('#phonelengthvalid').val().length !=10) {
			$('#phonemessage').html('Please enter 10 digit mobile number<br><br>').css('color', 'red');
			$(':input[type="submit"]').attr('disabled' , true);
		  } else {
			$('#phonemessage').html('').css('color', 'red');
			$(':input[type="submit"]').attr('disabled' , false);
		  }
		});
		<!-- ./END: check phone length -->
		
		<!-- ./Add fields in profile for License/Certificate -->
		$('#add-lic-cert').click(function(e){
			e.preventDefault();
			var wrapper = $(".lic-cert:last");
			$(wrapper).after('<div class="row lic-cert"><div class="col-lg-12 form-group d-none"><input name="licenseid[]" placeholder="License ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-12 form-group"><input name="lcname[]" placeholder="License/Certificate Name"  class="common-input  form-control ph-css form-boldtxt" type="text"></div><div class="col-lg-6 form-group"><input name="issueorg[]" placeholder="Issuing Organization" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><label>Issue Date</label><input type="date" name="issuedate[]" class="form-control" /></div><div class="col-lg-6 form-group"><input name="credid[]" placeholder="Credential ID" class="common-input  form-control" type="text" ></div><div class="col-lg-6 form-group"><input name="credurl[]" placeholder="Credential URL" class="common-input  form-control" type="text"></div>	<div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for License/Certificate -->
		
		<!-- ./Add fields in profile for Volunteer Experience -->
		$('#add-vol-exp').click(function(e){
			e.preventDefault();
			var wrapper  = $(".vol-exp:last");
			$(wrapper).after('<div class="row vol-exp"><div class="col-lg-12 form-group d-none"><input name="volid[]" placeholder="Volunteer ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-12 form-group"><input name="volorg[]" placeholder="Volunteer Organization"  class="common-input  form-control ph-css form-boldtxt" type="text"></div><div class="col-lg-6 form-group"><input name="volrole[]" placeholder="Role" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><input name="volcause[]" placeholder="Cause" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><label>Start Date</label><input type="date" name="volstartdate[]" class="form-control"/></div><div class="col-lg-6 form-group"><label>End Date</label><input type="date" name="volenddate[]" class="form-control"/></div><div class="col-lg-12 form-group"><input name="voldesc[]" placeholder="Description" class="common-input  form-control" type="text"></div><div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for Volunteer Experience -->
		
		<!-- ./Add fields in profile for Publication -->
		$('#add-usr-pub').click(function(e){
			e.preventDefault();
			var wrapper  = $(".usr-pub:last");
			$(wrapper).after('<div class="row vol-usr-pub"><div class="col-lg-12 form-group d-none"><input name="pubid[]" placeholder="Publication ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-12 form-group"><input name="pubtitle[]" placeholder="Title"  class="common-input  form-control ph-css form-boldtxt" type="text"></div><div class="col-lg-6 form-group"><input name="pubpublisher[]" placeholder="Publisher" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><label>Publication Date</label><input type="date" name="pubdate[]" class="form-control"/></div><div class="col-lg-6 form-group"><input name="puburl[]" placeholder="Publication URL" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><input name="pubdesc[]" placeholder="Description" class="common-input  form-control" type="text"></div><div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for Publication -->
		
		<!-- ./Add fields in profile for Patent -->
		$('#add-usr-pat').click(function(e){
			e.preventDefault();
			var wrapper  = $(".usr-pat:last");
			$(wrapper).after('<div class="row usr-pat"><div class="col-lg-12 form-group d-none"><input name="patid[]" placeholder="Patent ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-12 form-group"><input name="pattitle[]" placeholder="Patent Title"  class="common-input  form-control ph-css form-boldtxt" type="text"></div><div class="col-lg-6 form-group"><input name="patoffice[]" placeholder="Patent Office" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><input name="patnum[]" placeholder="Patent Number" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><label>Patent Issued Date</label><input type="date" name="patdate[]" class="form-control"/></div><div class="col-lg-6 form-group"><input name="paturl[]" placeholder="Patent URL" class="common-input  form-control" type="text" ></div><div class="col-lg-6 form-group"><input name="patdesc[]" placeholder="Description" class="common-input  form-control" type="text"></div><div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for Patent -->
		
		<!-- ./Add fields in profile for course -->
		$('#add-usr-cour').click(function(e){
			e.preventDefault();
			var wrapper  = $(".usr-cour:last");
			$(wrapper).after('<div class="row usr-cour"><div class="col-lg-12 form-group d-none"><input name="courid[]" placeholder="Course ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-6 form-group"><input name="courtitle[]" placeholder="Course Title"  class="common-input  form-control ph-css form-boldtxt" type="text" ></div><div class="col-lg-6 form-group"><input name="courinst[]" placeholder="Studied Institute" class="common-input  form-control" type="text"></div>	<div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for course -->
		
		<!-- ./Add fields in profile for Project -->
		$('#add-usr-proj').click(function(e){
			e.preventDefault();
			var wrapper  = $(".usr-proj:last");
			$(wrapper).after('<div class="row usr-proj"><div class="col-lg-12 form-group d-none"><input name="projid[]" placeholder="Project ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-12 form-group"><input name="projname[]" placeholder="Project Name"  class="common-input  form-control ph-css form-boldtxt" type="text"></div><div class="col-lg-6 form-group"><label>From Date</label><input type="date" name="projfrom[]" class="form-control  "/></div><div class="col-lg-6 form-group"><label>To Date</label><input type="date" name="projto[]" class="form-control  " /></div><div class="col-lg-6 form-group"><input name="projasso[]" placeholder="Associated with" class="common-input  form-control" type="text" ></div><div class="col-lg-6 form-group"><input name="projurl[]" placeholder="Project URL" class="common-input  form-control" type="text"></div><div class="col-lg-12 form-group"><input name="projdesc[]" placeholder="Description" class="common-input  form-control" type="text"></div><div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for Project -->
		
		<!-- ./Add fields in profile for Honor/Award -->
		$('#add-usr-hon').click(function(e){
			e.preventDefault();
			var wrapper  = $(".usr-hon:last");
			$(wrapper).after('<div class="row usr-hon"><div class="col-lg-12 form-group d-none"><input name="honid[]" placeholder="Honor ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-12 form-group"><input name="hontitle[]" placeholder="Honor/Award Title"  class="common-input  form-control ph-css form-boldtxt" type="text"></div><div class="col-lg-6 form-group"><input name="honasso[]" placeholder="Associated with" class="common-input  form-control" type="text"></div>	<div class="col-lg-6 form-group"><input name="honissue[]" placeholder="Issued by" class="common-input  form-control" type="text"></div><div class="col-lg-6 form-group"><label>Issued Date</label><input type="date" name="hondate[]" class="form-control"/></div><div class="col-lg-12 form-group"><input name="hondesc[]" placeholder="Description" class="common-input  form-control" type="text"></div><div class="col-lg-12"><br><br></div></div>'); //add input box
		});
		
		<!-- ./END: Add fields for Honor/Award -->
		
		<!-- ./Add fields in profile for course offered-->
		$('#add-usr-couroffer').click(function(e){
			e.preventDefault();
			var wrapper  = $(".usr-couroffer:last");
			$(wrapper).after('<div class="col-lg-12 form-group d-none"><input name="courofferid[]" placeholder="Course Offer ID"  class="common-input  form-control ph-css hidden" type="text"></div><div class="col-lg-4 form-group usr-couroffer"><input name="couroffertitle[]" placeholder="Course Title"  class="common-input  form-control ph-css form-boldtxt" type="text"></div>'); //add input box
		});
		
		<!-- ./END: Add fields for course offered-->
		
		<!-- ./Profile page input fields readonly mode and submit button show-->
		
				/*Disable all input type="text" box*/
				$('#profileform input[type="text"]').prop("readonly", true);
				$('#profileform input[type="date"]').prop("readonly", true);
				$('.add-button').addClass( "d-none" );
				$('#profileform select').prop("disabled", true);
				
				/*Disable textarea using id */
				//$('#form1 #txtAddress').prop("disabled", true);
				$('#edit-profile').click(function(e){
					e.preventDefault();
					$('#profileform input[type="text"]').prop("readonly", false);
					$('#profileform input[type="date"]').prop("readonly", false);
					
					$( '#submit-profile' ).removeClass( "d-none" ); //show submit button
					$( '#edit-profile' ).addClass( "d-none" ); //show submit button
					$('.add-button').removeClass( "d-none" );
					$('#profileform select').prop("disabled", false);
					$('#editprofilepic').removeClass( "d-none" );
					
				});
		
		<!-- ./end page input fields readonly mode and submit button show-->
		
		
	// Start: Load Upcoming event Data on Load
    // Load more data
    $('.load-more').click(function(e){
        e.preventDefault();
		var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 9;
        row = row + rowperpage;

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getData.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more').addClass("d-none");
                        }else{
                            $(".load-more").text("Load more Events");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more').addClass("d-none");
        }

    });
	
	// End: Load Upcoming event Data on Load
	
	// Start: Load Past event Data on Load
    // Load more data
    $('.load-more-past').click(function(e){
        e.preventDefault();
		var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 9;
        row = row + rowperpage;

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getDatapast.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-past").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-past').addClass("d-none");
                        }else{
                            $(".load-more-past").text("Load more Events");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-past').addClass("d-none");
        }

    });
	
	// End: Load Past event Data on Load
	
	// Start: Load Mentor post on Load
    // Load more data
    $('.load-more-mentor-post').click(function(e){
        e.preventDefault();
		var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 2;
        row = row + rowperpage;

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getDataMentorPost.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-mentor-post").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load-mentor-post:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-mentor-post').addClass("d-none");
                        }else{
                            $(".load-more-mentor-post").text("Load more Posts");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-mentor-post').addClass("d-none");
        }

    });
	
	// End: Load Mentor post on Load
	
	
	// Start: Current Project on Load
    // Load more data
    $('.load-more-proj-current').click(function(e){
        e.preventDefault();
		var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 2;
        row = row + rowperpage;
		

        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: 'getDataCurrentProj.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-proj-current").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load-proj-current:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-proj-current').addClass("d-none");
                        }else{
                            $(".load-more-proj-current").text("Load more Projects");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-proj-current').addClass("d-none");
        }

    });
	
	// End: Load Current Project on Load
	
	// Start: Past Project on Load
    // Load more data
    $('.load-more-proj-past').click(function(e){
        e.preventDefault();
		var row = Number($('#rowpast').val());
        var allcount = Number($('#allpast').val());
        var rowperpage = 2;
        row = row + rowperpage;
		

        if(row <= allcount){
            $("#rowpast").val(row);

            $.ajax({
                url: 'getDataPastProj.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-proj-past").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load-proj-past:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-proj-past').addClass("d-none");
                        }else{
                            $(".load-more-proj-past").text("Load more Projects");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-proj-past').addClass("d-none");
        }

    });
	
	// End: Load Past Project on Load
	
	// Start: Funded Project on Load
    // Load more data
    $('.load-more-proj-funded').click(function(e){
        e.preventDefault();
		var row = Number($('#rowfund').val());
        var allcount = Number($('#allfund').val());
        var rowperpage = 2;
        row = row + rowperpage;
		
        if(row <= allcount){
            $("#rowfund").val(row);

            $.ajax({
                url: 'getDataFundedProj.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-proj-funded").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load-proj-funded:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;
						

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-proj-funded').addClass("d-none");
                        }else{
                            $(".load-more-proj-funded").text("Load more Projects");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-proj-funded').addClass("d-none");
        }

    });
	
	// End: Load Funded Project on Load
	
	
	// Start: Patent Project on Load
    // Load more data
    $('.load-more-proj-patent').click(function(e){
        e.preventDefault();
		var row = Number($('#rowpatent').val());
        var allcount = Number($('#allpatent').val());
        var rowperpage = 2;
        row = row + rowperpage;
		
        if(row <= allcount){
            $("#rowpatent").val(row);

            $.ajax({
                url: 'getDataPatentProj.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-proj-patent").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load-proj-patent:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;
						

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-proj-patent').addClass("d-none");
                        }else{
                            $(".load-more-proj-patent").text("Load more Patents");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-proj-patent').addClass("d-none");
        }

    });
	
	// End: Load Patent Project on Load
	
	// Start: Archives on Load
    // Load more data
    $('.load-more-archives').click(function(e){
        e.preventDefault();
		var row = Number($('#rowarchives').val());
        var allcount = Number($('#allarchives').val());
        var rowperpage = 2;
        row = row + rowperpage;
		
        if(row <= allcount){
            $("#rowarchives").val(row);

            $.ajax({
                url: 'getDataArchives.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more-archives").text("Loading...");
                },
                success: function(response){

                    // Setting little delay while displaying new content
                    setTimeout(function() {
                        // appending posts after last post with class="post"
						//alert(response);
                        $(".onscroll-load-archives:last").after(response).show().fadeIn(1000);

                        var rowno = row + rowperpage;
						

                        // checking row value is greater than allcount or not
                        if(rowno > allcount){

                            // Change the text and background
                            $('.load-more-archives').addClass("d-none");
                        }else{
                            $(".load-more-archives").text("Load more Archives");
                        }
                    }, 2000);

                }
            });
        }else{
            $('.load-more-archives').addClass("d-none");
        }

    });
	
	// End: Load Archives on Load
	
	
	
	<!-- Amount Calculation Plag Checker-->
		
		$('#plagfiletype, #tooltype, #plagnooffiles, #currency').change(function () { //if any of mention id value changes fn. will be called
		  var $plagfiletype = $('#plagfiletype').val(); 								  
		  var $qty = $('#plagnooffiles').val();
		  var $tooltype = $('#tooltype').val();
		  var $currency = $('#currency').val();
		  var $amt;
		  
		  if($currency == 'INR'){
			  if($plagfiletype == 'Article/Chapters'){
				$amt = 100 * $qty;
			  }
			  else if($plagfiletype == 'Book/Thesis'){
				 $amt = 250 * $qty; 
			  }
			  else {
				 $amt = $qty; 
			  }
		  }
		  
		  if($currency == 'USD'){
			  if($plagfiletype == 'Article/Chapters'){
				$amt = 2 * $qty;
			  }
			  else if($plagfiletype == 'Book/Thesis'){
				 $amt = 5 * $qty; 
			  }
			  else {
				 $amt = $qty; 
			  }
		  }
		  
		 // var $plagfiletype = "filetypeeee"; 								  
		 // var $qty = "qtyyyyyyyyyy";
		 // var $tooltype = "tooltype";
		  
		  $('#plagamount').val($amt);
		  //$amt = 99; 
		  //$.post("pg-sessionvariableset.php", {"amount": amt});
		  
		  		$.ajax({
                url: 'pg-sessionvariableset.php',
                type: 'post',
                data: {amount:$amt, plagfiletype:$plagfiletype, tooltype:$tooltype, qty:$qty, currency:$currency},
                
                success: function(response){

                   // $('#plagamount').val($amt);
                    

                }
            });
		});
		
		
	<!-- ./END: Amount Calculation Plag Checker-->
		
		<!-- General PG sesion setting - Plag Checker-->
		$('#paymentamount').on('keyup', function () {
		  var $amt = $('#paymentamount').val();
		  
		 var $plagfiletype = ""; 								  
		 var $qty = "";
		 var $tooltype = "";
		 var $currency = $('#currency').val();
		  //$amt = 99; 
		  //$.post("pg-sessionvariableset.php", {"amount": amt});
		  
		  		$.ajax({
                url: 'pg-sessionvariableset.php',
                type: 'post',
                data: {amount:$amt, plagfiletype:$plagfiletype, tooltype:$tooltype, qty:$qty, currency:$currency},
                
                success: function(response){

                   // $('#plagamount').val($amt);
                    

                }
            });
		});
		<!-- ./END: General PG sesion setting - Plag Checker-->
	


 
});
	// Subscribe Archives Alert
	function subscribeAlert() {
	  alert("Please subscribe to download !");
	}
	// Coming Soon Alert
	function comingsoonAlert() {
	  alert("Coming Soon !");
	}
	
	// End: Subscribe Archives Alert

