<?php
require '../../functions.php';

foreach (scandir('../../../sources/models') as $element)
	if ($element != '.' && $element != '..')
		unlink('../../../sources/models/'.$element);

foreach (scandir('../../../sources/entities') as $element)
	if ($element != '.' && $element != '..')
		unlink('../../../sources/entities/'.$element);

foreach (scandir('../../../sources/roads') as $element)
	if ($element != '.' && $element != '..')
		unlink('../../../sources/roads/'.$element);

foreach (scandir('../../../sources/controllers') as $element)
	if ($element != '.' && $element != '..')
		unlink('../../../sources/controllers/'.$element);

foreach (scandir('../../../sources/views') as $element)
	if ($element != '.' && $element != '..' && $element != 'default.php')
		unlink('../../../sources/views/'.$element);

foreach (scandir('../../../sources/views') as $element)
	if ($element != '.' && $element != '..' && $element != 'default.php')
		rrmdir('../../../sources/views/'.$element);