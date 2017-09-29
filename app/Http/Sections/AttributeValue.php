<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Modules\Products\Entities\Attribute;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class AttributeValue
 *
 * @property \Modules\Products\Entities\AttributeValue $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class AttributeValue extends Section
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
	protected $title = 'Значение характеристик';

	/**
	 * @var string
	 */
	protected $alias;

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay($scopes = [])
	{
		$display = AdminDisplay::table()->with('attribute');
		if ($scopes) {
			$display->setScopes($scopes);
		}

		$display->setColumns(
			AdminColumn::text('attribute.name', 'Характеристика')->setWidth('100px'),
			AdminColumn::text('value', 'Значение')->setWidth('100px')
		);

		return $display;
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
				AdminFormElement::select('attribute_id', 'Характеристика')
				                ->setModelForOptions(Attribute::class)
				                ->setDisplay('name')
				                ->required(),
				AdminFormElement::hidden('product_id')->required(),
				AdminFormElement::text('value', 'Значение')->required()
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
