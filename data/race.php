<?php
$data = array(
	'Troll'     => ['P'=>1,'B' => ['Strength' => 10, 'MaxHP' => 10]],
	'HalfTroll' => ['P'=>1,'B' => ['Strength' =>  9, 'MaxHP' => 10]],
	'Ork'       => ['P'=>1,'B' => ['Strength' =>  8, 'MaxHP' => 10]],
	'HalfOrk'   => ['P'=>1,'B' => ['Strength' =>  7, 'MaxHP' => 10]],
	'Goblin'    => ['P'=>1,'B' => ['Strength' =>  6, 'MaxHP' => 10]],
	'Human'     => ['P'=>1,'B' => ['Strength' =>  5, 'MaxHP' => 10]],
	'HalfElve'  => ['P'=>1,'B' => ['Strength' =>  4, 'MaxHP' => 10]],
	'WoodElve'  => ['P'=>1,'B' => ['Strength' =>  3, 'MaxHP' => 10]],
	'NightElve' => ['P'=>1,'B' => ['Strength' =>  2, 'MaxHP' => 10]],
	'Vampire'   => ['P'=>1,'B' => ['Strength' =>  1, 'MaxHP' => 10]],
	'Fairy'     => ['P'=>1,'B' => ['Strength' =>  0, 'MaxHP' => 10]],

	# NPC Only
	'Animal' => ['P'=>0, 'B' => ['Strength'=>4, 'MaxHP' => 0]],
);

$data['Troll']['A']     = [];
$data['HalfTroll']['A'] = [];
$data['Ork']['A']       = [];
$data['HalfOrk']['A']   = [];
$data['Goblin']['A']    = [];
$data['Human']['A']     = [];
$data['HalfElve']['A']  = [];
$data['WoodElve']['A']  = [];
$data['NightElve']['A'] = [];
$data['Vampire']['A']   = [];
$data['Fairy']['A']     = [];

$data['Troll']['I']     = [];
$data['HalfTroll']['I'] = [];
$data['Ork']['I']       = [];
$data['HalfOrk']['I']   = [];
$data['Goblin']['I']    = [];
$data['Human']['I']     = [];
$data['HalfElve']['I']  = [];
$data['WoodElve']['I']  = [];
$data['NightElve']['I'] = [];
$data['Vampire']['I']   = [];
$data['Fairy']['I']     = [];

return $data;