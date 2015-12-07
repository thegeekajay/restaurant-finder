jQuery(document).ready(function($) {

	$('#login').on('submit',function(e){
		$('#signin_spinner').css('display','inline');
		$.ajax({
			type: "POST",
			url: 'api/users/login.php',
           data: $("#login").serialize(),
           success: function(data)
           {
           	data = $.parseJSON(data);
           	if(data.status == "success")
           	{
           		location.reload();
           	}
           	else{
           		$('#signin_spinner').css('display','none');
           		$string = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> <span id="signup_error">'+data.error_text+'</span></div>';
           		$('#signup_error_block').show();
           		$('#signup_error_block').html($string);
           	}
           }
       });
		return false;
	});

	$('#register_form').on('submit',function(e){
		$('#register_spinner').css('display','inline');
		$.ajax({
			type: "POST",
			url: './api/users/register.php',
    		data: $("#register_form").serialize(), // serializes the form's elements.
    		success: function(data)
    		{
    			data = $.parseJSON(data);
    			if(data.status == "success")
    			{
    				location.reload();
    			}
    			else{
    				$('#register_spinner').css('display','none');
    				$('#register_error_block').show();
    			}
    		}
    	});
		return false;
	});

	$('#add_new_restaurant').on('submit',function(e){
		$('#register_spinner').css('display','inline');
		$.ajax({
			type: "POST",
			url: './api/restaurant/createRestaurant.php',
    		data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,   
    		success: function(data)
    		{
    			data = $.parseJSON(data);
    			if(data.status == "success")
    			{
    				$('#add_new_restaurant')[0].reset();
    				$(location).attr('href', '/dashboard.php');
    			}
    			else{
    				$('#register_spinner').css('display','none');
    			}
    		}
    	});
		return false;
	});

  $('#edit_restaurant').on('submit',function(e){
    $('#register_spinner').css('display','inline');
    $.ajax({
      type: "POST",
      url: './api/restaurant/editRestaurant.php',
        data: new FormData(this), 
      contentType: false,       
      cache: false,             
      processData:false,   
        success: function(data)
        {
          data = $.parseJSON(data);
          console.log(data);
          if(data.status == "success")
          {
            $(location).attr('href', '/dashboard.php');
          }
          else{
            $('#register_spinner').css('display','none');
          }
        }
      });
    return false;
  });

  $('.delete-restaurant').on('click',function(e){
    e.preventDefault();
    var $ele = $(this);
    var restaurant_id = $ele.attr('restaurant-id');
    $.ajax({
      type: "POST",
      url: './api/restaurant/deleteRestaurant.php',
      data: { id: restaurant_id },   
        success: function(data)
        {
          data = $.parseJSON(data);
          if(data.status == "success")
          {
            var item = $ele.parent().parent();
            item.next().remove();
            item.remove();
          }
          else{

          }
        }
      });
    return false;
  });

	$('#add_menu_item').on('submit',function(e){
		$('#menu_spinner').css('display','inline');
		$.ajax({
			type: "POST",
			url: './api/restaurant/menu/addMenuItem.php',
    		data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,   
    		success: function(data)
    		{
    			data = $.parseJSON(data);
    			if(data.status == "success")
    			{
    				if($('.no_menu_item').length)
    				{
    					$('.no_menu_item').remove();
    				}
    				var str = '<div class="row" menu-id="'+data.menu.id+'"><div class="col-sm-2"><img src="'+data.menu.image+'" class="img-responsive" style="border-radius:10px"></div><div class="col-sm-8"><h4>'+data.menu.item+' - $'+data.menu.price+'</h4><h5>'+data.menu.detail+'</h5></div><div class="col-sm-2" menu-item-id="'+data.menu.id+'" restaurant-id="'+data.menu.restaurant_id+'" menu-item-item="'+data.menu.item+'" menu-item-detail="'+data.menu.detail+'" menu-item-price="'+data.menu.price+'"><button class="btn btn-sm btn-info menu_item_edit"><i class="fa fa-pencil"></i></button> <button class="btn btn-sm btn-danger menu_item_delete"><i class="fa fa-trash-o"></i></button></div></div><hr>';
    				$('.menu_item').append(str);
    				$('#add_menu_item')[0].reset();
    				$('#menu_spinner').css('display','none');

    			}
    			else{
    				$('#menu_spinner').css('display','none');
    			}
    		}
    	});
		return false;
	});

  $('body').on('click','.menu_item_edit',function(e){
    var $menuid = $(this).parent().attr('menu-item-id');
    var $item = $(this).parent().attr('menu-item-item');
    var $detail = $(this).parent().attr('menu-item-detail');
    var $price = $(this).parent().attr('menu-item-price');

    $("#menu-item-edit input[name=menu_id]").val($menuid);
    $("#menu-item-edit input[name=item]").val($item);
    $("#menu-item-edit input[name=detail]").val($detail);
    $("#menu-item-edit input[name=price]").val($price);

    $('.edit-menu-item').modal('show');

  });

  $('body').on('click','.menu_item_delete',function(e){
    var $id = $(this).parent().attr('menu-item-id');
    var $restaurant_id = $(this).parent().attr('restaurant-id');
    $.ajax({
      type: "POST",
      url: './api/restaurant/menu/deleteMenuItem.php',
      data: { id: $id, restaurant_id: $restaurant_id },   
        success: function(data)
        {
          data = $.parseJSON(data);
          if(data.status == "success")
          {
            var menu_item = $('div[menu-id='+$id+']');
            menu_item.next().remove();
            menu_item.remove();
          }
          else{

          }
        }
      });
  });

  $('#menu-item-edit').on('submit',function(e){
    $('#menu-item-edit-spinner').css('display','inline');
    $.ajax({
      type: "POST",
      url: './api/restaurant/menu/editMenuItem.php',
        data: new FormData(this), 
      contentType: false,       
      cache: false,             
      processData:false,   
        success: function(data)
        {
          data = $.parseJSON(data);
          if(data.status == "success")
          {
            var menuid = $('#menu-item-edit input[name=menu_id]').val();
            var str = '<div class="col-sm-2"><img src="'+data.menu.image+'" class="img-responsive" style="border-radius:10px"></div><div class="col-sm-8"><h4>'+data.menu.item+' - $'+data.menu.price+'</h4><h5>'+data.menu.detail+'</h5></div><div class="col-sm-2" menu-item-id="'+data.menu.id+'" menu-item-item="'+data.menu.item+'" menu-item-detail="'+data.menu.detail+'" menu-item-price="'+data.menu.price+'"><button class="btn btn-sm btn-info menu_item_edit"><i class="fa fa-pencil"></i></button> <button class="btn btn-sm btn-danger menu_item_delete"><i class="fa fa-trash-o"></i></button></div>';
            $('[menu-id='+menuid+']').html(str);
            $('.edit-menu-item').modal('hide');
            $('#menu-item-edit')[0].reset();
            $('#menu-item-edit-spinner').css('display','none');
          }
          else{
            $('#menu-item-edit-spinner').css('display','none');
          }
        }
      });
    return false;
  });


	$('.item-add').on('click',function(e){
		var itemId = $(this).attr('item-id');
		console.log(itemId);
	});

});