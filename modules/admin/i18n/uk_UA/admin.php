<?php defined('SYSPATH') OR die('No direct access allowed.');

$lang = array
(
	'login_text'	      =>	'Вход в административную панель',
	'waiting_text'        =>    'Подождите идет загрузка...',
	'default_login_error' =>    'Вы ввели неправильное имя пользователи или пароль',
	'not_found_title'     =>    'Ошибка прав доступа или такой модуль не существует',
	'username'            =>    'Логин',
	'password'            =>    'Пароль',
	'submit'              =>    'Войти',
	'error'               =>    'Ошибка',
	'login_user'          =>    'Добро пожаловать ',
	'exit'                =>    'Выход',
	'modules'             =>    'Модули',
	'upr'                 =>    'Управление',
	"not_found"	          =>    'Нету модуля <b>%s</b> или у вас недостаточно прав.',
	"add_row"             =>    'Добавить',
	"delet_row"           =>    'Удалить',
	"enter_data"          =>    'Введите данные',
	"nothing_to_show"	  =>    'Нету ничего к отображению',
	"view_items"	      =>    'Записи {0} - {1} из {2}',
	"filters"             =>    'Фильтры',
	"info"				  =>    'Инфо',
	"save"                =>    'Сохранить',
	"add_photo"           =>    'Добавить фото',
	"forgot" 		      =>    "Забыли пароль?",
	"stay_signed"         =>    "Оставаться в системе",
	"login_tip"           =>    "Введите Email пользователя",
	"pass_tip"            =>    "Введите пароль пользователя",
	"admin_index"         =>    "Главная",
	"admin_list"           =>   "Список администраторов",
	"slbl_list" => "Список лейблов",
	"sch_list"            =>   "График работы",
	"delete"              => "Удалить",
	"edit"   => "Редактировать",
	"good_list" => "Список товаров",
	"answ_0" => "Нет",
	"answ_1"  => "Да",
	"status_0" => "Новый",
	"status_1"  => "Передан кухне",
	"status_2" => "Выполнен",
	"status_3"  => "Отменен",
	"status_4" => "Ждем уточнения",
);
$lang["order_statuses"] = array(
	"0" => "Новый",
	"1"  => "Передан кухне",
	"2" => "Выполнен",
	"3"  => "Отменен",
	"4" => "Ждем уточнения",
);
$lang["order_statuses_color"] = array(
	"0" => "#000000",
	"1"  => "#0D00FF",
	"2" => "#00FF00",
	"3"  => "#FF0005",
	"4" => "#EBE715",
);
$lang["days"] = array(
	1 => "Понедельник",
	2 => "Вторник",
	3 => "Среда",
	4 => "Четверг",
	5 => "Пятница",
	6 => "Суббота",
	7 => "Воскресенье",
);
$lang["pay_types"] = array(
	"0" => "Наличными",
	"1"  => "Перевод на карту Приват",
	"2" => "Оплата по счету ФОП",
);
$lang["users"] = array(
	"admin_name"  => "Имя администратора",
	"admin_email" => "Email",
	"last_login"  => "Последний вход",
	"roles"       => "Роли",
	"actions"     => "Действия"
);
$lang["goods"] = array(
	"good_name"   => "Название",
	"good_price"  => "Цена(грн)",
	"good_active" => "Товар доступен?",
	"on_tomorrow" => "Только на завтра?",
	"image"       => "Картинка",
	"actions"     => "Действия"
);
$lang["pages"] = array(
	"name" => "Название страницы",
	"desc"=>"Мета описание страницы",
	"status" => "Страница опубликована?",

);
$lang["roles"] = array(
	"name" => "Название",
	"desc" => "Описание",
	"modules" => "Доступные модули",
);
$lang["orders"] = array(
	"name"        => "Имя",
	"phone"       => "Телефон",
	"order"       => "Заказ",
	"pay_type"    => "Тип оплаты",
	"total_price" => "Cтоимость c доставкой",
	"address"     => "Адресс",
	"email"       => "E-mail",
	"date" 		  => "Дата",
	"time" 		  => "Время",
	"comment"     => "Комментарий",
	"manager_com" => "Ком.Менеджера",
	"status"      => "Статус"
);
$lang["schedules"] = array(
	"name"  => "День недели",
	"hours" => "Часы работы",
);
$lang["news"] = array(
	"name" => "Заголовок новости",
	"desc"=>"Мета описание новости",
	"status" => "Новость опубликована?",
);
$lang["lables"] = array(
	"name" => "Лейбл"
);