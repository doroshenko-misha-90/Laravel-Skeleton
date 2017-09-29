<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Page
 *
 * @property \Modules\Pages\Models\Page $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Page extends Section
{
	/**
	 * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
	 *
	 * @var bool
	 */
	protected $checkAccess = false;

	/**
	 * @var string
	 */
	protected $title = 'Страницы';

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		return AdminDisplay::datatablesAsync()
		                   ->setHtmlAttribute('class', 'table-primary')
		                   ->setColumns(
			                   AdminColumn::text('id', '#')->setWidth('30px'),
			                   AdminColumn::text('title', 'Заголовок'),
			                   AdminColumn::link('slug', 'Ссылка')->setWidth('100px')
		                   )->paginate(20);
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		return AdminForm::panel()->addBody(
			[
				AdminFormElement::text('title', 'Заголовок')->required(),
				AdminFormElement::text('slug', 'Ссылка на страницу')->required()->unique(),
				AdminFormElement::textarea('description', 'Описание/Мета')->setHelpText('Описание для SEO оптимизации'),
				AdminFormElement::wysiwyg('content', 'Содержание')->required()
			]
		);
	}

	/**
	 * @return FormInterface
	 */
	public function onCreate()
	{
		return $this->onEdit(null);
	}

	/**
	 * @return void
	 */
	public function onDelete($id)
	{
		// remove if unused
	}

	/**
	 * @return void
	 */
	public function onRestore($id)
	{
		// remove if unused
	}
}
