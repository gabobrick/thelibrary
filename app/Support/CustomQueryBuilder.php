<?php

namespace App\Support;

trait CustomQueryBuilder
{
	public function scopeFilter($query)
	{
		return $this->process($query, request()->all());
	}

	public function process($query, $data)
	{
		foreach($data as $filter => $value)
		{
			if(isset($value) && $filter != 'page')
			{
				$array = [$filter, $value];
				$this->makeFilter($query, $array);
			}
		}
	}

	protected function makeFilter($query, $array)
	{
		$this->{camel_case($array[0])}($array, $query);
	}

	public function userId($array, $query)
	{
		return $query->where($array[0], $array[1]);
	}

	public function categoryId($array, $query)
	{
		//return $query->where($array[0], $array[1]);
		return $query->with('categories');
	}

	public function bookName($array, $query)
	{
		return $query->where('name', $array[1]);
	}
}