<?php

use Illuminate\Support\Collection;

trait DataViewer {

    public function scopeSearchPaginateAndOrder($query)
    {
        $request = app()->make('request');

        if ($request->has('order')) {
            foreach ($request->get('order') as $order) {
                //$query = $query->orderBy($order['column'], $order['dir']);
            }
            $col = $request->get('order')[0]['column'];
            $sortCol = $request->get('columns')[$col]['name'];
            $sortDir = $request->get('order')[0]['dir'];
            
            $query = $query/*->remember(0)*/->orderBy($sortCol, $sortDir);

        } else {
            $query = $query/*->remember(0)*/->orderBy('id', 'asc');
        }

        if ($request->has('filter')) {

            $search=$columns=[];
            array_filter($request->get('columns'), function($elem) use (&$search,&$columns){
                if ($elem['searchable']=='true') {
                    $search[]=$elem['name'];
                }
                array_push($columns,$elem['name']);
            });
            //$query->select($columns);

            $filter=$request->get('filter');

            $query->where(function($q) use($filter, $search) {
                $value = "%{$filter}%";
                
                for ($i=0; $i < count($search); $i++) { 
                    if (($i+1) == 1) {
                        $q->where($search[$i], 'like', $value);
                    } else {
                        $q->orWhere($search[$i], 'like', $value);
                    }
                }

            });
        }
        $perPage = $request->has('per_page') ? (int) $request->get('per_page') : 10;

        $result = $query->paginate($perPage);

        $data = $result->toArray();
        $col = new Collection([
            'recordsTotal'=>$result->getTotal(),
            'recordsFiltered'=>$result->getTotal()
        ]);
        return $col->merge($data);
    }
}