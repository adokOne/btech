<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Date helper class.
 *
 * $Id: date.php 4316 2009-05-04 01:03:54Z kiall $
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class date_Core {

  // Возвращает дату на основе числа секунд в литературном формате месяца. Пример 1 Января
  public static function rusdate($format, $lang, $tm=FALSE){
    $tm = !$tm ? time() : $tm;
        $d = date($format, $tm);
        switch($lang){
            case '':
            case 'ru':
                $DateNamesSet = array();
                $DateNamesSet =array("January"=>"января", "February"=>"февраля", "March"=>"марта", "April"=>"апреля", "May"=>"мая", "June"=>"июня", "July"=>"июля", "August"=>"августа", "September"=>"сентября", "October"=>"октября", "November"=>"ноября", "December"=>"декабря");
                $DateNamesSet+=array("Jan"=>"Янв", "Feb"=>"Фев", "Mar"=>"Мар", "Apr"=>"Апр", "May"=>"Май", "Jun"=>"Июн", "Jul"=>"Июл", "Aug"=>"Авг", "Sep"=>"Сен", "Oct"=>"Окт", "Nov"=>"Ноя", "Dec"=>"Дек");
                $DateNamesSet+=array("Monday"=>"Понедельник", "Tuesday"=>"Вторник", "Wednesday"=>"Среда", "Thursday"=>"Четверг", "Friday"=>"Пятница", "Saturday"=>"Суббота", "Sunday"=>"Воскресенье");
                $DateNamesSet+=array("Mon"=>"Пн", "Tue"=>"вт", "Wed"=>"Ср", "Thu"=>"Чт", "Fri"=>"Пт", "Sat"=>"Сб", "Sun"=>"Вс");
                for(reset($DateNamesSet); list($k,$v)=each($DateNamesSet);) $d=str_ireplace($k,$v,$d);
                break;
            case 'uk':
                $DateNamesSet = array();
                $DateNamesSet =array("January"=>"січня", "February"=>"лютого", "March"=>"березня", "April"=>"квітня", "May"=>"травня", "June"=>"червня", "July"=>"липня", "August"=>"серпня", "September"=>"вересня", "October"=>"жовтня", "November"=>"листопада", "December"=>"грудня");
                $DateNamesSet+=array("Jan"=>"Січ", "Feb"=>"Лют", "Mar"=>"Бер", "Apr"=>"Кві", "May"=>"Тра", "Jun"=>"Чер", "Jul"=>"Лип", "Aug"=>"Сер", "Sep"=>"Вер", "Oct"=>"Жов", "Nov"=>"Лис", "Dec"=>"Гру");
                $DateNamesSet+=array("Monday"=>"Понеділок", "Tuesday"=>"Вівторок", "Wednesday"=>"Середа", "Thursday"=>"Четвер", "Friday"=>"П'ятниця", "Saturday"=>"Субота", "Sunday"=>"Неділя");
                $DateNamesSet+=array("Mon"=>"Пн", "Tue"=>"Вт", "Wed"=>"Ср", "Thu"=>"Чт", "Fri"=>"Пт", "Sat"=>"Сб", "Sun"=>"Нд");
                for(reset($DateNamesSet); list($k,$v)=each($DateNamesSet);) $d=str_ireplace($k,$v,$d);
                break;
            case 'en':
                break;
            case 'az':
                break;
            case 'pl':
              $DateNamesSet = array();
              $DateNamesSet =array("January"=>"stycznia", "February"=>"lutego", "March"=>"marca", "April"=>"kwietnia", "May"=>"maja", "June"=>"czerwca", "July"=>"lipca", "August"=>"sierpnia", "September"=>"września", "October"=>"października", "November"=>"listopada", "December"=>"grudnia");
              $DateNamesSet+=array("Jan"=>"Sty", "Feb"=>"Lut", "Mar"=>"Mar", "Apr"=>"Kwi", "May"=>"Maj", "Jun"=>"Cze", "Jul"=>"Lip", "Aug"=>"Sie", "Sep"=>"Wrz", "Oct"=>"Paź", "Nov"=>"Lis", "Dec"=>"Gru");
          $DateNamesSet+=array("Monday"=>"Poniedziełek", "Tuesday"=>"Wtorek", "Wednesday"=>"Środa", "Thursday"=>"Czwartek", "Friday"=>"Piątek", "Saturday"=>"Sobota", "Sunday"=>"Niedziela");
                $DateNamesSet+=array("Mon"=>"Pon", "Tue"=>"Wt", "Wed"=>"Śr", "Thu"=>"Czw", "Fri"=>"Pt", "Sat"=>"Sob", "Sun"=>"Niedz");
                for(reset($DateNamesSet); list($k,$v)=each($DateNamesSet);) $d=str_ireplace($k,$v,$d);
                break;
            case 'de':
                $DateNamesSet = array();
                $DateNamesSet =array("January"=>"Januar", "February"=>"februar", "March"=>"März", "April"=>"April", "May"=>"Mai", "June"=>"Juni", "July"=>"Juli", "August"=>"August", "September"=>"September", "October"=>"Oktober", "November"=>"November", "December"=>"Dezember");
                $DateNamesSet+=array("Jan"=>"Jan", "Feb"=>"Feb", "Mar"=>"Mar", "Apr"=>"Apr", "May"=>"Mai", "Jun"=>"Jun", "Jul"=>"Jul", "Aug"=>"Aug", "Sep"=>"Sep", "Oct"=>"Okt", "Nov"=>"Nov", "Dec"=>"Dez");
                $DateNamesSet+=array("Monday"=>"Montag", "Tuesday"=>"Dienstag", "Wednesday"=>"Mittwoch", "Thursday"=>"Donnerstag", "Friday"=>"Freitag", "Saturday"=>"Samstag", "Sunday"=>"Sonntag");
                $DateNamesSet+=array("Mon"=>"Mon", "Tue"=>"Die", "Wed"=>"Mit", "Thu"=>"Don", "Fri"=>"Fre", "Sat"=>"Sam", "Sun"=>"Son");
                for(reset($DateNamesSet); list($k,$v)=each($DateNamesSet);) $d=str_ireplace($k,$v,$d);
                break;
            case 'ro':
                $DateNamesSet = array();
                $DateNamesSet =array("January"=>"ianuarie", "February"=>"februarie", "March"=>"martie", "April"=>"april", "May"=>"mai", "June"=>"iunie", "July"=>"iulie", "August"=>"august", "September"=>"septembrie", "October"=>"octombrie", "November"=>"noiembrie", "December"=>"decembrie");
                $DateNamesSet+=array("Jan"=>"Ian", "Feb"=>"Feb", "Mar"=>"Mar", "Apr"=>"Apr", "May"=>"Mai", "Jun"=>"Iun", "Jul"=>"Iul", "Aug"=>"Aug", "Sep"=>"Sep", "Oct"=>"Oct", "Nov"=>"Noi", "Dec"=>"Dec");
                $DateNamesSet+=array("Monday"=>"Luni", "Tuesday"=>"Marți", "Wednesday"=>"Miercuri", "Thursday"=>"Joi", "Friday"=>"Vineri", "Saturday"=>"Sâmbăta", "Sunday"=>"Duminica");
                $DateNamesSet+=array("Mon"=>"l", "Tue"=>"mț", "Wed"=>"mc", "Thu"=>"j", "Fri"=>"v", "Sat"=>"s", "Sun"=>"d");
                for(reset($DateNamesSet); list($k,$v)=each($DateNamesSet);) $d=str_ireplace($k,$v,$d);
                break;
            default:
                return;
        }

    return $d;
  }

	/**
	 * Converts a UNIX timestamp to DOS format.
	 *
	 * @param   integer  UNIX timestamp
	 * @return  integer
	 */
	public static function unix2dos($timestamp = FALSE)
	{
		$timestamp = ($timestamp === FALSE) ? getdate() : getdate($timestamp);

		if ($timestamp['year'] < 1980)
		{
			return (1 << 21 | 1 << 16);
		}

		$timestamp['year'] -= 1980;

		// What voodoo is this? I have no idea... Geert can explain it though,
		// and that's good enough for me.
		return ($timestamp['year']    << 25 | $timestamp['mon']     << 21 |
		        $timestamp['mday']    << 16 | $timestamp['hours']   << 11 |
		        $timestamp['minutes'] << 5  | $timestamp['seconds'] >> 1);
	}

	/**
	 * Converts a DOS timestamp to UNIX format.
	 *
	 * @param   integer  DOS timestamp
	 * @return  integer
	 */
	public static function dos2unix($timestamp = FALSE)
	{
		$sec  = 2 * ($timestamp & 0x1f);
		$min  = ($timestamp >>  5) & 0x3f;
		$hrs  = ($timestamp >> 11) & 0x1f;
		$day  = ($timestamp >> 16) & 0x1f;
		$mon  = ($timestamp >> 21) & 0x0f;
		$year = ($timestamp >> 25) & 0x7f;

		return mktime($hrs, $min, $sec, $mon, $day, $year + 1980);
	}

	/**
	 * Returns the offset (in seconds) between two time zones.
	 * @see     http://php.net/timezones
	 *
	 * @param   string          timezone that to find the offset of
	 * @param   string|boolean  timezone used as the baseline
	 * @return  integer
	 */
	public static function offset($remote, $local = TRUE)
	{
		static $offsets;

		// Default values
		$remote = (string) $remote;
		$local  = ($local === TRUE) ? date_default_timezone_get() : (string) $local;

		// Cache key name
		$cache = $remote.$local;

		if (empty($offsets[$cache]))
		{
			// Create timezone objects
			$remote = new DateTimeZone($remote);
			$local  = new DateTimeZone($local);

			// Create date objects from timezones
			$time_there = new DateTime('now', $remote);
			$time_here  = new DateTime('now', $local);

			// Find the offset
			$offsets[$cache] = $remote->getOffset($time_there) - $local->getOffset($time_here);
		}

		return $offsets[$cache];
	}

	/**
	 * Number of seconds in a minute, incrementing by a step.
	 *
	 * @param   integer  amount to increment each step by, 1 to 30
	 * @param   integer  start value
	 * @param   integer  end value
	 * @return  array    A mirrored (foo => foo) array from 1-60.
	 */
	public static function seconds($step = 1, $start = 0, $end = 60)
	{
		// Always integer
		$step = (int) $step;

		$seconds = array();

		for ($i = $start; $i < $end; $i += $step)
		{
			$seconds[$i] = ($i < 10) ? '0'.$i : $i;
		}

		return $seconds;
	}

	/**
	 * Number of minutes in an hour, incrementing by a step.
	 *
	 * @param   integer  amount to increment each step by, 1 to 30
	 * @return  array    A mirrored (foo => foo) array from 1-60.
	 */
	public static function minutes($step = 5)
	{
		// Because there are the same number of minutes as seconds in this set,
		// we choose to re-use seconds(), rather than creating an entirely new
		// function. Shhhh, it's cheating! ;) There are several more of these
		// in the following methods.
		return date::seconds($step);
	}

	/**
	 * Number of hours in a day.
	 *
	 * @param   integer  amount to increment each step by
	 * @param   boolean  use 24-hour time
	 * @param   integer  the hour to start at
	 * @return  array    A mirrored (foo => foo) array from start-12 or start-23.
	 */
	public static function hours($step = 1, $long = FALSE, $start = NULL)
	{
		// Default values
		$step = (int) $step;
		$long = (bool) $long;
		$hours = array();

		// Set the default start if none was specified.
		if ($start === NULL)
		{
			$start = ($long === FALSE) ? 1 : 0;
		}

		$hours = array();

		// 24-hour time has 24 hours, instead of 12
		$size = ($long === TRUE) ? 23 : 12;

		for ($i = $start; $i <= $size; $i += $step)
		{
			$hours[$i] = $i;
		}

		return $hours;
	}

	/**
	 * Returns AM or PM, based on a given hour.
	 *
	 * @param   integer  number of the hour
	 * @return  string
	 */
	public static function ampm($hour)
	{
		// Always integer
		$hour = (int) $hour;

		return ($hour > 11) ? 'PM' : 'AM';
	}

	/**
	 * Adjusts a non-24-hour number into a 24-hour number.
	 *
	 * @param   integer  hour to adjust
	 * @param   string   AM or PM
	 * @return  string
	 */
	public static function adjust($hour, $ampm)
	{
		$hour = (int) $hour;
		$ampm = strtolower($ampm);

		switch ($ampm)
		{
			case 'am':
				if ($hour == 12)
					$hour = 0;
			break;
			case 'pm':
				if ($hour < 12)
					$hour += 12;
			break;
		}

		return sprintf('%02s', $hour);
	}

	/**
	 * Number of days in month.
	 *
	 * @param   integer  number of month
	 * @param   integer  number of year to check month, defaults to the current year
	 * @return  array    A mirrored (foo => foo) array of the days.
	 */
	public static function days($month, $year = FALSE)
	{
		static $months;

		// Always integers
		$month = (int) $month;
		$year  = (int) $year;

		// Use the current year by default
		$year  = ($year == FALSE) ? date('Y') : $year;

		// We use caching for months, because time functions are used
		if (empty($months[$year][$month]))
		{
			$months[$year][$month] = array();

			// Use date to find the number of days in the given month
			$total = date('t', mktime(1, 0, 0, $month, 1, $year)) + 1;

			for ($i = 1; $i < $total; $i++)
			{
				$months[$year][$month][$i] = $i;
			}
		}

		return $months[$year][$month];
	}

	/**
	 * Number of months in a year
	 *
	 * @return  array  A mirrored (foo => foo) array from 1-12.
	 */
	public static function months()
	{
		return date::hours();
	}

	/**
	 * Returns an array of years between a starting and ending year.
	 * Uses the current year +/- 5 as the max/min.
	 *
	 * @param   integer  starting year
	 * @param   integer  ending year
	 * @return  array
	 */
	public static function years($start = FALSE, $end = FALSE)
	{
		// Default values
		$start = ($start === FALSE) ? date('Y') - 5 : (int) $start;
		$end   = ($end   === FALSE) ? date('Y') + 5 : (int) $end;

		$years = array();

		// Add one, so that "less than" works
		$end += 1;

		for ($i = $start; $i < $end; $i++)
		{
			$years[$i] = $i;
		}

		return $years;
	}

	/**
	 * Returns time difference between two timestamps, in human readable format.
	 *
	 * @param   integer       timestamp
	 * @param   integer       timestamp, defaults to the current time
	 * @param   string        formatting string
	 * @return  string|array
	 */
	public static function timespan($time1, $time2 = NULL, $output = 'years,months,weeks,days,hours,minutes,seconds')
	{
		// Array with the output formats
		$output = preg_split('/[^a-z]+/', strtolower((string) $output));

		// Invalid output
		if (empty($output))
			return FALSE;

		// Make the output values into keys
		extract(array_flip($output), EXTR_SKIP);

		// Default values
		$time1  = max(0, (int) $time1);
		$time2  = empty($time2) ? time() : max(0, (int) $time2);

		// Calculate timespan (seconds)
		$timespan = abs($time1 - $time2);

		// All values found using Google Calculator.
		// Years and months do not match the formula exactly, due to leap years.

		// Years ago, 60 * 60 * 24 * 365
		isset($years) and $timespan -= 31556926 * ($years = (int) floor($timespan / 31556926));

		// Months ago, 60 * 60 * 24 * 30
		isset($months) and $timespan -= 2629744 * ($months = (int) floor($timespan / 2629743.83));

		// Weeks ago, 60 * 60 * 24 * 7
		isset($weeks) and $timespan -= 604800 * ($weeks = (int) floor($timespan / 604800));

		// Days ago, 60 * 60 * 24
		isset($days) and $timespan -= 86400 * ($days = (int) floor($timespan / 86400));

		// Hours ago, 60 * 60
		isset($hours) and $timespan -= 3600 * ($hours = (int) floor($timespan / 3600));

		// Minutes ago, 60
		isset($minutes) and $timespan -= 60 * ($minutes = (int) floor($timespan / 60));

		// Seconds ago, 1
		isset($seconds) and $seconds = $timespan;

		// Remove the variables that cannot be accessed
		unset($timespan, $time1, $time2);

		// Deny access to these variables
		$deny = array_flip(array('deny', 'key', 'difference', 'output'));

		// Return the difference
		$difference = array();
		foreach ($output as $key)
		{
			if (isset($$key) AND ! isset($deny[$key]))
			{
				// Add requested key to the output
				$difference[$key] = $$key;
			}
		}

		// Invalid output formats string
		if (empty($difference))
			return FALSE;

		// If only one output format was asked, don't put it in an array
		if (count($difference) === 1)
			return current($difference);

		// Return array
		return $difference;
	}

	/**
	 * Returns time difference between two timestamps, in the format:
	 * N year, N months, N weeks, N days, N hours, N minutes, and N seconds ago
	 *
	 * @param   integer       timestamp
	 * @param   integer       timestamp, defaults to the current time
	 * @param   string        formatting string
	 * @return  string
	 */
	public static function timespan_string($time1, $time2 = NULL, $output = 'years,months,weeks,days,hours,minutes,seconds')
	{
		if ($difference = date::timespan($time1, $time2, $output) AND is_array($difference))
		{
			// Determine the key of the last item in the array
			$last = end($difference);
			$last = key($difference);

			$span = array();
			foreach ($difference as $name => $amount)
			{
				if ($amount === 0)
				{
					// Skip empty amounts
					continue;
				}

				// Add the amount to the span
				$span[] = ($name === $last ? ' and ' : ', ').$amount.' '.($amount === 1 ? inflector::singular($name) : $name);
			}

			// If the difference is less than 60 seconds, remove the preceding and.
			if (count($span) === 1)
			{
				$span[0] = ltrim($span[0], 'and ');
			}

			// Replace difference by making the span into a string
			$difference = trim(implode('', $span), ',');
		}
		elseif (is_int($difference))
		{
			// Single-value return
			$difference = $difference.' '.($difference === 1 ? inflector::singular($output) : $output);
		}

		return $difference;
	}

} // End date