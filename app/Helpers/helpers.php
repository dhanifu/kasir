<?php

function site(string $key){
    return cache('sites')->$key;
}

function active(string $route, $group = null): String
{
	$active = $group ? request()->is($route) || request()->is($route.'/*') : request()->is($route);
	return $active ? 'active' : '';
}

function image(string $image)
{
	return asset('storage/images/'.$image);
}

function localDate(string $date): String
{
	return date('d M Y', strtotime($date));
}