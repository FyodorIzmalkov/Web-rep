#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	function ft_exit()
	{
		echo "Wrong Format\n";
		exit();
	}

	date_default_timezone_set('Europe/Paris');
	// check for month and get month length
	function ft_check_months($month, $year)
	{
		$leap_year = false;
		if ($year % 4 === 0)
			$leap_year = true;
		if ($year % 100 === 0)
			$leap_year = false;
		if ($year % 400 === 0)
			$leap_year = true;
		$number_of_days = array(0, 0);
		if (preg_match_all("/^[Jj]anvier$/", $month) === 1)
		{
			$number_of_days[0] = 31;
			$number_of_days[1] = 1;
		}
		if (preg_match_all("/^[Ff]évrier$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[1] = 2;
			if ($leap_year === true)
				$number_of_days[0] = 29;
			else
				$number_of_days[0] = 28;
		}
		if (preg_match_all("/^[Mm]ars$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 31;
			$number_of_days[1] = 3;
		}
		if (preg_match_all("/^[Aa]vril$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 30;
			$number_of_days[1] = 4;
		}
		if (preg_match_all("/^[Mm]ai$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 31;
			$number_of_days[1] = 5;
		}
		if (preg_match_all("/^[Jj]uin$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 30;
			$number_of_days[1] = 6;
		}
		if (preg_match_all("/^[Jj]uillet$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 31;
			$number_of_days[1] = 7;
		}
		if (preg_match_all("/^[Aa]out$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 31;
			$number_of_days[1] = 8;
		}
		if (preg_match_all("/^[Ss]eptembre$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 30;
			$number_of_days[1] = 9;
		}
		if (preg_match_all("/^[Oo]ctobre$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 31;
			$number_of_days[1] = 10;
		}
		if (preg_match_all("/^[Nn]ovembre$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 30;
			$number_of_days[1] = 11;
		}
		if (preg_match_all("/^[Dd]écembre$/", $month) === 1)
		{
			if ($number_of_days[0] !== 0)
				ft_exit();
			$number_of_days[0] = 31;
			$number_of_days[1] = 12;
		}
		if ($number_of_days[0] === 0)
			ft_exit();
		return $number_of_days;
	}

	// check for day name
	function ft_check_days($day)
	{
		if ((preg_match_all("/^[Ll]undi$|^[Mm]ardi$|^[Mm]ercredi$|^[Jj]eudi$|^[Vv]endredi$|^[Ss]amedi$|^[Dd]imanche$/", $day)) === 0)
			ft_exit();
	}

	function ft_check_day_number($day_number, $number_of_days)
	{
		if (preg_match_all("/^[0-9]+$/", $day_number) !== 1)
			ft_exit();
		if ($day_number === 0 || $day_number === "00")
			ft_exit();
		if ($day_number < 0 || $day_number > $number_of_days)
			ft_exit();
	}

	function ft_check_year($year)
	{
		if (preg_match_all("/^[0-9][0-9][0-9][0-9]$/", $year) !== 1)
			ft_exit();
	}

	function ft_check_time($time)
	{
		if ((preg_match_all("/^[0-2][0-9]$/", $time[0]) !== 1) || $time[0] > 23)
			ft_exit();
		if ((preg_match_all("/^[0-6][0-9]$/", $time[1]) !== 1) || $time[1] > 59)
			ft_exit();
		if ((preg_match_all("/^[0-6][0-9]$/", $time[2]) !== 1) || $time[2] > 59)
			ft_exit();
	}

	function ft_count_leaps($st , $y)
	{
		$i = 0;
		while ($st < $y)
		{
			if (($st % 4 == 0 && $st % 100 != 0) || $st % 400 == 0)
				$i++;
			$st++;
		}
		return $i;
	}

	// function ft_get_seconds_this_year($time, $month, $day, $year)
	// {
	// 	$result = ($day * 24 * 60 * 60) + ($time[0] * 60 * 60) + ($time[1] * 60) + $time[2];
	// 	$is_leap = false;
	// 		if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0)
	// 				$is_leap = true;
	// 		if ($is_leap === true)
	// 			$months = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	// 		else
	// 			$months = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	// 	// $start = 1970;
	// 	// $sum = 0;
	// 	// while ($start < $year)
	// 	// {
	// 	// 	if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0)
	// 	// 			$is_leap = true;
	// 	// 	if ($is_leap === true)
	// 	// 		$months = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	// 	// 	else
	// 	// 		$months = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	// 	// 	if ($is_leap === true)
	// 	// 		$temp = 366 * 24 * 60 * 60;
	// 	// 	else
	// 	// 		$temp = 365 * 24 * 60 * 60;
	// 	// 	$sum += $temp;
	// 	// 	$start++;
	// 	// }
	// 	// $result += $sum;
	// 	if ($month > 1)
	// 	{
	// 		$month-=2;
	// 		$temp_secs = 0;
	// 		while ($month >= 0)
	// 		{
	// 			$temp = $months[$month] * 24 * 60 * 60;
	// 			$temp_secs += $temp;
	// 			$month--;
	// 		}
	// 		$result += $temp_secs;
	// 	}
	// 	return $result;
	// }

	$spaces = preg_match_all("/ /", $argv[1]);
	$colons = preg_match_all("/:/", $argv[1]);
	if ($spaces !== 4 || $colons !== 2)
		ft_exit();
	$array = preg_split("/ /", $argv[1]);
	ft_check_days($array[0]);
	$days_and_month = ft_check_months($array[2], $array[3]);
	ft_check_day_number($array[1], $days_and_month[0]);
	ft_check_year($array[3]);
	$time = explode(":", $array[4]);
	ft_check_time($time);
	$seconds = mktime($time[0], $time[1], $time[2], $days_and_month[1], $array[1], $array[3]);
	// $start_year = 1970;
	// $year_difference = $array[3] - $start_year;
	// $number_of_leap_years = ft_count_leaps($start_year, $array[3]);
	// $normal_year = 31536000;
	// $leap_year = 31622400;
	// $seconds = 0;
	// $seconds = ($year_difference - $number_of_leap_years) * $normal_year + $number_of_leap_years * $leap_year;
	// //$seconds = ($array[3] - 1970) * 365 * 24 * 60 * 60 + ($array[3] - 1970) * ((5 * 60 * 60) + (49 * 60));
	// $this_year_secs = ft_get_seconds_this_year($time, $days_and_month[1], $array[1], $array[3]);
	// $seconds += $this_year_secs;
	// //$seconds = ($array[3] - 1970) * 365.25 * 24 * 60 * 60;
	echo $seconds."\n";
}