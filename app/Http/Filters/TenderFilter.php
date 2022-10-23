<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TenderFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const DATE = 'date_change';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::DATE => [$this, 'date_change'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function date_change(Builder $builder, $value)
    {
        $builder->where('date_change', 'like', "%{$value}%");
    }
}