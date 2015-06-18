<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

/**
 * Description of View
 *
 * @author Amar OUALI <contact@amarouali.fr>
 */
class ChuchuView extends \Slim\View {

    /**
     * The default layout template.
     */
    const DEFAULT_LAYOUT = 'layout.php';

    /**
     * The data key to use for the layout template.
     */
    const LAYOUT_KEY = 'layout';

    /**
     * The data key to use for yielded content.
     */
    const YIELD_KEY = 'yield';

    /**
     * Unsets the data for the given key.
     *
     * @param string $key
     */
    public function remove($key) {
        $this->data->remove($key);
    }

    /**
     * Override the default fetch mechanism to render a layout if set.
     *
     * @param string $template Path to template file relative to templates directory
     * @param array  $data     Any additonal data to be passed to the template.
     * @return string          The fully rendered view as a string.
     */
    public function fetch($template, $data = null) {
        $layout = $this->getLayout($data);
        $result = $this->render($template, $data = null);
        if (is_string($layout)) {
            $app = \Slim\Slim::getInstance();
            $result = $this->renderLayout($layout, $result, compact('app'));
        }

        return $result;
    }

    /**
     * Returns the layout for this view. This will be either
     * the 'layout' data value, the applications 'layout' configuration
     * value, or 'layout.php'.
     *
     * @param array $data Any additonal data to be passed to the template.
     *
     * @return string|null
     */
    public function getLayout($data = null) {
        $layout = null;

        // 1) Check the passed in data
        if (is_array($data) && array_key_exists(self::LAYOUT_KEY, $data)) {
            $layout = $data[self::LAYOUT_KEY];
            unset($data[self::LAYOUT_KEY]);
        }

        // 2) Check the data on the View
        if ($this->has(self::LAYOUT_KEY)) {
            $layout = $this->get(self::LAYOUT_KEY);
            $this->remove(self::LAYOUT_KEY);
        }

        // 3) Check the Slim configuration
        if (is_null($layout)) {
            $app = \Slim\Slim::getInstance();
            if (isset($app)) {
                $layout = $app->config(self::LAYOUT_KEY);
            }
        }

        // 4) Use the default layout
        if (is_null($layout)) {
            $layout = self::DEFAULT_LAYOUT;
        }

        return $layout;
    }

    protected function renderLayout($layout, $yield, $data = null) {
        if (!is_array($data)) {
            $data = array();
        }
        $data[self::YIELD_KEY] = $yield;
        $currentTemplate = $this->templatesDirectory;
        $result = $this->render($layout, $data);
        $this->templatesDirectory = $currentTemplate;

        return $result;
    }

}
