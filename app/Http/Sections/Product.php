<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use Modules\Products\Entities\AttributeValue;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Product
 *
 * @property \Modules\Products\Entities\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Product extends Section
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
	protected $title = 'Товары';

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
		                   ->setColumns(
			                   AdminColumn::image('img', 'Изображение')->setWidth('50px'),
			                   AdminColumn::text('slug', 'Артикул')->setWidth('100px'),
			                   AdminColumn::text('name', 'Name')->setWidth('100px'),
			                   AdminColumn::text('price', 'Цена')->setWidth('100px'),
			                   AdminColumn::custom(
				                   'Статус',
				                   function (\Illuminate\Database\Eloquent\Model $model) {
					                   return $model->statusLocale;
				                   }
			                   )->setWidth('100px')
		                   );
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		$display = AdminDisplay::tabbed();
		$display->setTabs(
			function () use ($id) {
				$tabs = [];
				$form = AdminForm::form();
				$form->setElements(
					[
						AdminFormElement::text('name', 'Название товара')->required(),
						AdminFormElement::text('slug', 'Артикул')->required()->unique(),
						AdminFormElement::image('img', 'Изображение')->required(),
						AdminFormElement::number('price', 'Цена')->required()->setMin(1),
						AdminFormElement::select('status', 'Статус')
						                ->setEnum(\Modules\Products\Entities\Product::$locale_status)
						                ->required()
					]
				);
				$tabs[] = AdminDisplay::tab($form)->setLabel("Основная информация")
				                      ->setActive(true)
				                      ->setIcon('<i class="fa fa-cog"></i>');

				if (!is_null($id)) {
					$attributes = AdminSection::getModel(AttributeValue::class)->fireDisplay(
						['scopes' => ['withProduct', $id]]
					);
					$attributes->setParameter('product_id', $id);
					$tabs[] = AdminDisplay::tab($attributes)
					                      ->setLabel("Характеристики и значения")
					                      ->setIcon('<i class="fa fa-cogs"></i>');
				}

				return $tabs;
			}
		);

		return $display;
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
