<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Contains examples of various Kohana library examples. You can access these
 * samples in your own installation of Kohana by going to ROOT_URL/examples.
 * This controller should NOT be used in production. It is for demonstration
 * purposes only!
 *
 * $Id: examples.php 4298 2009-04-30 17:06:05Z kiall $
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Examples_Controller extends Controller {

	// Do not allow to run in production
	const ALLOW_PRODUCTION = FALSE;
	public function import(){
		set_time_limit(20000);
		$this->old_db = new Database ( array(	'benchmark'     => TRUE,
											'persistent'    => FALSE,
											'connection'    => array
											(
												'type'     => 'mysql',
												'user'     => 'root',
												'pass'     => 'adok',
												'host'     => 'localhost',
											
												'port'     => FALSE,
												'socket'   => FALSE,
												'database' => 'bkt'
											),
											'character_set' => 'utf8',
											'table_prefix'  => '',
											'object'        => TRUE,
											'cache'         => FALSE,
											'escape'        => TRUE) );

		$courses = $this->old_db->from("courses")->where("parent_id",null)->get();
		foreach($courses as $course){
			$this->_create_courses($course,0);
			
		}
		// $organizations = $this->old_db->from("organizations")->get();
		// foreach($organizations as $item){
		// 	$new_item = new Organization_Model();
		// 	$new_item->name = $item->name;
		// 	$new_item->save();
		// 	$cupons = $this->old_db->from("cupons")->where("organization_id", $item->id)->get();
		// 	foreach($cupons as $cupon){
		// 		$new_cupon = new Cupon_Model();
		// 		$new_cupon->number = $cupon->number;
		// 		$new_cupon->discount = $cupon->discount;
		// 		$new_cupon->organization_id = $new_item->id;
		// 		$new_cupon->uses =  $cupon->use_count;
		// 		$new_cupon->save();
		// 	}
		// }
		// $feedbacks = $this->old_db->from("feedbacks")->get();
		// foreach($feedbacks as $feedback){
		// 	$new_item = new Feedback_Model();
		// 	$new_item->date = $feedback->date;
		// 	$new_item->text = $feedback->text;
		// 	$new_item->email = $feedback->email;
		// 	$new_item->name = $feedback->name;
		// 	$new_item->save();
		// 	$childs = $this->old_db->from("feedbacks")->where("parent_id", $feedback->id)->get();
		// 	foreach($childs as $ch){
		// 		$n_item = new Feedback_Model();
		// 		$n_item->date = $ch->date;
		// 		$n_item->text = $ch->text;
		// 		$n_item->name = $ch->name;
		// 		$n_item->email = $ch->email;
		// 		$n_item->parent_id = $new_item->id;
		// 		$n_item->save();
		// 	}
		// }
		// $news = $this->old_db->from("news")->where("type", "news")->get();
		// foreach($news as $new){
		// 	$new_lang = $this->old_db->from("news_langs")->where(array("news_id"=>$new->id,"id_lang"=>1))->get()->current();
		// 	$item = new News_Model();
		// 	$item->created_at = $new->created_date;
		// 	$item->show_on_main = $new->show_on_main;
		// 	$item->active = $new->active;
		// 	$item->views_count = $new_lang->views_count;

		// 	$item->name_ua = $new_lang->title;
		// 	$item->text_ua = $new_lang->text;
		// 	$item->anons_ua = $new_lang->anons;
		// 	$item->keyw_ua = $new_lang->meta_keywords;
		// 	$item->desc_ua = $new_lang->meta_desc;
		// 	$item->seo     = $new_lang->seo_name;
		// 	$item->save();

		// }

		// $news = $this->old_db->from("news")->where("type", "sale")->get();
		// foreach($news as $new){
		// 	$new_lang = $this->old_db->from("news_langs")->where(array("news_id"=>$new->id,"id_lang"=>1))->get()->current();
		// 	$item = new Sale_Model();
		// 	$item->created_at = $new->created_date;
		// 	$item->show_on_main = $new->show_on_main;
		// 	$item->active = $new->active;
		// 	$item->views_count = $new_lang->views_count;

		// 	$item->name_ua = $new_lang->title;
		// 	$item->text_ua = $new_lang->text;
		// 	$item->anons_ua = $new_lang->anons;
		// 	$item->keyw_ua = $new_lang->meta_keywords;
		// 	$item->desc_ua = $new_lang->meta_desc;
		// 	$item->seo     = $new_lang->seo_name;
		// 	$item->save();

		// }

	}

	private function _create_courses($course,$parent){
		$new_course = new Course_Model();
		$new_course->seo = $course->seo_name;
		$new_course->price = $course->individual_price;
		$new_course->sale_price = $course->sale_price;
		$new_course->lessons_count = $course->l_count;
		$new_course->parent_id = $parent;

		$lang_course = $this->old_db->from("courses_langs")->where(array("course_id"=>$course->id,"id_lang"=>0))->get()->current();
		$new_course->name_ru = $lang_course->name;
		$lang_course = $this->old_db->from("courses_langs")->where(array("course_id"=>$course->id,"id_lang"=>1))->get()->current();
		$new_course->name_ua = $lang_course->name;

		$lang_course_dd = $this->old_db->from("pages")->where(array("course_id"=>$course->id))->get()->current();

		if($lang_course_dd){
				$lang_course = $this->old_db->from("pages_langs")->where(array("page_id"=>$lang_course_dd->id,"id_lang"=>0))->get()->current();
			if($lang_course ){
				$new_course->desc_ru = $lang_course->text;
				$new_course->meta_keys_ru = $lang_course->text;
				$new_course->meta_desc_ru = $lang_course->text;
				$new_course->meta_title_ru = $lang_course->text;
			}

				$lang_course = $this->old_db->from("pages_langs")->where(array("page_id"=>$lang_course_dd->id,"id_lang"=>1))->get()->current();
			if($lang_course){
				$new_course->desc_ua = $lang_course->text;
				$new_course->meta_keys_ua = $lang_course->text;
				$new_course->meta_desc_ua = $lang_course->text;
				$new_course->meta_title_ua = $lang_course->text;
			}
		}



		$lang_course = $this->old_db->from("preparations")->where(array("course_id"=>$course->id))->get()->current();
		if($lang_course){
			$new_course->preparation_ru = $lang_course->text_ru;
			$new_course->preparation_ua = $lang_course->text_ua;
		}


		$new_course->save();

		$course_price = $this->old_db->from("prices")->where(array("course_id"=>$course->id))->get()->current();
		if($course_price){
			$new_price = new Group_Price_Model();
			$new_price->course_id = $new_course->id;
			$new_price->price_2 = $course_price->price_1;
			$new_price->price_4 = $course_price->price_2;
			$new_price->price_6 = $course_price->price_3;
			$new_price->price_8 = $course_price->price_4;
			$new_price->save();	
		}


		$course_themes = $this->old_db->from("plans")->where(array("course_id"=>$course->id))->get();
		$position_in_group = 0;
		foreach($course_themes as $theme){
			$new_plan = new Theme_Model();
			$new_plan->parent_id = 0;
			$new_plan->course_id = $new_course->id;
			$new_plan->name_ru = $theme->name_ru;
			$new_plan->name_ua = $theme->name_ua;
			$new_plan->position_in_group = $position_in_group;
			$new_plan->save();
			$position_in_group++;
			$position_in_group_2 = 0;
			$course_themes_ch = $this->old_db->from("plan_themes")->where(array("plan_id"=>$theme->id))->get();
			foreach($course_themes_ch as $th){

				$new_p = new Theme_Model();
				$new_p->parent_id = $new_plan->id;
				$new_p->course_id = $new_course->id;
				$new_p->name_ru = $th->name_ru;
				$new_p->name_ua = $th->name_ua;
				$new_p->position_in_group = $position_in_group;
				$new_p->save();
				$position_in_group_2++;
			}


		}
		$course_groups = $this->old_db->from("groups")->where(array("course_id"=>$course->id))->get();
		$number = 0;
		$new_course->has_group = (int)(count($course_groups) > 0);
		$new_course->save();
		if(file_exists(DOCROOT."logos/".$course->id."/pic_93.jpg"))
			copy(DOCROOT."logos/".$course->id."/pic_93.jpg", DOCROOT."upload/courses/".$new_course->id.".png");
		foreach ($course_groups as $group) {
			$new_group = new Group_Model();
			$new_group->course_id = $new_course->id;
			$new_group->people_count = $group->people_count;
			$new_group->lessons_count = $group->lessons_count;
			$new_group->time_from = $group->time_from;
			$new_group->time_to = $group->time_to;
			$new_group->start_date = $group->start_date;
			$new_group->price = $group->price;
			$new_group->days = $group->days;
			$new_group->number = $number;
			$new_group->save();
			$number++;
		}
		$curses_childs = $this->old_db->from("courses")->where("parent_id",$course->id)->get();
		foreach($curses_childs as $child){
			$this->_create_courses($child,$new_course->id);
		}



		// 
		// 
	}
	/**
	 * Displays a list of available examples
	 */
	function index()
	{
		// Get the methods that are only in this class and not the parent class.
		$examples = array_diff
		(
			get_class_methods(__CLASS__),
			get_class_methods(get_parent_class($this))
		);

		sort($examples);

		echo "<strong>Examples:</strong>\n";
		echo "<ul>\n";

		foreach ($examples as $method)
		{
			if ($method == __FUNCTION__)
				continue;

			echo '<li>'.html::anchor('examples/'.$method, $method)."</li>\n";
		}

		echo "</ul>\n";
		echo '<p>'.Kohana::lang('core.stats_footer')."</p>\n";
	}

	/**
	 * Demonstrates how to archive a directory. First enable the archive module
	 */
	//public function archive($build = FALSE)
	//{
	//	if ($build === 'build')
	//	{
	//		// Load archive
	//		$archive = new Archive('zip');

	//		// Download the application/views directory
	//		$archive->add(APPPATH.'views/', 'app_views/', TRUE);

	//		// Download the built archive
	//		$archive->download('test.zip');
	//	}
	//	else
	//	{
	//		echo html::anchor(Router::$current_uri.'/build', 'Download views');
	//	}
	//}

	/**
	 * Demonstrates how to parse RSS feeds by using DOMDocument.
	 */
	function rss()
	{
		// Parse an external atom feed
		$feed = feed::parse('http://dev.kohanaphp.com/projects/kohana2/activity.atom');

		// Show debug info
		echo Kohana::debug($feed);

		echo Kohana::lang('core.stats_footer');
	}

	/**
	 * Demonstrates the Session library and using session data.
	 */
	function session()
	{
		// Gets the singleton instance of the Session library
		$s = Session::instance();

		echo 'SESSID: <pre>'.session_id()."</pre>\n";

		echo '<pre>'.print_r($_SESSION, TRUE)."</pre>\n";

		echo '<br/>{execution_time} seconds';
	}

	/**
	 * Demonstrates how to use the form helper with the Validation libraryfor file uploads .
	 */
	function form()
	{
		// Anything submitted?
		if ($_POST)
		{
			// Merge the globals into our validation object.
			$post = Validation::factory(array_merge($_POST, $_FILES));

			// Ensure upload helper is correctly configured, config/upload.php contains default entries.
			// Uploads can be required or optional, but should be valid
			$post->add_rules('imageup1', 'upload::required', 'upload::valid', 'upload::type[gif,jpg,png]', 'upload::size[1M]');
			$post->add_rules('imageup2', 'upload::required', 'upload::valid', 'upload::type[gif,jpg,png]', 'upload::size[1M]');

			// Alternative syntax for multiple file upload validation rules
			//$post->add_rules('imageup.*', 'upload::required', 'upload::valid', 'upload::type[gif,jpg,png]', 'upload::size[1M]');

			if ($post->validate() )
			{
				// It worked!
				// Move (and rename) the files from php upload folder to configured application folder
				upload::save('imageup1');
				upload::save('imageup2');
				echo 'Validation successfull, check your upload folder!';
			}
			else
			{
				// You got validation errors
				echo '<p>validation errors: '.var_export($post->errors(), TRUE).'</p>';
				echo Kohana::debug($post);
			}
		}

		// Display the form
		echo form::open('examples/form', array('enctype' => 'multipart/form-data'));
		echo form::label('imageup', 'Image Uploads').':<br/>';
		// Use discrete upload fields
		// Alternative syntax for multiple file uploads
		// echo form::upload('imageup[]').'<br/>';

		echo form::upload('imageup1').'<br/>';
		echo form::upload('imageup2').'<br/>';
		echo form::submit('upload', 'Upload!');
		echo form::close();

	}

	/**
	 * Demontrates how to use the Validation library to validate an arbitrary array.
	 */
	function validation()
	{
		// To demonstrate Validation being able to validate any array, I will
		// be using a pre-built array. When you load validation with no arguments
		// it will default to validating the POST array.
		$data = array
		(
			'user' => 'hello',
			'pass' => 'bigsecret',
			'reme' => '1'
		);

		$validation = new Validation($data);

		$validation->add_rules('user', 'required', 'length[1,12]')->pre_filter('trim', 'user');
		$validation->add_rules('pass', 'required')->post_filter('sha1', 'pass');
		$validation->add_rules('reme', 'required');

		$result = $validation->validate();

		var_dump($validation->errors());
		var_dump($validation->as_array());

		// Yay!
		echo '{execution_time} ALL DONE!';
	}

	/**
	 * Demontrates how to use the Captcha library.
	 */
	public function captcha()
	{
		// Look at the counters for valid and invalid
		// responses in the Session Profiler.
		new Profiler;

		// Load Captcha library, you can supply the name
		// of the config group you would like to use.
		$captcha = new Captcha;

		// Ban bots (that accept session cookies) after 50 invalid responses.
		// Be careful not to ban real people though! Set the threshold high enough.
		if ($captcha->invalid_count() > 49)
			exit('Bye! Stupid bot.');

		// Form submitted
		if ($_POST)
		{
			// Captcha::valid() is a static method that can be used as a Validation rule also.
			if (Captcha::valid($this->input->post('captcha_response')))
			{
				echo '<p style="color:green">Good answer!</p>';
			}
			else
			{
				echo '<p style="color:red">Wrong answer!</p>';
			}

			// Validate other fields here
		}

		// Show form
		echo form::open();
		echo '<p>Other form fields here...</p>';

		// Don't show Captcha anymore after the user has given enough valid
		// responses. The "enough" count is set in the captcha config.
		if ( ! $captcha->promoted())
		{
			echo '<p>';
			echo $captcha->render(); // Shows the Captcha challenge (image/riddle/etc)
			echo '</p>';
			echo form::input('captcha_response');
		}
		else
		{
			echo '<p>You have been promoted to human.</p>';
		}

		// Close form
		echo form::submit(array('value' => 'Check'));
		echo form::close();
	}

	/**
	 * Demonstrates the features of the Database library.
	 *
	 * Table Structure:
	 *  CREATE TABLE `pages` (
	 *  `id` mediumint( 9 ) NOT NULL AUTO_INCREMENT ,
	 *  `page_name` varchar( 100 ) NOT NULL ,
	 *  `title` varchar( 255 ) NOT NULL ,
	 *  `content` longtext NOT NULL ,
	 *  `menu` tinyint( 1 ) NOT NULL default '0',
	 *  `filename` varchar( 255 ) NOT NULL ,
	 *  `order` mediumint( 9 ) NOT NULL ,
	 *  `date` int( 11 ) NOT NULL ,
	 *  `child_of` mediumint( 9 ) NOT NULL default '0',
	 *  PRIMARY KEY ( `id` ) ,
	 *  UNIQUE KEY `filename` ( `filename` )
	 *  ) ENGINE = MYISAM DEFAULT CHARSET = utf8 PACK_KEYS =0;
	 *
	*/
	function database()
	{
		$db = new Database;

		$table = 'pages';
		echo 'Does the '.$table.' table exist? ';
		if ($db->table_exists($table))
		{
			echo '<p>YES! Lets do some work =)</p>';

			$query = $db->select('DISTINCT pages.*')->from($table)->get();
			echo $db->last_query();
			echo '<h3>Iterate through the result:</h3>';
			foreach ($query as $item)
			{
				echo '<p>'.$item->title.'</p>';
			}
			echo '<h3>Numrows using count(): '.count($query).'</h3>';
			echo 'Table Listing:<pre>'.print_r($db->list_tables(), TRUE).'</pre>';

			echo '<h3>Try Query Binding with objects:</h3>';
			$sql = 'SELECT * FROM '.$table.' WHERE id = ?';
			$query = $db->query($sql, array(1));
			echo '<p>'.$db->last_query().'</p>';
			$query->result(TRUE);
			foreach ($query as $item)
			{
				echo '<pre>'.print_r($item, true).'</pre>';
			}

			echo '<h3>Try Query Binding with arrays (returns both associative and numeric because I pass MYSQL_BOTH to result():</h3>';
			$sql = 'SELECT * FROM '.$table.' WHERE id = ?';
			$query = $db->query($sql, array(1));
			echo '<p>'.$db->last_query().'</p>';
			$query->result(FALSE, MYSQL_BOTH);
			foreach ($query as $item)
			{
				echo '<pre>'.print_r($item, true).'</pre>';
			}

			echo '<h3>Look, we can also manually advance the result pointer!</h3>';
			$query = $db->select('title')->from($table)->get();
			echo 'First:<pre>'.print_r($query->current(), true).'</pre><br />';
			$query->next();
			echo 'Second:<pre>'.print_r($query->current(), true).'</pre><br />';
			$query->next();
			echo 'Third:<pre>'.print_r($query->current(), true).'</pre>';
			echo '<h3>And we can reset it to the beginning:</h3>';
			$query->rewind();
			echo 'Rewound:<pre>'.print_r($query->current(), true).'</pre>';

			echo '<p>Number of rows using count_records(): '.$db->count_records('pages').'</p>';
		}
		else
		{
			echo 'NO! The '.$table.' table doesn\'t exist, so we can\'t continue =( ';
		}
		echo "<br/><br/>\n";
		echo 'done in {execution_time} seconds';
	}

	/**
	 * Demonstrates how to use the Pagination library and Pagination styles.
	 */
	function pagination()
	{
		$pagination = new Pagination(array(
			// Base_url will default to the current URI
			// 'base_url'    => 'welcome/pagination_example/page/x',

			// The URI segment (integer) in which the pagination number can be found
			// The URI segment (string) that precedes the pagination number (aka "label")
			'uri_segment'    => 'page',

			// You could also use the query string for pagination instead of the URI segments
			// Just set this to the $_GET key that contains the page number
			// 'query_string'   => 'page',

			// The total items to paginate through (probably need to use a database COUNT query here)
			'total_items'    => 254,

			// The amount of items you want to display per page
			'items_per_page' => 10,

			// The pagination style: classic (default), digg, extended or punbb
			// Easily add your own styles to views/pagination and point to the view name here
			'style'          => 'classic',

			// If there is only one page, completely hide all pagination elements
			// Pagination->render() will return an empty string
			'auto_hide'      => TRUE,
		));

		// Just echo to display the links (__toString() rocks!)
		echo 'Classic style: '.$pagination;

		// You can also use the render() method and pick a style on the fly if you want
		echo '<hr /> Digg style:     ', $pagination->render('digg');
		echo '<hr /> Extended style: ', $pagination->render('extended');
		echo '<hr /> PunBB style:    ', $pagination->render('punbb');
		echo 'done in {execution_time} seconds';
	}

	/**
	 * Demonstrates the User_Agent library.
	 */
	function user_agent()
	{
		foreach (array('agent', 'browser', 'version') as $key)
		{
			echo $key.': '.Kohana::user_agent($key).'<br/>'."\n";
		}

		echo "<br/><br/>\n";
		echo 'done in {execution_time} seconds';
	}

	/**
	 * Demonstrates the Payment library.
	 */
	/*function payment()
	{
		$credit_card = new Payment;

		// You can also pass the driver name to the library to use multiple ones:
		$credit_card = new Payment('Paypal');
		$credit_card = new Payment('Authorize');

		// You can specify one parameter at a time:
		$credit_card->login = 'this';
		$credit_card->first_name = 'Jeremy';
		$credit_card->last_name = 'Bush';
		$credit_card->card_num = '1234567890';
		$credit_card->exp_date = '0910';
		$credit_card->amount = '478.41';

		// Or you can also set fields with an array and the <Payment.set_fields> method:
		$credit_card->set_fields(array('login' => 'test',
		                               'first_name' => 'Jeremy',
		                               'last_name' => 'Bush',
		                               'card_num' => '1234567890',
		                               'exp_date' => '0910',
		                               'amount' => '487.41'));

		echo '<pre>'.print_r($credit_card, true).'</pre>';

		echo 'Success? ';
		echo ($response = $credit_card->process() == TRUE) ? 'YES!' : $response;
	}*/

	function calendar()
	{
		$profiler = new Profiler;

		$calendar = new Calendar($this->input->get('month', date('m')), $this->input->get('year', date('Y')));
		$calendar->attach($calendar->event()
				->condition('year', 2008)
				->condition('month', 8)
				->condition('day', 8)
				->output(html::anchor('http://forum.kohanaphp.com/comments.php?DiscussionID=275', 'Learning about Kohana Calendar')));

		echo $calendar->render();
	}

	/**
	 * Demonstrates how to use the Image libarary..
	 */
	function image()
	{
		// For testing only, save the new image in DOCROOT
		$dir = realpath(DOCROOT);

		// Original Image filename
		$image = DOCROOT.'kohana.png';

		// Create an instance of Image, with file
		// The orginal image is not affected
		$image = new Image($image);

		// Most methods are chainable
		// Resize the image, crop the center left
		$image->resize(200, 100)->crop(150, 50, 'center', 'left');

		// Display image in browser.
		// Keep the actions, to be applied when saving the image.
		$image->render($keep_actions = TRUE);

		// Save the image, as a jpeg
		// Here the actions will be discarded, by default.
		$image->save($dir.'/mypic_thumb.jpg');

		//echo Kohana::debug($image);
	}

	/**
	 * Demonstrates how to use vendor software with Kohana.
	 */
	function vendor()
	{
		// Let's do a little Markdown shall we.
		$br = "\n\n";
		$output = '#Marked Down!#'.$br;
		$output .= 'This **_markup_** is created *on-the-fly*, by ';
		$output .= '[php-markdown-extra](http://michelf.com/projects/php-markdown/extra)'.$br;
		$output .= 'It\'s *great* for user <input> & writing about `<HTML>`'.$br;
		$output .= 'It\'s also good at footnotes :-) [^1]'.$br;
		$output .= '[^1]: A footnote.';

		// looks in system/vendor for Markdown.php
		require Kohana::find_file('vendor', 'Markdown');

		echo Markdown($output);

		echo 'done in {execution_time} seconds';
	}
} // End Examples
