<?php

Namespace SliPHP;

Trait render
{
    /**
     * Render view
     */
    public function render()
    {
        $render = function (View $view, $file) {
            ob_start();
            require_once $file;

            $data = ob_get_contents();
            ob_end_clean();

            return $data;
        };

        return $render($this, $this->file);
    }
}