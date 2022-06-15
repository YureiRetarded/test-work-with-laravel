<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const POST_CONTENT = 'post_content';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::POST_CONTENT => [$this, 'postContent'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }
    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }
    public function postContent(Builder $builder, $value)
    {
        $builder->where('post_content', 'like', "%{$value}%");
    }
    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}