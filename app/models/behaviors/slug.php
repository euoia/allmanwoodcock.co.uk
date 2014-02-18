<?php 

/**

 * Slug Behavior class file.

 *

 * Model Behavior to support slugs.

 *

 * @filesource

 * @package	app

 * @subpackage	models.behaviors

 */

 

/**

 * Add slug behavior to a model.

 * 

 * @author	Mariano Iglesias

 * @package	app

 * @subpackage	models.behaviors

 */

class SlugBehavior extends ModelBehavior {

	/**

	 * Initiate behaviour for the model using specified settings.

	 *

	 * @param object $model	Model using the behaviour

	 * @param array $settings	Settings to override for model.

	 *

	 * @access public

	 */

	function setup(&$model, $settings = array()) {

		$default = array( 'label' => array('title'), 'slug' => 'slug', 'separator' => '-', 'length' => 100, 'overwrite' => false );

		

		if (!isset($this->settings[$model->name])) {

			$this->settings[$model->name] = $default;

		}

		

		$this->settings[$model->name] = array_merge($this->settings[$model->name], ife(is_array($settings), $settings, array()));

	}

	

	/**

	 * Run before a model is saved, used to set up slug for model.

	 *

	 * @param object $model	Model about to be saved.

	 *

	 * @access public

	 * @since 1.0

	 */

	function beforeSave(&$model) {

		if (!is_array($this->settings[$model->name]['label'])) {

			$this->settings[$model->name]['label'] = array( $this->settings[$model->name]['label'] );

		}

		

		foreach($this->settings[$model->name]['label'] as $field) {

			if (!$model->hasField($field)) {

				return;

			}

		}

		

		if ($model->hasField($this->settings[$model->name]['slug']) && ($this->settings[$model->name]['overwrite'] || empty($model->{$model->primaryKey}))) {

			$label = '';

			

			foreach($this->settings[$model->name]['label'] as $field) {

				$label .= ife(!empty($label), ' ', '');

				$label .= $model->data[$model->name][$field];

			}

			

			if (empty($label)) {

				$label = 'slug';

			}

			

			$slug = $this->_slug($label, $this->settings[$model->name]); 

			

			$conditions = array($model->name . '.' . $this->settings[$model->name]['slug'] => 'LIKE ' . $slug . '%');

			

			if (!empty($model->{$model->primaryKey})) {

				$conditions[$model->name . '.' . $model->primaryKey] = '!= ' . $model->{$model->primaryKey};

			}

			

			$result = $model->find('all', array($model->primaryKey, $this->settings[$model->name]['slug'], null, null, 1, 0));

			$sameUrls = null;

			

			if ($result !== false && !empty($result)) {

				$sameUrls = Set::extract($result, '{n}.' . $model->name . '.' . $this->settings[$model->name]['slug']);

			}

		

			if (!empty($sameUrls)) {

				$begginingSlug = $slug;

				$index = 1;

		

				while($index > 0) {

					if (!in_array($begginingSlug . $this->settings[$model->name]['separator'] . $index, $sameUrls)) {

						$slug = $begginingSlug . $this->settings[$model->name]['separator'] . $index;

						$index = -1;

					}

					$index++;

				}

			}

			

			$model->data[$model->name][$this->settings[$model->name]['slug']] = $slug;

		}

	}

	

	/**

	 * Generate a slug for the given strung using specified settings.

	 *

	 * @param string $string	String.

	 * @param array $settings	Settings to use (looks for 'separator' and 'length')

	 *

	 * @return string	Slug for given string.

	 *

	 * @access private

	 */

	function _slug($string, $settings) {

		$string = strtolower($string);

		

		$string = preg_replace('/[^a-z0-9_]/i', $settings['separator'], $string);

		$string = preg_replace('/\\' . $settings['separator'] . '[\\' . $settings['separator'] . ']*/', $settings['separator'], $string);

		

		if (strlen($string) > $settings['length']) {

			$string = substr($string, 0, $settings['length']);

		}

		

		$string = preg_replace('/\\' . $settings['separator'] . '$/', '', $string);

		$string = preg_replace('/^\\' . $settings['separator'] . '/', '', $string);

		

		return $string;

	}

}

?>