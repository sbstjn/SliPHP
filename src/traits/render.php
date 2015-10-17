<?php

Namespace SliPHP;

Trait render
{
    /**
     * Render view if object is converted to string
     *
     * @return string
     */
    public function __toString()
    {
        $render = function (&$view, &$file, &$data) {
            ob_start();
            require $file;

            $data = ob_get_contents();
            ob_end_clean();

            return $data;
        };

        return $render($this, $this->file, $this->locals);
    }
}
