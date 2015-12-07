<?php

$restaurants = [];

$restaurant['image'] = 'http://s3-media1.fl.yelpcdn.com/bphoto/M0G7F5JHEzkElBXOs1MXZA/90s.jpg';
$restaurant['line1'] = 'The Cuban Restaurant and Bar';
$restaurant['line2'] = '4.0 star rating 520 reviews';
$restaurant['line3'] = '333 Washington St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 795-9899';

array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media3.fl.yelpcdn.com/bphoto/_AY6gVxFraQ5Kox7nlaHZQ/90s.jpg';
$restaurant['line1'] = 'La Isla Restaurant';
$restaurant['line2'] = '4.0 star rating 607 reviews';
$restaurant['line3'] = '104 Washington St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 659-8197';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media3.fl.yelpcdn.com/bphoto/AnFuDNy3iaehOiNyH0hgBw/90s.jpg';
$restaurant['line1'] = 'Brasserie de Paris';
$restaurant['line2'] = '4.0 star rating 229 reviews';
$restaurant['line3'] = '700 1st St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 942-9700';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media4.fl.yelpcdn.com/bphoto/iQjXIu1VjvOaz0rFMdM2gA/90s.jpg';
$restaurant['line1'] = 'Del Frisco’s Grille';
$restaurant['line2'] = '4.0 star rating 50 reviews';
$restaurant['line3'] = '221 River St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 653-0195';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media2.fl.yelpcdn.com/bphoto/zHa6V7rAWMU3YFJh2PDxVw/90s.jpg';
$restaurant['line1'] = 'Green Pear Cafe';
$restaurant['line2'] = '4.5 star rating 19 reviews';
$restaurant['line3'] = '93 Grand St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 659-0940';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media3.fl.yelpcdn.com/bphoto/yvcTzAHLGWzLxLuxctZ_WA/90s.jpg';
$restaurant['line1'] = 'Cooper’s Union';
$restaurant['line2'] = '4.0 star rating 94 reviews';
$restaurant['line3'] = '104 Hudson St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 222-3443';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media2.fl.yelpcdn.com/bphoto/NiWQKvW_Dt6i74QtnT3IAQ/90s.jpg';
$restaurant['line1'] = 'Stingray Lounge';
$restaurant['line2'] = '4.5 star rating 68 reviews';
$restaurant['line3'] = '1210 Washington St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 683-6030';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media4.fl.yelpcdn.com/bphoto/dpzEGy1i6gJR7EFP-JUY_w/90s.jpg';
$restaurant['line1'] = 'Mamoun’s Falafel Restaurant';
$restaurant['line2'] = '4.0 star rating 408 reviews';
$restaurant['line3'] = '502 Washington St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 656-0310';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media2.fl.yelpcdn.com/bphoto/yPQgJMnu3ur4b5O90w1uwA/90s.jpg';
$restaurant['line1'] = 'Anthony David’s';
$restaurant['line2'] = '4.0 star rating 325 reviews';
$restaurant['line3'] = '953 Bloomfield St';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 222-8399';
array_push($restaurants,$restaurant);

$restaurant['image'] = 'http://s3-media1.fl.yelpcdn.com/bphoto/1h4Mbh3QkxQa6V4H73cnmg/90s.jpg';
$restaurant['line1'] = 'Zack’s Oak Bar & Restaurant';
$restaurant['line2'] = '4.0 star rating 163 reviews';
$restaurant['line3'] = '232 Willow Ave';
$restaurant['line4'] = 'Hoboken, NJ 07030';
$restaurant['line5'] = '(201) 653-7770';
array_push($restaurants,$restaurant);

foreach ($restaurants as $key => $value) {

echo '<div class="row">
	<div class="col-sm-2">
		<a href=""><img src="'.$value['image'].'"></a>
	</div>
	<div class="col-sm-6">
		<a href=""><h4>'.($key+1).'. '.$value['line1'].'</h4></a>
		<h4>'.$value['line2'].'</h4>
	</div>
	<div class="col-sm-4">
		<h5>'.$value['line3'].'</h5>
		<h5>'.$value['line4'].'</h5>
		<h5>'.$value['line5'].'</h5>
	</div>
</div>
<hr>';

}




?>