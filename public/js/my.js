var dop_url='';

function get_count() {
	var result;
	$.ajax({                         
	url: dop_url+"/api/count",                        
	method: 'GET',
	async: false,
	}).done(function(data) {
		if (!!data) {
			result=data;
		} else {
			result=false;
		}
	});
	console.log(result);
	return result;
}

function get_count_timeout() {
	var count=get_count();
	$('#count-all').text(count.all);
	$('#count-desktop').text(count.desktop);
	$('#count-phone').text(count.phone);
	$('#count-tablet').text(count.tablet);
	$('#count-robot').text(count.robot);
	setTimeout("get_count_timeout()", 5000);
}

function basket_count()
{
	//делаем запрос к БД
	$.ajax({                         
	url: dop_url+"/api/basket/count",                        
	method: 'GET',
	async: false,
	}).done(function(data) {
		if (!!data) {
			$('#basket-count').text(data);
		} else {
			$('#basket-count').text('not found');
		}
	});
	setTimeout("basket_count()", 5000);
}

function onloadd()
{
	get_count_timeout();
	// basket_count();
}

function show_div_detail(id) {
		//делаем запрос к БД
		$.ajax({                         
		url: dop_url+'/api/shop/product/'+id,                        
		method: 'GET',
		async: false,
		}).done(function(data) {
			if (!!data) {
				$("#photo").attr('src', data.photo);
				$("#name").text('Название товара: '+data.name);
				$("#price").text('Цена товара: '+data.price+' рублей');
				$("#description").text('Описание товара: '+data.description);
				$("#on_sklad").text('Осталось на складе: '+data.on_sklad);
				$('#modal_product_detail').show();
				// console.log(data);
			} else {
				result=false;
			}
	});
}

function basket_add(id) {
		//делаем запрос к БД
		$.ajax({                         
		url: dop_url+'/api/basket/add/'+id,                        
		method: 'GET',
		async: false
		}).done(function(data) {
			if (!!data) {
				Swal.fire('Товар в корзину добавлен');
			} else {
				Swal.fire('Товар в корзину не добавлен');
			}
	});
}

function button_show_modal_form_new_chat() {
	// Показываем форму для добавления нового чата
	$('#modal_form_new_chat').show();
}

function button_show_modal_form_new_message() {
	// Показываем форму для добавления нового комментария
	$('#modal_form_new_message').show();
}

function SaveData(url, token, data) {
	$.ajax({
		url: url,
		type: "POST",
		async: false,
		data:{
		  "_token": token,
		  data: data,
		},
		success:function(response) {
			console.log(response);
		},
	});
	console.log(data);
	//обновим данные по yes no на странице
	chat_like_count(data['id_chat']);
}

function chat_like_count(id_chat)
{
	//делаем запрос к БД
	$.ajax({                         
	url: dop_url+"/api/chat/like/count/"+id_chat,                       
	method: 'POST',
	async: false,
	}).done(function(data) {
		if (!!data) {
			$('#chat_'+id_chat+'_like_yes').text(data[0]);
			$('#chat_'+id_chat+'_like_no').text(data[1]);
		} else {
			$('#chat_'+id_chat+'_like_yes').text('не найдено');
			$('#chat_'+id_chat+'_like_no').text('не найдено');
		}
	});
}

function SaveDataForMessages(url, token, data) {
	$.ajax({
		url: url,
		type: "POST",
		async: false,
		data:{
		  "_token": token,
		  data: data,
		},
		success:function(response) {
			// console.log(response);
		},
	});
	// console.log(data);
	//обновим данные по yes no на странице
	message_like_count(data['id_message']);
}

function message_like_count(id_message)
{
	//делаем запрос к БД
	$.ajax({                         
	url: dop_url+"/api/message/like/count/"+id_message,                       
	method: 'POST',
	async: false,
	}).done(function(data) {
		if (!!data) {
			// console.log('#message_'+id_message+'_like_yes');
			$('#message_'+id_message+'_like_yes').text(data[0]);
			$('#message_'+id_message+'_like_no').text(data[1]);
		} else {
			$('#message_'+id_message+'_like_yes').text('не найдено');
			$('#message_'+id_message+'_like_no').text('не найдено');
		}
	});
}

