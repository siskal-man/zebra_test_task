<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TenderFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const DATE = 'change_at';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::DATE => [$this, 'change_at'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function change_at(Builder $builder, $value)
    {
        $builder->where('change_at', 'like', "%{$value}%");
    }
}