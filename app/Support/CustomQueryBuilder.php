<?php

namespace App\Support;

trait CustomQueryBuilder
{
	public function scopeFilter($query)
	{
		return $this->process($query, array_filter(request()->all()));
	}

	public function process($query, $filters)
	{
		foreach($filters as $filter => $value)
		{
			if(isset($value) && $filter != 'page')
			{
				$data = [$filter, $value];
				$this->makeFilter($query, $data);
			}
		}
	}

	protected function makeFilter($query, $data)
	{
		$this->{camel_case($data[0])}($data, $query);
	}

	public function userId($data, $query)
	{
		return $query->where($data[0], $data[1]);
	}

	public function categoryId($data, $query)
	{
		return $query->with('categories')->whereHas('categories', function($q) use($data){
			$q->where($data[0], $data[1]);
		});
	}

	public function bookName($data, $query)
	{
		return $query->where('name', 'LIKE', '%'.$data[1].'%');
	}
}