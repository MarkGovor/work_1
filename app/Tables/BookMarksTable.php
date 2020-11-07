<?php

namespace App\Tables;

use App\Models\BookMark;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class BookMarksTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table)->model(BookMark::class)
            ->routes([
                'index'   => ['name' => 'book-marks.index'],
                'create'  => ['name' => 'book-marks.create'],
                'edit'    => ['name' => 'book-marks.edit'],
                'show'    => ['name' => 'book-marks.show'],
                'destroy' => ['name' => 'book-marks.destroy'],
            ]);
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('created_at')->dateTimeFormat('d.m.Y H:i')->sortable();
        $table->column()->title(__('favicon'))->html(fn(BookMark $bookMark) => $bookMark->favicon
            ? '<img style="width:30px;" src="' . \Storage::url($bookMark->favicon). '" alt="' .  $bookMark->title . '">'
            : null);
        $table->column('url')->sortable()->searchable('book_marks', ['url', 'meta_keywords', 'meta_description']);
        $table->column('title')->sortable()->searchable();

    }

}
