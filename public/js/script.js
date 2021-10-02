
$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});					
	$('#gender').niceSelect();
	$('#language').niceSelect();
	activeMenu();  // when user select menu li, active
	getCountry();	// when open register page, select option country
	getCountryForUpdateStudent();	// when open student info update page, select option country
	getCategoryList();
	//when select bookedid in homework add page, show select upload type option 
	$('.add-homeworks #bookedid').on('change', function(e){
		if($('.add-homeworks #bookedid').val()){
			$('.add-homeworks #inputMethod').css('display', 'inherit');
			showUploadMethod();
		}else{
			$('.add-homeworks #inputMethod').css('display', 'none');
		}
		
	});
	
	$('.add-homeworks #appointment').on('change', function(e){
		if($('.add-homeworks #appointment').val()){
			$('.add-homeworks #inputMethod').css('display', 'inherit');
			showUploadMethod();
		}else{
			$('.add-homeworks #inputMethod').css('display', 'none');
		}
		
	});
	
	
	$('.add-homeworks input[name=\'inputMethod\']').on('change', function(){		
		showUploadMethod();
	});
	
	function showUploadMethod(){
		if($('.add-homeworks #fileUpload').is(':checked')){
			$('.add-homeworks #fileUpload-section').css('display', 'inherit');
			$('.add-homeworks #recording-section').css('display', 'none');
		}else{
			$('.add-homeworks #fileUpload-section').css('display', 'none');
			$('.add-homeworks #recording-section').css('display', 'inherit');
		}
	}
	
	function activeMenu(){
		var myUrl = window.location.href;		
		var splitUrl = myUrl.split("/");		
		var item = splitUrl[3];	
		var selector = ".navbar-nav .";
		
		$('.navbar-nav li').removeClass("active");
		if(item == 'home' || item == ''){
			selector += "mains";
		}else{
			selector += item + "s";
		}	
		$(selector).addClass('active');
	}
	
	function getCountry(){
		$.ajax({
			type:"POST",
			url: "/getcountry",								
			success: function(result){
				if(result.status == '1'){
					var html = "";
					for(var i = 0; i < result.data.length; i++){
						var item = result.data[i];
						html += "<option value='" + item.id + "'>";
						html += item.name + "</option>";
					}					
					$('select[name=\'country\']').html(html);
					
					$('#country').niceSelect();
				}else{
					alert("Connect Error!");
				}
			  
			 
			}
		});
	}
	
	function getCountryForUpdateStudent(){
		$.ajax({
			type:"POST",
			url: "/getcountryforupdatestudent",								
			success: function(result){
				if(result.status == '1'){					
					var html = "";
					for(var i = 0; i < result.data.length; i++){
						var item = result.data[i];
						if(item.id == result.ussercountryid)
							html += "<option value='" + item.id + "' selected>";
						else
							html += "<option value='" + item.id + "'>";
						html += item.name + "</option>";
					}					
					$('select[name=\'country1\']').html(html);
					
					$('#country1').niceSelect();
				}else{
					alert("Connect Error!");
				}
			  
			 
			}
		});
	}
	
	/************* Start Library(front) ************************/
	
	function getCategoryList(){
		$.ajax({
			type:"POST",
			url: "/getcategorylist",							
			success: function(result){
				
				if(result.status == '1'){					
					var html = "<option value='0' selected>Show all</option>";
					for(var i = 0; i < result.data.length; i++){
						var item = result.data[i];				
							html += "<option value='" + item.id + "-" + item.cat_name + "'>";
						html += item.cat_name + "</option>";
					}						
					$('#dropdown-categories').html(html);
					$('#searchStr').val('');
					$('#dropdown-categories').niceSelect();
					makeSearchCategoryResult('no', 0);
				}else{
					alert("Connect Error!");
				}
			  
			 
			}
		});
	}
	
	$(document).on('click', '.categorylist ul li', function(){
		
		var data = $(this).attr('data-value');
		if(data == '0'){
			makeSearchCategoryResult('show all', 0);
		}else{
			var splitData = data.split('-');
			makeSearchCategoryResult(splitData[1], splitData[0]);		
		}
		
	});
	
	$(document).on('click', '.data-grid_applied button', function(){
		$('.data-grid_applied').empty();
		$('#searchStr').val('');
		makeSearchCategoryResult('no', 0);
	});
	
	function makeSearchCategoryResult(name, id){
		
		var html = '';
		html += '<button type="button" class="btn btn-warning btn-sm"><em>' + name + '</em><span class="fa fa-times-circle" style="z-index:200;"></span></button>';
		if(name == 'no'){
			$('.data-grid_applied').empty();
		}else{
			$('.data-grid_applied').empty().append(html);
		}
		
		makeSearchResult(0, id);
	}
	
	function makeSearchResult(flag, id){
		$.ajax({
			type:"POST",
			url: "/searchSubcategoryData/" + flag + "/" + id,
			success: function(result){				
				if(result.status == '1'){	
					var length = result.data.length;
					var html = ''	;
					if(length == 0){
						html += '<h3>No Results</h3>';						
					}else{
						html += '<ul class="list-unstyled no-margin no-padding available-list data-grid" >';
						for(var i = 0; i < length; i++){
							var item = result.data[i];	
								
							html += '<li class="col-md-6 col-sm-6 col-xs-12"><div class="card hoverable">';
							html +='<a href="/librarys/get-item/'+item.id+'">';
							html += '<img src="../images/icon/book.png" class="img-responsive" alt=""></a>';
							html +='<a href="/librarys/get-item/'+item.id+'">';
							html += '<h4>' + item.sub_cat_name + '</h4></a>';		
							html += '<span><time class="warning fa-right"><i class="fa fa-right fa-clock-o"></i>'+ item.created_at+'</time></span>';
							html += '</div></li>';								
						}
						html += '</ul>';						
					}			
					$('.search-result .no-results').empty().append(html);
						
				}else{
					alert("Connect Error!");
				}
			  
			 
			}
		});
	}
	
	$(document).on('click', '.search-box #categorySearch', function(){
		var searchStr = $('#searchStr').val();
		var html = '';
		if(searchStr == ''){
			html += '<h3>No Results</h3>';	
			$('.search-result .no-results').empty().append(html);
		}else{
			makeSearchResult(1, searchStr);
		}
		var html = '';
		html += '<button type="button" class="btn btn-warning btn-sm"><em>' + searchStr + '</em><span class="fa fa-times-circle" style="z-index:200;"></span></button>';
		
		$('.data-grid_applied').empty().append(html);
		
	});
	
	
	
	
	
	/************* End Library ************************/
});
